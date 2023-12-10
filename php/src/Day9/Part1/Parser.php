<?php

declare(strict_types=1);

namespace Advent\Day9\Part1;

readonly class Parser
{
    public function __construct(private string $input)
    {
    }

    /**
     * @return History[]
     */
    public function getHistories(): array
    {
        $result = [];

        $rows = explode("\n", $this->input);

        foreach ($rows as $row) {
            $values = array_map(
                fn (string $item) => (int) $item,
                explode(' ',$row)
            );
            $result[] = new History(...$values);
        }

        return $result;
    }
}