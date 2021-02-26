import { add } from 'lodash'

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
