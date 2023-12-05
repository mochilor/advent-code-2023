<?php

declare(strict_types=1);

namespace Advent\Day5\Part2;

use Advent\Day5\Common\Map;
use Advent\Day5\Common\Parser;
use Generator;

readonly class Puzzle
{
    public function __construct(private Parser $parser)
    {
    }

    public function solve(): int
    {
        $maps = $this->parser->maps();

        $seeds = $this->getSeeds();

        $results = [];

        foreach ($seeds as $seed) {
            $results[] = $this->calculateSeed($seed, $maps);
        }

        return min($results);
    }

    /**
     * @return int[]
     */
    private function getSeeds(): array
    {
        $seedRanges = $this->parser->seeds();
        $seeds = [];

        for ($n = 0; $n < count($seedRanges); $n += 2) {
            $rangeStart = $seedRanges[$n];
            $lastItem = $rangeStart + $seedRanges[$n + 1] - 1;
            $newSeeds = $this->getRange($rangeStart, $lastItem);
            $seeds = [...$seeds, ...$newSeeds];
        }

        return $seeds;
    }

    /**
     * This is not performant enough!
     */
    private function getRange(int $rangeStart, int $lastItem): Generator
    {
        for ($n = $rangeStart; $n <= $lastItem; $n++) {
            yield $n;
        }
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
