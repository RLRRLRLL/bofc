// window._ = require('lodash')
// window.axios = require('axios')
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

// page loader
// pace()

// run animation on loading finish and then completely hide pace
// Pace.on('done', () => {
// 	setTimeout(() => {
// 		document.querySelector('.pace-progress').style.display = 'none'
// 	}, 500) // transition duration
// })

import 'alpinejs';
import { disableRightClick, initHorizontalScroll, scrollToTop, delay } from './utils';
import { Gallery } from './components/Gallery';
import { triggerModal } from './components/Modal';
import initCarousel from './components/Swiper';
import LocomotiveScroll from 'locomotive-scroll';
import MorphingSvg from './components/MorphingSvg';

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
		// ParticlesJS()

		// init custom cursor
		// Cursor()

		// distortionSlider()

		// Locomotive scroll
		// LocomotiveInit()

		// Trigger modal (contact)
		// triggerModal()

		/**
		 * * Disables right click for all images.
		 * * It's the first measure for preventing download.
		 * * The second one is using images as css backgrounds.
		 */
		disableRightClick();

		/**
		 *
		 * Main pages listed below.
		 * Functions will be invoked based on current page.
		 */
		const currentPage = document.body.getAttribute('data-page').trim();

		// | =========================================================
		// | Home
		// | =========================================================
		if (currentPage === 'home') {
			// webgl distortion slider
			Gallery();

			// horizontal scroll without pressing Shift key
			initHorizontalScroll('#index-poms');

			// Hero section Morphing SVG animation
			MorphingSvg();

			// SectionRipple()
			// distortBubble()
		}

		// | =========================================================
		// | Gallery
		// | =========================================================
		if (currentPage === 'gallery') {
		}

		// | =========================================================
		// | Pomeranians
		// | =========================================================
		if (currentPage === 'poms-index') {
			// ...
		}

		// Single pom
		if (currentPage === 'poms-show') {
			document.body.classList.add('no-arr');

			initCarousel();

			// Bubbles on header
			// setTimeout(() => {
			// 	runBubbles('.show__header', 1500)
			// }, 1500)
		}
	},
	false
);
