<?php

declare(strict_types=1);

namespace Advent\Day5\Common;

readonly class Parser
{
    /**
     * @var string[]
     */
    private array $pieces;

    public function __construct(string $input)
    {
        $this->pieces = preg_split("/\n\n/", $input);
    }

    /**
     * @return Map[]
     */
    public function maps(): array
    {
        $maps = [];

        foreach ($this->pieces as $key => $piece) {
            if ($key == 0) {
                continue;
            }

            $numbers = [];

            $rows = explode("\n", $piece);
            foreach ($rows as $rowKey => $row) {
                if ($rowKey == 0) {
                    continue;
                }

                $numbers[] = array_map(
                    fn(string $item) => (int) $item,
                    explode(' ', $row)
                );
            }

            $mapLines = [];
            foreach ($numbers as $numbersRow) {
                $mapLines[] = new MapLine($numbersRow[1], $numbersRow[0], $numbersRow[2]);
            }

        $maps[] = new Map(...$mapLines);
        }

        return $maps;
    }

    /**
     * @return int[]
     */
    public function seeds(): array
    {
        $seedsString = $this->pieces[0];

        $seeds = explode(' ', $seedsString);

        array_shift($seeds);

        return array_map(
            fn (string $item) => (int) $item,
            $seeds
        );
    }
}
