import { query, queryAll } from "./../Utils";

export default function sidebar() {
	const burgerTrigger = query(".burger"),
		burgerClose = query(".sidebar__close"),
		sidebar = query(".sidebar"),
		header = query(".header"),
		main = query(".main");

	const buttons = [burgerTrigger, burgerClose];

	buttons.forEach(b => {
		b.addEventListener("click", () => {
			toggleClassName(sidebar, "show");
			toggleClassName(header, "darken");
			toggleClassName(main, "darken");
		});
	});

	function toggleClassName(element, className) {
		if (element.classList.contains(className)) {
			element.classList.remove(className);
		} else {
			element.classList.add(className);
		}
	}
}
