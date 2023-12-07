<?php

declare(strict_types=1);

namespace Test;

use Advent\Day7\Part1\Parser as Parser1;
use Advent\Day7\Part1\Puzzle as Puzzle1;
use Advent\Day7\Part2\Parser as Parser2;
use Advent\Day7\Part2\Puzzle as Puzzle2;
use PHPUnit\Framework\TestCase;

class Day7Test extends TestCase
{
    public function testPart1(): void
    {
        $puzzle = new Puzzle1(new Parser1($this->getInputData()));
        $this->assertEquals(6440, $puzzle->solve());
    }

    public function testPart2(): void
    {
        $puzzle = new Puzzle2(new Parser2($this->getInputData()));
        $this->assertEquals(5905, $puzzle->solve());
    }

    private function getInputData(): string
    {
        return <<<INPUT
32T3K 765
T55J5 684
KK677 28
KTJJT 220
QQQJA 483
INPUT;
    }
}
