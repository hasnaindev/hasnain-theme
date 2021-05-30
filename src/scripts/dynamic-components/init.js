export const DOMStrings = {
  modules: '[data-module]',
};

export const DOMElements = {
  modules: document.querySelectorAll(DOMStrings.modules),
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
        lazyTarget === 'this' ? component : document.getElementById(lazyTarget);

      if (lazyTargetElement) {
        lazyTargetElement.addEventListener(
          lazyEvent,
          () => {
            import(`./${moduleName}.js`)
              .then((module) => {
                if (module && module.default) {
                  module.default(component);
                }
              })
              .catch(() => {
                /* eslint-disable-next-line */
                console.error(`Failed to load module ${moduleName}`);
              });
          },
          { once: true },
        );
      }
    } else if (moduleName) {
      import(`./${moduleName}.js`)
        .then((module) => {
          if (module && module.default) {
            module.default(component);
          }
        })
        .catch(() => {
          /* eslint-disable-next-line */
          console.error(`Failed to load module ${moduleName}`);
        });
    }
  }
};

export default initDynamicComponents;
