import { Renderer } from "@unseenco/taxi";
import CookieConsentPlugin from "../plugins/cookie-consent/CookieConsentPlugin.js";

export default class DefaultRenderer extends Renderer {
  initialLoad() {
    CookieConsentPlugin.init();

    this.onEnter();
  }

  // handle scripts on each page render
  onEnter() {
    console.log('🔥');
  }
}
