import * as fs from 'fs';
import puzzle from './src/day21/puzzle.js';

const input = fs.readFileSync('../inputs/21').toString();
console.log(puzzle(input).solve(64));
