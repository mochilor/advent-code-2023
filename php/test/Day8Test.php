<?php

declare(strict_types=1);

namespace Test;

use Advent\Day8\Part1\Parser as Parser1;
use Advent\Day8\Part1\Puzzle as Puzzle1;
use Advent\Day8\Part2\Parser as Parser2;
use Advent\Day8\Part2\Puzzle as Puzzle2;
use PHPUnit\Framework\TestCase;

class Day8Test extends TestCase
{
    /**
     * @dataProvider dataProvider1
     */
    public function testPart1(string $input, int $expectedResult): void
    {
        $puzzle = new Puzzle1(new Parser1($input));
        $this->assertEquals($expectedResult, $puzzle->solve());
    }

    public function testPart2(): void
    {
        $input = <<<INPUT
LR

11A = (11B, XXX)
11B = (XXX, 11Z)
11Z = (11B, XXX)
22A = (22B, XXX)
22B = (22C, 22C)
22C = (22Z, 22Z)
22Z = (22B, 22B)
XXX = (XXX, XXX)
INPUT;
        $puzzle = new Puzzle2(new Parser2($input));
        $this->assertEquals(6, $puzzle->solve());
    }

    public static function dataProvider1(): array
    {
        return [
            'example 1' => [
                'input' => <<<INPUT
RL

AAA = (BBB, CCC)
BBB = (DDD, EEE)
CCC = (ZZZ, GGG)
DDD = (DDD, DDD)
EEE = (EEE, EEE)
GGG = (GGG, GGG)
ZZZ = (ZZZ, ZZZ)
INPUT,
                'expected result' => 2,
            ],
            'example 2' => [
                'input' => <<<INPUT
LLR

AAA = (BBB, BBB)
BBB = (AAA, ZZZ)
ZZZ = (ZZZ, ZZZ)
INPUT,
                'expected result' => 6,
            ],
        ];
    }
}
