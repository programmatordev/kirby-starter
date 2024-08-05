import { Renderer } from "@unseenco/taxi";

export default class DefaultRenderer extends Renderer {
  initialLoad() {
    this.onEnter();
  }

  // handle scripts on each page render
  onEnter() {
    console.log('🔥');
  }
}
