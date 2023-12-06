<?php

declare(strict_types=1);

$input = file_get_contents(__DIR__ . '/../../inputs/02');

class Set
{
    public readonly int $red;

    public readonly int $green;

    public readonly int $blue;

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

    public function power(): int
    {
        $red = [];
        $green = [];
        $blue = [];

        foreach ($this->sets as $set) {
            $red[] = $set->red;
            $green[] = $set->green;
            $blue[] = $set->blue;
        }

        $maxRed = max($red) ?: 0;
        $maxGreen = max($green) ?: 0;
        $maxBlue = max($blue) ?: 0;

        return $maxRed * $maxGreen * $maxBlue;
    }
}

$gameInputs = explode("\n", $input);

$games = [];

foreach ($gameInputs as $gameInput) {
    $games[] = new Game($gameInput);
}

$result = 0;

foreach ($games as $game) {
    $result += $game->power();
}

echo $result . "\n";
