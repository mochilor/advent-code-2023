<?php

declare(strict_types=1);

namespace Advent\Day8\Part1;

use Exception;

readonly class NodeCollection
{
    private array $nodes;

    public function __construct(Node ...$nodes)
    {
        $this->nodes = $nodes;
    }

    public function getFirstNode(): Node
    {
        foreach ($this->nodes as $node) {
            if ($node->isFirst()) {
                return $node;
            }
        }

        throw new Exception("first node not found");
    }

    public function getNode(string $name): Node
    {
        foreach ($this->nodes as $node) {
            if ($node->name === $name) {
                return $node;
            }
        }

        throw new Exception("node $name not found");
    }
}