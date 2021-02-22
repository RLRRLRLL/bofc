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
import { Bubbles } from "./components/common/Bubbles";
import { rippleButtonsInit } from "./components/main/RippleEffect";
import { homeParallaxGallery } from "./components/main/Gallery";
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
		[...document.querySelectorAll("a.link")].forEach(el => {
			const elPosition = [...el.parentNode.children].indexOf(el);
			const fxObj = LinkDistortionCircle[elPosition];
			fxObj && new fxObj(el);
		});

		disableRightClick();
		rippleButtonsInit();

		// Initialize
		var options = {
			offset: 20 //percentage of window
		};
		var animation = new Animation(options);
		query(".main").classList.add("main-loaded");

		/**
		 * * * Home page
		 */
		if (query(".wrapper.home")) {
			Bubbles(".brand", 3000);
			smoothScroll();
			homeParallaxGallery();
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
				setTimeout(() => {
					Bubbles(".show__header", 1500);
				}, 1500);
			}
		}
	},
	false
);
