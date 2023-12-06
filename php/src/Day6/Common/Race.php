<?php

declare(strict_types=1);

namespace Advent\Day6\Common;

class Race
{
    public function __construct(private int $time, private int $recordDistance)
    {
    }

    public function validOptionsAmount(): int
    {
        $result = 0;

        for ($speed = 0; $speed <= $this->time; $speed++) {
            $remainingTime = $this->time - $speed;

            $distance = $speed * $remainingTime;

            if ($distance > $this->recordDistance) {
                $result++;
            } elseif ($result) {
                break;
            }
        }

        return $result;
    }
}