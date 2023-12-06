import * as fs from 'fs';
import puzzle61 from './day6/part1/puzzle.js';
import puzzle62 from './day6/part2/puzzle.js';

const input = fs.readFileSync('../inputs/06').toString();
console.log(puzzle61(input).solve());
console.log(puzzle62(input).solve());
