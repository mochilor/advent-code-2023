<?php

declare(strict_types=1);

namespace Test;

require __DIR__ . '/../src/Day11/functions.php';

use PHPUnit\Framework\TestCase;
use function Advent\Day11\solve;

class Day11Test extends TestCase
{
    public function test(): void
    {
        $this->assertEquals(
            374,
            solve($this->getInputData(), 2)
        );

        $this->assertEquals(
            1030,
            solve($this->getInputData(), 10)
        );

        $this->assertEquals(
            8410,
            solve($this->getInputData(), 100)
        );
    }

    private function getInputData(): string
    {
        return <<<INPUT
...#......
.......#..
#.........
..........
......#...
.#........
.........#
..........
.......#..
#...#.....
INPUT;
    }
}
