import { add } from 'lodash'

/**
 * This little function works, but not used for lack of need.
 * Locomotive already has 'data-scroll-class' feature..
 */

const initAnimations = function () {
	const callback = function (entries) {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				entry.target.classList.add('anim-stop')
			}
		})
	}

	const observer = new IntersectionObserver(callback)

	const targets = document.querySelectorAll('.anim-item')
	targets.forEach(function (target) {
		observer.observe(target)
	})
}

export { initAnimations }
