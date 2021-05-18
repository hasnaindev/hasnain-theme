import './notification.vue';
import Vue from 'vue';
import { createNewsletter } from '../api';

class Newsletter {
  constructor(element) {
    this.element = element;
    this.run();
  }

  run() {
    // eslint-disable-next-line
    new Vue({
      el: this.element,
      data: {
        email: '',
        notification: {
          title: '',
          message: '',
        },
        loading: false,
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
            .catch((error) => {
              console.error(error);

              this.notification.title = 'Failed';
              this.notification.message =
                'Oops! Could not subscribe, please try again!';
            })
            .finally(() => {
              setTimeout(() => {
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
