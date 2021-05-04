export const DOMStrings = {
  components: '[data-component]',
};

export const DOMElements = {
  components: document.querySelectorAll(DOMStrings.components),
};

export const initDynamicComponents = () => {
  const { components } = DOMElements;
  const { length } = components;

  if (!length) {
    return;
  }

  import('../vendors/vue.dev').then((m) => {
    window.Vue = m.default;

    for (let i = 0; i < length; i += 1) {
      const component = components[i];

      const componentName = component.getAttribute('data-component');

      if (componentName) {
        import(`./${componentName}.js`).then((module) => {
          if (module && module.default) {
            module.default(component);
          }
        });
      }
    }
  });
};

export default initDynamicComponents;
