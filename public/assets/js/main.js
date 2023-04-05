(function () {
    "use strict";

    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
                selectEl.addEventListener(type, listener)
            }
        }
    }

    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }

    /*--------------------------------------------------------------
    # Fixed Top
    --------------------------------------------------------------*/
    const selectHeader = select('.header')
    if (selectHeader) {
        onscroll(document, () => {
            if (window.scrollY > 300) {
                selectHeader
                    .classList
                    .add('header-change')
            } else {
                selectHeader
                    .classList
                    .remove('header-change')
            }
        })
    }

    /*------------------------------------
    Navbar
    ------------------------------------*/


    const navbarlinks = document.querySelectorAll('#navbar .scrollto');
    function navbarlinksActive() {
        navbarlinks.forEach(navbarlink => {
            if (!navbarlink.hash) 
                return;
            
            let section = document.querySelector(navbarlink.hash);

            if (!section) 
                return;
            
            let position = window.scrollY;
            if (navbarlink.hash != '#header') 
                position -= 10;
            
            if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                navbarlink
                    .classList
                    .add('active');
            } else {
                navbarlink
                    .classList
                    .remove('active');
            }
        })
    }
    window.addEventListener('load', navbarlinksActive);
    document.addEventListener('scroll', navbarlinksActive);

    function scrollto(el) {
        window.scrollTo({
            top: document
                .querySelector(el)
                .offsetTop + 40,
            behavior: 'smooth'
        });
    }

    const selectScrollto = document.querySelectorAll('.scrollto');
    selectScrollto.forEach(el => el.addEventListener('click', function (event) {
        if (document.querySelector(this.hash)) {
            event.preventDefault();

            let mobileNavActive = document.querySelector('.mobile-nav-active');
            if (mobileNavActive) {
                mobileNavActive
                    .classList
                    .remove('mobile-nav-active');

                let navbarToggle = document.querySelector('.mobile-nav-toggle');
                navbarToggle
                    .classList
                    .toggle('fa-bars');
                navbarToggle
                    .classList
                    .toggle('fa-xmark');
            }
            scrollto(this.hash);
        }
    }));
    window.addEventListener('load', () => {
        if (window.location.hash) {
            if (document.querySelector(window.location.hash)) {
                scrollto(window.location.hash);
            }
        }
    });

    const mobileNavToogle = document.querySelector('.mobile-nav-toggle');
    if (mobileNavToogle) {
        mobileNavToogle.addEventListener('click', function (event) {
            event.preventDefault();

            document
                .querySelector('body')
                .classList
                .toggle('mobile-nav-active');

            this
                .classList
                .toggle('fa-bars');
            this
                .classList
                .toggle('fa-xmark');
        });
    }

    /*--------------------------------------------------------------
    # Hero
    --------------------------------------------------------------*/
    let heroCarouselIndicators = document.querySelector(
        '#hero .carousel-indicators'
    );
    if (heroCarouselIndicators) {
        let heroCarouselItems = document.querySelectorAll('#hero .carousel-item')

        heroCarouselItems.forEach((item, index) => {
            if (index === 0) {
                heroCarouselIndicators.innerHTML += `<li data-bs-target="#hero" data-bs-slide-to="${index}" class="active"></li>`;
            } else {
                heroCarouselIndicators.innerHTML += `<li data-bs-target="#hero" data-bs-slide-to="${index}"></li>`;
            }
        });
    }

    /*--------------------------------------------------------------
    # Clients
    --------------------------------------------------------------*/
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 2
            },
            800: {
                items: 3
            },
            1080: {
                items: 3
            },
            1081: {
                items: 4
            }
        }
    })

    /*--------------------------------------------------------------
    # Sidebar
    --------------------------------------------------------------*/
    $(document).ready(function () {
        $('.sidebar-toggle').click(function () {
            $('.sidebar').addClass("active");
        });

        $('.close-toggle').click(function () {
            $('.sidebar').removeClass("active");
        });
    });

    /*--------------------------------------------------------------
    # Top0 Button
    --------------------------------------------------------------*/
    let backtotop = select('.back-to-top')
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop
                    .classList
                    .add('active')
            } else {
                backtotop
                    .classList
                    .remove('active')
            }
        }
        window.addEventListener('load', toggleBacktotop)
        onscroll(document, toggleBacktotop)
    }

    $(".top-button").click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
        return false;
    });
})()