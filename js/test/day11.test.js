import {expect, test} from '@jest/globals';
import puzzle from '../src/day11/puzzle';

const input =
  "...#......\n" +
  ".......#..\n" +
  "#.........\n" +
  "..........\n" +
  "......#...\n" +
  ".#........\n" +
  ".........#\n" +
  "..........\n" +
  ".......#..\n" +
  "#...#.....";

test('Day 11: puzzle 1 solution is correct', () => {
  expect(puzzle(input).solve(2)).toBe(374);
});

test('Day 11: puzzle 2 solution is correct', () => {
  expect(puzzle(input).solve(10)).toBe(1030);
});

test('Day 11: puzzle 3 solution is correct', () => {
  expect(puzzle(input).solve(100)).toBe(8410);
});
