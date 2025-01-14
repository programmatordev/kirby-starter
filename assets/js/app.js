import { Core } from "@unseenco/taxi";
import DefaultRenderer from "./renderers/default.js";
import FadeTransition from "./transitions/fade.js";
import { Alpine } from "alpinejs";

// import tailwind file
import "../css/app.css";

// init reactivity
window.Alpine = Alpine;
Alpine.start();

// handle page rendering and transitions
const taxi = new Core({
  renderers: { default: DefaultRenderer },
  transitions: { default: FadeTransition }
});
