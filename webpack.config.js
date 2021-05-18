const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = ({ mode }) => {
  const isProduction = mode === 'production';

  const publicPath = '\\wp-content'
    .concat(
      path
        .join(__dirname, 'assets', 'scripts', '/')
        .split('wp-content')
        .pop()
    );

  const entry = './src/scripts/index.js';

  const output = {
    publicPath,
    path: path.resolve('assets', 'scripts'),
    filename: '[name].js',
  };

  const devtool = isProduction
    ? 'source-map'
    : 'inline-source-map';

  const module = {
    rules: [
      { test: /.js$/, exclude: /(node_modules)/, loader: 'babel-loader' },
      { test: /.svelte$/, use: { loader: 'svelte-loader' } },
    ],
  };

  const plugins = [
    new CleanWebpackPlugin(),
    new BrowserSyncPlugin({
      host: 'localhost',
      proxy: 'http://hasnain.test/',
      port: 3030,
      injectChanges: true,
      notify: true,
      snippetOptions: {
        ignorePaths: 'wp-admin/**',
      },
      files: [
        {
          match: ['**/*.php', 'assets/scripts/*.js', 'assets/styles/*.css'],
          fn(event, file) {
            event === 'change'
            && file.split('.').pop() === 'css'
              ? this.reload('*.css')
              : this.reload();
          },
        },
      ],
    }, {
      reload: false,
    }),
  ];

  const optimization = {
    runtimeChunk: 'single',
    splitChunks: {
      cacheGroups: {
        vendor: {
          test: /[\\/]node_modules[\\/]/,
          name: 'vendors',
          chunks: 'async',
        },
      },
    },
  };

  const resolve = {
    alias: {
      'vue': 'vue/dist/vue.js',
      'svelte': path.resolve("node_modules", "svelte"),
    },
  };

  return {
    entry,
    output,
    devtool,
    module,
    plugins,
    optimization,
    resolve,
    mode,
  };
};
