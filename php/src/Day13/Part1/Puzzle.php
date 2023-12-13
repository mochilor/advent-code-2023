<?php

declare(strict_types=1);

namespace Advent\Day13\Part1;

readonly class Puzzle
{
    public function __construct(private string $input)
    {
    }

    public function solve(): int
    {
        $patterns = array_map(
            fn (string $patternContent) => new Pattern($patternContent),
            explode("\n\n", $this->input),
        );

        return array_reduce(
            $patterns,
            fn (?int $carry, Pattern $pattern) => $pattern->value() + $carry,
        );
    }
}
