import { Renderer } from "@unseenco/taxi";
import AlpinePlugin from "../plugins/AlpinePlugin.js";
import CookieConsentPlugin from "../plugins/cookie-consent/CookieConsentPlugin.js";

export default class DefaultRenderer extends Renderer {
  initialLoad() {
    AlpinePlugin.init();
    CookieConsentPlugin.init();
  }

  onEnter() {
    AlpinePlugin.initState(this.content);
  }

  onLeaveCompleted() {
    // Taxi removes the outgoing view first, but this.content still references its detached Alpine tree.
    AlpinePlugin.destroyState(this.content);
  }
}
