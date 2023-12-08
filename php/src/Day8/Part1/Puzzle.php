<?php

declare(strict_types=1);

namespace Advent\Day8\Part1;

readonly class Puzzle
{
    public function __construct(private Parser $parser)
    {
    }

    public function solve(): int
    {
        $nodeCollection = $this->parser->getNodeCollection();

        $instructions = $this->parser->getInstructions();

        $node = $nodeCollection->getFirstNode();

        $goalReached = false;

        $steps = 0;

        while (!$goalReached) {
            $steps++;
            $direction = $instructions->next();
            $nextNodeName = $node->next($direction);
            $node = $nodeCollection->getNode($nextNodeName);
            $goalReached = $node->isLast();
        }

        return $steps;
    }
}
