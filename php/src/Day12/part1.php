<?php

declare(strict_types=1);

namespace Advent\Day12;

use Advent\Day12\Part1\Parser;
use Advent\Day12\Part1\Puzzle;

require __DIR__ . '/../../vendor/autoload.php';

$input = file_get_contents(__DIR__ . '/../../../inputs/12');

$puzzle = new Puzzle(new Parser($input));
echo $puzzle->solve();
