import { init } from 'prefetch';

export const initPrefetch = () => {
  init({
    containers: ['body'],
  });
};

export default initPrefetch;
