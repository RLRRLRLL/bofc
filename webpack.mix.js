const mix = require('laravel-mix');
// const tailwindJit = require('@tailwindcss/jit'); // merged into core from 2.1

/*
 | Mix Asset Management
 |------------------------
*/

// prettier-ignore
mix
	.sass('resources/sass/app.scss', 'public/css')
	.sass('resources/sass/admin.scss', 'public/css')
	.postCss('resources/css/tailwind.css', 'public/css', [
		require('tailwindcss')
	])
	.options({
		processCssUrls: false
	})
	.js('resources/js/admin.js', 'public/js')
	.vue({version: 3})
	.webpackConfig((webpack) => {
        return {
            plugins: [
                new webpack.DefinePlugin({
                    __VUE_OPTIONS_API__: true,
                    __VUE_PROD_DEVTOOLS__: false,
                }),
            ],
        };
    })
	.js('resources/js/app.js', 'public/js')	
	.browserSync({
		// proxy: 'http://bofc.local',
		proxy: 'http://127.0.0.1:8000',
		notify: {
			styles: {
				top: 'auto',
				bottom: '20px'
			}
		}
	})
	.disableSuccessNotifications();
