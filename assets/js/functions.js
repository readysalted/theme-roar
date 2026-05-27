///Fitvid
//jQuery(".video-wrap").fitVids();

///LazyLoading
jQuery('.lazy').Lazy({
        scrollDirection: 'vertical',
        effect: 'fadeIn',
        effectTime: 2000,
        visibleOnly: true,
        threshold: 0        
    });

///AOS
//AOS.init();

jQuery(document).ready( function($) {

    //----------- Slide Nav -----------
    $('.menu-toggle').on('click', function() {
        $(this).toggleClass('active');
        $('.slide-nav').toggleClass('active');
        $('html').toggleClass('menu-active');
        $('body').toggleClass('menu-active');
    });

    $('.slide-nav nav > ul > .menu-item-has-children > a').click(function (event) {
        event.preventDefault();
        $(this).toggleClass('active');
        var subMenu = $(this).siblings('.sub-menu');
        if (subMenu.is(':hidden')) {
            $('.slide-nav nav > ul > .menu-item-has-children > .sub-menu').slideUp();
            subMenu.slideDown();
        } else {
            window.location.href = $(this).attr('href');
            $('.slide-nav nav > ul > .menu-item-has-children > .sub-menu').slideUp();
        }
    });

    //----------- Match Height -----------
    $('.resize-wrap').each(function() {
        $(this).find('.resize-me').matchHeight();
    });

    //----------- Hero Video -----------
    $('#videoPlaceholder').on('click', function() {
        $(this).hide();
        $('#heroVideo').show()[0].play();
    });
    $('#heroVideo').on('ended', function() {
        $(this).hide();
        $('#videoPlaceholder').show();
    });

    //-----------  Tab click handler -----------
    $('.tabs .tab').on('click', function() {
        var tabId = $(this).data('tab');

        // Remove active class from all tabs and content blocks
        $('.tabs .tab').removeClass('active');
        $('.contents .content-block').removeClass('active');

        // Add active class to clicked tab and matching content block
        $(this).addClass('active');
        $('.contents .content-block[data-tab="' + tabId + '"]').addClass('active');
    });

    //----------- FAQs -----------
    $('.faq').on('click', function() {
        const isActive = $(this).hasClass('active');
        $('.faq').removeClass('active');
        if (!isActive) {
            $(this).addClass('active');
        }
    });

    //----------- View More Testimomnials
    $('.view-more-button').on('click', function() {
        $('.masonry-wrapper').addClass('expanded');
        $(this).hide();
    });

    //----------- Dropdown Services Nav -----------
    let servicesTimeout;
    $('.dropdown-services').hover(
        function () {
            // On mouse enter – cancel any pending timeout
            clearTimeout(servicesTimeout);

            $('.dropdown-services').addClass('active');
            $('.dropdown-sectors').removeClass('active');
            $('body')
                .addClass('services-menu-dropdown-active')
                .removeClass('sectors-menu-dropdown-active');
        },
        function () {
            // On mouse leave – add a slight delay before removing classes
            servicesTimeout = setTimeout(() => {
                $('.dropdown-services').removeClass('active');
                $('body').removeClass('services-menu-dropdown-active');
            }, 200); // Adjust delay here (e.g., 200ms)
        }
    );


    let sectorsTimeout;
    $('.dropdown-sectors').hover(
        function () {
            // On mouse enter – cancel any pending timeout
            clearTimeout(sectorsTimeout);

            $('.dropdown-sectors').addClass('active');
            $('.dropdown-services').removeClass('active');
            $('body')
                .addClass('sectors-menu-dropdown-active')
                .removeClass('services-menu-dropdown-active');
        },
        function () {
            // On mouse leave – add a slight delay before removing classes
            sectorsTimeout = setTimeout(() => {
                $('.dropdown-sectors').removeClass('active');
                $('body').removeClass('sectors-menu-dropdown-active');
            }, 200); // Adjust delay here (e.g., 200ms)
        }
    );



    //----------- Swiper -----------
    const swiperCats = new Swiper('.catsSwiper', { 
        slidesPerView: "auto", 
        spaceBetween: 10, 
        freeMode: true,
    });
    
    const swiper = new Swiper('.mySwiper', {
        slidesPerView: 1.2,
        spaceBetween: 40,
        //centeredSlides: true,
        breakpoints: {
          640: {
            slidesPerView: 2.2,
          },
          1024: {
            slidesPerView: 3.2,
          },
          1450: {
            slidesPerView: 3,
          },
        }, 
    });

    const latestcaseoneSwiper = new Swiper('.latestcaseoneSwiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        autoHeight: true,
        navigation: {
            nextEl: ".latestcaseone-next",
            prevEl: ".latestcaseone-prev",
        },
    });

    const latestcasetwoSwiper = new Swiper('.latestcasetwoSwiper', {
        slidesPerView: 1.2,
        spaceBetween: 20,
        slidesOffsetAfter: 32,
        navigation: {
            nextEl: ".latestcasetwo-next",
            prevEl: ".latestcasetwo-prev",
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
            slidesOffsetAfter: 0,
          },
        }, 
    });

    const swiperMarquee = new Swiper('.swiperMarquee', {
        slidesPerView: 'auto',
        spaceBetween: 10,
        loop: true,
        speed: 10000,
        allowTouchMove: true,
        autoplay:{
            delay: 1,
            disableOnInteraction: false,
        },
        breakpoints: {
          768: {
            allowTouchMove: false,
            spaceBetween: 28,
          },
        },
    });

    const swipelatest = new Swiper('.swiperlatest', {  
        slidesPerView: 1.2, 
        spaceBetween: 32, 
        observer: true,
        observeParents: true, 
        slidesOffsetBefore: 20,
        slidesOffsetAfter: 20,
        breakpoints: {
          768: {
            slidesOffsetBefore: 32,
            slidesOffsetAfter: 32,
          },
          800: {
            slidesPerView: 2.3, 
          },
          1180: {
            slidesOffsetBefore: 22,
            slidesOffsetAfter: 22,
            slidesPerView: 3.25, 
          },
          1650: {
            slidesOffsetBefore: 0,
            slidesOffsetAfter: 0,
            slidesPerView: 3,
            spaceBetween: 32, 
            width: 1300,
          },
        },
    });

});