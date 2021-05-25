const mix = require('laravel-mix')
const tailwindJit = require('@tailwindcss/jit')

/*
 | Mix Asset Management
 |--------------------------------------------------------------------------
*/

// prettier-ignore
mix.sass('resources/sass/app.scss', 'public/css')
	.sass('resources/sass/tailwind.scss', 'public/css')
	.options({
		processCssUrls: false,
		postCss: [tailwindJit]
	})
	.js('resources/js/app.js', 'public/js/scripts')
	.browserSync({
		proxy: 'http://bofc.local',
		// proxy: 'http://127.0.0.1:8000',
		notify: {
			styles: {
				top: 'auto',
				bottom: '20px'
			}
		}
	});
