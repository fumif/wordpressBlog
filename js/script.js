jQuery(document).ready(function($) {

    $window = $(window);
    $menu = $('#responsive-menu');
    var mh = $menu.height()
    var wh = $window.height();

    var ds = 'disable-scrolling';


    // Open Search Form
    $('.open').click(function() {
        /* Act on the event */
        $('#search').addClass('d-block').removeClass('d-none');
        $('body').addClass(ds);
    });

    $('.closebtn').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('d-none').removeClass('d-block');
        $('body').removeClass(ds);
    });

    // Open Responsive Menu
    $('.open-menu').on('click', function(event) {
        event.preventDefault();
        $menu.toggleClass('d-none').toggleClass('d-flex');
        if ($menu.hasClass('d-flex') && mh < wh) {
            $('body').addClass(ds);
        } else {
            $('body').removeClass(ds);
        }
    });


    $window.load().resize(function(event) {
        if ($window.width() > 800) {
            $menu.removeClass('d-flex').addClass('d-none');
            $('body').removeClass(ds);
        }
    });



    // Scroll top button
    $scrollBtn = $('.scrollTop');
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.scrollTop').fadeIn('slow');
        } else {
            $('.scrollTop').fadeOut('slow');
        }
    });

    //Click event to scroll to top
    $('.scrollTop').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });




    // submenu 
 $('.submenu').hide();
    $('.post-category-menu').children().mouseover(function(event) {
        $(this).children('.submenu').stop().slideDown({
                    duration: 600,
                    easing: "easeInOutQuint"
                });

    }).mouseleave(function(event) {
        $(this).children('.submenu').stop().slideUp({
                    duration: 600,
                    easing: "easeInOutQuint"
                });
    });


});