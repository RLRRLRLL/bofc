const mix = require('laravel-mix')
const tailwindJit = require('@tailwindcss/jit')

/*
 | Mix Asset Management
 |--------------------------------------------------------------------------
*/

// prettier-ignore
mix.js('resources/js/main.js', 'public/js/scripts')
	.js('resources/js/admin.js', 'public/js/scripts')
	.sass('resources/sass/app.scss', 'public/css')
	.sass('resources/sass/admin.scss', 'public/css')
	.sass('resources/sass/plugins/tailwind/tailwind.scss','public/css/tailwind.css')
	.options({
		processCssUrls: false,
		postCss: [tailwindJit]
	})
	.browserSync({
		proxy: 'http://127.0.0.1:8000',
		notify: {
			styles: {
				top: 'auto',
				bottom: '20px'
			}
		}
	});
