window._ = require('lodash')
window.axios = require('axios')
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

/* STATE: DEVELOPMENT! */

/**
 * * * USED COMPONENTS:
 */
import { query, disableRightClick, smoothScroll } from './components/Utils'
import { runBubbles } from './components/common/Bubbles'
import { rippleButtonsInit } from './components/main/RippleEffect'
import {
	homeParallaxGallery,
	galleryPageGallery
} from './components/main/Gallery'
import Animation from './components/main/Animation'
import LinkDistortionCircle from './components/common/LinkDistortionCircle'
import initCarousel from './components/main/Swiper'

/**
 * !!! NOT USED:
 *
 */
// import toggleMenu from "./components/main/ToggleMenu";
// toggleMenu();

document.addEventListener(
	'DOMContentLoaded',
	function () {
		/*
		 * Distortion links run
		 */
		const distortedLinks = [...document.querySelectorAll('a.link')]
		distortedLinks.forEach((el) => {
			const elPosition = [...el.parentNode.children].indexOf(el)
			const fxObj = LinkDistortionCircle[elPosition]
			new fxObj(el)
		})

		/**
		 * * Disables right click for all images
		 * * the first measure for preventing download
		 * * the second one is using images as background
		 */
		disableRightClick()

		/**
		 * * Material ripple button effect on click
		 */
		rippleButtonsInit()

		/**
		 * * Initialize anim items
		 */
		new Animation({ offset: 20 })

		// run fade animation on page load
		// TODO: Change this to better page transitions (but not resourceful)
		document.querySelector('.main').classList.add('main-loaded')

		/**
		 * * * Home page
		 */
		if (query('.wrapper.home')) {
			runBubbles('.brand', 3000)
			smoothScroll()
			homeParallaxGallery()
		}

		// /gallery page
		if (query('.gallery')) galleryPageGallery()

		/**
		 * * * Pomeranians page
		 */
		if (query('.wrapper.pomeranian')) {
			if (query('.show')) {
				// Carousel
				initCarousel()

				// Bubbles on header
				setTimeout(() => {
					runBubbles('.show__header', 1500)
				}, 1500)
			}
		}
	},
	false
)
