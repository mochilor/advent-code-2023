<?php

declare(strict_types=1);

namespace Advent\Day13\Part1;

readonly class Pattern
{
    public function __construct(private string $content)
    {
    }

    public function value(): int
    {
        $rows = explode("\n", $this->content);

        $pieces = array_map(
            fn (string $row) => str_split($row),
            $rows,
        );

        $columns = array_map(
            fn (array $row) => implode('', $row),
            array_map(null, ...$pieces),
        );

        $verticalAxis = $this->findAxis($rows);
        if ($verticalAxis) {
            return $verticalAxis;
        }

        return $this->findAxis($columns) * 100;
    }

    /**
     * @param string[] $rows
     */
    private function findAxis(array $rows): int
    {
        $reflectionAxis = [];
        foreach ($rows as $key => $row) {
            $reflectionAxis[$key] = [];
            for ($n = 1; $n < strlen($row); $n++) {
                $stringL = strrev(substr($row, 0, $n));
                $stringR = substr($row, $n);

                $strings = strlen($stringL) < $stringR ? [$stringL, $stringR] : [$stringR, $stringL];
                if (str_starts_with($strings[1], $strings[0])) {
                    $reflectionAxis[$key][] = $n;
                };
            }
        }

        $column = 0;

        do {
            $candidate = array_column($reflectionAxis, $column++);
            if (count($candidate) === count($rows) && count(array_unique($candidate)) === 1) {
                return $candidate[0];
            }
        } while (!empty($candidate));

        return 0;
    }
}
