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
import { disableRightClick, scrollToTop, delay } from './utils';
import { Gallery } from './components/Gallery';
import { triggerModal } from './components/Modal';
import initCarousel from './components/Swiper';
import anime from 'animejs/lib/anime.es.js';

/**
 * Morphing SVG animation
 */

{
	// equation of a line
	const lineEq = (y2, y1, x2, x1, currentVal) => {
		// y = mx + b
		const m = (y2 - y1) / (x2 - x1);
		const b = y1 - m * x1;

		return m * currentVal + b;
	};

	// from http://www.quirksmode.org/js/events_properties.html#position
	const getMousePos = e => {
		let posx = 0;
		let posy = 0;

		if (!e) {
			let e = window.event;
		}

		if (e.pageX || e.pageY) {
			posx = e.pageX;
			posy = e.pageY;
		} else if (e.clientX || e.clientY) {
			posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
			posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
		}

		return {
			x: posx,
			y: posy
		};
	};

	// From https://davidwalsh.name/javascript-debounce-function.
	function debounce(func, wait, immediate) {
		let timeout;

		return function () {
			const context = this,
				args = arguments;

			const later = function () {
				timeout = null;

				if (!immediate) func.apply(context, args);
			};

			const callNow = immediate && !timeout;

			clearTimeout(timeout);

			timeout = setTimeout(later, wait);

			if (callNow) func.apply(context, args);
		};
	}

	class MorphingBG {
		constructor(el) {
			this.DOM = {};
			this.DOM.el = el;
			this.DOM.el.style.opacity = 0;
			this.DOM.el.style.transition = 'transform 3s ease-out';
			this.DOM.pathEl = this.DOM.el.querySelector('path');
			this.paths = this.DOM.pathEl.getAttribute('pathdata:id').split(';');
			this.paths.push(this.DOM.pathEl.getAttribute('d'));
			this.win = { width: window.innerWidth, height: window.innerHeight };

			this.animate();
			this.initEvents();
		}

		animate() {
			anime.remove(this.DOM.pathEl);

			anime({
				targets: this.DOM.pathEl,
				duration: 20000,
				easing: 'easeInQuad',
				d: this.paths,
				loop: true
			});
		}

		initEvents() {
			// Mousemove event / Tilt functionality
			const tilt = {
				tx: this.win.width / 8,
				ty: this.win.height / 4,
				rz: 45,
				sx: [0.8, 2],
				sy: [0.8, 2]
			};

			const onMouseMoveFn = ev => {
				requestAnimationFrame(() => {
					if (!this.started) {
						this.started = true;
						anime({
							targets: this.DOM.el,
							duration: 300,
							easing: 'linear',
							opacity: [0, 1]
						});
					} else {
						const mousepos = getMousePos(ev);
						const rotZ = (tilt.rz / this.win.height) * mousepos.y - tilt.rz;
						const scaleX =
							mousepos.x < this.win.width / 2
								? lineEq(tilt.sx[0], tilt.sx[1], this.win.width / 2, 0, mousepos.x)
								: lineEq(tilt.sx[1], tilt.sx[0], this.win.width, this.win.width / 2, mousepos.x);
						const scaleY =
							mousepos.y < this.win.height / 2
								? lineEq(tilt.sy[0], tilt.sy[1], this.win.height / 2, 0, mousepos.y)
								: lineEq(tilt.sy[1], tilt.sy[0], this.win.height, this.win.height / 2, mousepos.y);

						// stop moving if scrolled by hero section
						const heroSection = document.getElementById('hero');
						const offsetTop = Math.abs(heroSection.getBoundingClientRect().top);
						const heroHeight = Math.min(heroSection.clientHeight, heroSection.offsetHeight);

						const transX = ((2 * tilt.tx) / this.win.width) * mousepos.x - tilt.tx;
						const transY = ((2 * tilt.ty) / this.win.height) * mousepos.y - tilt.ty;

						if (offsetTop < heroHeight) {
							this.DOM.el.style.transform = `
								translate3d(${transX}px, ${transY}px, 0) 
								rotate3d(0, 0, 1, ${rotZ / 2}deg) 
								scale3d(${scaleX / 1.3}, ${scaleY}, 1)
							`;
						}
					}
				});
			};

			// Window resize
			const onResizeFn = debounce(
				() =>
					(this.win = {
						width: window.innerWidth,
						height: window.innerHeight
					}),
				250
			);

			// mouse move area
			const hero = document.getElementById('hero');

			hero.addEventListener('mousemove', onMouseMoveFn);
			document.addEventListener('touchstart', onMouseMoveFn);
			window.addEventListener('resize', ev => onResizeFn());
		}
	}

	new MorphingBG(document.querySelector('svg.scene'));
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
			// SectionRipple()
			// distortBubble()
		}

		// | =========================================================
		// | Gallery
		// | =========================================================
		if (currentPage === 'gallery') {
			Gallery();
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
