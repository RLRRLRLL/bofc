import { runBubbles, stopBubbles } from "./../common/Bubbles";

// menu trigger / brand
export default function toggleMenu() {
	const brand = document.querySelector(".brand");
	const menu = document.querySelector(".nav");
	const cursor = document.getElementById("cursor");

	brand.addEventListener("click", e => {
		runBubbles();
		brand.classList.add("hide");
		menu.classList.add("show");
		if (cursor) cursor.classList.remove("cursor");
		document.body.classList = "no-arr";
	});

	document.querySelector(".nav__close").addEventListener("click", e => {
		e.stopPropagation();
		stopBubbles();
		brand.classList.remove("hide");
		menu.classList.remove("show");
		if (cursor) cursor.classList.add("cursor");
	});
}
