<?php

declare(strict_types=1);

namespace Advent\Day11;

require __DIR__ . '/functions.php';

$input = file_get_contents(__DIR__ . '/../../../inputs/11');

echo solve($input, 2);
