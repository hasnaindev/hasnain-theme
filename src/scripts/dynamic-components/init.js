import { on, off, select } from '../lib/dom-helpers';

export const DOMStrings = {
  modules: '[data-module]',
};

export const DOMElements = {
  modules: document.querySelectorAll(DOMStrings.modules),
};

const importModule = (moduleName, args = null) => {
  import(`./${moduleName}.js`)
    .then((module) => {
      if (module && module.default) {
        module.default(args);
      }
    })
    .catch(() => {
      /* eslint-disable-next-line */
      console.error(`Failed to load module ${moduleName}`);
    });
};

export const initDynamicComponents = () => {
  if (!DOMElements.modules.length) {
    return;
  }

  for (let i = 0; i < DOMElements.modules.length; i += 1) {
    const component = DOMElements.modules[i];
    const moduleName = component.getAttribute('data-module');

    const lazyEvent = component.getAttribute('data-lazy-event');
    const lazyTarget = component.getAttribute('data-lazy-target');

    if (moduleName && lazyTarget && lazyEvent) {
      const lazyTargetElement =
        lazyTarget === 'this' ? component : select(lazyTarget, component);

      if (lazyTargetElement) {
        const importModuleOnEvent = () => {
          importModule(moduleName, component);
          off(lazyTargetElement, lazyEvent, importModuleOnEvent);
        };

        on(lazyTargetElement, lazyEvent, importModuleOnEvent);
      }
    } else if (moduleName) {
      importModule(moduleName, component);
    }
  }
};

export default initDynamicComponents;
