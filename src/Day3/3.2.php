<?php

declare(strict_types=1);

$input = file_get_contents(__DIR__ . '/../../inputs/03');

class Character
{
    public function __construct(
        public readonly int $row,
        public readonly int $column,
    ) {
    }
}

class Part
{
    public readonly int $number;

    public function __construct(
        string $characters,
        private readonly int $row,
        private readonly int $column,
    ) {
        $this->number = $this->parseCharacters($characters);
    }

    private function parseCharacters(string $characters): int
    {
        $charactersArray = str_split($characters);

        $result = '';

        $current = 0;

        while(isset($charactersArray[$current]) && is_numeric($charactersArray[$current])) {
            $result .= $charactersArray[$current];
            $current++;
        }

        return (int) $result;
    }

    private function left(): int
    {
        return $this->column - 1;
    }

    private function right(): int
    {
        return $this->column + strlen((string) $this->number);
    }

    private function top(): int
    {
        return $this->row - 1;
    }

    private function bottom(): int
    {
        return $this->row + 1;
    }

    public function touches(Character $character): bool
    {
        return $character->column >= $this->left() &&
            $character->column <= $this->right() &&
            $character->row >= $this->top() &&
            $character->row <= $this->bottom();
    }

    public function collides(Part $part): bool
    {
        return $part->row == $this->row &&
            $part->column > $this->left() &&
            $part->column < $this->right();
    }
}

class PartCollection
{
    /** @var Part[] */
    private array $parts = [];

    public function addPart(Part $part): void
    {
        foreach ($this->parts as $existingPart) {
            if ($part->collides($existingPart) || $existingPart->collides($part)) {
                return;
            }
        }

        $this->parts[] = $part;
    }

    public function calculatePartsSum(Character ...$characters): int
    {
        $result = 0;

        foreach ($characters as $character) {
            $touching = [];
            foreach ($this->parts as $part) {
                if ($part->touches($character)) {
                    $touching[] = $part->number;
                }

                if (count($touching) === 2) {
                    $result += ($touching[0] * $touching[1]);
                    break;
                }
            }
        }

        return $result;
    }
}

$rows = explode("\n", $input);

$characters = [];
$parts = new PartCollection();

foreach ($rows as $rowKey => $row) {
    $rowCharacters = str_split($row);

    foreach ($rowCharacters as $columnKey => $rowCharacter) {
        if (is_numeric($rowCharacter)) {
            $parts->addPart(new Part(substr($row, $columnKey), $rowKey, $columnKey));
        } elseif ($rowCharacter != '.') {
            $characters[] = new Character($rowKey, $columnKey);
        }
    }
}

echo $parts->calculatePartsSum(...$characters);
