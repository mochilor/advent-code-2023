<?php

declare(strict_types=1);

namespace Advent\Day9;

use Advent\Day9\Part1\Parser;
use Advent\Day9\Part1\Puzzle;

require __DIR__ . '/../../vendor/autoload.php';

$input = file_get_contents(__DIR__ . '/../../../inputs/09');

// Result is not the valid solution :(
$puzzle = new Puzzle(new Parser($input));
echo $puzzle->solve();
