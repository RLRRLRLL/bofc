import gsap from 'gsap'
import { $, randomNum } from './utils'

let interval

const runBubbles = (selector, timeout) => {
	const area = $(selector)

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

const stopBubbles = () => {
	window.clearInterval(interval)
	interval = null
}

const distortBubble = () => {
	gsap.from('.brand__desc', {
		opacity: 0,
		duration: 1,
		y: 10
	})

	setTimeout(() => {
		// prettier-ignore
		gsap.to('#turbulence', {
			opacity: 1,
			rotationX: 180,
			duration: 3,
			attr: {
				baseFrequency: '0 0'
			}
		})

		gsap.to('#displacement', {
			duration: 3,
			attr: {
				scale: '5'
			}
		})
	}, 1000)
}

export { runBubbles, stopBubbles, distortBubble }
