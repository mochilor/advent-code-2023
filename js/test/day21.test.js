import {expect, test} from '@jest/globals';
import puzzle from '../src/day21/puzzle';

const input =
  "...........\n" +
  ".....###.#.\n" +
  ".###.##..#.\n" +
  "..#.#...#..\n" +
  "....#.#....\n" +
  ".##..S####.\n" +
  ".##..#...#.\n" +
  ".......##..\n" +
  ".##.#.####.\n" +
  ".##..##.##.\n" +
  "...........";

test('Day 21: puzzle 1 solution is correct', () => {
  expect(puzzle(input).solve(6)).toBe(16);
});
