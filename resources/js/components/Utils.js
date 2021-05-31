// aliases for js selectors
export const query = document.querySelector.bind(document)
export const queryAll = document.querySelectorAll.bind(document)

// generate random num
export let randomNum = (min, max) =>
	Math.floor(Math.random() * (max - min + 1) + min)

// cursor into arrows on home page
export function cursorIntoArrows(e) {
	let positionX = e.offsetX / window.innerWidth - 0.5
	let b = document.body

	return positionX >= 0
		? (b.className = 'right-arr')
		: (b.className = 'left-arr')
}

// links: prevent default if '#' and add active class if current page
export function keepLinksActive() {
	/**
	 * !!! This fn is working altough not used,
	 * !!! because its cleaner to use php solution
	 */
	const anchorTags = queryAll('a')
	let currentUrl = window.location.pathname

	anchorTags.forEach(function (element) {
		let anchorAttr = element.getAttribute('href')
		let cropped

		element.addEventListener('click', e => {
			if (anchorAttr === '#') {
				// this is for removing # from url
				e.preventDefault()
			} else {
				// this is for smooth transition between pages
				let thisTargetUrl = e.target.href
				e.preventDefault()
				setTimeout(() => {
					document
						.querySelector('.main')
						.classList.remove('main-loaded')
					window.location = thisTargetUrl
				}, 250)
			}
		})

		if (cropped == currentUrl || anchorAttr == currentUrl) {
			element.closest('a').classList.add('active')
		}
	})
}

// scroll to section
export function scrollToElement() {
	const aboutTrigger = query('.stripes'),
		backToTop = query('#backToTop')

	function scrollToSection(trigger) {
		trigger.addEventListener('click', function (e) {
			e.preventDefault()

			const thisAttr = this.getAttribute('data-target'),
				target = document.querySelector(thisAttr),
				targetPos = target.offsetTop,
				startPos = window.pageYOffset,
				distance = targetPos - startPos,
				duration = 700
			let start = null

			window.requestAnimationFrame(step)

			function step(timestamp) {
				if (!start) start = timestamp
				const progress = timestamp - start
				window.scrollTo(
					0,
					exponentialEasing(progress, startPos, distance, duration)
				)
				if (progress < duration) window.requestAnimationFrame(step)
			}
		})
	}

	// element which will be clicked passed to fn
	scrollToSection(backToTop)
	scrollToSection(aboutTrigger)

	// easing fns reference: http://www.gizma.com/easing/
	function exponentialEasing(t, b, c, d) {
		t /= d / 2
		if (t < 1) return (c / 2) * Math.pow(2, 10 * (t - 1)) + b
		t--
		return (c / 2) * (-Math.pow(2, -10 * t) + 2) + b
	}
}

// class toggler
export function classToggler(el, className) {
	if (el.classList.contains(className)) {
		el.classList.remove(className)
	} else {
		el.classList.add(className)
	}
}

// Disable right click on images (make it harder to download)
export function disableRightClick() {
	let allImages = document.querySelectorAll('img')
	allImages.forEach(value => {
		value.oncontextmenu = e => {
			e.preventDefault()
		}
	})
}

// scroll to top
export function scrollToTop() {
	const offsetFromTop =
		document.documentElement.scrollTop || document.body.scrollTop

	if (offsetFromTop > 0) {
		window.requestAnimationFrame(scrollToTop)
		// ScrollTo takes an x and a y coordinate.
		// Increase the '10' value to get a smoother/slower scroll!
		window.scrollTo(0, offsetFromTop - offsetFromTop / 9)
	}
}

/**
 * ============
 * Cursor utils
 * ============
 */

// Linear interpolation
const lerp = (a, b, n) => (1 - n) * a + n * b

// Gets the mouse position
const getMousePos = e => {
	return {
		x: e.clientX,
		y: e.clientY
	}
}

export { lerp, getMousePos }
