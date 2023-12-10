<?php

declare(strict_types=1);

namespace Advent\Day10\Part1;

readonly class Cell
{
    public int $x;

    public int $y;

    public function __construct(
        private string $value,
        public Vector $vector,
    ) {
        $this->x = $vector->x;
        $this->y = $vector->y;
    }

    public function exits(): array
    {
        [$a, $b] = match($this->value) {
            '|' => [[$this->x, $this->y - 1], [$this->x, $this->y + 1]],
            '-' => [[$this->x - 1, $this->y], [$this->x + 1, $this->y]],
            'L' => [[$this->x + 1, $this->y], [$this->x, $this->y - 1]],
            'J' => [[$this->x - 1, $this->y], [$this->x, $this->y - 1]],
            '7' => [[$this->x - 1, $this->y], [$this->x, $this->y + 1]],
            'F' => [[$this->x + 1, $this->y], [$this->x, $this->y + 1]],
        };

        return [
            new Vector(...$a),
            new Vector(...$b),
        ];
    }

    public function canEnter(int $sourceX, int $sourceY): bool
    {
        return match($this->value) {
            '.' => false,
            '|' => $sourceX == $this->x && abs($sourceY - $this->y) == 1,
            '-' => $sourceY == $this->y && abs($sourceX - $this->x) == 1,
            'L' => ($sourceX == $this->x && $sourceY == $this->y - 1) ||
                ($sourceX == $this->x + 1 && $sourceY == $this->y),
            'J' => ($sourceX == $this->x && $sourceY == $this->y - 1) ||
                ($sourceX == $this->x - 1 && $sourceY == $this->y),
            '7' => ($sourceX == $this->x && $sourceY == $this->y + 1) ||
                ($sourceX == $this->x - 1 && $sourceY == $this->y),
            'F' => ($sourceX == $this->x && $sourceY == $this->y + 1) ||
                ($sourceX == $this->x + 1 && $sourceY == $this->y),
        };
    }

    public function isStartingPoint(): bool
    {
        return $this->value === 'S';
    }
}
