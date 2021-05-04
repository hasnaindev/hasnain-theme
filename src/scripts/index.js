import { safeExecute } from './lib/safe-execute';
import { initDynamicComponents } from './dynamic-components/dynamic-components-initializer';

document.addEventListener('DOMContentLoaded', () => {
  safeExecute([initDynamicComponents]);
});
