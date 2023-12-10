<?php

declare(strict_types=1);

namespace Test;

use Advent\Day9\Part1\Parser as Parser1;
use Advent\Day9\Part1\Puzzle as Puzzle1;
use PHPUnit\Framework\TestCase;

class Day9Test extends TestCase
{
    public function testPart1(): void
    {
        $puzzle = new Puzzle1(new Parser1($this->getInputData()));
        $this->assertEquals(114, $puzzle->solve());
    }

    private function getInputData(): string
    {
        return <<<INPUT
0 3 6 9 12 15
1 3 6 10 15 21
10 13 16 21 30 45
INPUT;
    }
}
