<?php

declare(strict_types=1);

namespace Advent\Day6\Part1;

use Advent\Day6\Common\Race;

readonly class Parser
{
    public function __construct(private string $input)
    {
    }

    /**
     * @return Race[]
     */
    public function getRaces(): array
    {
        $inputArray = array_values(array_filter(explode("\n", $this->input)));

        $times = $this->parseRow($inputArray[0]);
        $distances = $this->parseRow($inputArray[1]);

        $result = [];
        foreach ($times as $key => $time) {
            $result[] = new Race($time, $distances[$key]);
        }

        return $result;
    }

    /**
     * @param string $row
     * @return int[]
     */
    private function parseRow(string $row): array
    {
        return array_values(
            array_map(
                fn (string $item) => (int) $item,
                array_filter(explode(' ', $row), 'is_numeric')
            )
        );
    }
}