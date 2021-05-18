export const DOMStrings = {
  components: '[data-component]',
};

export const DOMElements = {
  components: document.querySelectorAll(DOMStrings.components),
};

export const initDynamicComponents = () => {
  const { components } = DOMElements;

  if (!components.length) {
    return;
  }

  for (let i = 0; i < components.length; i += 1) {
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
};

export default initDynamicComponents;
