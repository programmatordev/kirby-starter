import { Alpine } from "alpinejs";

// Taxi replaces page content like an SPA, so Alpine state is destroyed and initialized explicitly around each swap.
// Context: https://github.com/alpinejs/alpine/discussions/4581 and https://github.com/alpinejs/alpine/discussions/4485

export default class AlpinePlugin {
  static init() {
    window.Alpine = Alpine;
    Alpine.start();
  }

  static initState(root) {
    Alpine.initTree(root);
    Alpine.startObservingMutations();
  }

  static destroyState(root) {
    Alpine.stopObservingMutations();
    Alpine.destroyTree(root);
  }
}
