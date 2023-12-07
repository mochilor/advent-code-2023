<?php

declare(strict_types=1);

namespace Advent\Day7\Part2;

readonly class Parser
{
    public function __construct(private string $input)
    {
    }

    /**
     * @return Hand[]
     */
    public function getHands(): array
    {
        $inputArray = explode("\n", $this->input);

        $hands = [];
        foreach ($inputArray as $inputRow) {
            $handData = array_filter(explode(' ', $inputRow));
            $bind = (int) $handData[1];
            $cards = array_map(
                fn(string $cardLabel) => new Card($cardLabel),
                str_split($handData[0])
            );
            $hands[] = new Hand($bind, ...$cards);
        }

        return $hands;
    }
}
