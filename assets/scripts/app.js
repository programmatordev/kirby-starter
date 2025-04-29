import { Core } from "@unseenco/taxi";
import DefaultRenderer from "./renderers/DefaultRenderer.js";
import FadeTransition from "./transitions/FadeTransition.js";
import { Alpine } from "alpinejs";

// import the tailwind file
import "../styles/app.css";

// add Alpine global and init reactivity
window.Alpine = Alpine;
Alpine.start();

// handle pages rendering and transitions
const taxi = new Core({
  renderers: { default: DefaultRenderer },
  transitions: { default: FadeTransition }
});
