<?php

declare(strict_types=1);

namespace Advent\Day12\Part1;

readonly class Puzzle
{
    public function __construct(private Parser $parser)
    {
    }

    public function solve(): int
    {
        return array_reduce(
            $this->parser->getRows(),
            fn (?int $carry, Row $row) => $carry + $row->value()
        );
    }
}
