<?php

declare(strict_types=1);

namespace Advent\Day5;

use Advent\Day5\Common\Parser;
use Advent\Day5\Part1\Puzzle;

require __DIR__ . '/../../vendor/autoload.php';

$input = file_get_contents(__DIR__ . '/../../../inputs/05');

$puzzle = new Puzzle(new Parser($input));
echo $puzzle->solve();
