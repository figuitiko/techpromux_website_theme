/*!
 * Start Bootstrap - Agency Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
jQuery(function() {
    jQuery('a.page-scroll').bind('click', function(event) {
        var jQueryanchor = jQuery(this);
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(jQueryanchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Highlight the top nav as scrolling occurs
jQuery('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
jQuery('.navbar-collapse ul li a').click(function() {
    jQuery('.navbar-toggle:visible').click();
});

//link to top

jQuery('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

var amountScrolled = 300;

jQuery(window).scroll(function() {
    if ( jQuery(window).scrollTop() > amountScrolled ) {
        jQuery('a.back-to-top').fadeIn('slow');
    } else {
        jQuery('a.back-to-top').fadeOut('slow');
    }
});