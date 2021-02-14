import { query, randomNum } from "./../Utils";

export function Bubbles(selector, timeout) {
	let area = query(selector);

	function createBubbles() {
		let maxWidth = area.offsetWidth * 0.9;
		let size = randomNum(15, 25);
		const bubble = document.createElement("span");
		bubble.className = "b";
		bubble.style.width = size + "px";
		bubble.style.height = size + "px";
		bubble.style.left = Math.random() * maxWidth + "px";
		area.appendChild(bubble);

		setTimeout(() => {
			bubble.remove();
		}, timeout);
	}

	setInterval(createBubbles, 150);
}
