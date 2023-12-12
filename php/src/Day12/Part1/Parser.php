<?php

declare(strict_types=1);

namespace Advent\Day12\Part1;

readonly class Parser
{
    public function __construct(private string $input)
    {
    }

    /**
     * @return Row[]
     */
    public function getRows(): array
    {
        $rows = explode("\n", $this->input);

        return array_map(
            function (string $row): Row {
                $data = explode(' ', $row);
                return new Row($data[0], $data[1]);
            },
            $rows
        );
    }
}
