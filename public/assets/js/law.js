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
                .offsetTop + 10,
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

    $(document).ready(function () {
        let galleryProduct = select('.testimonial')
        if (galleryProduct != null) {
            const glightbox = GLightbox({selector: '.glightbox'});
        }
    });

    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        nav: false,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 1
            },
            1200: {
                items: 1
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
    Scroll Down
    --------------------------------------------------------------*/
    const btnScrollDown = document.querySelector('#ctn-down');
    function scrollDown() {
        let windowCoords = document.documentElement.clientHeight + 300;
        (function scroll() {
            if (window.pageYOffset < windowCoords) {
                window.scrollBy(0, 100);
                setTimeout(scroll, 100);
            }
            if (window.pageYOffset > windowCoords) {
                window.scrollTo(0, windowCoords);
            }
        })();

        console.log(windowCoords)

    }

    if (btnScrollDown != null) {
        btnScrollDown.addEventListener('click', scrollDown);
    }

})()