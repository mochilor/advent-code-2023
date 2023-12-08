<?php

declare(strict_types=1);

namespace Advent\Day8\Part2;

use Exception;

readonly class NodeCollection
{
    private array $nodes;

    public function __construct(Node ...$nodes)
    {
        $this->nodes = $nodes;
    }

    /**
     * @return Node[]
     */
    public function getFirstNodes(): array
    {
        $nodes = [];

        foreach ($this->nodes as $node) {
            if ($node->isFirst()) {
                $nodes[] = $node;
            }
        }

        return $nodes;
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