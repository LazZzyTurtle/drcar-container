(function ($) {

    "use strict";

    var $document = $(document),
            $window = $(window),
            plugins = {
                mainSlider: $('#mainSlider'),
                slideNav: $('#slide-nav'),
                categoryCarousel: $('.category-carousel'),
                servicesCarousel: $('.services-carousel'),
                servicesAltCarousel: $('.services-alt'),
                howWorksCarousel: $('.how-works-carousel'),
                testimonialsCarousel: $('.testimonials-carousel'),
                servicesBlockAlt: $('.services-block-alt'),
                textIconCarousel: $('.text-icon-carousel'),
                personCarousel: $('.person-carousel'),
                submenu: $('[data-submenu]'),
                googleMapFooter: $('#footer-map'),
                rtltrue: jQuery('body').hasClass('rtl'),
                counter: $('.product-total-box'),
                isotopeGallery: $('.gallery-isotope'),
                postGallery: $('.blog-isotope'),
                postCarousel: $('.post-carousel'),
                prdCarousel: $('.prd-carousel'),
                postMoreLink: $('.view-more-post'),
                testimonialMoreLink: $('.view-more-testimonial'),
                getQuoteLink: $('.form-popup-link'),

                pricingCarousel: $('.pricing-carousel'), // new version

                animation: $('.animation'),
                stickyHeader: $("header.sticky"),
                scrollTabs: $('.services-tabs-nav'),
                dropMenu: $('.dropdown-menu')

            },
            $shiftMenu = $('#slidemenu, #pageContent, #mainSliderWrapper, .page-footer, .page-header .header-row, body, .darkout-menu, .header-info-mobile'),
            $navbarToggle = $('.navbar-toggle'),
            $dropdown = $('.dropdown-submenu, .dropdown'),
            $fullHeight = $('body:not(.layout-2) #mainSlider, body:not(.layout-2) #mainSlider .img--holder'),
            $maxFullHeight = $('body.layout-2 #mainSlider, body.layout-2 #mainSlider .img--holder'),
            $marginTop = $('body.fixedSlider #pageContent'),
            $marginBottom = $('body.fixedFooter #pageContent');


    /* ---------------------------------------------
     Header Search
     --------------------------------------------- */
    $document.ready(function () {
        var windowWidth = window.innerWidth || $window.width();
        if (windowWidth < 768 ) {
            $('#slidemenu .main-menu-item').on('click',function(){
                if($(this).find('a').attr('href').charAt(0)=='#')
                    jQuery('.close-menu').click();
            })
        }
        var windowWidth = window.innerWidth || $window.width();
        if (windowWidth < 1025 ) {
            $(".search-form button[type='submit']").on("click", function (e) {
                e.preventDefault()
                if ($('.search-form .search-field').is(':visible') && $('.search-form .search-field').val() != '') {
                    $('.search-form').submit();
                } else {
                    $('.search-form .search-field').show();
                }
                return false
            });
        }

        // view all brands
        $('.js-view-all-brands').on('click', function (e) {
            var $this = $(this),
                    $grid = $this.closest('.block').find('.brands-grid');
            $this.toggleClass('active');
            $grid.toggleClass('visible');
            e.preventDefault();
        })

        // steps animation
        $.fn.addClassDelay = function (className, delay, index) {
            var $addClassDelayElement = $(this), $addClassName = className,
                    i = index;
            setTimeout(function () {
                $('#stepsAnimation').find('.step').each(function (index) {
                    $(this).removeClass('step-animate').removeClass('step-animate-start');
                })
                $addClassDelayElement.addClass($addClassName);
                if (i == 3) {
                    $('#stepsAnimation').find('.step').first().addClass('step-animate-start');
                    animateSteps(3000);
                }
            }, delay);
        };
        function animateSteps(delay) {
            $('#stepsAnimation').find('.step').each(function (index) {
                $(this).addClassDelay('step-animate', (index + 1) * delay, index);
            });
        }
        animateSteps(3000);

    });

    /* ---------------------------------------------
    Scripts initialization
     --------------------------------------------- */
    $document.ready(function () {
        var windowWidth = window.innerWidth || $window.width();
        var windowH = $window.height();

        // detect touch
        if ('ontouchstart' in window || navigator.msMaxTouchPoints) {
            $('body').addClass('touch');
        }

        // detect IOS
        if (['iPad', 'iPhone', 'iPod'].indexOf(navigator.platform) >= 0) {
            $('body').addClass('is-ios');
        }


        // set fullheigth
        if (windowWidth < 992) {
            $fullHeight.height('');
        } else {
            var windowHeight = $window.height();
            var footerHeight = $('.page-footer').height();
            $fullHeight.height(windowHeight);
            $marginTop.css({
                'margin-top': windowHeight + 'px'
            });
            $marginBottom.css({
                'margin-bottom': footerHeight + 'px'
            })
        }


		// layout 03 start

		$('.panel-heading').on('click', function () {
			if ($(this).hasClass('active')) {
				$(this).removeClass('active');
			} else {
				$('.panel-heading').removeClass('active');
				$(this).addClass('active');
			}
		});
		$('.js-estimator-panel-toggle').on('click', function () {
			$('.estimator-form-row').toggleClass('open');
			$(this).toggleClass('open');
		})

		// layout 03 end



        // set slider max height
        function sliderMaxHeight(maxFullHeight){
            var h = $window.height()-$('header').height();
            maxFullHeight.css({'max-height':h});
        }
        sliderMaxHeight($maxFullHeight);


        // scroll tabs
        if (plugins.scrollTabs.length) {
            plugins.scrollTabs.scrollingTabs({
                disableScrollArrowsOnFullyScrolled: true
            });
        }

        function servicesTabs() {

            $('.services-tabs-nav a').on('click', function (e) {
                var $this = $(this),
                        $icon = $('.services-tabs .' + $this.data('icon'));
                    console.log($icon);
                $this.parent('li').siblings().removeClass('active');
                $this.parent('li').addClass('active');
                $icon.siblings().removeClass('active');
                $icon.addClass('active');
                $('.services-tabs-content-bg-wrap').animate({
                    scrollLeft: -$('.services-tabs-content-bg').offset().left + $icon.offset().left - 200
                }, 300);
                e.preventDefault();
            })

            $('.services-tabs-icon').on('click', function (e) {


                var $this = $(this);
                var classList = $this.attr('class').split(/\s+/);
                var $data_a = classList[1];
                var $icon =  classList[0].replace('-icon', '');
                $icon = $('.'+ $icon + ' .'+$data_a);
                var $tabs = $('*[data-icon="'+$data_a+'"]')                
                $tabs.parent('li').siblings().removeClass('active');
                $tabs.parent('li').addClass('active');
                $icon.siblings().removeClass('active');
                $icon.addClass('active');
                $('.services-tabs-content-bg-wrap').animate({
                    scrollLeft: -$('.services-tabs-content-bg').offset().left + $this.offset().left - 200
                }, 300);
                e.preventDefault();
            })




            $('.services-tabs-nav li:first-child').find('a').trigger('click');
        }
        servicesTabs();

        $.fn.xfoxSlider = function (n) {
            var a, i, o, t = $.extend({speed: 5e3}, n);
            function e(n) {
                n.each(function () {
                    var n = $(this), a = n.data("delay"), i = n.data("animate-start");
                    n.css({"animation-delay": a + "ms", "-webkit-animation-delay": a + "ms"}), n.addClass("animated " + i).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
                        n.removeClass(i)
                    })
                })
            }
            a = this, i = t.speed, (o = $(a)).on("init", function (n, a, i) {
                e($(".testimonials-item2:nth-child(2)").find("[data-animate-start]"))
            }), o.on("afterChange", function (n, a, i) {
                e($('[data-slick-index="' + i + '"]', o).find("[data-animate-start]"))
            }), o.on("beforeChange", function (n, a, i, t) {
                var e = $('[data-slick-index="' + i + '"]', o).find("[data-animate-end]");
                e.each(function () {
                    var n = $(this), a = n.data("animate-end");
                    n.css({"animation-delay": "", "-webkit-animation-delay": ""}), n.addClass(a).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
                        n.removeClass(a).removeClass("animated")
                    })
                })
            }), o.slick({slidesToShow: 1, slidesToScroll: 1, infinite: !0, autoplay: !0, autoplaySpeed: i, arrows: !0, dots: !1, fade: !1, speed: 1e3, responsive: [{breakpoint: 1200, settings: {arrows: !1, dots: !0}}]})
        };
        $('.testimonials-carousel2').xfoxSlider({
            speed: 5000
        });

        $.fn.dropMenu = function () {
            var $drop = this,
                    $body = $('body');
            $('li', $drop).on('mouseenter', function () {
                if ($('ul', this).length) {
                    var $elm = $('ul:first', this),
                            off = $elm.offset(),
                            isInside = (off.left + $elm.width() <= $body.width());
                    if (!isInside) {
                        $elm.addClass('posRight');
                    } else {
                        $elm.removeClass('posRight');
                    }
                }
            }).on('mouseleave', function () {
                if ($('ul', this).length) {
                    var $elm = $('ul:first', this);
                    setTimeout(function () {
                        $elm.removeClass('posRight');
                    }, 200);
                }
            })
        }

        // Slide mobile info
        function slideMobileInfo(toggle, slide) {
            var $toggle = $(toggle),
                    $slide = $(slide);
            $toggle.on("click", function (e) {
                $(this).toggleClass('open');
                $slide.slideToggle(300).toggleClass('open');
            })
        }
        slideMobileInfo('.header-info-toggle', '.header-info-mobile');

        // Back to top
        function backToTop(button) {
            var $button = $(button);
            $(window).on('scroll', function () {
                if ($(window).scrollTop() >= (($(document).height() - $(window).height()) - 100)) {
                    $button.css({'bottom': ''})
                } else {
                    $button.css({'bottom': '15px'})
                }
                if ($(this).scrollTop() >= 500) {
                    $button.addClass('visible');
                } else {
                    $button.removeClass('visible');
                }
            });
            $button.on('click', function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 1000);
            });
        }

        backToTop('.back-to-top');


        // vertical tabs
        $("div.vertical-tab-menu>div.list-group>a").on('click', function (e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.vertical-tab>div.vertical-tab-content").removeClass("active");
            $("div.vertical-tab>div.vertical-tab-content").eq(index).addClass("active");
        });

        // collapsed text
        $(".view-more-link").on('click', function (e) {
            var $this = $(this);
            var $target = $($this.attr('href'));
            var windowWidth = $window.width();
            if ($this.hasClass('opened')) {
                $this.removeClass('opened');
                if (windowWidth < 768) {
                    $('.view-more-mobile').stop(true, true).fadeOut();
                } else {
                    $('.view-more-tablet').stop(true, true).fadeOut();
                }
            } else {
                $this.addClass('opened');
                if (windowWidth < 768) {
                    $('.view-more-mobile').stop(true, true).fadeIn();
                } else {
                    $('.view-more-tablet').stop(true, true).fadeIn();
                }
            }
            e.preventDefault();
        })

        if (plugins.getQuoteLink.length) {
            plugins.getQuoteLink.on('click', function (e) {
                var $popup = $(this).next();
                var diff = $(window).width() - $popup.offset().left - $popup.width();
                if (diff < 0) {
                    $popup.css({
                        'margin-left': -$popup.width() * .5 + diff - 10
                    })
                }
                if ($popup.offset().left < 0) {
                    $popup.css({
                        'margin-left': -$popup.width() * .5 - $popup.offset().left + 10
                    })
                }
                $popup.toggleClass('opened');
                e.preventDefault();
            })
            $('.form-popup-close').on('click', function (e) {
                var $popup = $(this).closest('.form-popup');
                $popup.toggleClass('opened');
                $popup.css({
                    'margin-left': ''
                })
                e.preventDefault();
            })
            $(document).on('click', function (event) {
                if (!$(event.target).closest('.form-popup-wrap').length) {
                    if ($('.form-popup').hasClass("opened")) {
                        $('.form-popup').removeClass('opened');
                    }
                }
            })
        }


        // image animation in modal (appointment form)
        $('header .appointment').on('click', function () {
            if ($(this).attr('href') != '#') {
            } else {
                $('html').css({
                    'overflow-y': 'hidden'
                });
                $('.page-header, #mainSliderWrapper').css({
                    'padding-right': getScrollbarWidth() + 'px'
                });
            }
        })
        $('.modal').on('shown.bs.modal', function () {
            var $el = $('.animate', $(this));
            doAnimations($el);
        }).on('hidden.bs.modal', function () {
            var $el = $('.animate', $(this));
            $el.addClass('animation');
            $('html').css({
                'overflow-y': ''
            })
            $('.page-header, #mainSliderWrapper').css({
                'padding-right': ''
            });
        })
        $(document).on('click', '#btn_save_and_close', function () {
            PrintElem('modal-coupon')
        })
        function PrintElem(elem)
        {
            var mywindow = window.open('', 'PRINT', 'height=400,width=550');
            mywindow.document.write('<html><head>');
            mywindow.document.write('<title>coupon</title>');
            mywindow.document.write('<style type="text/css">');
            mywindow.document.write('.coupon-print{padding:7px;margin-top:35px;position:relative;font-size:16px;line-height:20px;}');
            mywindow.document.write('.coupon-print {border: 1px dashed #000;padding:15px;}');
            mywindow.document.write('.coupon-print-inside {border: 1px solid #fede00;padding:20px;}');
            mywindow.document.write('.coupon-print-row-top, .coupon-print-row-bot {display: -webkit-flex;display: -moz-flex;display: -ms-flex;display: -o-flex;display: -ms-flexbox;display: flex;-webkit-align-items: center;-ms-flex-align: center;align-items: center;width: 100%;-webkit-justify-content: space-between;-ms-flex-pack: justify;justify-content: space-between;}');
            mywindow.document.write('.coupon-print-row-top {padding: 0 0 20px;}');
            mywindow.document.write('.coupon-print-row-bot {padding: 10px 0 0;}');
            mywindow.document.write('.coupon-print-col-left {float: left;width: 55%;}');
            mywindow.document.write('.coupon-print-col-right {float: right;width: 42%;text-align: right;}');
            mywindow.document.write('</style>');
            mywindow.document.write('</head><body>');
            mywindow.document.write(document.getElementById(elem).innerHTML);
            mywindow.document.write('</body></html>');
            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/
            mywindow.print();
            setTimeout(function(){  mywindow.close(); }, 1000);
            return true;
        }
        // main slider
        $(window).load(function() {
        if (plugins.mainSlider.length) {
            var $el = plugins.mainSlider;
            $el.on('init', function (e, slick) {
                var $firstAnimatingElements = $('div.slide:first-child').find('[data-animation]');
                doAnimations($firstAnimatingElements);
            });
            $el.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
                var $currentSlide = $('div.slide[data-slick-index="' + nextSlide + '"]');
                var $animatingElements = $currentSlide.find('[data-animation]');
                setTimeout(function () {
                    $('div.slide').removeClass('slidein');
                }, 500);
                setTimeout(function () {
                    $currentSlide.addClass('slidein');
                }, 1000);
                doAnimations($animatingElements);
            });
            $el.slick({

                arrows: JSON.parse(ajax_slickslider.arrows),
                dots: JSON.parse(ajax_slickslider.dots),
                autoplay: JSON.parse(ajax_slickslider.autoplay),
                autoplaySpeed: parseInt(ajax_slickslider.autoplay_speed),
                fade: JSON.parse(ajax_slickslider.fade),
                speed: parseInt(ajax_slickslider.speed),
                rtl: plugins.rtltrue,
                pauseOnHover: JSON.parse(ajax_slickslider.pause_on_hover),
                pauseOnDotsHover: JSON.parse(ajax_slickslider.pause_on_dots_hover),
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            arrows: false
                        }
                    }]
            });
        }
        });

        // slide menu
        if (plugins.slideNav.length) {
            var $slideNav = plugins.slideNav,
                    toggler = '.navbar-toggle',
                    $closeNav = $('.darkout-menu, .close-menu');
            $slideNav.on('hidden.bs.collapse', function () {
                $('.menu-depth-2').hide();
                $('.dropdown-submenu').removeClass('opened');
            })
            $slideNav.after($('<div id="navbar-height-col"></div>'));
            var $heightCol = $('#navbar-height-col')
            $slideNav.on("click", toggler, function (e) {
                var $this = $(this);
                $heightCol.toggleClass('slide-active');
                $this.toggleClass('slide-active');
                $shiftMenu.toggleClass('slide-active');
            });
            $closeNav.on("click", function (e) {
                $heightCol.toggleClass('slide-active');
                $shiftMenu.toggleClass('slide-active');
                $('.menu-depth-2').hide();
                $('.dropdown-submenu').removeClass('opened');
            });
        }
        // image popup
        if (plugins.isotopeGallery.length) {
            plugins.isotopeGallery.find('a.hover').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }

        if (plugins.pricingCarousel.length) {
            plugins.pricingCarousel.slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 2500,
                dots: true,
                arrows: true,
                responsive: [{
                        breakpoint: 1299,
                        settings: {
                            arrows: false
                        }
                    }, {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                            arrows: false
                        }
                    }, {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            arrows: false
                        }
                    }]
            });
        }

        // gallery isotope
        if (plugins.isotopeGallery.length) {
            var $gallery = plugins.isotopeGallery;
            $gallery.imagesLoaded(function () {
                $gallery.isotope({
                    itemSelector: '.gallery-item',
                    masonry: {
                        columnWidth: '.gallery-item',
                        gutter: 30
                    }
                });
            });
            isotopeFilters($gallery);
        }

        /// for coupon popup
        $('.print-link').on('click', function () {
            var post_id = $(this).attr('data-id');
            var popupLoder = $('#popUpLoader_' + post_id);
            popupLoder.addClass('visible');
            $(this).hide();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: ajax_object.ajax_url,
                data: {
                    action: 'coupon_popup_ajax',
                    security:  ajax_object.ajax_nonce_coupon,
                    post_id: post_id
                },
                success: function (data) {
                    $('#myModal').replaceWith('');
                    $('body').append(data)
                    $('#myModal').modal('show');
                    popupLoder.removeClass('visible');
                    $('.print-link').show();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }
            });
        })

        // testimonial load more
        var testimonialPage = 2;
        if (plugins.testimonialMoreLink.length) {
            var $testimonialMoreLink = plugins.testimonialMoreLink,
                    $testimonialPreload = $('#testimonialPreload'),
                    $testimonialLoader = $('#moreLoader');
            $testimonialMoreLink.on('click', function () {
                $testimonialLoader.addClass('visible');
                var per_page = $('#per_page').val();
                var grid_style = $('#grid_style').val();
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: ajax_object.ajax_url,
                    data: {
                        action: 'testimonial_more_post_ajax',
                        security:  ajax_object.ajax_nonce_testimonial,
                        post_per_page: per_page,
                        paged: testimonialPage,
                        grid_style: grid_style
                    },
                    success: function (data) {
                        $testimonialPreload.append(data);
                        $testimonialLoader.removeClass('visible');
                        if (plugins.postGallery.length) {
                            $(' > div', $testimonialPreload).each(function () {
                                var $item = $(this);
                                plugins.postGallery.append($item).isotope('appended', $item);
                            });
                        }
                        var length = document.querySelectorAll('#main-div .testimonial-card').length;
                        var total_post = $('#total_tes').val();
                        if (total_post > length) {
                            $testimonialMoreLink.show();
                        } else {
                            $testimonialMoreLink.hide();
                        }
                        testimonialPage++;
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                    }
                });
            })
        }

        // post isotope
        if (plugins.postGallery.length) {
            var $postgallery = $('.blog-isotope');
            $postgallery.imagesLoaded(function () {
                $postgallery.isotope({
                    itemSelector: '.blog-post, .testimonial-card',
                    masonry: {
                        gutter: 30,
                        columnWidth: '.blog-post, .testimonial-card'
                    }
                });
            });
        }



        // CAROUSELS

        // Banner service carousel
        if (plugins.servicesCarousel.length) {
            if (windowWidth < 768) {
                plugins.servicesCarousel.slick({
                    mobileFirst: false,
                    slidesToShow: parseInt(ajax_banner.slides_to_show),
                    slidesToScroll: JSON.parse(ajax_banner.slides_to_scroll),
                    infinite: JSON.parse(ajax_banner.infinite),
                    dots: JSON.parse(ajax_banner.dots),
                    arrows: JSON.parse(ajax_banner.arrows),
                    autoplay: JSON.parse(ajax_banner.autoplay),
                    rtl: plugins.rtltrue,
                    responsive: [{
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 1
                            }
                        }, {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1
                            }
                        }]
                });
            }
        }

        // products carousel
        if (plugins.prdCarousel.length) {
            plugins.prdCarousel.slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 2500,
                dots: false,
                arrows: true,
                responsive: [{
                        breakpoint: 1299,
                        settings: {
                            dots: true,
                            arrows: false
                        }
                    }, {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                            arrows: false
                        }
                    }, {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            arrows: false
                        }
                    }, {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            arrows: false
                        }
                    }]
            });
        }

        // testimonials carousel
        if (plugins.testimonialsCarousel.length) {
            plugins.testimonialsCarousel.slick({
                mobileFirst: false,
                slidesToShow: parseInt(ajax_testiomonial.slides_to_show),
                slidesToScroll: JSON.parse(ajax_testiomonial.slides_to_scroll),
                infinite: JSON.parse(ajax_testiomonial.infinite),
                autoplay: JSON.parse(ajax_testiomonial.autoplay),
                autoplaySpeed: parseInt(ajax_testiomonial.autoplay_speed),
                arrows: JSON.parse(ajax_testiomonial.arrows),
                rtl: plugins.rtltrue,
                dots: JSON.parse(ajax_testiomonial.dots),
                fade: JSON.parse(ajax_testiomonial.fade),
                cssEase: 'linear'
            });
        }
        // person carousel (team)
        if (plugins.personCarousel.length) {
            plugins.personCarousel.slick({
                mobileFirst: false,
                slidesToShow: parseInt(ajax_team.slides_to_show),
                slidesToScroll: JSON.parse(ajax_team.slides_to_scroll),
                infinite: JSON.parse(ajax_team.infinite),
                autoplay: JSON.parse(ajax_team.autoplay),
                rtl: plugins.rtltrue,
                autoplaySpeed: parseInt(ajax_team.autoplay_speed),
                arrows: JSON.parse(ajax_team.arrows),
                dots: JSON.parse(ajax_team.dots),
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 3
                        }
                    }, {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1
                        }
                    }]
            });
        }

        // category carousel
        if (plugins.categoryCarousel.length) {
            plugins.categoryCarousel.slick({
                mobileFirst: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                arrows: false,
                rtl: plugins.rtltrue,
                dots: true,
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3
                        }
                    }, {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2
                        }
                    }, {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }]
            });
        }

        // post carousel
        if (plugins.postCarousel.length) {
            plugins.postCarousel.slick({
                mobileFirst: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                autoplay: false,
                rtl: plugins.rtltrue,
                autoplaySpeed: 2500,
                arrows: true,
                dots: false
            });
        }

        // END CAROUSELS

        // lazy loading effect
        if (plugins.animation.length) {
            onScrollInit(plugins.animation, windowWidth);
        }
        toggleNavbarMethod(windowWidth);
        toggleCart('.header-cart', '.header-cart-dropdown');
        mobileClickBanner(windowWidth);
        backToTop('.back-to-top');
        if (plugins.stickyHeader.length) {
            $(plugins.stickyHeader).stickyHeader();
        }
        if (plugins.dropMenu.length) {
            $(plugins.stickyHeader).dropMenu();
        }
        // Resize window events
        $window.resize(function () {
            var windowWidth = window.innerWidth || $window.width();
            startCarousel();
            sliderMaxHeight($maxFullHeight);
            if (windowWidth < 992) {
                $fullHeight.height('');
            }
            if (windowWidth > 767 && $navbarToggle.is(':hidden')) {
                $shiftMenu.removeClass('slide-active');
            }
            if (plugins.servicesBlockAlt.length) {
                $(".services-block-alt, .services-block-alt .title, .services-block-alt .text").each(function () {
                    $(this).css({
                        'height': ''
                    });
                })
            }
        });
        $(window).resize(debouncer(function (e) {
            var windowWidth = window.innerWidth || $window.width();
            if (windowWidth > 991) {
                $fullHeight.height($(window).height());
            }
            if (windowWidth > 768 && !$('body').hasClass('touch')) {
                if (plugins.servicesCarousel.length) {
                    equalHeight(".text-icon-carousel > div", ".title", ".text");
                }
            }
            if (windowWidth > 480 && !$('body').hasClass('touch')) {
                if (plugins.servicesBlockAlt.length) {
                    equalHeight(".services-block-alt", ".title", ".text");
                }
            }
            $dropdown.removeClass('opened');
            toggleNavbarMethod(windowWidth);
            mobileClickBanner(windowWidth);
        }))

    })

    $window.on('load', function () {
        var windowWidth = window.innerWidth || $window.width();
        startCarousel();
        // remove preloader
        $('#loader-wrapper').fadeOut(parseInt(ajax_object.site_preloader_timeout));
        if (windowWidth > 768 && !$('body').hasClass('touch')) {
            if (plugins.servicesCarousel.length) {
                equalHeight(".text-icon-carousel > div", ".title", ".text");
            }
        }
        if (windowWidth > 480 && !$('body').hasClass('touch')) {
            if (plugins.servicesBlockAlt.length) {
                equalHeight(".services-block-alt", ".title", ".text");
            }
        }
    });

    $window.on('load', function () {
        // counter
        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }
        if (plugins.counter.length) {
            plugins.counter.waypoint(function () {
                $('.number > span', plugins.counter).each(count);
            }, {
                triggerOnce: true,
                offset: '80%'
            });
        }
    });


    /* ---------------------------------------------
    Functions
     --------------------------------------------- */

    // Set equal height to block
    function equalHeight(block) {
        var wrapWidth = $(block).parent().width(),
                blockWidth = $(block).width(),
                wrapDivide = Math.floor(wrapWidth / blockWidth),
                cellArr = $(block);
        for (var arg = 1; arg <= arguments.length; arg++) {
            for (var i = 0; i <= cellArr.length; i = i + wrapDivide) {
                var maxHeight = 0,
                        heightArr = [];
                for (var j = 0; j < wrapDivide; j++) {
                    heightArr.push($(cellArr[i + j]).find(arguments[arg]));
                    if (heightArr[j].outerHeight() > maxHeight) {
                        maxHeight = heightArr[j].outerHeight();
                    }
                }
                for (var counter = 0; counter < heightArr.length; counter++) {
                    $(cellArr[i + counter]).find(arguments[arg]).outerHeight(maxHeight);
                }
            }
        }
    }


    // Slider Animation
    function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function () {
            var $this = $(this);
            var $animationDelay = $this.data('delay');
            var $animationType = 'animated ' + $this.data('animation');
            $this.css({
                'animation-delay': $animationDelay,
                '-webkit-animation-delay': $animationDelay
            });
            $this.addClass($animationType).one(animationEndEvents, function () {
                $this.removeClass($animationType);
            });
            if ($this.hasClass('animate')) {
                $this.removeClass('animation');
            }
        });
    }

    // sticky header
    $.fn.stickyHeader = function () {
        var $header = this,
                $body = $('body'),
                headerOffset,
                stickyH;

        function setHeigth() {
            $(".fix-space").remove();
            $header.removeClass('animated is-sticky slideInDown');
            $body.removeClass('hdr-sticky');
            headerOffset = $('#slidemenu', $header).offset().top;
            stickyH = $header.height() + headerOffset;
        }
        setHeigth();
        var prevWindow = window.innerWidth || $(window).width()
        $(window).bind('resize', function () {
            var currentWindow = window.innerWidth || $(window).width();
            if (currentWindow != prevWindow) {
                setHeigth()
                prevWindow = currentWindow;
            }
        });
        $(window).scroll(function () {
            //if (prevWindow < 992) return;
            var st = getCurrentScroll();
            if (st > headerOffset) {
                if (!$(".fix-space").length && !$body.hasClass('home')) {
                    $header.after('<div class="fix-space"></div>');
                    $(".fix-space").css({
                        'height': $header.height() + 'px'
                    });
                }
                $header.addClass('is-sticky animated slideInDown');
                $body.addClass('hdr-sticky');
            } else {
                $(".fix-space").remove();
                $header.removeClass('animated is-sticky slideInDown');
                $body.removeClass('hdr-sticky');
            }
        });

        function getCurrentScroll() {
            return window.pageYOffset || document.documentElement.scrollTop;
        }
    }

    if (plugins.stickyHeader.length) {
        $(plugins.stickyHeader).stickyHeader();
    }

    // Time Out Resize
    function debouncer(func, timeout) {
        var timeoutID, timeout = timeout || 500;
        return function () {
            var scope = this,
                    args = arguments;
            clearTimeout(timeoutID);
            timeoutID = setTimeout(function () {
                func.apply(scope, Array.prototype.slice.call(args));
            }, timeout);
        }
    }

    // Count To
    function count(options) {
        var $this = $(this);
        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
        $this.countTo(options);
    }

    // Isotope Filters (for gallery)
   /* function isotopeFilters(gallery) {
        var $gallery = $(gallery);
        if ($gallery.length) {
            var container = $gallery;
            var optionSets = $(".filters-by-category .option-set"),
                    optionLinks = optionSets.find("a");
            optionLinks.on('click', function (e) {
                var thisLink = $(this);
                if (thisLink.hasClass("selected"))
                    return false;
                var optionSet = thisLink.parents(".option-set");
                optionSet.find(".selected").removeClass("selected");
                thisLink.addClass("selected");
                var options = {},
                        key = optionSet.attr("data-option-key"),
                        value = thisLink.attr("data-option-value");
                value = value === "false" ? false : value;
                options[key] = value;
                if (key === "layoutMode" && typeof changeLayoutMode === "function")
                    changeLayoutMode($this, options);
                else {
                    container.isotope(options);
                }
                return false
            })
        }
    }*/

    function isotopeFilters(gallery) {
        var $gallery = $(gallery);
        if ($gallery.length) {
            var container = $gallery;
            var optionSets = $(".filters-by-category .option-set"),
                    optionLinks = optionSets.find("a");
            optionLinks.on('click', function (e) {
                var thisLink = $(this);
                if (thisLink.hasClass("selected"))
                    return false;
                var optionSet = thisLink.parents(".option-set");
                optionSet.find(".selected").removeClass("selected");
                thisLink.addClass("selected");
                var options = {},
                        key = optionSet.attr("data-option-key"),
                        value = thisLink.attr("data-option-value");
                value = value === "false" ? false : value;
                options[key] = value;
                if (key === "layoutMode" && typeof changeLayoutMode === "function")
                    changeLayoutMode($this, options);
                else {
                    container.isotope(options);
                }
                if (plugins.isotopeGallery.length) {
                    setTimeout(function(){ 
                        plugins.isotopeGallery.find('.gallery-item:visible').find('a.hover').magnificPopup({
                            type: 'image',
                            gallery: {
                                enabled: true
                            }
                        });
                    }, 1000);
                }
                return false
            })
        }
    }

    // Mobile Only carousel initialization
    function slickMobile(carousel, breakpoint, slidesToShow, slidesToScroll) {
        var windowWidth = window.innerWidth || $window.width();
        if (windowWidth < (breakpoint + 1)) {
            carousel.slick({
                mobileFirst: true,
                slidesToShow: slidesToShow,
                slidesToScroll: slidesToScroll,
                infinite: true,
                autoplay: true,
                arrows: false,
                rtl: plugins.rtltrue,
                dots: true,
                responsive: [{
                        breakpoint: breakpoint,
                        settings: "unslick",
                    }]
            });
        }
    }

    function startCarousel() {
        if (plugins.servicesAltCarousel.length) {
            slickMobile(plugins.servicesAltCarousel, 480, 1, 1);
        }
        if (plugins.servicesCarousel.length) {
            slickMobile(plugins.servicesCarousel, 767, 1, 1);
        }
        if (plugins.howWorksCarousel.length) {
            slickMobile(plugins.howWorksCarousel, 767, 1, 1);
        }
    }

    // Navigation dropdown menu
    function toggleNavbarMethod(windowWidth) {
        var $dropdownLink = $(".dropdown > a, .dropdown-submenu > a, .sub-sub-menu-item > a");
        var $dropdown = $(".dropdown, .dropdown-submenu");
        var $dropdownCaret = $(".dropdown > a > .ecaret, .dropdown-submenu > a > .ecaret");
        if (windowWidth > 991 ) {
            $('body').click(function(evt){
                if (!$(evt.target).hasClass('menu-link')) {
                   
                    //$('.dropdown-menu').hide();
                    //$('.dropdown-menu').css('visibility', 'hidden');
                }
            });


            $(".main-menu-item > a").on('touchstart', function (e) {
                if (e.target !== this){
                    return;
                }
                $('#menu-primary-menu .main-menu-item').each(function(){
                    $(this).find('.dropdown-menu').removeClass('opendiv')
                    $(this).find('.dropdown-menu').css({'display':'none','visibility':'hidden','opacity':'0','top':'0'})
                })
            })
            /*
            $("#slidemenu a[href*=#]").click(function(e) {
                e.preventDefault();
                if($(this).next('.dropdown-menu').length){
                    if( $(this).next('.dropdown-menu').hasClass("opendiv")){
                        $(location).attr('href',  $(this).attr('href'));
                        $(this).next('.dropdown-menu').removeClass('opendiv')
                    }else{
                        $(this).next('.dropdown-menu').css({'display':'block !important','visibility':'visible','opacity':'1','top':'0'})
                        $(this).next('.dropdown-menu').addClass('opendiv')
                        return false;
                    }
                }else{
                    $(location).attr('href',  $(this).attr('href'));
                    $('.opendiv').css({'display':'none','visibility':'hidden','opacity':'0','top':'0'})
                    $('.opendiv').removeClass('opendiv')
                }
            });
            */

            $('.dropdown > a').on('touchstart', function (e) {
                e.preventDefault();
                e.stopPropagation();
                if($(this).next('.dropdown-menu').length){
                    if( $(this).next('.dropdown-menu').hasClass("opendiv")){
                        $(location).attr('href',  $(this).attr('href'));
                        $(this).next('.dropdown-menu').removeClass('opendiv')

                    }else{
                        $(this).next('.dropdown-menu').css({'display':'block !important','visibility':'visible','opacity':'1','top':'100%'})
                        $(this).next('.dropdown-menu').addClass('opendiv')
                        return false;
                    }
                }else{
                    $(location).attr('href',  $(this).attr('href'));
                }
            });
        }
        if (windowWidth <= 991) {
            $dropdownLink.on('click.toggleNavbarMethod', function (e) {
                e.preventDefault();
                e.stopPropagation();
                var url = $(this).attr('href');
                if (url)
                    $(location).attr('href', url);
                if ($('body').hasClass('touch') && $window.width() > 768) {
                    $dropdownLink.not(this).removeClass("clicked");
                    $(this).toggleClass("clicked");
                    if (!$(this).hasClass("clicked")) {
                        var url = $(this).attr('href');
                        if (url)
                            $(location).attr('href', url);
                    }
                } else {
                    var url = $(this).attr('href');
                    if (url)
                        $(location).attr('href', url);
                }
            });
        }
        if (windowWidth <= 991) {
            $dropdown.unbind('.toggleNavbarMethod');
            $dropdownCaret.unbind('.toggleNavbarMethod');
            $dropdownCaret.on('click.toggleNavbarMethod', function (e) {
                e.stopPropagation();
                e.preventDefault();
                var $li = $(this).parent().parent('li');
                if ($li.hasClass('opened')) {
                    $li.find('.dropdown-menu').first().stop(true, true).slideUp(0);
                    $li.removeClass('opened');
                } else {
                    $li.find('.dropdown-menu').first().stop(true, true).slideDown(0);
                    $li.addClass('opened');
                }
            })
        }
    }


    // Lazy Load animation
    function onScrollInit(items, wW) {
        if (wW > 991) {
            if (!$('body').data('firstInit')) {
                items.each(function () {
                    var $element = $(this),
                            animationClass = $element.attr('data-animation'),
                            animationDelay = $element.attr('data-animation-delay');
                    $element.removeClass('no-animate');
                    $element.css({
                        '-webkit-animation-delay': animationDelay,
                        '-moz-animation-delay': animationDelay,
                        'animation-delay': animationDelay
                    });
                    var trigger = $element;
                    trigger.waypoint(function () {
                        $element.addClass('animated').addClass(animationClass);
                        if ($element.hasClass('hoveranimation')) {
                            $element.on("webkitAnimationEnd mozAnimationEnd oAnimationEnd animationEnd", function () {
                                $(this).removeClass("animated").removeClass("animation").removeClass(animationClass);
                            });
                        }
                    }, {
                        triggerOnce: true,
                        offset: '90%'
                    });
                });
                $('body').data('firstInit', true);
            }
        } else {
            items.each(function () {
                var $element = $(this);
                $element.addClass('no-animate')
            })
        }
    }

    // Get Scrollbar Width
    function getScrollbarWidth() {
        var outer = document.createElement("div");
        outer.style.visibility = "hidden";
        outer.style.width = "100px";
        outer.style.msOverflowStyle = "scrollbar"; // needed for WinJS apps

        document.body.appendChild(outer);

        var widthNoScroll = outer.offsetWidth;
        // force scrollbars
        outer.style.overflow = "scroll";

        // add innerdiv
        var inner = document.createElement("div");
        inner.style.width = "100%";
        outer.appendChild(inner);

        var widthWithScroll = inner.offsetWidth;

        // remove divs
        outer.parentNode.removeChild(outer);

        return widthNoScroll - widthWithScroll;
    }

    // Click event to banner on mobile when action button is hidden
    function mobileClickBanner(wW) {
        if (wW < 768) {
            $(".banner-under-slider").on('click', function (e) {
                var $this = $(this);
                var target = $this.find('.action .btn').attr('href');
                if (target)
                    $(location).attr('href', target);
                e.preventDefault();
            })
        } else {
            $(".banner-under-slider").unbind('click');
        }
    }

    $('.side-block.widget ul').addClass('category-list');

    $(".cart .input-text.qty.text").spinner({
        spin: function (event, ui) {
            $('.woocommerce-cart-form button[name="update_cart"]').prop('disabled', false);
        }
    });

    $(document.body).on('updated_cart_totals', function () {
        $(".cart .input-text.qty.text").spinner({
            spin: function (event, ui) {
                $('.woocommerce-cart-form button[name="update_cart"]').prop('disabled', false);
            }
        });
    });

    $('.header-row').on('click', '.prd-sm-delete', function () {
        $(this).closest('.prd-sm-item').append('<div class="loader-cart-delete"><img src="' + ajax_object.loader_img + '"></div>');
        var id = $(this).data('product_id')
        var qty = $(this).data('qty')
        $.ajax({
            type: "POST",
            url: ajax_object.ajax_url,
            data: {
                action: 'remove_item_from_cart', product_id: id,security:  ajax_object.ajax_nonce_cart,},
            success: function (res) {
                if (res.fragments) {
                    $('.cart-contents').replaceWith(res.fragments['a.cart-contents'])
                    $('.header-cart-dropdown').replaceWith(res.fragments['div.header-cart-dropdown'])
                }
                $('.loader-cart-delete').replaceWith('');
            }
        });
    })

    // Header Cart dropdown menu
    function toggleCart(cart, drop) {
        $(document).on('click', cart, function () {
            $(cart).toggleClass('opened');
        });
        $(document).on('click', drop, function () {
            $(cart).toggleClass('opened');
        });
        $(document).on('click', function (e) {

            if (!$(e.target).closest(cart).length && !$(e.target).closest(drop).length) {

                if ($(cart).hasClass("opened")) {
                    $(cart).removeClass('opened');
                }
            }
        })
    }

    $(document.body).on('added_to_cart', function (a, b, c, d) {
        if ($('.header-cart').length > 0) {
            $("html, body").animate({
                scrollTop: $('.header-cart').offset().top
            }, 2000);
        }
    });






    // store the slider in a local variable
    var $window = $(window),
            flexslider = {vars: {}};

    // tiny helper function to add breakpoints
    function getGridSize() {
        var gridSize = (window.innerWidth < 600) ? 2 :
                (window.innerWidth < 900) ? 3 : 4;
        flexslider.vars.minItems = gridSize;
        flexslider.vars.maxItems = gridSize;

    }
    function callflexslider(a) {
        if ($('.related.products .prd-grid').length && $('.related.products .prd-grid .prd-img').length > a) {
            $('.related.products .prd-grid').flexslider({
                animation: "slide",
                selector: ".slides > div",
                animationLoop: false,
                itemWidth: 200,
                itemMargin: 15,
                minItems: a,
                maxItems: a,
                controlNav: false
            });
        }


        if ($('.up-sells.upsells .prd-grid').length && $('.up-sells.upsells .prd-grid .prd-img').length > a) {
            $('.up-sells.upsells .prd-grid').flexslider({
                animation: "slide",
                selector: ".slides > div",
                animationLoop: false,
                itemWidth: 200,
                itemMargin: 15,
                minItems: a,
                maxItems: a,
                controlNav: false
            });
        }

    }

    //   $window.load(function() {
    //    getGridSize();
    //    callflexslider(flexslider.vars.minItems)

    //  });

    //  // check grid size on resize event
    //  $window.resize(function() {
    //   getGridSize();
    //   callflexslider(flexslider.vars.minItems)

    // });


    var pageNumber = 1;

    $(document).on("click", '.view-more-post.ajax_load_post_btn.blog-grid', function (e) { // When btn is pressed.

        pageNumber++;
        var item;
        var post_per_load = $(this).data('post_per_load');
        var rdmoreBtn = $(this);

        $('.ajax_load_post_img').show(); // Disable the button, temp.
        $(rdmoreBtn).hide(); // Disable the button, temp.

        $.ajax({
            type: "POST",
            url: ajax_object.ajax_url,
            data: {
                action: 'car_repair_services_more_post_ajax',
                post_per_load: post_per_load,
                pageNumber: pageNumber,
                security:  ajax_object.ajax_nonce_post,
            },
            context: document.body,
            success: function (data) {
                $('.ajax_load_post_img').hide();
                $(rdmoreBtn).show();
                if (data == '') {
                    $(rdmoreBtn).hide();
                }
                e.preventDefault();
                var obj = JSON.parse(data)
                if (obj.count == 'blank') {
                    $(rdmoreBtn).hide();
                }
                $('#postPreload').append(obj.html);
                if (plugins.postGallery.length) {
                    $('#postPreload >.blog-post').each(function () {
                        item = $(this);
                        var $postgallery = plugins.postGallery;
                        $postgallery.append(item).isotope('appended', item)
                        setPostSize();
                    });
                    $('.content-gallery .post-carousel').slick({
                        mobileFirst: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        autoplay: false,
                        arrows: true,
                        dots: false
                    });
                } else {
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
        return false;


        $('.time').timepicker({
            'timeFormat': 'H:i'
        });

    });



    function setPostSize() {
        var windowW = window.innerWidth || $window.width(),
                itemsInRow = 1;
        if (windowW > 1199) {
            itemsInRow = 3;
        } else if (windowW > 767) {
            itemsInRow = 3;
        } else if (windowW > 480) {
            itemsInRow = 1;
        }
        var $postgallery = plugins.postGallery;
        var containerW = $postgallery.width() - 60,
                galleryW = containerW / itemsInRow;
        $postgallery.find('.blog-post').each(function () {
            if (windowW > 767) {
                if ($(this).hasClass('doubleW')) {
                    $(this).css({
                        width: galleryW * 2 + 30 + 'px',
                    });
                } else {
                    $(this).css({
                        width: galleryW + 'px'
                    });
                }
            } else {
                $(this).css({
                    width: galleryW + 60 + 'px'
                });
            }
        });
        setTimeout(function () {
            $('.slick-initialized').slick('setPosition');
            $postgallery.isotope('layout');
        }, 100);
    }

    document.addEventListener('wpcf7submit', function (event) {
        $('.wpcf7-form button').show();
        $('.wpcf7-form .ajaxloaderforcf7').replaceWith('')
    }, false);
    document.addEventListener('wpcf7spam', function (event) {
        $('.wpcf7-form button').show();
        $('.wpcf7-form .ajaxloaderforcf7').replaceWith('')
    }, false);
    document.addEventListener('wpcf7mailsent', function (event) {
        $('.wpcf7-form button').show();
        $('.wpcf7-form .ajaxloaderforcf7').replaceWith('')
    }, false);
    document.addEventListener('wpcf7mailfailed', function (event) {
        $('.wpcf7-form button').show();
        $('.wpcf7-form .ajaxloaderforcf7').replaceWith('')
    }, false);
    document.addEventListener('wpcf7invalid', function (event) {

    }, false);

    $('.wpcf7-form button').on('click', function () {
        $(this).parent().append('<div style="text-align: center;" class="ajaxloaderforcf7"><img src="' + ajax_object.loader_img + '"><div>')
        $('.wpcf7-form button').hide()
    })

})(jQuery);

jQuery(document).ready(function () {
// obj.init();
//mutation event for rtl
    if (jQuery('body').hasClass('rtl')) {
        var $targets = document.querySelectorAll('.vc_row[data-vc-full-width]');
        NodeList.prototype.forEach = Array.prototype.forEach;
        $targets.forEach(function ($target) {
            var $config = {attributes: true, childList: true, characterData: true};
            var observer = new MutationObserver(function (mutations) {
                mutations.forEach(function (mutation) {
                    if (mutation.attributeName == 'style' && $target.style.left.indexOf('-') != -1) {
                        var $right = $target.style.left;
                        $target.style.left = 'auto';
                        $target.style.right = $right;
                    }
                });
            });
            observer.observe($target, $config);
        });
    }


    jQuery(document).on("stickyTable", function () {
        jQuery(".sticky-headers").scroll(function () {
            jQuery(this).find("table tr.sticky-row th").css("top", jQuery(this).scrollTop()), jQuery(this).find("table tr.sticky-row td").css("top", jQuery(this).scrollTop())
        }), jQuery(".sticky-ltr-cells").scroll(function () {
            jQuery(this).find("table th.sticky-cell").css("left", jQuery(this).scrollLeft()), jQuery(this).find("table td.sticky-cell").css("left", jQuery(this).scrollLeft())
        }), jQuery(".sticky-rtl-cells").scroll(function () {
            var t = jQuery(this).find("table").prop("clientWidth") - jQuery(this).prop("clientWidth");
            jQuery(this).find("table th.sticky-cell").css("right", t - jQuery(this).scrollLeft()), jQuery(this).find("table td.sticky-cell").css("right", t - jQuery(this).scrollLeft())
        })
    }), jQuery(document).ready(function () {
        jQuery(document).trigger("stickyTable")
    });

});