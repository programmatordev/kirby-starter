import animateScrollTo from "animated-scroll-to";
import DefaultTransition from "./DefaultTransition.js";

export default class FadeTransition extends DefaultTransition {
  duration = 700;
  // Approximate easeOutQuint for the Web Animations API.
  cssEasing = 'cubic-bezier(0.23, 1, 0.32, 1)';

  prefersReducedMotion() {
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  }

  onLeave({ from, trigger, done }) {
    if (this.prefersReducedMotion()) {
      return super.onLeave({ from, trigger, done });
    }

    // Scroll to the top while the current view fades out.
    const scroll = animateScrollTo([0, 0], {
      speed: this.duration,
      minDuration: this.duration,
      maxDuration: this.duration,
      cancelOnUserAction: false,
      // Use the easeOutQuint function that the CSS easing approximates.
      easing: (t) => { return 1 + (--t) * t * t * t * t }
    });

    const fade = this.wrapper.animate(
      { opacity: 0 },
      { duration: this.duration, fill: 'forwards', easing: this.cssEasing }
    ).finished;

    return Promise.all([scroll, fade]);
  }

  onEnter({ to, trigger, done }) {
    if (this.prefersReducedMotion()) {
      done();
      return;
    }

    this.wrapper
      .animate({ opacity: 1 }, { duration: this.duration, fill: 'forwards', easing: this.cssEasing })
      .onfinish = () => done();
  }
}
