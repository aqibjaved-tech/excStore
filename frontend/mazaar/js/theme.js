// Mazaar - Multipurpose Ecommerce Html Template
// Created by Nileforest*/

(function ($) {
    "use strict";

    var $window = $(window);
    var $document = $(document);
    var winWidthSm = parseInt(991, 10);
    var $body = $('body');

    //---------------------------------------------------------------------------------------------------------------------------->
    //      Site Loader Function
    //---------------------------------------------------------------------------------------------------------------------------->
    (function () {
        $window.on('load', function () {
            $('.site-loader').fadeOut('slow', function () {
                $(this).remove();
            });
        });
    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //      Header & Sticky Function
    //---------------------------------------------------------------------------------------------------------------------------->
    (function () {
        $document.ready(function () {
            headerHeight();
        });

        $window.on('resize', function () {
            headerHeight();
        });

        // Header Height
        function headerHeight() {
            var headerInnerHeight = parseInt($(".header").innerHeight(), 10),
                winInnerWidth = parseInt($window.innerWidth(), 10);

            if (winInnerWidth <= winWidthSm) {
                $('.header:not(.header--dark, .header--light, .header-fixed)').css("min-height", "auto");
            }
            else {
                $('.header:not(.header--dark, .header--light, .header-fixed)').css("min-height", headerInnerHeight);
            }
        }

        // Sticky Header
        // var headerNavOffset = parseInt($('.header-nav').offset().top, 10);
        // var stickyOffset = parseInt(headerNavOffset + 1, 10);
        // $(window).on('scroll', function () {
        //     var sticky = $('.header--sticky'),
        //         scroll = parseInt($(window).scrollTop(), 10);
        //
        //     if (scroll >= stickyOffset) {
        //         sticky.addClass('header-fixed');
        //     }
        //     else {
        //         sticky.removeClass('header-fixed');
        //     }
        // });

        // "Sticky" Desktop Device Enable ---- Small Device Disable
        $(function () {
            var $stickyEle = $('.header--sticky');
            $window.on('resize', function resize() {
                if ($window.width() > winWidthSm) {
                    return $stickyEle.removeClass('no-stick');
                }
                $stickyEle.addClass('no-stick');
            }).trigger('resize');
        });
    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //      Header Hover Function
    //---------------------------------------------------------------------------------------------------------------------------->
    (function () {
        var headerHover = $('#header, .header').attr("data-header-hover");
        var ElementTarget = $('#header, .header');
        if (headerHover === 'true') {
            $(ElementTarget).addClass('header-hover');
            // alert('true');
        } else {
            $(ElementTarget).removeClass('header-hover');
        }
    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //      Navigation Menu
    //---------------------------------------------------------------------------------------------------------------------------->
    (function () {
        var navMenuLink = $(".nav-menu > ul > li"),
          //  menuIconBtn = $('.menu-dropdown-icon'),
            dropDown_Menu = $('.nav-dropdown'),
            nav_menu_item = $('.nav-menu-item'),
            nav_Mobile_Btn = $(".menu-mobile-btn"),
            nav_menu_wrap = $(".nav-menu");

        // Custom
        $('.nav-dropdown .row [class*="col-"] figure').siblings('img').addClass('themeshot-img');

        // Dropdown Menu Icon
        $('.nav-menu > ul > li:has( > .nav-dropdown)').prepend('<span class="menu-dropdown-icon"></span>');
        $('.nav-dropdown > ul > li:has( > .nav-dropdown-sub)').addClass('sub-dropdown-icon');
        $(".nav-menu > ul > li:has( > .nav-dropdown)").addClass('dd-menu-dropdown-icon');
        $window.on('resize', function () {
            if ($(window).width() > winWidthSm) {
                $('.nav-dropdown > ul > li ul li:has(.nav-dropdown-sub)').addClass('sub-dropdown-icon');
            }
            if ($(window).width() <= winWidthSm) {
                $('.nav-dropdown > ul > li ul li:has(.nav-dropdown-sub)').removeClass('sub-dropdown-icon');
            }
        });

        // Dropdown
        $document.ready(function () {
            // Dropdown Menu
            navMenuLink.on('mouseenter mouseleave', function (e) {
                if ($(window).width() > winWidthSm) {
                    $(this).children(".nav-dropdown").stop(true, false).fadeToggle(150);
                    e.preventDefault();
                }
            });
            $('.menu-dropdown-icon').on('click', function () {
                if ($(window).width() <= winWidthSm) {
                    $(this).siblings(".nav-dropdown").stop(true, false).fadeToggle(150);
                }
            });

            $window.on('resize', function () {
                if ($(window).width() > winWidthSm) {
                    $(".nav-dropdown, .nav-dropdown-sub").fadeOut(150);
                }
            });

            // Sub Dropdown Menu
            nav_menu_item.on('mouseenter mouseleave', function (e) {
                if ($(window).width() > winWidthSm) {
                    $(this).children(".nav-dropdown-sub").stop(true, false).fadeToggle(150);
                    e.preventDefault();
                }
            });
            nav_menu_item.on('click', function () {
                if ($(window).width() <= winWidthSm) {
                    $(this).children(".nav-dropdown-sub").stop(true, false).fadeToggle(150);
                }
            });
        });

        // Dropdon Center align
        $window.on('resize', function () {
            dropDown_Menu.each(function (indx) {
                if ($(this).hasClass("center")) {
                    var dropdownWidth = $(this).outerWidth();
                    var navItemWidth = $(this).parents(nav_menu_item).outerWidth();
                    var dropdown_halfWidth = dropdownWidth / 2;
                    var navItem_halfWidth = navItemWidth / 2;
                    var totlePosition = dropdown_halfWidth - navItem_halfWidth;
                    if ($window.width() > winWidthSm) {
                        $(this).css("left", "-" + totlePosition + "px");
                    } else {
                        $(this).css("left", "0");
                    }
                }
            });
        });

        // Mobile Menu Button
        nav_Mobile_Btn.on('click', function (e) {
            nav_menu_wrap.toggleClass('show-on-mobile');
            $(this).toggleClass("active");
            e.preventDefault();
        });
    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //      Dropdown Menu
    //---------------------------------------------------------------------------------------------------------------------------->
    (function () {
        var trigger = $(".dropdown--trigger"),
            dropdown = $(".dropdown--menu"),
            trigger_active = 'trigger--active',
            dropdown_active = 'dropdown--active',
            dropdown_parent_active = 'parent--active';

        var openDropdownMenu = function () {
            trigger.addClass(trigger_active);
            trigger.siblings(dropdown).first().addClass(dropdown_active);
            trigger.parent().addClass(dropdown_parent_active);
        };

        var closeDropdownMenu = function () {
            dropdown.removeClass(dropdown_active);
            dropdown.siblings(trigger).removeClass(trigger_active);
            dropdown.parent().removeClass(dropdown_parent_active);
        };

        trigger.append("<i class='dropdown--trigger-arrow fa fa-angle-down'></i>");

        trigger.on('click', function (e) {
            e.stopPropagation();
            if ($(this).hasClass(trigger_active)) {
                $(this).removeClass(trigger_active);
                $(this).siblings(dropdown).removeClass(dropdown_active);
                $(this).parent().removeClass(dropdown_parent_active);
            } else {
                trigger.removeClass(trigger_active).siblings(dropdown).removeClass(dropdown_active).parent().removeClass(dropdown_parent_active);
                $(this).addClass(trigger_active);
                $(this).siblings(dropdown).addClass(dropdown_active);
                $(this).parent().addClass(dropdown_parent_active);
            }
        });

        $document.on('click touchstart', function (e) {
            if (!$(e.target).closest(dropdown, trigger).length) {
                trigger.removeClass(trigger_active);
                dropdown.removeClass(dropdown_active);
                trigger.parent().removeClass(dropdown_parent_active);
                e.stopPropagation();
            }
        });

        $('.nav-icon-trigger:not(.dropdown--trigger)').on('click', function (e) {
            closeDropdownMenu();
        });

        // $(window).on('scroll', function () {
        //     var scroll = $(window).scrollTop();
        //     var scrollcount = $('.header-nav').offset().top;
        //
        //     if (scroll >= scrollcount) {
        //         if ($('.topbar-component .dropdown--trigger').hasClass(trigger_active)) {
        //             closeDropdownMenu();
        //         }
        //     }
        // });

    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //      SearchBar Menu
    //---------------------------------------------------------------------------------------------------------------------------->
    (function () {
        var searchMenuBtn = $(".search-menu-btn"),
             searchMenu = $(".searchbar-menu"),
             searchMenuClose = $('.search-close-icon'),
             searchBtnActive = 'active',
             searchMenuActive = 'search-menu-open',
             searchBtnParentActive = 'search-active';

        var openSearch = function () {
            searchMenuBtn.addClass(searchBtnActive);
            searchMenu.addClass(searchMenuActive);
            searchMenuBtn.parent().addClass(searchBtnParentActive);
        };

        var closeSearch = function () {
            searchMenu.removeClass(searchMenuActive);
            searchMenuBtn.removeClass(searchBtnActive);
            searchMenuBtn.parent().removeClass(searchBtnParentActive);
        };

        searchMenuBtn.on('click', function (e) {
            e.stopPropagation();
            if ($(this).hasClass(searchBtnActive)) {
                $(this).removeClass(searchBtnActive);
                searchMenu.removeClass(searchMenuActive);
                $(this).parent().removeClass(searchBtnParentActive);
            } else {
                searchMenuBtn.removeClass(searchBtnActive).parent().removeClass(searchBtnParentActive); searchMenu.removeClass(searchMenuActive);
                $(this).addClass(searchBtnActive);
                searchMenu.addClass(searchMenuActive);
                $(this).parent().addClass(searchBtnParentActive);
                setTimeout(function () {
                    $(".searchbar-menu input.search-field").focus();
                }, 300);
            }
        });

        searchMenuClose.on('click', function (e) {
            closeSearch();
        });

        $document.on('click touchstart', function (e) {
            if (!$(e.target).closest(searchMenu, searchMenuBtn).length) {
                searchMenuBtn.removeClass(searchBtnActive);
                searchMenu.removeClass(searchMenuActive);
                searchMenuBtn.parent().removeClass(searchBtnParentActive);
                e.stopPropagation();
            }
        });

        $('.dropdown--trigger, .cart-sidebar-btn, .user-menu-btn, .menu-mobile-btn').on('click', function (e) {
            closeSearch();
        });
    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //      Sidebar Cart Menu
    //---------------------------------------------------------------------------------------------------------------------------->
    (function () {
        var cartSidebarBtn = $(".cart-sidebar-btn"),
            cartSidebarMenu = $(".cart-sidebar-menu"),
            cartSidebarClose = $('.close-cart-sidebar'),
            cartBtnActive = 'active',
            cartSidebarActive = 'cart-sidebar-open',
            cartBtnParentActive = 'cart-active';

        var openCartSidebar = function () {
            cartSidebarBtn.addClass(cartBtnActive);
            $body.addClass(cartSidebarActive);
            cartSidebarBtn.parent().addClass(cartBtnParentActive);

        };

        var closeCartSidebar = function () {
            $body.removeClass(cartSidebarActive);
            cartSidebarBtn.removeClass(cartBtnActive);
            cartSidebarBtn.parent().removeClass(cartBtnParentActive);

        };

        cartSidebarBtn.on('click', function (e) {
            e.stopPropagation();
            if ($(this).hasClass(cartBtnActive)) {
                $(this).removeClass(cartBtnActive);
                $body.removeClass(cartSidebarActive);
                $(this).parent().removeClass(cartBtnParentActive);

            } else {
                cartSidebarBtn.removeClass(cartBtnActive).parent().removeClass(cartBtnParentActive); $body.removeClass(cartSidebarActive);
                $(this).addClass(cartBtnActive);
                $body.addClass(cartSidebarActive);
                $(this).parent().addClass(cartBtnParentActive);
            }
        });

        cartSidebarClose.on('click', function (e) {
            closeCartSidebar();
        });

        $document.on('click touchstart', function (e) {
            if (!$(e.target).closest(cartSidebarMenu, cartSidebarBtn).length) {
                cartSidebarBtn.removeClass(cartBtnActive);
                $body.removeClass(cartSidebarActive);
                cartSidebarBtn.parent().removeClass(cartBtnParentActive);
                e.stopPropagation();
            }
        });

        $('.dropdown--trigger, .search-menu-btn').on('click', function (e) {
            closeCartSidebar();
        });

    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //      Offer Text Rotator
    //---------------------------------------------------------------------------------------------------------------------------->
    (function () {
        $.fn.extend({
            rotaterator: function (options) {

                var defaults = {
                    fadeSpeed: parseInt(500, 10),
                    pauseSpeed: parseInt(100, 10),
                    child: null
                };

                var options = $.extend(defaults, options);

                return this.each(function () {
                    var o = options;
                    var obj = $(this);
                    var items = $(obj.children(), obj);
                    items.each(function () { $(this).hide(); });
                    if (!o.child) {
                        var next = $(obj).children(':first');
                    } else {
                        var next = o.child;
                    }
                    $(next).fadeIn(o.fadeSpeed, function () {
                        $(next).delay(o.pauseSpeed).fadeOut(o.fadeSpeed, function () {
                            var next = $(this).next();
                            if (next.length == 0) {
                                next = $(obj).children(':first');
                            }
                            $(obj).rotaterator({ child: next, fadeSpeed: o.fadeSpeed, pauseSpeed: o.pauseSpeed });
                        });
                    });
                });
            }
        });

        $document.ready(function () {
            $('.offer-hignlight').rotaterator({
                fadeSpeed: parseInt(500, 10),
                pauseSpeed: parseInt(3000, 10)
            });
        });

    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //      Header Promotion Box
    //---------------------------------------------------------------------------------------------------------------------------->
    (function () {
        $('.promotion-close').on('click', function () {
            $('.promotion-box').slideUp(50, function () {
                $(this).css({ 'display': 'none', 'opacity': '0' });
            });
        });
    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //      Newsletter Popup
    //---------------------------------------------------------------------------------------------------------------------------->
    (function () {
        $document.ready(function () {
            $('#newsletter-popup .newsletter-close, #newsletter-popup .newsletter-close-text').on('click', function () {
                $('#newsletter-popup').fadeOut();
                $('#active-newsletter-popup').fadeOut();
            });

            var visits = $.cookie('visits') || 0;
            visits++;

            $.cookie('visits', visits, { expires: 1, path: '/' });

            //  console.debug($.cookie('visits'));

            if ($.cookie('visits') > parseInt(1, 10)) {
                $('#active-newsletter-popup').hide();
                $('#newsletter-popup').hide();
            } else {
                var pageHeight = $document.height();
                $('<div id="active-newsletter-popup"></div>').appendTo('body');
                $('#active-newsletter-popup').css("height", pageHeight);
                $('#newsletter-popup').show();
            }

            if ($.cookie('noShowWelcome')) { $('#newsletter-popup').hide(); $('#active-newsletter-popup').hide(); }
        });

        $document.on('mouseup', function (e) {
            var container = $('#newsletter-popup');
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.fadeOut();
                $('#active-newsletter-popup').fadeOut();
            }
        });
    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //      Owl Carousel
    //---------------------------------------------------------------------------------------------------------------------------->
    (function () {
        $('.owl-carousel').each(function (index) {
            var owl_carousel = $(this);

            // Header Nav Auto Dark/light Variable
            var ChangeTarget = '#header, .header',
                slideDark = 'dark-slide',
                slideLight = 'light-slide',
                headerDark = 'header--dark',
                headerLight = 'header--light';

            // Header Nav Auto Dark/light changed Events
            owl_carousel.on('initialized.owl.carousel translated.owl.carousel refreshed.owl.carousel', function (event) {
                var slideColor = $('.owl-carousel').find('.owl-item.active .item').attr('data-slide_theme');
                if (slideColor == slideLight) {
                    $(ChangeTarget).addClass(headerLight).removeClass(headerDark);
                }
                if (slideColor == slideDark) {
                    $(ChangeTarget).addClass(headerDark).removeClass(headerLight);
                }
            });

            // Navigation
            if (owl_carousel.attr('data-nav') === 'true') {
                var arrows = true;
            } else {
                var arrows = false;
            }
            // Pagination
            if (owl_carousel.attr('data-dots') === 'true') {
                var pagination = true;
            } else {
                var pagination = false;
            }


            // Intro Slider
            var introSlider1 = $('.intro_slider1');
            introSlider1.owlCarousel({
                nav: arrows,
                dots: pagination,
                navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                margin: 0,
                items: 1,
                singleItem: true,
                stagePadding: 0,
                smartSpeed: 200,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                loop: true,
                autoHeight: true,
                responsive: {
                    0: {
                        nav: false,
                        dots: true
                    },
                    768: {
                        nav: false,
                        dots: true
                    },
                    992: {
                        nav: true,
                        dots: false
                    }
                }
            });

            //Product Item 5
            $('.product-item-5').owlCarousel({
                items: 5,
                loop: false,
                margin: 30,
                autoplay: false,
                autoplayHoverPause: true,
                singleItem: true,
                dots: false,
                nav: true,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: { items: 1 },
                    320: { items: 1 },
                    480: { items: 2 },
                    775: { items: 3 },
                    991: { items: 4 },
                    1170: { items: 5 }
                }
            });

            //Product Item 4
            $('.product-item-4').owlCarousel({
                items: 4,
                loop: false,
                margin: 30,
                autoplay: false,
                autoplayHoverPause: true,
                singleItem: true,
                dots: false,
                nav: true,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: { items: 1 },
                    320: { items: 1 },
                    480: { items: 2 },
                    775: { items: 2 },
                    991: { items: 3 },
                    1170: { items: 4 }
                }
            });

            //Product Item 3
            $('.product-item-3').owlCarousel({
                items: 3,
                loop: false,
                margin: 30,
                autoplay: false,
                autoplayHoverPause: true,
                singleItem: true,
                dots: false,
                nav: true,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: { items: 1 },
                    480: { items: 1 },
                    775: { items: 2 },
                    991: { items: 3 },
                    1170: { items: 3 }
                }
            });

            //Product Item 2
            $('.product-item-2').owlCarousel({
                items: 2,
                loop: false,
                margin: 30,
                autoplay: false,
                autoplayHoverPause: true,
                singleItem: true,
                dots: false,
                nav: true,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: { items: 1 },
                    480: { items: 1 },
                    775: { items: 2 },
                    991: { items: 2 },
                    1170: { items: 2 }
                }
            });

            //Product Item 1
            $('.product-item-1').owlCarousel({
                items: 1,
                loop: false,
                margin: 30,
                autoplay: false,
                autoplayHoverPause: true,
                singleItem: true,
                dots: true,
                nav: true,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: { items: 1 },
                    480: { items: 1 },
                    775: { items: 1 },
                    991: { items: 1 },
                    1170: { items: 1 }
                }
            });

            //Review Slider
            $('.review-slider').owlCarousel({
                items: 5,
                loop: true,
                margin: 30,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                singleItem: true,
                autoHeight: true,
                dots: false,
                nav: false,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: { items: 1 },
                    580: { items: 2 },
                    991: { items: 3 },
                    1140: { items: 4 },
                    1450: { items: 5 }
                }
            });

            //Testimonials Slider
            $('.testimonials-slider').owlCarousel({
                items: 1,
                loop: true,
                margin: 0,
                slideSpeed: 300,
                autoplay: true,
                autoplayHoverPause: true,
                autoHeight: true,
                singleItem: true,
                dots: true,
                nav: false,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                animateIn: 'fadeIn',
                animateOut: 'fadeOut'

            });

            // Blog Slider
            $('.blog-slider').owlCarousel({
                items: 4,
                loop: false,
                margin: 30,
                autoplay: false,
                autoplayHoverPause: true,
                singleItem: true,
                dots: false,
                nav: true,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: { items: 1 },
                    480: { items: 1 },
                    775: { items: 2 },
                    991: { items: 3 },
                    1170: { items: 3 }
                }
            });

            //Brand Logo Slider
            $('.brand-logo-slider').owlCarousel({
                items: 7,
                loop: true,
                margin: 0,
                autoplay: true,
                autoplayHoverPause: true,
                dots: false,
                nav: false,
                singleItem: true,
                transitionStyle: true,
                responsive: {
                    0: { items: 1 },
                    250: { items: 1 },
                    320: { items: 2 },
                    550: { items: 3 },
                    775: { items: 4 },
                    991: { items: 6 },
                    1170: { items: 6 }
                }
            });

            //Instagram Slider
            $('.instagram-slider').owlCarousel({
                items: 5,
                loop: true,
                margin: 0,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                singleItem: true,
                autoHeight: true,
                dots: false,
                nav: false,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: { items: 1 },
                    580: { items: 2 },
                    991: { items: 3 },
                    1140: { items: 4 },
                    1450: { items: 5 }
                }
            });

            //Product page image slider
            $document.ready(function () {
                if ($window.width() < parseInt(992, 10)) {
                    startCarousel();
                } else {
                    $('.owl-product-gallery-slider').addClass('off');

                }
                addRemoveClass();
            });

            $window.on('resize', function () {
                if ($window.width() < parseInt(992, 10)) {
                    startCarousel();
                } else {
                    stopCarousel();
                }
                addRemoveClass();
            });

            function addRemoveClass() {
                if ($window.width() < parseInt(992, 10)) {
                    $('.owl-product-gallery-slider').addClass('owl-carousel owl-theme');
                } else {
                    $('.owl-product-gallery-slider').removeClass('owl-carousel owl-theme');
                }
            }

            function startCarousel() {
                $('.owl-product-gallery-slider').owlCarousel({
                    navigation: true, // Show next and prev buttons
                    slideSpeed: 500,
                    margin: 0,
                    paginationSpeed: 400,
                    autoplay: true,
                    autoHeight: true,
                    items: 1,
                    singleItem: true,
                    itemsDesktop: false,
                    itemsDesktopSmall: false,
                    itemsTablet: false,
                    itemsMobile: false,
                    loop: true,
                    dots: false,
                    nav: true,
                    navText: [
                        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                        '<i class="fa fa-angle-right" aria-hidden="true"></i>']
                });
            }
            function stopCarousel() {
                var owl = $('.owl-product-gallery-slider');
                owl.trigger('destroy.owl.carousel');
                owl.addClass('off');
            }

            // All Default Carousel
            owl_carousel.owlCarousel();

        });
    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //      Slick Slider
    //---------------------------------------------------------------------------------------------------------------------------->
    (function () {
        //Product page image slider with thumb (Slick Slider)
        var $sync1 = $(".product-media-slider"),
            $sync2 = $(".product-media-thumb-slider");


        if ($sync2.hasClass('thumb-vertical-slider')) {
            var sliderMode = true;
        } else {
            var sliderMode = false;
        }

        if ($sync2.hasClass('thumb-vertical-slider')) {
            var showSlide = 5;
        } else {
            var showSlide = 6;
        }

        $sync1.slick({
            dots: false,
            fade: true,
            cssEase: 'linear',
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true,
            asNavFor: $sync2,
            infinite: true,
            nextArrow: '<i class="fa fa-angle-right slick-next"></i>',
            prevArrow: '<i class="fa fa-angle-left slick-prev"></i>',
        });
        $sync2.slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            lazyLoad: 'ondemand',
            asNavFor: $sync1,
            vertical: sliderMode,
            dots: false,
            centerMode: false,
            adaptiveHeight: true,
            infinite: false,
            focusOnSelect: true,
            nextArrow: '<i class="fa fa-angle-right slick-next"></i>',
            prevArrow: '<i class="fa fa-angle-left slick-prev"></i>',

        });

        // Remove active class from all thumbnail slides
        $('.product-media-thumb-slider .slick-slide').removeClass('slick-active');

        // Set active class to first thumbnail slides
        $('.product-media-thumb-slider .slick-slide').eq(0).addClass('slick-active');

        // On before slide change match active thumbnail to current slide
        $sync1.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var mySlideNumber = nextSlide;
            $('.product-media-thumb-slider .slick-slide').removeClass('slick-active');
            $('.product-media-thumb-slider .slick-slide').eq(mySlideNumber).addClass('slick-active');
        });

    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //      Background Image
    //---------------------------------------------------------------------------------------------------------------------------->
    (function () {
        $('.background-image').each(function () {
            var bgSrc = $(this).attr('data-background');
            var bgPositionX = $(this).attr('data-bg-posX');
            var bgPositionY = $(this).attr('data-bg-posY');
            $(this).css('background-image', 'url("' + bgSrc + '")').css('background-position-x', bgPositionX).css('background-position-y', bgPositionY);
        });
    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //      Inner Page All Elements
    //---------------------------------------------------------------------------------------------------------------------------->
    //Product Filter Dropdown
    (function () {
        var filterMenuBtn = $(".filter-menu-btn"),
            filterMenu = $(".filterbar-dropdown-menu"),
            filterMenuClose = $('.filter-close-icon'),
            filterBtnActive = 'active',
            filterMenuActive = 'filter-dropdown-menu-open',
            filterBtnParentActive = 'filter-active';

        var openFilter = function () {
            filterMenuBtn.addClass(filterBtnActive);
            filterMenu.addClass(filterMenuActive);
            filterMenuBtn.parent().addClass(filterBtnParentActive);
        };

        var closeFilter = function () {
            filterMenu.removeClass(filterMenuActive);
            filterMenuBtn.removeClass(filterBtnActive);
            filterMenuBtn.parent().removeClass(filterBtnParentActive);
        };

        filterMenuBtn.on('click', function (e) {
            e.stopPropagation();
            if ($(this).hasClass(filterBtnActive)) {
                $(this).removeClass(filterBtnActive);
                filterMenu.removeClass(filterMenuActive);
                $(this).parent().removeClass(filterBtnParentActive);
            } else {
                filterMenuBtn.removeClass(filterBtnActive).parent().removeClass(filterBtnParentActive); filterMenu.removeClass(filterMenuActive);
                $(this).addClass(filterBtnActive);
                filterMenu.addClass(filterMenuActive);
                $(this).parent().addClass(filterBtnParentActive);
            }
        });

        filterMenuClose.on('click', function (e) {
            closeFilter();
        });
    })();

    // Product Grid / List View
    (function () {
        var productListBtn = $('.product-list-switcher');
        var productGridBtn = $('.product-grid-switcher');
        var productItemsWrap = $('.product-list-item');

        productListBtn.on('click', function (event) {
            event.preventDefault();
            productItemsWrap.addClass('product-list-view');
            productListBtn.addClass('product-view-icon-active');
            productGridBtn.removeClass('product-view-icon-active');
        });
        productGridBtn.on('click', function (event) {
            event.preventDefault();
            productItemsWrap.removeClass('product-list-view');
            productListBtn.removeClass('product-view-icon-active');
            productGridBtn.addClass('product-view-icon-active');
        });
    })();

    // Price Range Slider
    (function () {
        $(".price-range-slider").slider({
            range: true,
            min: 0,
            max: 500,
            values: [0, 400],
            slide: function (event, ui) {
                $(".price-range-from-to").html("Price : <span class='from'>$" + ui.values[0] + "</span> &mdash; <span class='to'>$" + ui.values[1]);
                $(".price_range_min").val(ui.values[0]);
                $(".price_range_max").val(ui.values[1]);
            }
        });
        $(".price-range-from-to").html("Price : <span class='from'>$" + $(".price-range-slider").slider("values", 0) + "</span> &mdash; <span class='to'>$" + $(".price-range-slider").slider("values", 1) + "</span>");
        $(".price_range_min").val($(".price-range-slider").slider("values", 0));
        $(".price_range_max").val($(".price-range-slider").slider("values", 1));
    })();

    // Select Color
    (function () {
        $document.ready(function () {
            $('.product-color-choose input[type="radio"]').on('change.symptom', function () {
                $(this).toggleClass('active', this.checked);
                $(this).closest('input').toggleClass('active', this.checked);
            }).trigger('change.symptom');
        });

        $('.product-color-choose input').on('click', function () {
            var color = $(this).attr('data-image');
            $('.product-color-choose .active').removeClass('active');
            $('.left-column img[data-image = ' + color + ']').addClass('active');
            $(this).addClass('active');
        });

    })();

    // Select Size
    (function () {
        $document.ready(function () {
            $('.product-select-size input[type="checkbox"]').on('change.symptom', function () {
                $(this).parent().toggleClass('active', this.checked);
                $(this).closest('input').toggleClass('active', this.checked);
            }).trigger('change.symptom');
        });

        $('.product-select-size label').on('click', function () {
            var $box = $(this).find('input');
            if ($box.is(":checked")) {
                var group = $("input:checkbox[name='" + $box.attr("name") + "']");

                $(group).prop("checked", false);
                $(group).removeClass('active');
                $(group).parent().removeClass('active');
                $box.prop("checked", true);
                $box.addClass('active');
                $box.parent().addClass('active');
            } else {
                $box.prop("checked", false);
                $box.removeClass('active');
                $box.parent().removeClass('active');
            }
        });

        $('.product-select-size input[disabled]').parent().addClass('disabled');
        $('.product-select-size input[disabled]').addClass('disabled');
    })();

    // Review Star Active
    (function () {
        $('.comment-form .stars a').on('click', function () {
            $('.comment-form .stars .active').removeClass('active');
            $(this).addClass('active');
        });
    })();

    // Product Quantity
    (function () {
        var qty_min = $('.quantity').attr("min");
        var qty_max = $('.quantity').attr("max");

        $(".quantityPlus").on('click', function () {
            var currentVal = parseInt($(this).prev(".quantity").val(), 10);
            var str = $("p:first").text();
            if (currentVal != parseInt(qty_max, 10)) {
                $(this).prev(".quantity").val(currentVal + 1);
            }
        });

        $(".quantityMinus").on('click', function () {
            var currentVal = parseInt($(this).next(".quantity").val(), 10);
            if (currentVal != parseInt(qty_min, 10)) {
                $(this).next(".quantity").val(currentVal - 1);
            }
        });
    })();

    // Accordian
    (function () {
        $('.widget_nav_menu .menu > li:has( > ul )').addClass('main-accordionIcon');
        $('.widget_nav_menu .menu > li:has( > ul ) > a').after("<span class='jq-accordionIcon'></span>");
        $('.widget_nav_menu .menu > li li:has( > ul ) > a').after("<span class='jq-accordionIcon'></span>");

        /* Accordian Sub Childern "ul" Hide */
        $('.widget_nav_menu .menu li ul').hide();

        /* Accordian */
        $('.widget_nav_menu .menu li .jq-accordionIcon').on('click', function (e) {
            $('.widget_nav_menu .menu li a').each(function (i) {
                if ($(this).next().next().is("ul") && $(this).next().next().is(":visible")) {
                    if ($(this).next().next().is("ul.sub-menu") && $(this).next().next().is(":hidden")) {
                        $(this).next().slideUp();
                    }
                }
            });

            $(".widget_nav_menu .menu ul ul").slideUp();

            var e = $(this);
            if (e.next().is("ul") && e.next().is(":visible")) {
                e.next().slideUp();
            }
            else {
                if ($('.widget_nav_menu .menu > li:has( > ul )').hasClass("main-accordionIcon is-active")) {
                    if ($(this).closest('.main-accordionIcon.is-active').children('.jq-accordionIcon').next().is(":visible")) {
                    } else {
                        $('.widget_nav_menu .menu > li.main-accordionIcon.is-active').find('> ul').slideUp();
                        $('.widget_nav_menu .menu > li.main-accordionIcon.is-active').removeClass('is-active');
                    }
                }
                e.next().slideDown();
            }
        });

        /* Accordian Icon */
        var accordionHeader = $('.widget_nav_menu .menu ul > li > .jq-accordionIcon');
        $('.widget_nav_menu .menu li .jq-accordionIcon').on('click', function (e) {
            if ($(this).parent('li').hasClass('is-active')) {
                $(this).parent('li').removeClass('is-active');
            }
            else {
                /* close other content */
                $(accordionHeader).parent('li').not(this).removeClass('is-active');
                $(this).parent('li').addClass('is-active');
            }
        });

    })();

    // Sticky Sidebar
    (function () {
        if ($('.product-gallery-style3').length) {
            var sidebar = new StickySidebar('.product-page-content', {
                containerSelector: '.product-gallery-style3',
                topSpacing: 90,
                bottomSpacing: 20,
                minWidth: 992
            });
        }
    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //      Elements
    //---------------------------------------------------------------------------------------------------------------------------->

    // Tooltip --------------------------------------------------------
    (function () {
        $('[data-toggle="tooltip"]').tooltip();
    })();

    // Countdown ------------------------------------------------------
    (function () {
        $('[data-countdown]').each(function () {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function (event) {
                $this.html(event.strftime(
                    '<div><span class="days">%D</span>Days</div>' + '<div><span>%H</span>Hours</div>' + '<div><span>%M</span>Minutes</div>' + '<div><span>%S</span>Second</div>'
                ));
            });
        });
        $('[data-countdown]').on('finish.countdown', function (event) {
            $(this).html('<div><span>This offer has expired!</span></div>')
              .addClass('disabled').css('color', '#fd6262 ');
        });
    })();

    // Popup -----------------------------------------------------------
    (function () {
        // Video popup (youtube, vimeo), map popup, iframe popup,
        $('.popup-youtube, .popup-vimeo, .popup-gmaps, .video-popup').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        // Mfp Gallery Popup
        $('.mfp-gallery-popup').magnificPopup({
            delegate: '.mfp-gallery-popup-link',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            closeOnContentClick: false,
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function (item) {
                    return item.el.attr('title');
                }
            }
        });

        // Mfp Link Popup
        $('.mfp-link-popup').magnificPopup({
            type: 'image'
        });

        // Instagram Popup
        $('.insta-gallery').magnificPopup({
            type: 'image',
            delegate: 'a',
            gallery: {
                enabled: true
            }
        });
    })();

    // Instafeed ------------------------------------------------------------
    (function () {
        //Feed Grid with Popup
        var userFeed = new Instafeed({
            get: 'user',
            userId: '8501123171',
            limit: 8,
            resolution: 'standard_resolution',
            accessToken: '8501123171.1677ed0.8cd3d7bae6b24d72b8c4ad4f5f2553d3',
            sortBy: 'most-recent',
            template: '<div class="col-sm-6 col-md-4 col-lg-3 instaimg nf-grid-item"><a href="{{image}}" title="{{caption}}" target="_blank"><div class="img-featured-container"><div class="img-backdrop"></div><div class="description-container"><p class="caption">{{caption}}</p><span class="likes"><i class="fa fa-heart"></i> {{likes}}</span><span class="comments"><i class="fa fa-comment"></i> {{comments}}</span></div><img src="{{image}}" alt="{{caption}}" class="img-responsive"></div></a></div>',
            target: "instagram-feed",
            after: function () {
                // disable button if no more results to load
                if (!this.hasNext()) {
                    btnInstafeedLoad.setAttribute('disabled', 'disabled');
                }
            },
        });
        if ($('#instagram-feed').length) {
            userFeed.run();
            var btnInstafeedLoad = document.getElementById("instafeed-load-btn");
            btnInstafeedLoad.addEventListener("click", function () {
                userFeed.next();
            });
        }

        //Feed Grid with link
        var userFeed2 = new Instafeed({
            get: 'user',
            userId: '8501123171',
            limit: 6,
            resolution: 'standard_resolution',
            accessToken: '8501123171.1677ed0.8cd3d7bae6b24d72b8c4ad4f5f2553d3',
            sortBy: 'most-recent',
            template: '<div class="col-sm-6 col-md-4 col-lg-2 instaimg nf-grid-item"><a href="{{link}}" title="{{caption}}" target="_blank"><div class="img-featured-container"><div class="img-backdrop"></div><div class="description-container"><p class="caption">{{caption}}</p><span class="likes"><i class="fa fa-heart"></i> {{likes}}</span><span class="comments"><i class="fa fa-comment"></i> {{comments}}</span></div><img src="{{image}}" alt="{{caption}}" class="img-responsive"></div></a></div>',
            target: "instagram-feed_2",
        });
        if ($('#instagram-feed_2').length) {
            userFeed2.run();
        }
    })();

    // Tabs -------------------------------------------------------------
    (function () {
        //Tabs With Owl Slider
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($(e.target).attr('href'))
                .find('.owl-carousel')
                .owlCarousel('invalidate', 'width')
                .owlCarousel('update');
        });

    })();

    // Isotop Grid -------------------------------------------------------------
    (function () {
        //Product Detail Page Product Grid
        var productGalleryGrid = document.querySelector('.product-gallery-grid');
        if ($(productGalleryGrid).length) {
            var productIsoGridEle = new Isotope(productGalleryGrid, {
                layoutMode: 'fitRows',
                itemSelector: '.product-gallery-image'
            });
        }

        //Blog Page Masonry Grid
        var blogMasonry = document.querySelector('.blog-masonry-wrap');
        if ($(blogMasonry).length) {
            var blogMasonryEle = new Isotope(blogMasonry, {
                itemSelector: '.blog-item-grid',
                percentPosition: true,
                masonry: {
                    columnWidth: '.blog-item-grid',
                    horizontalOrder: false
                },
            });
        }

        //Portfolio Page Masonry Grid
        var portfolioMasonry = document.querySelector('.portfolio-masonry');
        if ($(portfolioMasonry).length) {
            var portfolioMasonryEle = new Isotope(portfolioMasonry, {
                itemSelector: '.portfolio-item-grid',
                percentPosition: true,
                masonry: {
                    columnWidth: '.portfolio-item-grid.col-lg-6, .portfolio-grid-sizer',
                    horizontalOrder: false
                }
            });
        }

        //Product Detail Page Product Grid
        var portfolioGrid = document.querySelector('.portfolio-grid');
        if ($(portfolioGrid).length) {
            var portfolioGridEle = new Isotope(portfolioGrid, {
                layoutMode: 'fitRows',
                itemSelector: '.portfolio-item-grid'
            });
        }

    })();

    //---------------------------------------------------------------------------------------------------------------------------->
    //    Map
    //---------------------------------------------------------------------------------------------------------------------------->
    (function () {
        if ($('#my-map').length) {
            $('#my-map').gMap({
                latitude: 21.170240,
                longitude: 72.831061,
                maptype: 'ROADMAP',
                zoom: 13,
                markers: [
                    {
                        latitude: 21.170240,
                        longitude: 72.831061,
                        html: '<div style="width: 200px;"><h6 style="margin-bottom: 5px;">Mazaar Shop</h6><div style="margin-bottom:5px;"><span style="margin-bottom:5px; display:block;">29 Shadow Brook Court Warwick, RI 02886,</span><span><strong>hello@Mazzar.com</strong></span></div></div></div>',
                        popup: false,
                        icon: {
                            image: "img/map-marker.png",
                            iconsize: [56, 65],
                            iconanchor: [30, 60]
                        }
                    }
                ],
                doubleclickzoom: true,
                controls: {
                    panControl: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    scaleControl: false,
                    streetViewControl: false,
                    overviewMapControl: false
                }
            });
        }
    })();

})(jQuery);
