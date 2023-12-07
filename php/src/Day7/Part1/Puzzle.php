<?php

declare(strict_types=1);

namespace Advent\Day7\Part1;

readonly class Puzzle
{
    public function __construct(private Parser $parser)
    {
    }

    public function solve(): int
    {
        $hands = $this->parser->getHands();

        usort(
            $hands,
            function(Hand $hand1, Hand $hand2) {
                return $hand1->isGreaterThan($hand2) ? 1 : -1;
            }
        );

        $result = 0;
        foreach ($hands as $key => $hand) {
            $result += $hand->bind * ($key + 1);
        }

        return $result;
    }
}
