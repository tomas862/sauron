const Encore = require('@symfony/webpack-encore');

Encore
  .setOutputPath('public/build/')
  .setPublicPath('/build')
  .cleanupOutputBeforeBuild()

  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())
  .enableBuildNotifications()
  .enableSassLoader(() => {}, {
    resolveUrlLoader: true,
  })
  .enableVueLoader()

  .addEntry('js/app', './assets/js/app.js')
  .addStyleEntry('css/app', './assets/css/app.scss')

  .addLoader({
    test: /\.(js|jsx)$/,
    loader: 'eslint-loader',
    exclude: [/node_modules/],
    enforce: 'pre',
    options: {
      configFile: './.eslintrc',
      emitWarning: true,
    },
  })

  .configureBabel((babelConfig) => {
    babelConfig.presets.push('es2017');
  });
module.exports = Encore.getWebpackConfig();
