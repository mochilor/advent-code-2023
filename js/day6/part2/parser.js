import Race from '../common/Race.js';

function parseRow(row) {
  const rowPieces = row.split(' ');
  return rowPieces.filter(Number);
}

function getRace(input) {
  const inputArray = input.split("\n");
  
  const times = parseRow(inputArray[0]);
  const distances = parseRow(inputArray[1]);

  const time = times.join('');
  const distance = distances.join('');

  return new Race(time, distance);
}

export default getRace;
