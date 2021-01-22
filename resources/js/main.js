import toggleMenu from "./components/main/ToggleMenu";
import cursorIntoBubble from "./components/main/CursorIntoBubble";
import { keepLinksActive } from "./components/Utils";

document.addEventListener("DOMContentLoaded", () => {
	toggleMenu();
	keepLinksActive();
	document.querySelector(".main").classList.add("main-loaded");

	// home page
	if (document.querySelector(".wrapper.home")) {
		// const swiper = new Swiper('.swiper-container', {
		// 	effect: 'fade',
		// 	speed: 1500,
		// 	observer: true,
		// 	observeParents: true,
		// 	loop: true,
		// 	autoplay: {
		// 		delay: 4000,
		// 		disableOnInteraction: false
		// 	},
		// });
		// document.addEventListener('mousemove', cursorIntoArrows);
		// document.addEventListener('click', () => {
		// 	return document.body.classList == 'left-arr' ? swiper.slidePrev() : swiper.slideNext();
		// });
	}

	// pomeranians page
	if (document.querySelector(".wrapper.poms")) {
		const galleryItems = document.querySelectorAll(".gallery-item");
		cursorIntoBubble(galleryItems);

		galleryItems.forEach(el => {
			el.style.width = randomNum(10, 20) + "%";
			el.style.height = randomNum(300, 500) + "px";
			el.style.marginTop = randomNum(5, 105) + "px";
		});
	}
});
