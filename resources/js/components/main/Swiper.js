import Swiper from 'swiper/bundle'
import 'swiper/swiper-bundle.css'

export default function initCarousel() {
	const galleryThumbs = new Swiper('.gallery-thumbs', {
		spaceBetween: 10,
		slidesPerView: 4,
		loop: false,
		freeMode: false,
		watchSlidesVisibility: true,
		watchSlidesProgress: true
	})

	const galleryTop = new Swiper('.gallery-top', {
		spaceBetween: 10,
		loop: false,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev'
		},
		thumbs: {
			swiper: galleryThumbs
		}
	})
}
