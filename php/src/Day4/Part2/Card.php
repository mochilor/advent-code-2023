<?php

declare(strict_types=1);

namespace Advent\Day4\Part2;

class Card
{
    public readonly int $id;

    /**
     * @var int[]
     */
    private array $winningNumbers;

    /**
     * @var int[]
     */
    private array $numbers;

    private int $copies = 1;

    public function __construct(string $content)
    {
        $winningNumbersStart = strpos($content, ':') + 2;
        $pipePosition = strpos($content, '|');
        $winningNumbersLength = $pipePosition - $winningNumbersStart;
        $cardName = substr($content, 0, strpos($content, ':'));

        $this->id = (int) str_replace('Card ', '', $cardName);
        $this->winningNumbers = $this->parseNumbers($content, $winningNumbersStart, $winningNumbersLength);
        $this->numbers = $this->parseNumbers($content, $pipePosition + 2, null);
    }

    /**
     * @return int[]
     */
    private function parseNumbers(string $content, int $start, ?int $length): array
    {
        $substring = substr($content, $start, $length);

        $numbersArray = str_split($substring, 3);

        return array_map(
            fn(string $item) => (int) str_replace(' ', '', $item),
            $numbersArray
        );
    }

    public function value(): int
    {
        $commonNumbers = array_intersect($this->winningNumbers, $this->numbers);

        return count($commonNumbers);
    }

    public function addCopy(): void
    {
        $this->copies++;
    }

    public function copies(): int
    {
        return $this->copies;
    }

    public function reset(): void
    {
        $this->copies = 1;
    }
}