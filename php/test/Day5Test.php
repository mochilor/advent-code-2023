<?php

declare(strict_types=1);

namespace Test;

use Advent\Day5\Common\Parser;
use Advent\Day5\Part1\Puzzle as Puzzle1;
use Advent\Day5\Part2\Puzzle as Puzzle2;
use PHPUnit\Framework\TestCase;

class Day5Test extends TestCase
{
    public function testPart1(): void
    {
        $puzzle = new Puzzle1(new Parser($this->getInputData()));
        $this->assertEquals(35, $puzzle->solve());
    }

    public function testPart2(): void
    {
        $puzzle = new Puzzle2(new Parser($this->getInputData()));
        $this->assertEquals(46, $puzzle->solve());
    }

    private function getInputData(): string
    {
        return "
seeds: 79 14 55 13

seed-to-soil map:
50 98 2
52 50 48

soil-to-fertilizer map:
0 15 37
37 52 2
39 0 15

fertilizer-to-water map:
49 53 8
0 11 42
42 0 7
57 7 4

water-to-light map:
88 18 7
18 25 70

light-to-temperature map:
45 77 23
81 45 19
68 64 13

temperature-to-humidity map:
0 69 1
1 0 69

humidity-to-location map:
60 56 37
56 93 4";
    }
}
