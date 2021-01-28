// aliases for js selectors
export const query = document.querySelector.bind(document);
export const queryAll = document.querySelectorAll.bind(document);

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
	const anchorTags = queryAll("a");
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

// scroll to section
export function smoothScroll() {
	const aboutTrigger = query(".stripes");
	/**
	 * not reuseable.
	 * reason: e.preventDefault() doesnt prevent
	 * from affecting url, which breaks gallery somehow.
	 * make reuseable in the future if needed, -
	 * bind click to div and use "data-href" attr.
	 */

	aboutTrigger.addEventListener("click", function(e) {
		const targetPos = document.getElementById("about").offsetTop;
		const startPos = window.pageYOffset;
		const distance = targetPos - startPos;
		const duration = 700;
		let start = null;

		window.requestAnimationFrame(step);

		function step(timestamp) {
			if (!start) start = timestamp;
			const progress = timestamp - start;
			window.scrollTo(
				0,
				exponentialEasing(progress, startPos, distance, duration)
			);
			if (progress < duration) window.requestAnimationFrame(step);
		}
	});

	// easing fns reference: http://www.gizma.com/easing/
	function exponentialEasing(t, b, c, d) {
		t /= d / 2;
		if (t < 1) return (c / 2) * Math.pow(2, 10 * (t - 1)) + b;
		t--;
		return (c / 2) * (-Math.pow(2, -10 * t) + 2) + b;
	}
}
