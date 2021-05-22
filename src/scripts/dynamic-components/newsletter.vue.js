import './notification.vue';
import Vue from 'vue';
import { createNewsletter } from '../api';

const emailRegEx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

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

          this.email = this.email.replace(/\s+/g, '').toLowerCase();

          if (!emailRegEx.test(this.email)) {
            this.notification.title = 'Oopsie!';
            this.notification.message =
              'Are you sure this is a valid email address?';
            return;
          }

          createNewsletter({ email: this.email })
            .then((response) => {
              this.email = '';

              this.notification.title = 'Subscribed!';
              this.notification.message = response.message;
            })
            .catch((error) => {
              this.notification.title = 'Oopsie!';
              this.notification.message = error.message;
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
