window._ = require("lodash");
window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import { query, keepLinksActive, smoothScroll } from "./components/Utils";
// import toggleMenu from "./components/main/ToggleMenu";
import { Bubbles } from "./components/common/Bubbles";
import { selectPoms } from "./components/main/SelectPoms";
import { rippleButtonsInit } from "./components/main/RippleEffect";
import { homeParallaxGallery } from "./components/main/Gallery";
import Animation from "./components/main/Animation";
import LinkDistortionCircle from "./components/common/LinkDistortionCircle";

document.addEventListener(
	"DOMContentLoaded",
	() => {
		[...document.querySelectorAll("a.link")].forEach(el => {
			const elPosition = [...el.parentNode.children].indexOf(el);
			const fxObj = LinkDistortionCircle[elPosition];
			fxObj && new fxObj(el);
		});
		// keepLinksActive();
		rippleButtonsInit();
		// Initialize
		var options = {
			offset: 20 //percentage of window
		};
		var animation = new Animation(options);
		// toggleMenu();
		query(".main").classList.add("main-loaded");

		// home page
		if (query(".wrapper.home")) {
			Bubbles(".brand", 3000);
			smoothScroll();
			homeParallaxGallery();
		}

		// pomeranians page
		if (query(".wrapper.pomeranian")) {
			selectPoms();
			if (query(".show__header")) {
				setTimeout(() => {
					Bubbles(".show__header", 1500);
				}, 1500);
			}
		}
	},
	false
);
