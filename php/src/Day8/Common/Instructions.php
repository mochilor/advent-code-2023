<?php

declare(strict_types=1);

namespace Advent\Day8\Common;

class Instructions
{
    private int $current;

    public function __construct(private readonly string $input)
    {
        $this->current = strlen($this->input) - 1;
    }

    public function next(): string
    {
        $instructions = str_split($this->input);

        $this->current++;

        if (!isset($instructions[$this->current])) {
            $this->current = 0;
        }

        return $instructions[$this->current];
    }
}