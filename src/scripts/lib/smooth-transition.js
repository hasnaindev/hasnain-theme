import barba from '@barba/core';
import barbaCss from '@barba/css';
import barbaPrefetch from '@barba/prefetch';

barba.use(barbaCss);
barba.use(barbaPrefetch);

export const initSmoothTransition = () => {
  barba.init({
    timeout: 5000,
    transitions: [
      {
        leave() {},
        enter() {},
      },
    ],
    prevent: ({ el }) => el.href && el.href.includes('wp-admin'),
  });
};

export default initSmoothTransition;
