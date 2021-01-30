const mix = require("laravel-mix");

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

mix.js("resources/js/main.js", "public/js/scripts")
	.js("resources/js/admin.js", "public/js/scripts")
	.js("resources/js/auth/app.js", "public/js/scripts")
	.sass("resources/sass/app.scss", "public/css")
	.options({
		processCssUrls: false
	})
	.browserSync("http://127.0.0.1:8000");
