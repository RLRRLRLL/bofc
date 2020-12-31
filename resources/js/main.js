import Swiper from 'swiper';

const swiper = new Swiper('.swiper-container', {
	speed: 400,
});

const cursor = document.querySelector('.cursor');
const nav_links = document.querySelectorAll('.nav__top li');

window.addEventListener('mousemove', listenToCursorMove);

function listenToCursorMove(e) {
    cursor.style.top = e.pageY + 'px';
    cursor.style.left = e.pageX + 'px';
}

nav_links.forEach(l => {
    l.addEventListener('mouseover', () => {
        cursor.classList.add('grow');
    });
    l.addEventListener('mouseleave', () => {
        cursor.classList.remove('grow');
    });
});