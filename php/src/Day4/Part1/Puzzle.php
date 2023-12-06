<?php

declare(strict_types=1);

namespace Advent\Day4\Part1;

class Puzzle
{
    /**
     * @var string[]
     */
    private array $input;

    public function __construct(string ...$inputs)
    {
        $this->input = array_filter($inputs);
    }

    public function solve(): int
    {
        $cards = [];

        foreach ($this->input as $inputLine) {
            $cards[] = new Card($inputLine);
        }

        $result = 0;

        foreach ($cards as $card) {
            $result += $card->value();
        }

        return $result;
    }
}
