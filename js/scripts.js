jQuery( document ).ready( function ( $ ) {

    // --------------------------------------------------------------------------------------
    // Alter header colours if on black bg ------------------------------------------
    // --------------------------------------------------------------------------------------
    //create array for all sections with black bg
    var bgs = [];
    $( ".bg-black" ).each(function(i) {
        bgs.push({i: false});
    });

    function headerBG(){
        var screenTop = $(document).scrollTop();

        //for each black section, check to see if it's at top of window
        $( ".bg-black" ).each(function(i) {
            var sectionOffset = $(this).offset();
            var sectionTop = sectionOffset.top;
            var sectionHeight = $(this).outerHeight();
            var sectionBottom = sectionTop + sectionHeight;

            if ( sectionTop <= screenTop && sectionBottom > screenTop ) {
                bgs[i] = true;
            } else {
                bgs[i] = false;
            }
        });

        //add class if on any of the black bg's
        if ( bgs.indexOf(true) > -1 ) {
            $('header').addClass('header-on-black');
        } else {
            $('header').removeClass('header-on-black');
        }
    } headerBG();



    // --------------------------------------------------------------------------------------
    // Add class to body tag when page is scrolled ------------------------------------------
    // --------------------------------------------------------------------------------------
    function scrolledNav(){
        var scroll = $(window).scrollTop();
        var scrollSnapDiv = $('#scroll-snap').scrollTop();

        if (scroll >= 150 || scrollSnapDiv >= 150) {
            $("body").addClass("scrolled-page");
        } else {
            $("body").removeClass("scrolled-page");
        }
    } scrolledNav();


    // --------------------------------------------------------------------------------------
    // Activate scroll functions on scroll ------------------------------------------
    // --------------------------------------------------------------------------------------
    $(window).scroll(function() { 
        headerBG();
        scrolledNav();
    });

    $("#scroll-snap").scroll(function() {
        headerBG();
        scrolledNav();
    });


    // --------------------------------------------------------------------------------------
    // Mobile Navigation --------------------------------------------------------------------
    // --------------------------------------------------------------------------------------
    // Detect when to put up mobile nav -----------------------------------------------------
    function responsiveNav(){
        var logoWidth = 256;
        var screenWidth = $(window).width();
        var safeWidth = screenWidth - logoWidth;
        var navWidth = $('header nav').outerWidth();

        if ( navWidth < safeWidth ) {
            $("body").addClass("desktop-site");
            $("body").removeClass("mobile-site");
        } else {
            $("body").removeClass("desktop-site");
            $("body").addClass("mobile-site");
        }
    }
    responsiveNav();

    $(window).on('resize', function(){
        responsiveNav();
    });


    // Mobile nav button functinality -----------------------------------------------------
    $('.hamburger, .close-nav').click(function() {
        $('.hamburger').toggleClass('open-face');
        $('.overlay-menu').toggleClass('show-overlay-menu');
        $('.mobile-overlay').toggleClass('mobile-overlay-on');

        // Animate mobile menu items one at a time ------------------------------------
        if ( $('#mobile-main-menu li').hasClass('mobile-item-slide') ) {
            $('#mobile-main-menu li').each(function() {
                $(this).removeClass('mobile-item-slide');
            });
        } else {
            var delay = 320;
            $('#mobile-main-menu li').each(function() {
                var $li = $(this);
                setTimeout(function() {
                    $li.addClass('mobile-item-slide');
                }, delay+=160);
            });
        }
    });



    // --------------------------------------------------------------------------------------
    // Clear Whitespace ------------------------------------------------------
    // --------------------------------------------------------------------------------------
    jQuery.fn.cleanWhitespace = function() {
        this.contents().filter(
            function() { return (this.nodeType == 3 && !/\S/.test(this.nodeValue)); })
            .remove();
        return this;
    }
    // Elements to clear whitespace (select parent element)
    $('ul#main-menu, .flags-container, .flags, .tags, .gform_footer').cleanWhitespace();



    // --------------------------------------------------------------------------------------
    // Smooth scroll any anchor tags that stay on same page ---------------------------------
    // --------------------------------------------------------------------------------------
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });


    // --------------------------------------------------------------------------------------
    // Reveal mouse scroll icon - home ------------------------------------------------------
    // --------------------------------------------------------------------------------------
    setTimeout(function () {
        $('#mouse-scroller-icon').addClass('show-mouse-button');
    }, 4000);


    // --------------------------------------------------------------------------------------
    // Dot map ------------------------------------------------------
    // --------------------------------------------------------------------------------------
    $('.flag').each(function() {
        var countryFlag = $(this).children('svg').attr('class');
        var countryTitle = $(this).children('svg').attr('title');
        $('#'+countryFlag+' .dot').addClass('highlight');

        $(this).click(function() {
            // Highlight flag icon ------------------------------------------------------
            if ( $(this).hasClass('active-flag') ) {
                
            } else {
                $('.flag').removeClass('active-flag');
                $(this).addClass('active-flag');
            }

            // Adjust title text ------------------------------------------------------
            var mapTitle = $("#dot-map-title").html();
            var titleLength = mapTitle.length;
            var characterTiming = 75;
            var characterDelay = titleLength*characterTiming;

            $.each(mapTitle.split(''), function (i, letter) {
                setTimeout(function () {
                    $('#dot-map-title').html($('#dot-map-title').html().substring(0, mapTitle.length-1-i));
                }, characterTiming * i);
            });

            var showText = function (target, message, index, interval) {   
                if (index < message.length) {
                    $(target).append(message[index++]);
                    setTimeout(function () { 
                        showText(target, message, index, interval); 
                    }, interval);
                }
            }
            setTimeout(function () {
                showText("#dot-map-title", countryTitle, 0, characterTiming);
            }, characterDelay);


            // Get previous country for functions to follow --------------------------------------------
            var prevCountry = $('#dotted-map').attr('class');

            // Add Country name to map as class ------------------------------------------------------
            if( $(this).attr('class') ) {
                $('#dotted-map').removeAttr('class').promise().done(function() {
                    $('#dotted-map').addClass(countryFlag);
                });
            } else {
                $('#dotted-map').addClass(countryFlag);
            }

            // Animate country dots - keep animation same length despite size of country ------------------------------------
            var delay = 0;
            var dotCount = $('#'+countryFlag+' .dot').length;
            var dotTiming = 1000/dotCount;
            var prevDotCount = $('#'+prevCountry+' .dot').length;
            var prevDotTiming = 1000/prevDotCount;

            if ( $('#dotted-map').hasClass(countryFlag) ) {
                $('#'+prevCountry+' .dot').each(function() {
                    var $nodot = $(this);
                    setTimeout(function() {
                        $nodot.removeClass('active-dot');
                    }, delay+=prevDotTiming);
                });

                $('#'+countryFlag+' .dot').each(function() {
                    var $dot = $(this);
                    setTimeout(function() {
                        $dot.addClass('active-dot');
                    }, delay+=dotTiming);
                });
            }
        });
    });


    // --------------------------------------------------------------------------------------
    // Home Manufacturers ------------------------------------------------------
    // --------------------------------------------------------------------------------------
    // add initial active mfg ------------------------------------------------------
    $('.mfg-logo-container:eq(0), .mfg-excerpt:eq(0)').addClass('active-mfg');

    // MFG logo click functions ------------------------------------------------------
    $('.mfg-logo-container').click(function() {
        var idx = $(this).index();

        $('.mfg-logo-container').removeClass('active-mfg');
        $(this).addClass('active-mfg');

        $('.mfg-excerpt').removeClass('active-mfg');

        setTimeout(function () {
            $('.mfg-excerpt:eq('+idx+')').addClass('active-mfg');
        }, 250);

        mfgThread();
    });

    // calculate and apply total width of logos ------------------------------------------------------
    function mfgThread(){
        var mfgsTotalWidth = 100;

        $( ".mfg-logo-container" ).each(function(i) {
            var mfgWidth = $(this).outerWidth(true);
            mfgsTotalWidth += parseInt(mfgWidth);
        });

        $('.mfg-thread-logos').width(mfgsTotalWidth);
    } mfgThread();

    $(window).on('resize', function(){
        mfgThread();
    });


    // --------------------------------------------------------------------------------------
    // Form field labels ------------------------------------------------------
    // --------------------------------------------------------------------------------------
    function formFieldLabels(){
        $('.gfield--type-text, .gfield--type-email, .gfield--type-phone, .gfield--type-textarea').each(function() {
            var gField = $(this);
            var gFieldLabel = $(this).children('label');
            var gFieldInput = $(this).find('input');
            var gFieldTextArea = $(this).find('textarea');

            // Set initial state of label ----------------------------------------
            if( $(gFieldInput, gFieldTextArea).val() ) {
                $(gFieldLabel).addClass('move-label');
            } else {
                $(gFieldLabel).removeClass('move-label');
            }

            // Move label ----------------------------------------
            gFieldInput.on('focus', function() {
                $(gFieldLabel).addClass('move-label');
            });

            gFieldInput.on('focusout', function() {
                if( $(gFieldTextArea).val() ) {
                    $(gFieldLabel).addClass('move-label');
                } else {
                    $(gFieldLabel).removeClass('move-label');
                }
            });

            gFieldTextArea.on('focus', function() {
                $(gFieldLabel).addClass('move-label');
            });

            gFieldTextArea.on('focusout', function() {
                if( $(gFieldTextArea).val() ) {
                    $(gFieldLabel).addClass('move-label');
                } else {
                    $(gFieldLabel).removeClass('move-label');
                }
            });
        });
    } formFieldLabels();


    // --------------------------------------------------------------------------------------
    // Console Credits ------------------------------------------------------
    // --------------------------------------------------------------------------------------
    console.log("%c ----------------------------------------------------------------------------------------------","color: #000700;");
    console.log("%c Marketing agency of THUNDERSTRUCK AG (https://thunderstruckag.com/)","font-weight: bold; color: #c10230;");
    console.log("%c ----------------------------------------------------------------------------------------------","color: #000700;");

    
});



