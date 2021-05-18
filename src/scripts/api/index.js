const url = window.THEME_REST.ajax_url;

const createFormData = (data, action) => {
  const formData = new FormData();

  Object.keys(data).forEach((key) => {
    formData.append(key, data[key]);
  });

  formData.append('action', action);

  return formData;
};

const createFetch = (body, method = 'POST') =>
  new Promise((resolve, reject) => {
    fetch(url, {
      body,
      method,
    })
      .then((response) => {
        if (response.status >= 200 && response.status < 300) {
          return response.json();
        }

        const error = new Error('Failed to make fetch request.');
        error.code = response.status;
        return reject(error);
      })
      .then(resolve)
      .catch(reject);
  });

export const createNewsletter = (data) =>
  new Promise((resolve, reject) => {
    createFetch(createFormData(data, 'create_newsletter'))
      .then(resolve)
      .catch(reject);
  });

export default {
  createNewsletter,
};
