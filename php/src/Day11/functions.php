<?php

declare(strict_types=1);

namespace Advent\Day11;

function solve(string $input, int $multiplier): int
{
    $expandMap = function(array $rows): array
    {
        $expandedRows = [];
        foreach ($rows as $key => $row) {
            if (!in_array('#', $row)) {
                $expandedRows[] = $key;
            }
        }

        return $expandedRows;
    };

    $map = array_map(
        fn (string $row) => str_split($row),
        explode("\n", $input)
    );

    $expandedRows = $expandMap($map);

    $expandedColumns = $expandMap(array_map(null, ...$map));

    $galaxies = [];

    foreach ($map as $y => $row) {
        foreach ($row as $x => $cell) {
            if ($cell === '#') {
                $galaxies[] = [$x, $y];
            }
        }
    }

    $distances = [];

    for ($n = 0; $n < count($galaxies); $n++) {
        for ($pair = $n + 1; $pair < count($galaxies); $pair++) {
            $originX = $galaxies[$n][0];
            $originY = $galaxies[$n][1];

            $targetX = $galaxies[$pair][0];
            $targetY = $galaxies[$pair][1];

            $distanceX = abs($targetX - $originX);
            $distanceY = abs($targetY - $originY);

            $expandedColumnsUsed = array_intersect(range($originX, $targetX), $expandedColumns);
            $distanceX += count($expandedColumnsUsed) * ($multiplier - 1);

            $expandedRowsUsed = array_intersect(range($originY, $targetY), $expandedRows);
            $distanceY += count($expandedRowsUsed) * ($multiplier - 1);

            $distances[] = $distanceX + $distanceY;
        }
    }

    return array_sum($distances);
}
