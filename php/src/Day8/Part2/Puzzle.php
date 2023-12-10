<?php

declare(strict_types=1);

namespace Advent\Day8\Part2;

readonly class Puzzle
{
    public function __construct(private Parser $parser)
    {
    }

    public function solve(): int
    {
        $nodeCollection = $this->parser->getNodeCollection();

        $instructions = $this->parser->getInstructions();

        $nodes = $nodeCollection->getFirstNodes();

        $goalReached = false;

        $steps = 0;

        while (!$goalReached) {
            $steps++;
            echo $steps . "\n";
            $direction = $instructions->next();
            $goalReached = true;

            foreach ($nodes as $key => $node) {
                $nextNodeName = $node->next($direction);
                $nodes[$key] = $nodeCollection->getNode($nextNodeName);
                if (!$nodes[$key]->isLast()) {
                    $goalReached = false;
                }
            }
        }

        return $steps;
    }
}
