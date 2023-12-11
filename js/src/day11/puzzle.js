export default function puzzle(input) {
  const map = input.split("\n").map(row => row.split(''));

  function expandMap(rows) {
    const expandedRows = [];
    rows.forEach((row, key) => {
      if (!row.includes('#')) {
        expandedRows.push(key);
      }
    });

    return expandedRows;
  }

  function solve(multiplier) {
    const expandedRows = expandMap(map);
    const expandedColumns = expandMap(map[0].map((col, i) => map.map(row => row[i])));
    const galaxies = [];

    map.forEach((row, y) => {
      row.forEach((cell, x) => {
        if (cell === '#') {
          galaxies.push([x, y]);
        }
      })
    })

    let distance = 0;

    for (let n = 0; n < galaxies.length; n++) {
      for (let pair = n + 1; pair < galaxies.length; pair++) {
        const originX = galaxies[n][0];
        const originY = galaxies[n][1];

        const targetX = galaxies[pair][0];
        const targetY = galaxies[pair][1];

        let distanceX = Math.abs(targetX - originX);
        let distanceY = Math.abs(targetY - originY);

        const distanceXRange = Array.from({ length: distanceX }, (_, i) => Math.min(targetX, originX) + i);
        const expandedColumnsUsed = expandedColumns.filter(x => distanceXRange.includes(x));
        distanceX += expandedColumnsUsed.length * (multiplier - 1);

        const distanceYRange = Array.from({ length: distanceY }, (_, i) => Math.min(targetY, originY) + i);
        const expandedRowsUsed = expandedRows.filter(y => distanceYRange.includes(y));
        distanceY += expandedRowsUsed.length * (multiplier - 1);

        distance += distanceX + distanceY;
      }
    }

    return distance;
  }

  return {
    solve
  }
}
