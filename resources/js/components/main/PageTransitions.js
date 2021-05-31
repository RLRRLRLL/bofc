// import { query, queryAll } from './../Utils'

// const transElement = query('.page-transition')
// const leavePageLinks = queryAll('.leave-page')

// export default function runTransition() {
// 	setTimeout(() => {
// 		transElement.classList.remove('transactive')
// 	}, 250)

// 	leavePageLinks.forEach(link => {
// 		link.addEventListener('click', e => {
// 			e.preventDefault()
// 			let dest = e.target.href

// 			transElement.classList.add('transactive')

// 			setTimeout(() => {
// 				window.location.href = dest
// 			}, 200)
// 		})
// 	})
// }

export default function runTransitions() {
	const layers = document.querySelectorAll('.layer')

	setTimeout(() => {
		layers.forEach(layer => layer.classList.remove('active'))
	}, 250)

	const leavePageLinks = document.querySelectorAll('a[data-leave]')

	leavePageLinks.forEach(link => {
		link.addEventListener('click', e => {
			e.preventDefault()

			const dest = e.target.href

			layers.forEach(layer => {
				layer.classList.add('active')
			})

			setTimeout(() => {
				window.location.href = dest
			}, 200)
		})
	})
}
