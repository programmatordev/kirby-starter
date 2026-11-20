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

  onLeave() {
    // Cleanup must run before Taxi removes the outgoing content.
    AlpinePlugin.destroyState(this.content);
  }
}
