<?php

declare(strict_types=1);

namespace Advent\Day4;

use Advent\Day4\Part2\Puzzle;

require __DIR__ . '/../../vendor/autoload.php';

$input = file_get_contents('./input');

$puzzle = new Puzzle(...explode("\n", $input));
echo $puzzle->solve();
