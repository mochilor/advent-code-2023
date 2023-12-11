import * as fs from 'fs';
import puzzle from './src/day11/puzzle.js';

const input = fs.readFileSync('../inputs/11').toString();
console.log(puzzle(input).solve(2));
console.log(puzzle(input).solve(1000000));
