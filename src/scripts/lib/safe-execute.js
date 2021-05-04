export const safeExecute = (executeables = []) => {
  if (!Array.isArray(executeables)) {
    throw new Error('executeables must be an array');
  }

  const { length } = executeables;

  for (let i = 0; i < length; i += 1) {
    const executeable = executeables[i];

    try {
      executeable();
    } catch (error) {
      /* eslint-disable-next-line */
      console.error(`failed to execute an executeable`, error);
    }
  }
};

export default safeExecute;
