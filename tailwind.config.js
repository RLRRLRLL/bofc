const colors = require('tailwindcss/colors');

module.exports = {
	important: true,
	mode: 'jit',
	purge: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		'./storage/framework/views/*.php',
		'./resources/views/**/*.blade.php'
	],
	theme: {
		extend: {
			// these fonts are defined in _fonts.scss
			fontFamily: {
				astra: ['PT Astra Serif', 'serif'],
				young: ['Young Serif', 'serif'],
				golos: ['Golos Text', 'sans-serif']
			},
			colors: {
				transparent: 'transparent',
				current: 'currentColor',
				gray: colors.trueGray,
				green: colors.green,
				'slightly-lighter': 'rgba(255, 255, 255, .03)',
				dark: '#191817',
				'dark-secondary': '#242424',
				'admin-secondary': '#292929',
				accent: '#fff1c0',
				amber: '#ffd54f',
				navy: '#192841',
				'amber-darker': '#ffca28'
			},
			screens: {
				xs: '475px'
			},
			width: {
				120: '30rem'
			},
			maxWidth: {
				0: '0',
				'1/4': '25%',
				'1/2': '50%',
				'3/4': '75%',
				full: '100%'
			},
			minWidth: {
				0: '0',
				'1/4': '25%',
				'1/2': '50%',
				'3/4': '75%',
				full: '100%'
			},
			container: {
				center: true,
				padding: {
					DEFAULT: '1rem',
					sm: '2rem',
					md: '3rem',
					lg: '4rem',
					xl: '5rem',
					'2xl': '6rem'
				}
			},
			transitionTimingFunction: {
				'in-expo': 'cubic-bezier(0.95, 0.05, 0.795, 0.035)',
				'out-expo': 'cubic-bezier(0.19, 1, 0.22, 1)'
			},
			fontSize: {
				md: '.9rem'
			}
		}
	},
	plugins: [require('@tailwindcss/forms')]
};
