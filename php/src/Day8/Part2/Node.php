<?php

declare(strict_types=1);

namespace Advent\Day8\Part2;

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
        return str_split($this->name)[2] === 'A';
    }

    public function isLast(): bool
    {
        return str_split($this->name)[2] === 'Z';
    }

    public function next(string $direction): string
    {
        if ($direction === 'L') {
            return $this->left;
        }

        return $this->right;
    }
}