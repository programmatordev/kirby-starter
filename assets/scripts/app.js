import { Core } from "@unseenco/taxi";
import DefaultRenderer from "./renderers/DefaultRenderer.js";
import FadeTransition from "./transitions/FadeTransition.js";

// import the tailwind file
import "../styles/app.css";

// handle pages rendering and transitions
// save for global access
window.Taxi = new Core({
  renderers: { default: DefaultRenderer },
  transitions: { default: FadeTransition }
});
