<?php

declare(strict_types=1);

namespace Advent\Day5\Common;

readonly class MapLine
{
    public function __construct(
        private int $sourceStart,
        private int $destinationStart,
        private int $rangeLength,
    ) {
    }

    public function map(int $source): ?int
    {
        if ($source < $this->sourceStart || $source > $this->sourceStart + $this->rangeLength) {
            return null;
        }

        $difference = $source - $this->sourceStart;

        return $this->destinationStart + $difference;
    }
}
