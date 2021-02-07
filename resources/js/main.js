window._ = require("lodash");
window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import { query, keepLinksActive, smoothScroll } from "./components/Utils";
// import toggleMenu from "./components/main/ToggleMenu";
import { runBubbles } from "./components/common/Bubbles";
import { selectPoms } from "./components/main/SelectPoms";
import { rippleButtonsInit } from "./components/main/RippleEffect";
import { homeParallaxGallery } from "./components/main/Gallery";
import slidesAndFades from "./components/main/Animation";

document.addEventListener(
	"DOMContentLoaded",
	() => {
		keepLinksActive();
		// popThingy();
		rippleButtonsInit();
		slidesAndFades();
		// toggleMenu();
		query(".main").classList.add("main-loaded");

		// home page
		if (query(".wrapper.home")) {
			runBubbles();
			smoothScroll();
			homeParallaxGallery();
		}

		// pomeranians page
		if (query(".wrapper.pomeranian")) {
			selectPoms();
		}
	},
	false
);
