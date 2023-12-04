<?php

namespace Advent\Day4\Part2;

class CardCollection
{
    /**
     * @var array<int, Card>
     */
    private array $cards;

    public function __construct(Card ...$cards)
    {
        foreach ($cards as $card) {
            $this->cards[$card->id] = $card;
        }
    }

    public function totalCards(): int
    {
        $this->resetCards();

        foreach ($this->cards as $card) {
            $wonAmount = $card->value();
            if (!$wonAmount) {
                continue;
            }

            for ($copy = 0; $copy < $card->copies(); $copy++) {
                for ($n = $card->id + 1; $n <= $card->id + $wonAmount; $n++) {
                    $this->cards[$n]?->addCopy();
                }
            }
        }

        $result = 0;
        foreach ($this->cards as $card) {
            $result += $card->copies();
        }

        return $result;
    }

    private function resetCards(): void
    {
        foreach ($this->cards as $card) {
            $card->reset();
        }
    }
}