import { query, randomNum } from './../Utils'

let interval

export const runBubbles = (selector, timeout) => {
	const area = query(selector)

	interval = setInterval(() => {
		let maxWidth = area.offsetWidth * 0.9
		let size = randomNum(15, 25)
		const bubble = document.createElement('span')
		bubble.className = 'b'
		bubble.style.width = size + 'px'
		bubble.style.height = size + 'px'
		bubble.style.left = Math.random() * maxWidth + 'px'
		area.appendChild(bubble)

		setTimeout(() => {
			bubble.remove()
		}, timeout)
	}, 150)
}

export const stopBubbles = () => {
	window.clearInterval(interval)
	interval = null
}

export const distortBubble = () => {
	const turb = document.getElementById('turbulence')
	const tl = new TimelineMax()

	tl.to(turb, {
		duration: 3,
		attr: {
			baseFrequency: '0 0'
		}
	})
}
