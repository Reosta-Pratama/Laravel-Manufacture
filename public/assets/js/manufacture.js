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

        let galleryProduct = select('.detail-product')
        if(galleryProduct != null){
            const glightbox = GLightbox({selector: '.glightbox'});
        }

        let galleryProject = select('.project-detail')
        if(galleryProject != null){
            const glightbox = GLightbox({selector: '.project-photo'});
        }
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