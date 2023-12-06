<?php

declare(strict_types=1);

namespace Advent\Day6\Part2;

use Advent\Day6\Common\Race;

readonly class Parser
{
    public function __construct(private string $input)
    {
    }

    public function getRace(): Race
    {
        $inputArray = array_values(array_filter(explode("\n", $this->input)));

        $times = $this->parseRow($inputArray[0]);
        $distances = $this->parseRow($inputArray[1]);

        $time = (int) implode('', $times);
        $distance = (int) implode('', $distances);

        return new Race($time, $distance);
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