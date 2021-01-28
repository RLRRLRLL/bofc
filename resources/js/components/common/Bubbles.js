import { query, randomNum } from "./../Utils";

function createBubbles() {
	const area = query(".brand");
	const bubble = document.createElement("span");
	let maxWidth = area.offsetWidth * 0.9;
	let size = randomNum(15, 25);

	bubble.className = "b";
	bubble.style.width = size + "px";
	bubble.style.height = size + "px";
	bubble.style.left = Math.random() * maxWidth + "px";
	area.appendChild(bubble);

	setTimeout(() => {
		bubble.remove();
	}, 3000);
}

let interval = null;
const runBubbles = () => (interval = setInterval(createBubbles, 150));
const stopBubbles = () => clearInterval(interval);

export { runBubbles, stopBubbles };
