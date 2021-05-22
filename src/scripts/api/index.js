import { ajax } from 'nanoajax';

const url = window.THEME_REST.ajax_url;

const createFormData = (data, action) => {
  const formData = new FormData();
  Object.keys(data).forEach((key) => {
    formData.append(key, data[key]);
  });
  formData.append('action', action);
  return formData;
};

export const createNewsletter = (data) =>
  new Promise((resolve, reject) => {
    ajax(
      {
        url,
        method: 'POST',
        body: createFormData(data, 'create_newsletter'),
      },
      (code, responseText) => {
        const response = JSON.parse(responseText);

        if (code >= 200 && code < 300) {
          resolve(response);
        }

        reject(response);
      },
    );
  });

export default {
  createNewsletter,
};
