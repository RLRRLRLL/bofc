window._ = require('lodash')
window.axios = require('axios')
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

/* STATE: DEVELOPMENT! */

/* USED COMPONENTS: */
import { query, disableRightClick } from './components/Utils'
import { runBubbles } from './components/common/Bubbles'
import { galleryPageGallery } from './components/main/Gallery'
import { initAnimations } from './components/main/Animation'
import { triggerModal } from './components/main/Modal'
import LinkDistortionCircle from './components/common/LinkDistortionCircle'
import initCarousel from './components/main/Swiper'
import LocomotiveScroll from 'locomotive-scroll'
import runTransition from './components/main/PageTransitions'

/* <!-- NOT USED: --> */
// import toggleMenu from "./components/main/ToggleMenu";
// toggleMenu();
// import { rippleButtonsInit } from './components/main/RippleEffect'
// Material ripple button effect on click
// rippleButtonsInit()

window.onload = () => {
	// Page transitions
	runTransition()
}

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

		// Distortion links (circle on hover)
		const distortedLinks = [...document.querySelectorAll('a.link')]
		distortedLinks.forEach((el) => {
			const elPosition = [...el.parentNode.children].indexOf(el)
			const fxObj = LinkDistortionCircle[elPosition]
			new fxObj(el)
		})

		// Trigger animations on scroll
		initAnimations()

		// Trigger modal (contact)
		triggerModal()

		/**
		 * * Disables right click for all images.
		 * * It's the first measure for preventing download.
		 * * The second one is using images as css backgrounds.
		 */
		disableRightClick()

		// TODO: Change this to better page transitions (but not resourceful)

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
		if (query('.main.home')) {
			// runBubbles('.brand', 3000)
		}

		// | =========================================================
		// | Gallery
		// | =========================================================
		if (query('.main.gallery')) galleryPageGallery()

		// | =========================================================
		// | Pomeranians
		// | =========================================================
		if (query('.main.pomeranian')) {
		}

		// Single pom
		if (query('.main.show')) {
			// Carousel
			initCarousel()

			// Bubbles on header
			setTimeout(() => {
				runBubbles('.show__header', 1500)
			}, 1500)
		}
	},
	false
)
