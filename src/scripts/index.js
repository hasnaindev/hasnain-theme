import { initPrefetch } from './lib/prefetch';
import { initLazyLoad } from './lib/lazy-load';
import { initDynamicComponents } from './dynamic-components/init';

document.addEventListener('DOMContentLoaded', () => {
  initPrefetch();
  initLazyLoad();
  initDynamicComponents();
});
