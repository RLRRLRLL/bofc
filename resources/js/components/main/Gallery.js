import Grid from "./includes/gallery/grid";
import { preloadImages } from "./includes/gallery/utils";

export function homeParallaxGallery() {
	// Preload  images
	preloadImages(".grid__item-img, .bigimg").then(() => {
		// Remove loader (loading class)
		document.body.classList.remove("loading");

		// Initialize grid
		const grid = new Grid(document.querySelector(".grid"));
	});
}
