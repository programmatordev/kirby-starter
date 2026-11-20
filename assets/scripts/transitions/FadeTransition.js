import animateScrollTo from "animated-scroll-to";
import DefaultTransition from "./DefaultTransition.js";

export default class FadeTransition extends DefaultTransition {
  duration = 700;
  // easeOutQuint in bezier format
  cssEasing = 'cubic-bezier(0.23, 1, 0.32, 1)';

  prefersReducedMotion() {
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  }

  onLeave({ from, trigger, done }) {
    if (this.prefersReducedMotion()) {
      return super.onLeave({ from, trigger, done });
    }

    // scroll to top/left on page transition
    animateScrollTo([0, 0], {
      speed: this.duration,
      minDuration: this.duration,
      maxDuration: this.duration,
      cancelOnUserAction: false,
      // using easeOutQuint
      // check the following link for different options https://gist.github.com/gre/1650294
      easing: (t) => { return 1 + (--t) * t * t * t * t }
    });

    this.wrapper
      .animate({ opacity: 0 }, { duration: this.duration, fill: 'forwards', easing: this.cssEasing })
      .onfinish = () => done();
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
