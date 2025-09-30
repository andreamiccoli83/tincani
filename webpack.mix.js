const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
 mix.options({
  postCss: [
      require('postcss-discard-comments')({
          removeAll: true
      })
  ],
  uglify: {
      comments: false
  }
});

mix.js(["resources/js/admin/admin.js"], "public/js")
    .js('resources/js/web.js','public/js').version()
    .js('resources/js/main.js','public/js').version()
    .sass("resources/sass/admin/admin.scss", "public/css")
    .vue()
    .sass('resources/sass/app.scss', 'public/css').version()
    // .sass('resources/sass/cms.scss', 'public/css').version()
    .sourceMaps(true, 'source-map');

if (mix.inProduction()) {
  mix.version();
}