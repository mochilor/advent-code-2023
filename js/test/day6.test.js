import {expect, jest, test} from '@jest/globals';
import puzzle1 from '../src/day6/part1/puzzle';
import puzzle2 from '../src/day6/part2/puzzle';

const input = "Time:      7  15   30\nDistance:  9  40  200";

test('puzzle 1 solution is correct', () => {
  expect(puzzle1(input).solve()).toBe(288);
});

test('puzzle 2 solution is correct', () => {
  expect(puzzle2(input).solve()).toBe(71503);
});
