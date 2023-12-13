<?php

declare(strict_types=1);

namespace Test;

use Advent\Day13\Part1\Puzzle;
use PHPUnit\Framework\TestCase;

class Day13Test extends TestCase
{
    public function testPart1(): void
    {
        $puzzle = new Puzzle($this->getInputData());
        $this->assertEquals(405, $puzzle->solve());
    }

    private function getInputData(): string
    {
        return <<<INPUT
#.##..##.
..#.##.#.
##......#
##......#
..#.##.#.
..##..##.
#.#.##.#.

#...##..#
#....#..#
..##..###
#####.##.
#####.##.
..##..###
#....#..#
INPUT;
    }
}
