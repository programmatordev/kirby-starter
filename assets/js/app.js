import { Core } from "@unseenco/taxi";
import DefaultRenderer from "./renderers/default.js";
import FadeTransition from "./transitions/fade.js";

// import tailwind file
import "../css/app.css";

// handle page rendering and transitions
const taxi = new Core({
  renderers: { default: DefaultRenderer },
  transitions: { default: FadeTransition }
});
