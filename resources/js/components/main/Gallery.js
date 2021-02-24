// Home page
import Grid from "./includes/gallery/grid";
import { preloadImages } from "./includes/gallery/utils";
// Gallery page
import "splitting/dist/splitting.css";
import "splitting/dist/splitting-cells.css";
import Splitting from "splitting";
import { query } from "./../Utils";

export function homeParallaxGallery() {
	// Preload  images
	preloadImages(".grid__item-img, .bigimg").then(() => {
		// Remove loader (loading class)
		document.body.classList.remove("loading");

		// Initialize grid
		const grid = new Grid(document.query(".grid"));
	});
}

export function galleryPageGallery() {
	// const gallery = query(".gallery");
	// const msnry = new Masonry(gallery, {
	// 	itemSelector: ".gallery__item"
	// });

	// Splitting.js
	// Splitting({
	// 	target: ".gallery__item",
	// 	by: "cells",
	// 	image: true,
	// 	rows: 3,
	// 	columns: 3
	// });

	/* Gallery Pixi.js */

	// get canvas el
	const view = document.querySelector('.gallery');
	let width, height, app

	// set dimensions
	function initDimensions()
	{
		width = window.innerWidth;
		height = window.innerHeight;
	}

	// init Pixi.js
	function initApp()
	{
		app = new PIXI.Application({view});
		// resizes renderer view in CSS pixels to allow for resolutions other than 1
	  	app.renderer.autoDensity = true;
	  	// resize the view to match viewport dimensions
	  	app.renderer.resize(width, height);
	}

	// init everything
	const init = () => {
		initDimensions();
		initApp();
	}

	// init call
	init();
}
