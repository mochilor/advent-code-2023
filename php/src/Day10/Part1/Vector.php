<?php

declare(strict_types=1);

namespace Advent\Day10\Part1;

readonly class Vector
{
    public function __construct(
        public int $x,
        public int $y,
    ) {
    }
}