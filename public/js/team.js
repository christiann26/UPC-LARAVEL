import swiper from 'https://cdn.jsdelivr.net/npm/swiper@4.5.0/+esm'

/* Swiper Settings */

var mySwiper = new swiper(".swiper-container", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    centeredSlides: false,
    speed: 800,
    slidesPerView: 3,
    spaceBetween: 20,
    threshold: 5,


    // If we need pagination
    pagination: {
        el: ".swiper-pagination",
        clickable: true
    },

    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
    },
    breakpoints: {
        1180: {
            slidesPerView: 2,
            spaceBetween: 40,
            centeredSlides: false,
        },
        799: {
            slidesPerView: 1,
            spaceBetween: 20,
            centeredSlides: true,
            loop: true,
        },
    }
});

/* Show More */

var btnShow = document.querySelectorAll('.more');



btnShow.forEach(function (el) {
    el.addEventListener('click', showMore);
});

function showMore(event) {
    var card = event.target.closest(".swiper-slide");

    if (card.classList.contains('show-more')) {
        card.classList.remove('show-more');
    } else {
        card.classList.add('show-more')
    }

}


/* Social Hover */
var icon = document.querySelectorAll('.icon');

icon.forEach(function (el) {
    el.addEventListener("mouseenter", followCursor);

});


function followCursor(event) {
    var pointer = event.currentTarget.closest(".swiper-slide").querySelector('.pointer'),
        index = event.currentTarget.dataset.index,
        sizeIcon = (60 * index) + 25;

    pointer.style.transform = `translateX(${sizeIcon}px)`;
}


/* end */
