<?php

declare(strict_types=1);

namespace Advent\Day5;

use Advent\Day5\Common\Parser;
use Advent\Day5\Part2\Puzzle;

require __DIR__ . '/../../vendor/autoload.php';

$input = file_get_contents('./input');

// This needs to be multi-threaded to be able to solve it before I die:
$puzzle = new Puzzle(new Parser($input));
echo $puzzle->solve();
