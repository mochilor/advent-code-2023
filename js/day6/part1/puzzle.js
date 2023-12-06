import getRaces from './parser.js';

export default function puzzle(input) {
  function solve() {
    const races = getRaces(input);

    let result = 1;

    races.forEach(race => {
      result *= race.validOptionsAmount();
    });

    return result;
  }

  return {
    solve
  }
}
