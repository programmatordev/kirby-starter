import { Renderer } from "@unseenco/taxi";
import AlpinePlugin from "../plugins/AlpinePlugin.js";
import CookieConsentPlugin from "../plugins/cookie-consent/CookieConsentPlugin.js";

export default class DefaultRenderer extends Renderer {
  initialLoad() {
    AlpinePlugin.init();
    CookieConsentPlugin.init();

    this.onEnter();
  }

  onEnter() {
    AlpinePlugin.initState(this.wrapper);
  }

  onLeaveCompleted() {
    AlpinePlugin.destroyState(this.wrapper);
  }
}
