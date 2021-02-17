import { domReady } from "./../Utils";

// small animations across the web [slide'n'fade]
export default function slidesAndFades() {
	const animItems = document.querySelectorAll(".anim");

	if (animItems.length > 0) {
		const getOffset = e => {
			const rect = e.getBoundingClientRect(),
				scrollLeft =
					window.pageXOffset || document.documentElement.scrollLeft,
				scrollTop =
					window.pageYOffset || document.documentElement.scrollTop;
			return { top: rect.top + scrollTop, left: rect.left + scrollLeft };
		};

		const animateOnScroll = () => {
			for (let index = 0; index < animItems.length; index++) {
				const animItem = animItems[index],
					animItemHeight = animItem.offsetHeight,
					animItemOffset = getOffset(animItem).top,
					animStart = 4;

				let animItemPoint =
					window.innerHeight - animItemHeight / animStart;

				if (animItemHeight > window.innerHeight) {
					animItemPoint =
						window.innerHeight - window.innerHeight / animStart;
				}

				if (
					pageYOffset > animItemOffset - animItemPoint &&
					pageYOffset < animItemOffset + animItemHeight
				) {
					animItem.classList.add("anim-active");
				}
			}
		};

		function runAnimations() {
			window.addEventListener("scroll", animateOnScroll);
			setTimeout(() => {
				animateOnScroll();
			}, 300);
		}

		domReady(runAnimations);
	}
}
