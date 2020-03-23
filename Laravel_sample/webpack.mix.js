const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/_app.js', 'public/js')
   .sass('resources/assets/sass/_app.scss', 'public/css');


mix.browserSync('vuesplash.test')
    .js('resources/assets/js/_app.js', 'public/js')
    .version();
mix.browserSync({
    proxy: 'localhost:'+ process.env.WEB_PORT, // アプリの起動アドレス
    open: false // ブラウザを自動で開かない
});
