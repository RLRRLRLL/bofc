window._ = require('lodash')
window.axios = require('axios')
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

import { query, disableRightClick, scrollToTop } from './components/Utils'
import { runBubbles, distortBubble } from './components/common/Bubbles'
import { galleryPageGallery } from './components/main/Gallery'
import { triggerModal } from './components/main/Modal'
import LinkDistortionCircle from './components/common/LinkDistortionCircle'
import initCarousel from './components/main/Swiper'
import LocomotiveScroll from 'locomotive-scroll'
import runTransition from './components/main/PageTransitions'

/* NOT USED: */
// import toggleMenu from "./components/main/ToggleMenu";
// toggleMenu();
// import { rippleButtonsInit } from './components/main/RippleEffect'
// Material ripple button effect on click
// rippleButtonsInit()
// import { initAnimations } from './components/main/Animation'
// Trigger animations on scroll
// initAnimations()

window.onload = () => {
	// Page transitions
	runTransition()
}

document.addEventListener(
	'DOMContentLoaded',
	() => {
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
			smooth: true,
			tablet: { smooth: false },
			smartphone: { smooth: false },
			multiplier: 1.5,
			lerp: 0.2
		})

		/* Back to top button */
		const backToTopBtn = document.getElementById('back-to-top')

		if (window.matchMedia('(min-width: 1024px)')) {
			backToTopBtn.addEventListener('click', () => {
				scroll.scrollTo('top')
			})
		} else {
			backToTopBtn.addEventListener('click', scrollToTop)
		}

		// Distortion links (circle on hover)
		const distortedLinks = [...document.querySelectorAll('a.circle-link')]
		distortedLinks.forEach(el => {
			const elPosition = [...el.parentNode.children].indexOf(el)
			const fxObj = LinkDistortionCircle[elPosition]
			fxObj && new fxObj(el)
		})

		// Trigger modal (contact)
		triggerModal()

		/**
		 * * Disables right click for all images.
		 * * It's the first measure for preventing download.
		 * * The second one is using images as css backgrounds.
		 */
		disableRightClick()

		/**
		 * * * * * * * * * * * * * * * * * *
		 * * Main pages listed below.
		 *
		 * * Functions will be invoked based
		 * * on current page.
		 */
		const currentPage = document.body.getAttribute('data-page').trim()
		console.log(currentPage)

		// | =========================================================
		// | Home
		// | =========================================================
		// query('.main.home') && runBubbles('.brand', 3000)
		if (currentPage === 'home') {
			distortBubble()
		}

		// | =========================================================
		// | Gallery
		// | =========================================================
		query('.main.gallery') && galleryPageGallery()

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
			// setTimeout(() => {
			// 	runBubbles('.show__header', 1500)
			// }, 1500)
		}
	},
	false
)
