import { query, queryAll } from "./../Utils";

export default function Burger() {
	const burgerTrigger = query(".burger");
	const grid = query(".grid");

	burgerTrigger.addEventListener("click", e => {
		e.preventDefault();

		grid.classList.toggle("nav-close");
	});
}
