<?php

declare(strict_types=1);

namespace Advent\Day8;

use Advent\Day8\Part2\Parser;
use Advent\Day8\Part2\Puzzle;

require __DIR__ . '/../../vendor/autoload.php';

$input = file_get_contents(__DIR__ . '/../../../inputs/08');

$puzzle = new Puzzle(new Parser($input));
echo $puzzle->solve();
