import Vue from 'vue';

class Newsletter {
  constructor(element) {
    this.element = element;
    this.instance = null;
    this.init();
  }

  init() {
    this.instance = new Vue({
      el: this.element,
      data: () => ({
        email: '',
        loading: false,
      }),
      methods: {
        submit() {
          this.loading = true;

          setTimeout(() => {
            this.email = '';
            this.loading = false;
          }, 2000);
        },
      },
    });
  }
}

export default (element) => new Newsletter(element);
