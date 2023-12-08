<?php

declare(strict_types=1);

namespace Advent\Day8\Part1;

readonly class Node
{
    public function __construct(
        public string $name,
        public string $left,
        public string $right
    ) {
    }

    public function isFirst(): bool
    {
        return $this->name === 'AAA';
    }

    public function isLast(): bool
    {
        return $this->name === 'ZZZ';
    }

    public function next(string $direction): string
    {
        if ($direction === 'L') {
            return $this->left;
        }

        return $this->right;
    }
}