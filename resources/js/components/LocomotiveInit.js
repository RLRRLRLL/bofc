import LocomotiveScroll from 'locomotive-scroll'

export default function LocomotiveInit() {
	const scroll = new LocomotiveScroll({
		el: document.querySelector('[data-scroll-container]'),
		smooth: true,
		tablet: { smooth: false },
		smartphone: { smooth: false },
		multiplier: 1.2,
		lerp: 0.15
	})

	setTimeout(() => {
		scroll.update()
	})

	/* Back to top button */
	const backToTopBtn = document.getElementById('back-to-top')

	if (window.matchMedia('(min-width: 1024px)')) {
		backToTopBtn.addEventListener('click', () => {
			scroll.scrollTo('top')
		})
	} else {
		backToTopBtn.addEventListener('click', scrollToTop)
	}

	// Distortion links (circle on hover)
	const distortedLinks = [...document.querySelectorAll('a.circle-link')]
	distortedLinks.forEach(el => {
		const elPosition = [...el.parentNode.children].indexOf(el)
		const fxObj = LinkDistortionCircle[elPosition]
		fxObj && new fxObj(el)
	})
}
