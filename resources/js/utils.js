// aliases for js selectors
export const $ = document.querySelector.bind(document);

// generate random num
export const randomNum = (min, max) => Math.floor(Math.random() * (max - min + 1) + min);

// delay function
export const delay = (timeout = 2000) =>
	new Promise(done => {
		setTimeout(() => {
			done();
		}, timeout);
	});

// scroll to section
export function scrollToElement() {
	const aboutTrigger = $('.stripes'),
		backToTop = $('#backToTop');

	function scrollToSection(trigger) {
		trigger.addEventListener('click', function (e) {
			e.preventDefault();

			const thisAttr = this.getAttribute('data-target'),
				target = document.querySelector(thisAttr),
				targetPos = target.offsetTop,
				startPos = window.pageYOffset,
				distance = targetPos - startPos,
				duration = 700;
			let start = null;

			window.requestAnimationFrame(step);

			function step(timestamp) {
				if (!start) start = timestamp;
				const progress = timestamp - start;
				window.scrollTo(0, exponentialEasing(progress, startPos, distance, duration));
				if (progress < duration) window.requestAnimationFrame(step);
			}
		});
	}

	// element which will be clicked passed to fn
	scrollToSection(backToTop);
	scrollToSection(aboutTrigger);

	// easing fns reference: http://www.gizma.com/easing/
	function exponentialEasing(t, b, c, d) {
		t /= d / 2;
		if (t < 1) return (c / 2) * Math.pow(2, 10 * (t - 1)) + b;
		t--;
		return (c / 2) * (-Math.pow(2, -10 * t) + 2) + b;
	}
}

// class toggler
export function classToggler(el, className) {
	if (el.classList.contains(className)) {
		el.classList.remove(className);
	} else {
		el.classList.add(className);
	}
}

// Disable right click on images (make it harder to download)
export function disableRightClick() {
	let allImages = document.querySelectorAll('img');
	allImages.forEach(value => {
		value.oncontextmenu = e => {
			e.preventDefault();
		};
	});
}

// scroll to top
export function scrollToTop() {
	const offsetFromTop = document.documentElement.scrollTop || document.body.scrollTop;

	if (offsetFromTop > 0) {
		window.requestAnimationFrame(scrollToTop);
		// ScrollTo takes an x and a y coordinate.
		// Increase the '10' value to get a smoother/slower scroll!
		window.scrollTo(0, offsetFromTop - offsetFromTop / 9);
	}
}

// horizontal scroll wihout holding "shift" key
export function initHorizontalScroll(section) {
	const scrollArea = document.querySelector(section);

	if (!scrollArea) {
		return console.log('undefined selector for horizontalScroll function');
	}

	function scrollHorizontally(e) {
		e = window.event || e;
		let delta = Math.max(-1, Math.min(1, e.wheelDelta || -e.detail));
		scrollArea.scrollLeft -= delta * 40; // Multiplied by 40

		// if already scrolled all the way to the right
		if (
			(delta > 0 && scrollArea.scrollLeft > 0) ||
			(delta < 0 && scrollArea.offsetWidth + scrollArea.scrollLeft < scrollArea.scrollWidth)
		) {
			e.preventDefault();
		}
	}

	if (scrollArea.addEventListener) {
		// IE9, Chrome, Safari, Opera
		scrollArea.addEventListener('mousewheel', scrollHorizontally, false);
		// Firefox
		scrollArea.addEventListener('DOMMouseScroll', scrollHorizontally, false);
	} else {
		// IE 6/7/8
		scrollArea.attachEvent('onmousewheel', scrollHorizontally);
	}
}

/**
 * ============
 * Cursor utils
 * ============
 */

// Linear interpolation
const lerp = (a, b, n) => (1 - n) * a + n * b;

// Gets the mouse position
const getMousePos = e => {
	return {
		x: e.clientX,
		y: e.clientY
	};
};

export { lerp, getMousePos };
