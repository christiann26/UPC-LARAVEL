import swiper from 'https://cdn.jsdelivr.net/npm/swiper@4.5.0/+esm'

var swiperWrapper = document.getElementById('wrapper2');

/* The Team */
var team = [{
    name: "Jordi Gomez",
    role: "Game Developer",
    desc: "Reconocido diseñador de videojuegos conocido por su habilidad para crear experiencias inmersivas y emocionantes.",
    photo: "images/avatar1sf.webp",
    website: "https://www.google.es/",
    email: "https://www.google.com/intl/es/gmail/about/",
    linkedin: "https://www.linkedin.com/home",
    dribbble: "https://dribbble.com/",
},
{
    name: "Miguel Martinez",
    role: "Game Developer",
    desc: "Diseñador de videojuegos que destaca por su capacidad para desarrollar mecánicas de juego.",
    photo: "images/avatar2sf.webp",
    website: "https://www.google.es/",
    email: "https://www.google.com/intl/es/gmail/about/",
    linkedin: "https://www.linkedin.com/home",
    dribbble: "https://dribbble.com/",
},
{
    name: "Ivan Pascuas",
    role: "Game Developer",
    desc: "Su habilidad para fusionar elementos visuales proporciona a los jugadores una experiencia inmersiva única.",
    photo: "images/avatar3sf.webp",
    website: "https://www.google.es/",
    email: "https://www.google.com/intl/es/gmail/about/",
    linkedin: "https://www.linkedin.com/home",
    dribbble: "https://dribbble.com/",
},
{
    name: "Luis Ledesma",
    role: "Web Developer",
    desc: "El mejor programador de este siglo, es el faker de la programación",
    photo: "images/luisen.webp",
    website: "https://www.google.es/",
    email: "https://www.google.com/intl/es/gmail/about/",
    linkedin: "https://www.linkedin.com/home",
    dribbble: "https://dribbble.com/",
},
{
    name: "Julian Ortega",
    role: "Web Developer",
    desc: "Apasionado por el desarrollo web y la innovación.",
    photo: "images/julian.webp",
    website: "https://www.google.es/",
    email: "https://www.google.com/intl/es/gmail/about/",
    linkedin: "https://www.linkedin.com/home",
    dribbble: "https://dribbble.com/",
},
{
    name: "Christian Sastre",
    role: "Web Developer",
    desc: "Hábil desarrollador web con una pasión por crear experiencias digitales innovadoras. Record 0-10",
    photo: "images/calvo.webp",
    website: "https://www.google.es/",
    email: "https://www.google.com/intl/es/gmail/about/",
    linkedin: "https://www.linkedin.com/home",
    dribbble: "https://dribbble.com/",
},
{
    name: "Pau Lopez",
    role: "Web Developer",
    desc: "Su talento y su forma de programar son inigualables",
    photo: "images/pau.webp",
    website: "https://www.google.es/",
    email: "https://www.google.com/intl/es/gmail/about/",
    linkedin: "https://www.linkedin.com/home",
    dribbble: "https://dribbble.com/",
},
];

/* Social Icons */
var icons = [{
    iWebsite: "https://rafaelalucas.com/dailyui/6/assets/link.svg",
    iEmail: "https://rafaelalucas.com/dailyui/6/assets/email.svg",
    iLinkedin: "https://rafaelalucas.com/dailyui/6/assets/linkedin.svg",
    iDribbble: "https://rafaelalucas.com/dailyui/6/assets/dribbble.svg",
}];

var iWebsite = icons[0].iWebsite,
    iEmail = icons[0].iEmail,
    iLinkedin = icons[0].iLinkedin,
    iDribbble = icons[0].iDribbble;


/* Function to populate the team members */
function addTeam() {
    for (let i = 0; i < team.length; i++) {

        /* Variables for the team */
        var name = team[i].name,
            role = team[i].role,
            desc = team[i].desc,
            photo = team[i].photo,
            website = team[i].website,
            email = team[i].email,
            linkedin = team[i].linkedin,
            dribbble = team[i].dribbble;

        /* Template for the Team Cards */
        var template = `
                    <div class="swiper-slide">
                    <div class="card">
                        <span class="bg"></span>
                        <span class="more"></span>
                        <figure class="photo"><img src="${photo}"></figure>
                            <article class="text">
                                <p class="name">${name}</p>
                                <p class="role">${role}</p>
                                <p class="desc">${desc}</p>
                            </article>

                            <div class="social">
                            <span class="pointer"></span>
                            <div class="icons">
                                <a class="icon" href="${website}" target="_blank" data-index="0"><img src="${iWebsite}"></a>
                                <a class="icon" href="${email}" target="_blank" data-index="1"><img src="${iEmail}"></a>
                                <a class="icon" href="${linkedin}" target="_blank" data-index="2"><img src="${iLinkedin}"></a>
                                <a class="icon" href="${dribbble}" target="_blank" data-index="3"><img src="${iDribbble}"></a>
                                </div>
                                </div>
                        </div>
                    </div>`;

        swiperWrapper.insertAdjacentHTML('beforeend', template);
    }
};


addTeam();



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
