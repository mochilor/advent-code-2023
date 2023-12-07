<?php

declare(strict_types=1);

namespace Advent\Day7\Part1;

readonly class Hand
{
    private const FIVE_OF_A_KIND = 7;

    private const FOUR_OF_A_KIND = 6;

    private const FULL_HOUSE = 5;

    private const THREE_OF_A_KIND = 4;

    private const TWO_PAIR = 3;

    private const ONE_PAIR = 2;

    private const HIGH_CARD = 1;

    private array $cards;

    public function __construct(public int $bind, Card ...$cards)
    {
        $this->cards = $cards;
    }

    public function isGreaterThan(self $hand): bool
    {
        if ($this->handValue() == $hand->handValue()) {
            foreach ($this->cards as $key => $card) {
                $otherCard = $hand->cards[$key];
                if ($card->value() === $otherCard->value()) {
                    continue;
                }

                return $card->value() > $otherCard->value();
            }
        }

        return $this->handValue() > $hand->handValue();
    }

    private function handValue(): int
    {
        $labels = [];

        foreach ($this->cards as $card) {
            $labels[$card->label] = isset($labels[$card->label]) ? $labels[$card->label] + 1 : 1;
        }

        $values = array_values($labels);
        rsort($values);

        return match (count($values)) {
            1 => self::FIVE_OF_A_KIND,
            2 => $values[0] === 4 ? self::FOUR_OF_A_KIND : self::FULL_HOUSE,
            3 => $values[0] === 3 ? self::THREE_OF_A_KIND : self::TWO_PAIR,
            4 => self::ONE_PAIR,
            default => self::HIGH_CARD,
        };
    }
}
