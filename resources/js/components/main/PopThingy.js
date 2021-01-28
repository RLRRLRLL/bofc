import { randomNum } from "./../Utils";

export default function popThingy() {
	var isSafari = /constructor/i.test(window.HTMLElement);

	if (isSafari)
		document.getElementsByTagName("html")[0].classList.add("safari");

	// Remove click on button for demo purpose
	Array.prototype.slice
		.call(document.querySelectorAll(".pop-thingy"), 0)
		.forEach(function(bt) {
			bt.addEventListener("click", function(e) {
				e.preventDefault();
			});
		});

	initBt2();

	function initBt2() {
		var bt = document.querySelectorAll("#pop-btn")[0];
		var filter = document.querySelectorAll("#pop feGaussianBlur")[0];
		var particleCount = 20;
		var colors = ["#fedb37", "#fdb931", "#9f7928", "#8a6e2f"];

		bt.addEventListener("click", function() {
			var particles = [];
			var tl = new TimelineLite({
				onUpdate: function() {
					filter.setAttribute("x", 0);
				}
			});

			tl.to(bt.querySelectorAll(".pop-thingy__bg"), 0.6, {
				scaleX: 1.05
			});
			tl.to(
				bt.querySelectorAll(".pop-thingy__bg"),
				0.9,
				{ scale: 1, ease: Elastic.easeOut.config(1.2, 0.4) },
				0.6
			);

			for (var i = 0; i < particleCount; i++) {
				particles.push(document.createElement("span"));
				bt.appendChild(particles[i]);

				particles[i].classList.add(i % 2 ? "left" : "right");

				var dir = i % 2 ? "-" : "+";
				var r =
					i % 2 ? (randomNum(-1, 1) * i) / 2 : randomNum(-1, 1) * i;
				var size = i < 2 ? 1 : randomNum(0.4, 0.8);
				var tl = new TimelineLite({
					onComplete: function(i) {
						particles[i].parentNode.removeChild(particles[i]);
						this.kill();
					},
					onCompleteParams: [i]
				});

				tl.set(particles[i], { scale: size });
				tl.to(particles[i], 0.15, {
					x: dir + 20,
					scaleX: 3,
					ease: SlowMo.ease.config(0.1, 0.7, false)
				});
				tl.to(
					particles[i],
					0.1,
					{ scale: size, x: dir + "=25" },
					"-=0.1"
				);
				if (i >= 2)
					tl.set(particles[i], {
						backgroundColor: colors[Math.round(randomNum(0, 3))]
					});
				tl.to(particles[i], 0.6, {
					x: dir + randomNum(60, 100),
					y: r * 10,
					scale: 0.1,
					ease: Power3.easeOut
				});
				tl.to(
					particles[i],
					0.2,
					{ opacity: 0, ease: Power3.easeOut },
					"-=0.2"
				);
			}
		});
	}
}
