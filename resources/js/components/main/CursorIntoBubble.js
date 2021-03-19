// cursor into bubble on hover
export default function cursorIntoBubble(targets) {
	window.addEventListener('mousemove', listenToCursorMove);
	const cursor = document.getElementById('cursor');

	function listenToCursorMove(e) {
		cursor.style.top = e.pageY + 'px';
		cursor.style.left = e.pageX + 'px';
	}

	targets.forEach(l => {
		l.addEventListener('mouseover', () => {
			cursor.classList.add('grow');
		});
		l.addEventListener('mouseleave', () => {
			cursor.classList.remove('grow');
		});
	});
}
