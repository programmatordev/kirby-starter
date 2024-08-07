import { Transition } from "@unseenco/taxi";

export default class DefaultTransition extends Transition {
  onLeave({ from, trigger, done }) {
    window.scrollTo({
      top: 0,
      left: 0,
      behavior: 'instant'
    });

    done();
  }
}
