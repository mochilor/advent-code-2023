export default class Race {
  constructor(time, recordDistance) {
    this.time = time;
    this.recordDistance = recordDistance;
  }

  validOptionsAmount() {
    let result = 0;

    for (let speed = 0; speed <= this.time; speed++) {
        const remainingTime = this.time - speed;

        const distance = speed * remainingTime;

        if (distance > this.recordDistance) {
            result++;
        } else if (result) {
            break;
        }
    }

    return result;
  }
}
