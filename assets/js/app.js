import { Core } from "@unseenco/taxi";
import DefaultRenderer from "./renderers/default.js";
import FadeTransition from "./transitions/fade.js";

// make vite aware of static assets
import.meta.glob(['../images/**', '../fonts/**']);

// handle page rendering and transitions
const taxi = new Core({
  renderers: { default: DefaultRenderer },
  transitions: { default: FadeTransition }
});
