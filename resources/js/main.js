
// bubble on cursor
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

// slider
const swiper = new Swiper('.swiper-container', {
    effect: 'fade',
    speed: 1500,
    observer: true,
    observeParents: true,
    loop: true,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false
    },
});

$(document).mousemove(function (event) {
    // Detect mouse position
    var xPos = (event.clientX / $(window).width()) - 0.5;
    // var yPos = (event.clientY / $(window).height()) - 0.5;

    if (xPos >= 0) {
        document.body.classList.remove('left-arr');
        document.body.classList.add('right-arr');
    } else {
        document.body.classList.add('left-arr');
        document.body.classList.remove('right-arr');
    }
});

$('body').on('click', (e) => {
    if ($('body').hasClass('left-arr')) {
        swiper.slidePrev();
    } else if ($('body').hasClass('right-arr')) {
        swiper.slideNext();
    }
});

// menu trigger / brand 
const brand = document.querySelector('.brand');
const menu = document.querySelector('.nav');
const closeMenu = document.querySelector('.nav__close');

brand.addEventListener('click', (e) => {
    e.stopPropagation();
    brand.classList.add('hide');
    menu.classList.add('show');
});

closeMenu.addEventListener('click', (e) => {
    e.stopPropagation();
    brand.classList.remove('hide');
    menu.classList.remove('show');
})