const mix = require('laravel-mix')

/*
 | Mix Asset Management
 |--------------------------------------------------------------------------
*/

mix.js('resources/js/main.js', 'public/js/scripts')
	.js('resources/js/admin.js', 'public/js/scripts')
	.sass('resources/sass/app.scss', 'public/css')
	.sass('resources/sass/admin.scss', 'public/css')
	.browserSync({ proxy: '127.0.0.1:8000' })
// .options({
// 	processCssUrls: false
// })
// .browserSync({
// 	proxy: 'localhost:8000'
// })
