// links: prevent default if '#' and add active class if current page
const anchorTags = document.querySelectorAll('a');
let currentUrl = window.location.pathname;

anchorTags.forEach(function (element) {
	let anchorAttr = element.getAttribute('href');

	element.addEventListener('click', (e) => {
		if (anchorAttr === '#') { // this is for removing # from url
			e.preventDefault();
		} else { // this is for smooth transition between pages
			let thisTargetUrl = e.target.href;
			e.preventDefault();
			setTimeout(() => {
				document.querySelector('.main').classList.remove('main__on-load');
				window.location = thisTargetUrl;
			}, 250);
		}
	});

	if (anchorAttr == currentUrl) {
		element.closest('a').classList.add('active');
	}
});

// cursor into bubble on hover
function cursorIntoBubble(targetElements) {
	const cursor = document.querySelector('.cursor');
	const targets = document.querySelectorAll(targetElements);

	window.addEventListener('mousemove', listenToCursorMove);

	function listenToCursorMove(e) {
		cursor.style.top = e.pageY + 'px';
		cursor.style.left = e.pageX + 'px';
	}

	targets.forEach(l => {
		l.addEventListener('mouseover', () => {
			cursor.classList.add('grow');
		});
		l.addEventListener('mouseleave', () => {
			cursor.classList.remove('grow');
		});
	});
}


// generate random num
function randomNum(min, max) {
	return Math.floor(Math.random() * (max - min + 1) + min);
}

document.addEventListener('DOMContentLoaded', () => {
	document.querySelector('.main').classList.add('main-loaded');

	// home page
	if (document.querySelector('.wrapper.home')) {

		const swiperOptions = {
			effect: 'fade',
			speed: 1500,
			observer: true,
			observeParents: true,
			loop: true,
			autoplay: {
				delay: 4000,
				disableOnInteraction: false
			},
		};

		const swiper = new Swiper('.swiper-container', swiperOptions);

		document.addEventListener('mousemove', (event) => {
			let positionX = (event.offsetX / window.innerWidth) - 0.5;

			if (positionX >= 0) {
				document.body.classList = 'right-arr';
			} else {
				document.body.classList = 'left-arr';
			}
		});

		document.addEventListener('click', (e) => {
			if (document.body.classList === 'left-arr') {
				swiper.slidePrev();
			} else {
				swiper.slideNext();
			}
		});
	}

	// pomeranians page
	if (document.querySelector('.wrapper.poms')) {
		const galleryItems = document.querySelectorAll('.gallery-item');

		galleryItems.forEach((el) => {
			el.style.width = randomNum(10, 20) + '%';
			el.style.height = randomNum(300, 500) + 'px';
			el.style.marginTop = randomNum(5, 45) + 'px';
		});
	}
});
/////////////////

// menu trigger / brand 
const brand = document.querySelector('.brand');
const menu = document.querySelector('.nav');

brand.addEventListener('click', (e) => {
	brand.classList.add('hide');
	menu.classList.add('show');
});

document.querySelector('.nav__close')
	.addEventListener('click', (e) => {
		e.stopPropagation();
		brand.classList.remove('hide');
		menu.classList.remove('show');
	});
