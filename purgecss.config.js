const fs = require('fs');
/* eslint-disable-next-line */
const PurgeCSS = require('purgecss').default;

const options = {
  css: ['assets/styles/main.css'],
  content: ['*.php', 'template-parts/*.php', 'inc/Hasnain/Shortcodes/*.php'],
};

new PurgeCSS()
  .purge(options)
  .then((purge) => {
    purge.forEach(({ css, file }) => {
      fs.writeFileSync(file, css, { encoding: 'utf8' });
    });
  })
  .catch((error) => {
    console.log(error);
  });
