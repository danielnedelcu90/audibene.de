var $ = jQuery.noConflict();

$( document ).ready( function() {

    /*------------------------------------*\

        function 2.0 Toggle JS Class

    \*------------------------------------*/

    $( 'html').removeClass( 'no-js' ).addClass( 'js' );

    var usAg = navigator.userAgent;
    if( usAg.indexOf("NT 6.1") != -1 ) {
        //Windows 7, apply styles here, for instance:
        $( 'html').addClass( 'win-7' );
    }

    /*------------------------------------*\

     EU Cookie Law Script
     https://www.daretothink.co.uk/eu-cookie-law-script/

     \*------------------------------------*/

    function SetCookie(c_name,value,expiredays)
    {
        var exdate=new Date();
        exdate.setDate(exdate.getDate()+expiredays);
        document.cookie=c_name+ "=" +encodeURI(value)+";path=/"+((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
    }

    if( document.cookie.indexOf( "cookie" ) ===-1 )
    {
        $( '.cookie-bar' ).show();
    }

    $( '.cookie-bar-accept' ).on( 'click', function() {
        SetCookie( 'cookie', 'cookie', 365*10 );
        $( '.cookie-bar' ).remove();
        $( 'body' ).removeClass( 'cookie' );
    });

    /*------------------------------------*\

     language switcher

     \*------------------------------------*/

    function SetCookie(c_name,value,expiredays)
    {
        var exdate=new Date();
        exdate.setDate(exdate.getDate()+expiredays);
        document.cookie=c_name+ "=" +encodeURI(value)+";path=/"+((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
    }

    $( '.language-switcher-bar-close, .language-switcher-bar-redirect' ).on( 'click', function() {
        SetCookie( 'language_switcher', '1', 365*10 );
        $( '.language-switcher-bar' ).remove();
    });

    /*------------------------------------*\

        mobile menu

    \*------------------------------------*/

    $( '.header-menu-btn' ).on( 'click', function() {

        openMobileMenu();

        return false;

    });

    function openMobileMenu() {

        if ( $( '.header-menu-btn.active' ).length <= 0 ) {

            $( 'header' ).addClass( 'active' );
            $('.main-navigation').height($(window).height() - $('header').height());
            $( '.site-navigation-sm' ).addClass( 'active' );
            $( '.header-menu-btn' ).addClass( 'active' );

        } else {

            closeMobileMenu();

        }

        return false;

    }

    function closeMobileMenu() {

        $( 'header' ).removeClass( 'active' );
        $('.main-navigation').css('height','');
        $( '.site-navigation-sm' ).removeClass( 'active' );
        $( '.header-menu-btn' ).removeClass( 'active' );
        resetMobileMenu();

    }

    /*------------------------------------*\

        header menu

    \*------------------------------------*/

    $( '.menu-item-has-children' ).hover( function() {

        $( this ).addClass( 'active' );
        var data_menu_id = $( this ).data( 'menu-id' );
        $( '.mega-menu-' + data_menu_id ).addClass( 'active' );

        }, function() {

        $( this ).removeClass( 'active' );
        var data_menu_id = $( this ).data( 'menu-id' );
        $( '.mega-menu-' + data_menu_id ).removeClass( 'active' );

        }

    );

    $( '.mega-menu' ).hover( function() {

        var data_menu_id = $( this ).data( 'mega-menu-id' );
        $( '.mega-menu-' + data_menu_id ).addClass( 'active' );
        $( '.menu-item-' + data_menu_id ).addClass( 'active' );

        }, function() {

        var data_menu_id = $( this ).data( 'mega-menu-id' );
        $( '.mega-menu-' + data_menu_id ).removeClass( 'active' );
        $( '.menu-item-' + data_menu_id ).removeClass( 'active' );

        }

    );

    /*------------------------------------*\

        mobile menu

    \*------------------------------------*/

    $( '.menu-sm-item-has-children' ).on( 'click', function(e) {

        if( !$(e.target.href) ) {
            return;
        }

        if ( $( '.active', this ).length <= 0 ) {

            // reset
            $( '.menu-sm-item-has-children' ).removeClass( 'active' );
            $( '.sub-menu-list' ).removeClass( 'active' );

            $( this ).addClass( 'active' );
            var data_menu_sm_id = $( this ).data( 'menu-sm-id' );
            $( '.sub-menu-list-' + data_menu_sm_id ).addClass( 'active' );

        } else {

            resetMobileMenu();

        }

        return false;

    });

    function resetMobileMenu() {

        // reset
        $( '.menu-sm-item-has-children' ).removeClass( 'active' );
        $( '.sub-menu-list' ).removeClass( 'active' );

    }

    /*------------------------------------*\

        sticky nav

    \*------------------------------------*/

    if ( $('nav').length ) var sticky_nav_top = $('nav').offset().top;

    function stickyNav() {

        var scrollTop = $(window).scrollTop();

        if (scrollTop > sticky_nav_top) {

            $('nav').addClass('sticky');

        } else {

            $('nav').removeClass('sticky');

        }

    }

    /*------------------------------------*\

     rating

    \*------------------------------------*/

    $('.rank-half').hover(function() {

        var thisIndex = $(this).index(),
            parent = $(this).parent(),
            parentIndex = parent.index(),
            ranks = $('.rank-container');

        for (var i = 0; i < ranks.length; i++) {
            if(i < parentIndex) {
                $(ranks[i]).removeClass('half').addClass('full');
            } else {
                $(ranks[i]).removeClass('half').removeClass('full');
            }
        }

        parent.addClass('full');

        // half star rating
        // if(thisIndex == 0) {
        //     parent.addClass('half');
        // } else {
        //     parent.addClass('full');
        // }
    });

    $('.rank-half').click(function() {
        var thisIndex = $(this).index(),
            parent = $(this).parent(),
            parentIndex = parent.index(),
            rating = parentIndex;

        rating += 1;

        // half star rating
        // rating += thisIndex ? 1 : 0.5;

        if (rating) {

            // cookie check
            // ["www.hear.com/","www.hear.com/ca/"]
            // var networkSiteUrl = audibene.network_site_url.replace(/(^\w+:|^)\/\//, '');
            // var votedUrls = JSON.parse(localStorage.getItem('votedUrls'));

            var post_id = audibene.post_id;
            var ratedPosts = JSON.parse(localStorage.getItem('ratedPosts'));

            for (index in ratedPosts) {

                if ( ratedPosts[index] === post_id ) {

                    // alert(decodeURI(audibene.rating_alert));
                    return false;

                }

            }

            if (localStorage.getItem('ratedPosts') === null) {

                var a = [];
                a.push(post_id);
                localStorage.setItem('ratedPosts', JSON.stringify(a));

            } else {

                var a = [];
                a = JSON.parse(localStorage.getItem('ratedPosts'));
                a.push(post_id);
                localStorage.setItem('ratedPosts', JSON.stringify(a));

            }

            // This does the ajax request
            $.ajax({
                url: audibene.ajax_url,
                data: {
                    'action': 'rating_ajax_request',
                    'post_id' : audibene.post_id,
                    'rating' : rating
                },
                success:function(data) {
                    // This outputs the result of the ajax request
                    $('.rating-count').text(data.ratings);
                    $('.rating-value').text(data.rating);

                    // alert(decodeURI(audibene.rating_success));
                    // console.log(data);
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });

        }

    });

    /*------------------------------------*\

     window load

    \*------------------------------------*/

    $( window ).on( 'load', function() {

        stickyNav();

    });

    /*------------------------------------*\

        window scroll

    \*------------------------------------*/

    $( window ).on( 'scroll', function() {

        stickyNav();

    });

    /*------------------------------------*\

        anchor id scroll
        https://css-tricks.com/snippets/jquery/smooth-scrolling/

    \*------------------------------------*/

    $('a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });

    /*------------------------------------*\

        window resize
        http://stackoverflow.com/questions/1649086/detect-rotation-of-android-phone-in-the-browser-with-javascript

    \*------------------------------------*/

    var supportsOrientationChange = 'onorientationchange' in window, orientationEvent = supportsOrientationChange ? 'orientationchange' : 'resize'; window.addEventListener( orientationEvent, function() {

        closeMobileMenu();
        $('.lazy-load img').trigger('unveil');
        $(window).trigger('lookup');

    });

    $(".lazy-load img").unveil(200, function() {

        $(this).on( 'load', function() {

            $(this).css( 'opacity', '1' );
            $(this).parent().addClass('activated');

        });
    });

    /*------------------------------------*\

    back to to btn

    \*------------------------------------*/

    var backToTopBtn = $('#backToTop');

    $(window).scroll(function() {
      
      if ($(window).scrollTop() > 300) {
        backToTopBtn.addClass('show');
      } else {
        backToTopBtn.removeClass('show');
      }

      var st = $(window).scrollTop();
    });

    backToTopBtn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
    });


    /*------------------------------------*\

        accordion

    \*------------------------------------*/

    $('.auditoggle').click(function(e) {
        e.preventDefault();
        var $this = $(this);
        if (window.innerWidth < 749 && $this.hasClass('mobile')) { 
            accordionify($this);
        }
        if (window.innerWidth > 748 && $this.hasClass('mobile') && $this.parent().find('.inner-acc').css('display') == 'none') {
            accordionify($this);
        }
        if (window.innerWidth > 748 && $this.hasClass('desktop')) {
            accordionify($this);
        }
    });

    var accordionify = function accordionify(el) {
        if (el.next().hasClass('show-inner')) {
            el.next().removeClass('show-inner');
            el.next().slideUp(350);
        } else {
            el.parent().find('.inner-acc').removeClass('show-inner');
            el.parent().find('.inner-acc').slideUp(350);
            el.next().toggleClass('show-inner');
            el.next().slideToggle(350);
        }
    }

}); // end document ready

/**
 * jQuery Unveil
 * A very lightweight jQuery plugin to lazy load images
 * http://luis-almeida.github.io/unveil/
 *
 * Licensed under the MIT license.
 * Copyright 2013 Luís Almeida
 * https://github.com/luis-almeida
 */

(function($) {

    $.fn.unveil = function(threshold, callback) {

        var $w = $(window),
            th = threshold || 0,
            retina = window.devicePixelRatio > 1,
            attrib = retina? "data-src-retina" : "data-src",
            images = this,
            loaded;

        this.one("unveil", function() {
            var source = this.getAttribute(attrib);
            source = source || this.getAttribute("data-src");
            if (source) {
                this.setAttribute("src", source);
                if (typeof callback === "function") callback.call(this);
            }
        });

        function unveil() {
            var inview = images.filter(function() {
                var $e = $(this);
                if ($e.is(":hidden")) return;

                var wt = $w.scrollTop(),
                    wb = wt + $w.height(),
                    et = $e.offset().top,
                    eb = et + $e.height();

                return eb >= wt - th && et <= wb + th;
            });

            loaded = inview.trigger("unveil");
            images = images.not(loaded);
        }

        $w.on("scroll.unveil resize.unveil lookup.unveil", unveil);

        unveil();

        return this;

    };

})(window.jQuery || window.Zepto);

/*------------------------------------*\

    detect touch device
    http://ctrlq.org/code/19616-detect-touch-screen-javascript

\*------------------------------------*/

function isTouchDevice() {

    return ( ( 'ontouchstart' in window ) || ( navigator.MaxTouchPoints > 0 ) || ( navigator.msMaxTouchPoints > 0 ) );

}

if ( !isTouchDevice() ) {

    document.documentElement.className += ' no-touch';

} else {

    var touch = true;

}