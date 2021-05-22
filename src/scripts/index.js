import { safeExecute } from './lib/safe-execute';
import { initLazyLoad } from './lib/lazy-load';
import { initDynamicComponents } from './dynamic-components/dynamic-components-initializer';

document.addEventListener('DOMContentLoaded', () => {
  safeExecute([initLazyLoad, initDynamicComponents]);
});
