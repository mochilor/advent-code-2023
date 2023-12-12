<?php

declare(strict_types=1);

namespace Test;

use Advent\Day12\Part1\Parser;
use Advent\Day12\Part1\Puzzle;
use PHPUnit\Framework\TestCase;

class Day12Test extends TestCase
{
    public function testPart1(): void
    {
        $puzzle = new Puzzle(new Parser($this->getInputData()));
        $this->assertEquals(21, $puzzle->solve());
    }

    private function getInputData(): string
    {
        return <<<INPUT
???.### 1,1,3
.??..??...?##. 1,1,3
?#?#?#?#?#?#?#? 1,3,1,6
????.#...#... 4,1,1
????.######..#####. 1,6,5
?###???????? 3,2,1
INPUT;
    }
}
