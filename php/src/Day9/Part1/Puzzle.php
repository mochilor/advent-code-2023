<?php

declare(strict_types=1);

namespace Advent\Day9\Part1;

readonly class Puzzle
{
    public function __construct(private Parser $parser)
    {
    }

    public function solve(): int
    {
        $histories = $this->parser->getHistories();

        $result = 0;

        foreach ($histories as $history) {
            $result += $this->extrapolate($history);
        }

        return $result;
    }

    private function extrapolate(History $history): int
    {
        $result = 0;

        do {
            $result += $history->getLast();
            $nextHistory = $history->makeNextHistory();
            if ($nextHistory) {
                $history = $nextHistory;
            }
        } while ($nextHistory);

        return $result;
    }
}
