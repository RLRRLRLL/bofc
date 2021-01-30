import { runBubbles, stopBubbles } from "./../common/Bubbles";

// menu trigger / brand
export default function toggleMenu() {
	const navTrigger = document.querySelector(".nav__trigger");
	const menu = document.querySelector(".nav");

	navTrigger.addEventListener("click", e => {
		navTrigger.classList.toggle("show");
		menu.classList.toggle("show");
		// if (navTrigger.classList.contains("show")) {
		// 	runBubbles();
		// } else {
		// 	stopBubbles();
		// }
	});
}
