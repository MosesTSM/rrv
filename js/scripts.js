jQuery( document ).ready( function ( $ ) {


    // --------------------------------------------------------------------------------------
    // Mobile Navigation --------------------------------------------------------------------
    // --------------------------------------------------------------------------------------
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
    // Console Credits ------------------------------------------------------
    // --------------------------------------------------------------------------------------
    console.log("%c ----------------------------------------------------------------------------------------------","color: #000700;");
    console.log("%c RRV Canola Disk sold and distributed by Thunderstruck Ag (https://thunderstruckag.com/)","font-weight: bold; color: #c10230;");
    console.log("%c ----------------------------------------------------------------------------------------------","color: #000700;");

    
});



