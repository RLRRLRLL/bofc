window._ = require("lodash");
window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * STATE: DEVELOPMENT!
 */

/**
 * * * USED COMPONENTS:
 */
import { query, disableRightClick, smoothScroll } from "./components/Utils";
import { runBubbles, stopBubbles } from "./components/common/Bubbles";
import { rippleButtonsInit } from "./components/main/RippleEffect";
import {
	homeParallaxGallery,
	galleryPageGallery
} from "./components/main/Gallery";
import Animation from "./components/main/Animation";
import LinkDistortionCircle from "./components/common/LinkDistortionCircle";
import initCarousel from "./components/main/Swiper";

/**
 * !!! NOT USED:
 *
 */
// import toggleMenu from "./components/main/ToggleMenu";
// toggleMenu();

document.addEventListener(
	"DOMContentLoaded",
	() => {
		query(".main").classList.add("main-loaded");

		[...document.querySelectorAll("a.link")].forEach(el => {
			const elPosition = [...el.parentNode.children].indexOf(el);
			const fxObj = LinkDistortionCircle[elPosition];
			fxObj && new fxObj(el);
		});

		/**
		 * * Disables right click for all images
		 * * the first measure for preventing download
		 * * the second one is using images as background
		 */
		// disableRightClick();

		/**
		 * * Material ripple button effect on click
		 */
		rippleButtonsInit();

		/**
		 * * Initialize anim items
		 */
		new Animation({
			offset: 20
		});

		// // toggle bubbles based on if modal is open or not
		// const modalTrigger = query(".btn-split"), closeModal = query('.right__close');
		// modalTrigger.addEventListener("click", () => {
		// 	modalTrigger.classList.toggle("active");
		// });

		/**
		 * * * Home page
		 */
		if (query(".wrapper.home")) {
			window.stopBubbles = stopBubbles;
			window.runBubbles = runBubbles;

			runBubbles(".brand", 3000);
			smoothScroll();
			homeParallaxGallery();
		}

		if (query(".gallery")) {
			galleryPageGallery();
		}

		/**
		 * * * Pomeranians page
		 *
		 */
		if (query(".wrapper.pomeranian")) {
			if (query(".show")) {
				// Carousel
				initCarousel();

				// Bubbles on header
				// setTimeout(() => {
				// 	runBubbles(".show__header", 1500);
				// }, 1500);
			}
		}
	},
	false
);
