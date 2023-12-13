<?php

declare(strict_types=1);

namespace Advent\Day13;

use Advent\Day13\Part1\Puzzle;

require __DIR__ . '/../../vendor/autoload.php';

$input = file_get_contents(__DIR__ . '/../../../inputs/13');

$puzzle = new Puzzle($input);
echo $puzzle->solve();
