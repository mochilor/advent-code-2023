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

        $seedRanges = $this->getSeedRanges();

        $results = [];

        foreach ($seedRanges as $seedRange) {
            foreach ($seedRange as $seed) {
                $results[] = $this->calculateSeed($seed, $maps);
            }
        }

        return min($results);
    }

    /**
     * @return int[][]
     */
    private function getSeedRanges(): array
    {
        $seedData = $this->parser->seeds();
        $seedRanges = [];

        for ($n = 0; $n < count($seedData); $n += 2) {
            $rangeStart = $seedData[$n];
            $lastItem = $rangeStart + $seedData[$n + 1] - 1;
            $seedRanges[] = $this->getRange($rangeStart, $lastItem);
        }

        return $seedRanges;
    }

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
