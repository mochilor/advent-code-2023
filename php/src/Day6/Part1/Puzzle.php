<?php

declare(strict_types=1);

namespace Advent\Day6\Part1;

readonly class Puzzle
{
    public function __construct(private Parser $parser)
    {
    }

    public function solve(): int
    {
        $races = $this->parser->getRaces();

        $result = 1;

        foreach ($races as $race) {
            $result *= $race->validOptionsAmount();
        }

        return $result;
    }
}
