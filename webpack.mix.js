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

mix.js('resources/js/main.js', 'public/js/scripts')
    .js('resources/js/admin.js', 'public/js/scripts')
    .sass('resources/sass/main/main.scss', 'public/css/styles')
    .sass('resources/sass/admin/admin.scss', 'public/css/styles')
    .browserSync('http://127.0.0.1:8000');