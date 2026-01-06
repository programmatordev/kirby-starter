import { Alpine } from "alpinejs";

// regarding the initState and destroyState methods,
// it is recommended to re-init the state on every page transition
// because we are kinda mimicking an SPA environment by using Taxi.js
// see https://github.com/alpinejs/alpine/discussions/4581
// see https://github.com/alpinejs/alpine/discussions/4485

export default class AlpinePlugin {
  static init() {
    window.Alpine = Alpine;
    Alpine.start();
  }

  static initState(element) {
    Alpine.initTree(element)
    Alpine.startObservingMutations()
  }

  static destroyState(element) {
    Alpine.stopObservingMutations()
    Alpine.destroyTree(element)
  }
}
