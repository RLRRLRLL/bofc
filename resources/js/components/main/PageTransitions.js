import { query, queryAll } from './../Utils'

const transElement = query('.transition')
const leavePageLinks = queryAll('.leave-page')

export default function runTransition() {
	setTimeout(() => {
		transElement.classList.remove('transactive')
	}, 250)

	leavePageLinks.forEach((link) => {
		link.addEventListener('click', (e) => {
			e.preventDefault()
			let dest = e.target.href

			transElement.classList.add('transactive')

			setTimeout(() => {
				window.location.href = dest
			}, 200)
		})
	})
}
