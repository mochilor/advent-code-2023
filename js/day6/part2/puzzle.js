import getRace from './parser.js';

export default function puzzle(input) {
  function solve() {
    const race = getRace(input);

    return race.validOptionsAmount();
  }

  return {
    solve
  }
}
