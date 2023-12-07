<?php

declare(strict_types=1);

namespace Advent\Day7\Part2;

readonly class Card
{
    public function __construct(public string $label)
    {
    }

    public function value(): int
    {
        $dictionary = [
            'A' => 14,
            'K' => 13,
            'Q' => 12,
            'J' => 1,
            'T' => 10,
        ];

        return $dictionary[$this->label] ?? (int) $this->label;
    }

    public function isJoker(): bool
    {
        return $this->label === 'J';
    }
}