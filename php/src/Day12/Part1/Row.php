<?php

declare(strict_types=1);

namespace Advent\Day12\Part1;

readonly class Row
{
    public function __construct(private string $data, private string $groups)
    {
    }

    public function value(): int
    {
        $groups = explode(',', $this->groups);

        $questionMarks = substr_count($this->data, '?');
        $max = 2 ** $questionMarks;

        $options = [];

        for ($n = 0; $n < $max; $n++) {
            $binary = str_pad(decbin($n), $questionMarks, '0', STR_PAD_LEFT);
            $pattern = str_replace('1', '#', str_replace('0', '.', $binary));
            $patternArray = str_split($pattern);
            $occurrence = 0;
            $data = str_split($this->data);
            foreach ($data as &$character) {
                if ($character === '?') {
                    $character = $patternArray[$occurrence++];
                }
            }

            $options[] = implode('', $data);
        }

        $validOptions = array_filter(
            $options,
            function (string $option) use ($groups) {
                $currentGroups = array_values(array_filter(explode('.', $option)));

                if (count($currentGroups) !== count($groups)) {
                    return false;
                }

                foreach ($currentGroups as $key => $currentGroup) {
                    if (strlen($currentGroup) !== (int) $groups[$key]) {
                        return false;
                    }
                }

                return true;
            }
        );

        return count($validOptions);
    }
}
