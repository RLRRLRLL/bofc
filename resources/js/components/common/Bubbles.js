import { randomNum } from "./../Utils";

function createBubbles() {
	const area = document.querySelector(".nav__brand");
	const bubble = document.createElement("span");
	let maxWidth = area.offsetWidth * 0.9;
	let size = randomNum(15, 50);

	bubble.className = "b";
	bubble.style.width = 5 + size + "px";
	bubble.style.height = 5 + size + "px";
	bubble.style.left = Math.random() * maxWidth + "px";
	area.appendChild(bubble);

	setTimeout(() => {
		bubble.remove();
	}, 3000);
}

let interval = null;
const runBubbles = () => (interval = setInterval(createBubbles, 300));
const stopBubbles = () => clearInterval(interval);

export { runBubbles, stopBubbles };
