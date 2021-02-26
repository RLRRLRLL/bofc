window._ = require('lodash')
window.axios = require('axios')
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

/* STATE: DEVELOPMENT! */

/**
 * * * USED COMPONENTS:
 */
import { query, disableRightClick } from './components/Utils'
import { runBubbles } from './components/common/Bubbles'
import { rippleButtonsInit } from './components/main/RippleEffect'
import { galleryPageGallery } from './components/main/Gallery'
import { initAnimations } from './components/main/Animation'
import LinkDistortionCircle from './components/common/LinkDistortionCircle'
import initCarousel from './components/main/Swiper'
import LocomotiveScroll from 'locomotive-scroll'

/**
 * !!! NOT USED:
 *
 */
// import toggleMenu from "./components/main/ToggleMenu";
// toggleMenu();

document.addEventListener(
	'DOMContentLoaded',
	function () {
		/**
		 * * * * * * * * * * * * * * * * * *
		 * * Common function are listed below.
		 *
		 * * These functions will be invoked on
		 * * every page.
		 */

		// Locomotive scroll
		if (query('[data-scroll-container]')) {
			const scroll = new LocomotiveScroll({
				el: query('[data-scroll-container]'),
				smooth: true
			})

			const backToTopBtn = query('#backToTop')
			backToTopBtn.addEventListener('click', () => {
				scroll.scrollTo('top', {
					duration: 500
				})
			})
		}

		// Distortion links (circle on hover)
		const distortedLinks = [...document.querySelectorAll('a.link')]
		distortedLinks.forEach((el) => {
			const elPosition = [...el.parentNode.children].indexOf(el)
			const fxObj = LinkDistortionCircle[elPosition]
			new fxObj(el)
		})

		// Trigger animations on scroll
		initAnimations()

		/**
		 * * Disables right click for all images.
		 * * It's the first measure for preventing download.
		 * * The second one is using images as css backgrounds.
		 */
		disableRightClick()

		// Material ripple button effect on click
		// rippleButtonsInit()

		// Run fade animation on page load
		// TODO: Change this to better page transitions (but not resourceful)
		query('.main').classList.add('main-loaded')

		/**
		 * * * * * * * * * * * * * * * * * *
		 * * Main pages listed below.
		 *
		 * * Functions will be invoked based
		 * * on current page.
		 */

		// | =========================================================
		// | Home
		// | =========================================================
		if (query('.wrapper.home')) {
			// runBubbles('.brand', 3000)
		}

		// | =========================================================
		// | Gallery
		// | =========================================================
		if (query('.wrapper.gallery')) galleryPageGallery()

		// | =========================================================
		// | Pomeranians
		// | =========================================================
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
