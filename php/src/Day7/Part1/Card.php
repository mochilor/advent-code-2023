<?php

declare(strict_types=1);

namespace Advent\Day7\Part1;

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
            'J' => 11,
            'T' => 10,
        ];

        return $dictionary[$this->label] ?? (int) $this->label;
    }
}