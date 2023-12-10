<?php

declare(strict_types=1);

namespace Advent\Day10\Part1;

use Exception;

readonly class Parser
{
    private array $map;

    public function __construct(string $input)
    {
        $rows = explode("\n", $input);

        $map = [];

        foreach ($rows as $row) {
            $map[] = str_split($row);
        }

        $this->map = $map;
    }

    public function getStartingPont(): Vector
    {
        foreach ($this->map as $y => $row) {
            foreach ($row as $x => $value) {
                if ($value === 'S') {
                    return new Vector($x, $y);
                }
            }
        }

        throw new Exception('Whhat');
    }

    public function getValueAt(Vector $vector): string
    {
        return $this->map[$vector->y][$vector->x] ?? '';
    }
}
