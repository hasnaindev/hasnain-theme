import { initLazyLoad } from './lib/lazy-load';
import { initSmoothTransition } from './lib/smooth-transition';
import { initDynamicComponents } from './dynamic-components/dynamic-components-initializer';

document.addEventListener('DOMContentLoaded', () => {
  initSmoothTransition();
  initLazyLoad();
  initDynamicComponents();
});
