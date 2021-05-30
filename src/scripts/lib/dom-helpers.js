/* eslint-disable no-lonely-if */
/* eslint-disable no-underscore-dangle */
const _attachEvents = (
  element,
  events,
  callback,
  options = null,
  remove = false,
) => {
  try {
    if (events.charAt(0) === '[') {
      if (remove) {
        JSON.parse(events).forEach((event) => {
          element.removeEventListener(event, callback);
        });
      } else {
        JSON.parse(events).forEach((event) => {
          element.addEventListener(event, callback, options);
        });
      }
    } else {
      if (remove) {
        element.removeEventListener(events, callback);
      } else {
        element.addEventListener(events, callback, options);
      }
    }
  } catch (error) {
    console.warn(error);
  }
};

export const on = (elements, eventName, callback, options = null) => {
  if (Array.isArray(elements)) {
    elements.forEach((element) => {
      _attachEvents(element, eventName, callback, options);
    });
  } else {
    _attachEvents(elements, eventName, callback, options);
  }
};

export const off = (elements, eventName, callback, options = null) => {
  if (Array.isArray(elements)) {
    elements.forEach((element) => {
      _attachEvents(element, eventName, callback, options, true);
    });
  } else {
    _attachEvents(elements, eventName, callback, options, true);
  }
};

export const select = (selector = '', element = document) => {
  switch (selector.charAt(0)) {
    case '#':
      return element.getElementById(selector);
    case '.':
      return Array.from(element.getElementsByClassName(selector));
    default:
      return Array.from(element.getElementsByTagName(selector));
  }
};

export default { on, off, select };
