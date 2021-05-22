import './notification.vue';
import Vue from 'vue';
import { createNewsletter } from '../api';

class Newsletter {
  constructor(element) {
    this.element = element;
    this.instance = null;
    this.timeoutRef = null;
    this.init();
  }

  init() {
    this.instance = new Vue({
      el: this.element,
      data: {
        email: '',
        loading: false,
        notification: {
          title: '',
          message: '',
        },
      },
      methods: {
        submit(event) {
          event.preventDefault();

          createNewsletter({ email: this.email })
            .then(() => {
              this.email = '';

              this.notification.title = 'Subscribed';
              this.notification.message =
                'Thank you for subscribing to our newsletter!';
            })
            .catch(() => {
              this.notification.title = 'Failed';
              this.notification.message =
                'Oops! Could not subscribe, please try again!';
            })
            .finally(() => {
              clearTimeout(this.timeoutRef);

              this.timeoutRef = setTimeout(() => {
                this.notification.title = '';
                this.notification.message = '';
              }, 5000);
            });
        },
      },
    });
  }
}

export default (element) => new Newsletter(element);
