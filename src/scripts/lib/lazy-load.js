import lozad from 'lozad';

/**
 * Lazy loads assets into website.
 *
 * @access public
 * @returns {void} `void`
 * @package https://github.com/ApoorvSaxena/lozad.js
 */
export const initLazyLoad = () => {
  lozad().observe();
};

export default initLazyLoad;
