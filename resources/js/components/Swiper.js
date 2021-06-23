import Swiper from 'swiper/bundle'
import 'swiper/swiper-bundle.min.css'
import 'swiper/components/effect-fade/effect-fade.min.css'
import { $ } from '../utils'

export default function initCarousel() {
	const galleryThumbs = new Swiper('.gallery-thumbs', {
		spaceBetween: 10,
		slidesPerView: 4,
		loop: false,
		lazy: true,
		freeMode: false,
		watchSlidesVisibility: true,
		watchSlidesProgress: true
	})

	const galleryTop = new Swiper('.gallery-top', {
		spaceBetween: 10,
		loop: false,
		draggable: false,
		effect: 'fade',
		fadeEffect: {
			crossFade: true
		},
		thumbs: {
			swiper: galleryThumbs
		}
	})

	/**
	 * ===============================================================
	 * Change cursor on hover and change slide on click functionality
	 */
	const area = $('.gallery-top')

	// pretty self explainatory eh
	function cursorIntoArrows(event) {
		let areaWidth = area.offsetWidth
		let leftside = areaWidth / 2

		area.addEventListener('mousemove', event => {
			if (event.offsetX < leftside) {
				changeCursor('left-arr')
			} else {
				changeCursor('right-arr')
			}
		})

		area.addEventListener('mouseleave', () => {
			changeCursor('no-arr')
		})
	}

	// little shorthand function
	const changeCursor = className => (document.body.classList = className)

	// change slides when cursor is arrow
	const changeSlides = () => {
		if (document.body.classList.contains('left-arr')) {
			galleryTop.slidePrev()
		} else if (document.body.classList.contains('right-arr')) {
			// "else if" here needed because of the thumbnails
			galleryTop.slideNext()
		}
	}
	area.addEventListener('mouseover', cursorIntoArrows)
	window.addEventListener('click', changeSlides)

	if (!window.matchMedia('(min-width: 991px)').matches) {
		// if screen wider than standart tablet window width, change cursor to arrows
		// reference: https://mediag.com/blog/popular-screen-resolutions-designing-for-all/
		area.removeEventListener('mouseover', cursorIntoArrows)
		window.removeEventListener('click', changeSlides)
	}

	window.addEventListener('resize', () => {
		let currentWidth = window.innerWidth
		let newWidth

		// several things can be broken if we resize on purpose to a bigger(!) width,
		// so it's better to reload the page just in case, so the html could reparse
		setTimeout(() => {
			newWidth = window.innerWidth

			if (Math.abs(newWidth - currentWidth) > '500') {
				window.location.reload()
			}
		}, 1500)
	})
}
