// generate random num
export let randomNum = (min, max) =>
	Math.floor(Math.random() * (max - min + 1) + min);

// cursor into arrows on home page
export function cursorIntoArrows(e) {
	let positionX = e.offsetX / window.innerWidth - 0.5;
	let b = document.body;

	return positionX >= 0
		? (b.className = "right-arr")
		: (b.className = "left-arr");
}

// links: prevent default if '#' and add active class if current page
export function keepLinksActive() {
	const anchorTags = document.querySelectorAll("a");
	let currentUrl = window.location.pathname;

	anchorTags.forEach(function(element) {
		let anchorAttr = element.getAttribute("href");

		element.addEventListener("click", e => {
			if (anchorAttr === "#") {
				// this is for removing # from url
				e.preventDefault();
			} else {
				// this is for smooth transition between pages
				let thisTargetUrl = e.target.href;
				e.preventDefault();
				setTimeout(() => {
					document
						.querySelector(".main")
						.classList.remove("main__on-load");
					window.location = thisTargetUrl;
				}, 250);
			}
		});

		if (anchorAttr == currentUrl) {
			element.closest("a").classList.add("active");
		}
	});
}
