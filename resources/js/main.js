import toggleMenu from "./components/main/ToggleMenu";
import { runBubbles } from "./components/common/Bubbles";
import { selectPoms } from "./components/main/SelectPoms";
import { keepLinksActive, smoothScroll } from "./components/Utils";

document.addEventListener("DOMContentLoaded", () => {
	keepLinksActive();
	// toggleMenu();
	document.querySelector(".main").classList.add("main-loaded");

	// home page
	if (document.querySelector(".wrapper.home")) {
		runBubbles();
		smoothScroll();

		// const desktopLinks = document.querySelectorAll(".d-link");
		// desktopLinks.forEach(i => {
		// 	i.addEventListener("mouseleave", e => {
		// 		i.classList.add("mouse-leave");
		// 	});
		// });
	}

	// pomeranians page
	if (document.querySelector(".wrapper.poms")) {
		selectPoms();
	}
});
