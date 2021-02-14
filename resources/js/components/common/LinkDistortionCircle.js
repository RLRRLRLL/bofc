import { gsap } from "gsap";

class LinkFx {
	constructor(el) {
		this.DOM = { el: el };
		this.options = {
			animation: {
				text: false,
				line: true
			}
		};
		this.DOM.text = document.createElement("span");
		this.DOM.text.classList = "link-text";
		this.DOM.text.innerHTML = this.DOM.el.innerHTML;
		this.DOM.el.innerHTML = "";
		this.DOM.el.appendChild(this.DOM.text);
		this.DOM.line = document.createElement("span");
		this.DOM.line.classList = "link-circle";
		this.DOM.el.appendChild(this.DOM.line);

		this.DOM.el.dataset.line != undefined &&
			(this.options.animation.line =
				this.DOM.el.dataset.line === "false" ? false : true);

		this.initEvents();
	}
	initEvents() {
		this.onMouseEnterFn = () => this.tl.restart();
		this.onMouseLeaveFn = () => this.tl.progress(1).kill();
		this.DOM.el.addEventListener("mouseenter", this.onMouseEnterFn);
		this.DOM.el.addEventListener("mouseleave", this.onMouseLeaveFn);
	}
	createTimeline() {
		// init timeline
		this.tl = gsap.timeline({
			paused: true,
			onStart: () => {
				this.DOM.line.style.filter = `url(#circleDistortion)`;
			},
			onComplete: () => {
				this.DOM.line.style.filter = "none";
			}
		});
	}
}

class circleDistortion extends LinkFx {
	constructor(el) {
		super(el);
		this.filterId = "#circleDistortion";
		this.DOM.feDisplacementMap = document.querySelector(
			`${this.filterId} > feDisplacementMap`
		);
		this.primitiveValues = { scale: 0 };

		this.createTimeline();
		this.tl.eventCallback(
			"onUpdate",
			() =>
				(this.DOM.feDisplacementMap.scale.baseVal = this.primitiveValues.scale)
		);
		this.tl.to(this.primitiveValues, {
			duration: 1,
			ease: "Expo.easeOut",
			startAt: { scale: 80 },
			scale: 0
		});
	}
}

export default [circleDistortion];
