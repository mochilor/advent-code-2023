<?php

declare(strict_types=1);

namespace Advent\Day6\Part2;

readonly class Puzzle
{
    public function __construct(private Parser $parser)
    {
    }

    public function solve(): int
    {
        return $this->parser->getRace()->validOptionsAmount();
    }
}
