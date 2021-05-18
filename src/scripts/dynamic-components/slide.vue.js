import Vue from 'vue';

Vue.component('slide-transition', {
  methods: {
    enter(e) {
      e.style.maxHeight = `${e.scrollHeight}px`;
    },
    leave(e) {
      e.style.maxHeight = '0px';
    },
  },
  template: `
    <transition
      name="slide"
      @enter="enter"
      @leave="leave"
    >
      <slot class="slide-panel"></slot>
    </transition>
  `,
});
