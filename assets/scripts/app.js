import { Core } from "@unseenco/taxi";
import DefaultRenderer from "./renderers/DefaultRenderer.js";
import FadeTransition from "./transitions/FadeTransition.js";

import "../styles/app.css";

// Expose Taxi so persistent Alpine components can subscribe to navigation events.
window.Taxi = new Core({
  enableAccessibility: true,
  renderers: { default: DefaultRenderer },
  transitions: { default: FadeTransition }
});
