import Race from '../common/Race.js';

function parseRow(row) {
  const rowPieces = row.split(' ');
  return rowPieces.filter(Number);
}

function getRaces(input) {
  const inputArray = input.split("\n");
  
  const times = parseRow(inputArray[0]);
  const distances = parseRow(inputArray[1]);

  const result = [];

  times.forEach((time, index) => {
    result.push(new Race(time, distances[index]));
  });

  return result;
}

export default getRaces;
