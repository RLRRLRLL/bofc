import { query, keepLinksActive, smoothScroll } from "./components/Utils";
// import toggleMenu from "./components/main/ToggleMenu";
import { runBubbles } from "./components/common/Bubbles";
import { selectPoms } from "./components/main/SelectPoms";
import popThingy from "./components/main/PopThingy";
import { homeParallaxGallery } from "./components/main/Gallery";
import slidesAndFades from "./components/main/Animation";

document.addEventListener(
	"DOMContentLoaded",
	() => {
		keepLinksActive();
		popThingy();
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
		if (query(".wrapper.poms")) {
			// selectPoms();
		}
	},
	false
);
