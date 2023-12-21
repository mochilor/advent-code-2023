export default function puzzle(input) {
  function getStartingPoint(rows) {
    for (let n = 0; n < rows.length; n++) {
      const startingPoint = rows[n].indexOf('S');
      if (startingPoint !== -1) {
        return [startingPoint, n];
      }
    }

    return [0, 0];
  }

  const plots = [];

  function addPlot(x, y) {
    const plot = `${x}_${y}`;

    if (plots.indexOf(plot) !== -1) {
      return false;
    }

    plots.push(plot);

    return true;
  }

  function isFloor(x, y) {
    return rows[y][x] === '.';
  }

  const rows = input.split('\n');

  function solve(steps) {
    const startingPoint = getStartingPoint(rows);
    addPlot(startingPoint[0], startingPoint[1]);

    let currentPoints = [startingPoint];

    for (let n = 0; n < steps / 2; n ++) {
      let candidatePoints = [];

      currentPoints.forEach(point => {
        const x = point[0];
        const y = point[1];

        // top
        if (isFloor(x, y - 1) && isFloor(x, y - 2)) {
          candidatePoints.push([x, y - 2]);
        }
        // top left
        if (isFloor(x - 1, y - 1) && (isFloor(x - 1, y) || isFloor(x, y - 1))) {
          candidatePoints.push([x - 1, y - 1]);
        }
        // left
        if (isFloor(x - 1, y) && isFloor(x - 2, y)) {
          candidatePoints.push([x - 2, y]);
        }
        // bottom left
        if (isFloor(x - 1, y + 1) && (isFloor(x - 1, y) || isFloor(x, y + 1))) {
          candidatePoints.push([x - 1, y + 1]);
        }
        // bottom
        if (isFloor(x, y + 1) && isFloor(x, y + 2)) {
          candidatePoints.push([x, y + 2]);
        }
        // bottom right
        if (isFloor(x + 1, y + 1) && (isFloor(x + 1, y) || isFloor(x, y + 1))) {
          candidatePoints.push([x + 1, y + 1]);
        }
        // right
        if (isFloor(x + 1, y) && isFloor(x + 2, y)) {
          candidatePoints.push([x + 2, y]);
        }
        // top right
        if (isFloor(x + 1, y - 1) && (isFloor(x + 1, y) || isFloor(x, y - 1))) {
          candidatePoints.push([x + 1, y - 1]);
        }
      });

      currentPoints = [];

      candidatePoints.forEach(point => {
        if (addPlot(point[0], point[1])) {
          currentPoints.push(point);
        }
      });
    }

    return plots.length;
  }

  return {
    solve
  }
}
