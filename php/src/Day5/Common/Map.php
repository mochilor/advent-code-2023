<?php

declare(strict_types=1);

namespace Advent\Day5\Common;

readonly class Map
{
    /**
     * @var Mapline[]
     */
    private array $mapLines;

    public function __construct(Mapline ...$mapLines)
    {
        $this->mapLines = $mapLines;
    }

    public function getNext(int $source): int
    {
        foreach ($this->mapLines as $mapLine) {
            $result = $mapLine->map($source);

            if ($result) {
                return $result;
            }
        }

        return $source;
    }
}