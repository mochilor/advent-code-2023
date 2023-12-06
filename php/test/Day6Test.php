<?php

declare(strict_types=1);

namespace Test;

use Advent\Day6\Part1\Parser as Parser1;
use Advent\Day6\Part1\Puzzle as Puzzle1;
use Advent\Day6\Part2\Parser as Parser2;
use Advent\Day6\Part2\Puzzle as Puzzle2;
use PHPUnit\Framework\TestCase;

class Day6Test extends TestCase
{
    public function testPart1(): void
    {
        $puzzle = new Puzzle1(new Parser1($this->getInputData()));
        $this->assertEquals(288, $puzzle->solve());
    }

    public function testPart2(): void
    {
        $puzzle = new Puzzle2(new Parser2($this->getInputData()));
        $this->assertEquals(71503, $puzzle->solve());
    }

    private function getInputData(): string
    {
        return "
Time:      7  15   30
Distance:  9  40  200";
    }
}
