<?php

declare(strict_types=1);

namespace Advent\Day4\Part2;

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

        $cardCollection = new CardCollection(...$cards);

        return $cardCollection->totalCards();
    }
}
