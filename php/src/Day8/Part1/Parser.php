<?php

declare(strict_types=1);

namespace Advent\Day8\Part1;

use Advent\Day8\Common\Instructions;

readonly class Parser
{
    /**
     * @var string[]
     */
    private array $rows;

    public function __construct(string $input)
    {
        $this->rows = array_filter(explode("\n", $input));
    }

    public function getNodeCollection(): NodeCollection
    {
        $nodes = [];

        foreach ($this->rows as $key => $row) {
            if ($key == 0) {
                continue;
            }

            $rowPieces = explode(" = ", $row);
            $name = $rowPieces[0];
            preg_match('/([A-Z]+),\s([A-Z]+)/', $rowPieces[1], $matches);
            $nodes[] = new Node($name, $matches[1], $matches[2]);
        }

        return new NodeCollection(...$nodes);
    }

    public function getInstructions(): Instructions
    {
        return new Instructions($this->rows[0]);
    }
}
