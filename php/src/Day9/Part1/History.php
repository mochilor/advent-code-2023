<?php

declare(strict_types=1);

namespace Advent\Day9\Part1;

readonly class History
{
    private array $values;

    public function __construct(int ...$values)
    {
        $this->values = $values;
    }

    public function makeNextHistory(): ?self
    {
        $result = [];

        foreach ($this->values as $key => $value) {
            if ($key == 0) {
                continue;
            }
            $result[] = $value - $this->values[$key - 1];
        }

        if (array_sum($result) === 0) {
            return null;
        }

        return new self(...$result);
    }

    public function getLast(): int
    {
        return $this->values[count($this->values) - 1];
    }
}
