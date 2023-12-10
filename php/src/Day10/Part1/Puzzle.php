<?php

declare(strict_types=1);

namespace Advent\Day10\Part1;

use Exception;

readonly class Puzzle
{
    public function __construct(private Parser $parser)
    {
    }

    public function solve(): int
    {
        $previousVector = $this->parser->getStartingPont();

        $count = 1;

        $cell = $this->getFirstCell($previousVector->x, $previousVector->y);

        do {
            $count++;
            $exits = $cell->exits();
            $nextVector = $previousVector == $exits[0] ? $exits[1] : $exits[0];
            $previousVector = $cell->vector;
            $cell = new Cell($this->parser->getValueAt($nextVector), $nextVector);
        } while (!$cell->isStartingPoint());

        return $count / 2;
    }

    private function getFirstCell(int $x, int $y): Cell
    {
        $nextVectors = [
            new Vector($x, $y - 1),
            new Vector($x + 1, $y),
            new Vector($x, $y + 1),
            new Vector($x - 1, $y),
        ];

        foreach ($nextVectors as $nextVector) {
            $nextCell = new Cell($this->parser->getValueAt($nextVector), $nextVector);

            if ($nextCell->canEnter($x, $y)) {
                return $nextCell;
            }
        }

        throw new Exception('whaaat');
    }
}
