<?php

declare(strict_types=1);

namespace Advent\Day5\Part1;

use Advent\Day5\Common\Map;
use Advent\Day5\Common\Parser;

readonly class Puzzle
{
    public function __construct(private Parser $parser)
    {
    }

    public function solve(): int
    {
        $maps = $this->parser->maps();

        $seeds = $this->parser->seeds();

        $results = [];

        foreach ($seeds as $seed) {
            $results[] = $this->calculateSeed($seed, $maps);
        }

        return min($results);
    }

    /**
     * @param Map[] $maps
     */
    private function calculateSeed(int $seed, array $maps): int
    {
        $next = $seed;
        foreach ($maps as $map) {
            $next = $map->getNext($next);
        }

        return $next;
    }
}
