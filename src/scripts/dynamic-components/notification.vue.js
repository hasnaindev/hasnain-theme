import Vue from 'vue';
import './slide.vue';

Vue.component('notification', {
  props: {
    title: String,
    message: String,
  },
  template: `
    <slide-transition>
      <div v-if="title && message">
        <h4>{{ title }}</h4>
        <p>{{ message }}</p>
      </div>
    </slide-transition>
  `,
});
