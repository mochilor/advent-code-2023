<?php

declare(strict_types=1);

namespace Advent\Day4;

use Advent\Day4\Part2\Puzzle;

require __DIR__ . '/../../vendor/autoload.php';

$input = file_get_contents(__DIR__ . '/../../../inputs/04');

$puzzle = new Puzzle(...explode("\n", $input));
echo $puzzle->solve();
