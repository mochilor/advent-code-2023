<?php

declare(strict_types=1);

namespace Advent\Day2;

$input = file_get_contents(__DIR__ . '/../../../inputs/02');

class Set
{
    private const MAX_RED = 12;

    private const MAX_GREEN = 13;

    private const MAX_BLUE = 14;

    private readonly int $red;

    private readonly int $green;

    private readonly int $blue;

    public function __construct(string $input)
    {
        preg_match_all('/(\d+\sred)|(\d+\sgreen)|(\d+\sblue)/', $input, $matches);

        $red = array_values(array_filter($matches[1]))[0] ?? '';
        $green = array_values(array_filter($matches[2]))[0] ?? '';
        $blue = array_values(array_filter($matches[3]))[0] ?? '';

        $this->red = $this->parseColor($red);
        $this->green = $this->parseColor($green);
        $this->blue = $this->parseColor($blue);
    }

    private function parseColor(string $color): int
    {
        return (int) preg_replace('/[^0-9]/', '', $color) ?: 0;
    }

    public function isValid(): bool
    {
        return $this->red <= self::MAX_RED && $this->green <= self::MAX_GREEN && $this->blue <= self::MAX_BLUE;
    }
}

class Game
{
    public readonly int $id;

    /** @var Set[] */
    private array $sets;

    public function __construct(string $input)
    {
        $this->id = $this->parseId($input);

        $setsInput = substr($input, strpos($input, ':'));

        $setsInputArray = explode(';', $setsInput);

        foreach ($setsInputArray as $setInput) {
            $this->sets[] = new Set($setInput);
        }
    }

    private function parseId(string $input): int
    {
        $gameName = substr($input, 0, strpos($input, ':'));

        return (int) preg_replace('/Game /', '', $gameName);
    }

    public function isValid(): bool
    {
        foreach ($this->sets as $set) {
            if (!$set->isValid()) {
                return false;
            }
        }

        return true;
    }
}

$gameInputs = explode("\n", $input);

$games = [];

foreach ($gameInputs as $gameInput) {
    $games[] = new Game($gameInput);
}

$result = 0;

foreach ($games as $game) {
    $result += $game->isValid() ? $game->id : 0;
}

echo $result . "\n";
