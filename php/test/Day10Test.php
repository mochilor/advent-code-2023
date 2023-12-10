<?php

declare(strict_types=1);

namespace Test;

use Advent\Day10\Part1\Parser;
use Advent\Day10\Part1\Puzzle as Puzzle1;
//use Advent\Day9\Part2\Parser as Parser2;
//use Advent\Day9\Part2\Puzzle as Puzzle2;
use PHPUnit\Framework\TestCase;

class Day10Test extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testPart1(string $input, int $expectedResult): void
    {
        $puzzle = new Puzzle1(new Parser($input));
        $this->assertEquals($expectedResult, $puzzle->solve());
    }

//    public function testPart2(): void
//    {
//        $puzzle = new Puzzle2(new Parser2($this->getInputData()));
//        $this->assertEquals(5905, $puzzle->solve());
//    }

    public static function dataProvider(): array
    {
        return [
            [
                'input' => <<<INPUT
.....
.S-7.
.|.|.
.L-J.
.....
INPUT,
                'expected result' => 4,
            ],
            [
                'input' => <<<INPUT
..F7.
.FJ|.
SJ.L7
|F--J
LJ...
INPUT,
                'expected result' => 8,
            ],
        ];
    }
}
