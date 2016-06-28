/**
 * Created by mario.cuevas on 6/27/2016.
 */

//////////////////////
// Top hiden content
//////////////////////

$(function() {

    var megaDrop = $('#hidden-container-trigger');	// Variable to cache container-trigger element.
    var megaContainer = $('#hidden-container');	// Variable to cache hidden-container element.
    $(megaDrop).click(function() {
        $(megaContainer).slideToggle(600,function(){
            if ($(this).is(":hidden")) {
                $("#menu-area").css("height","58px"); // For fixed menu only.
            }
            else {
                $("#menu-area").css("height","auto"); // For fixed menu only.
            }
        });
    });

    // Show container-trigger trigger if content exist.
    if ($('.hidden-container-content').html()) {
        $('#hidden-container-trigger').show();
    } else {
        $('#hidden-container-trigger').hide();
    }

});



/////////////////////
// Top bar dropdown
/////////////////////

$(function() {

    // Language dropdown
    $('#language-switcher').hover(function(){
        $('#language-options').slideDown(0);
    },function(){
        $('#language-options').slideUp(0);
    });

    // Currency dropdown
    $('#currency-switcher').hover(function(){
        $('#currency-options').slideDown(0);
    },function(){
        $('#currency-options').slideUp(0);
    });

    // Top bar links dropdown
    $('#top-links-switcher').hover(function(){
        $('#top-links-options').slideDown(0);
    },function(){
        $('#top-links-options').slideUp(0);
    });

});



/////////////////////
// Fixed menu
/////////////////////

$(function(){

    var menu = $('#menu'),
        pos = menu.offset();

    $(window).scroll(function(){
        if($(this).scrollTop() > pos.top+menu.height() && menu.hasClass('default-menu')){
            menu.fadeOut('fast', function(){
                $(this).removeClass('default-menu').addClass('fixed-menu').fadeIn('fast');
            });
        } else if($(this).scrollTop() <= pos.top && menu.hasClass('fixed-menu')){
            menu.fadeOut('fast', function(){
                $(this).removeClass('fixed-menu').addClass('default-menu').fadeIn('fast');
            });
        }
    });

});



////////////////////
// Thumbnail hover
////////////////////

$(function() {

    // On mouse over
    $(".box-product .boxgrid").hover(function () {

            // Set opacity to 100%
            $(".box-product-info", this).stop().animate({
                opacity: 1
            }, "medium");
        },

        // On mouse out
        function () {

            // Set opacity back to 0%
            $(".box-product-info", this).stop().animate({
                opacity: 0
            }, "medium");

        });

});



///////////////////
// Menu mobile
///////////////////

$(function() {

    // Menu mobile
    $("#menu-mobile-link").on("click", function(){
        $("#menu-mobile-nav").toggle();
        $(this).toggleClass("active");
    });


    // Footer menu mobile
    $('.footer-menu-mobile div').hide();

    $('.footer-menu-mobile h3').click(function() {
        $(this).next('div').slideToggle('fast')
            .siblings('div:visible').slideUp('fast');
    });

});



///////////////////
// Scroll to top
///////////////////

$(function() {

    $.fn.scrollToTop = function() {
        $(this).hide().removeAttr("href");
        if ($(window).scrollTop() != "0") {
            $(this).fadeIn("slow")
        }
        var scrollDiv = $(this);
        $(window).scroll(function() {
            if ($(window).scrollTop() == "0") {
                $(scrollDiv).fadeOut("slow")
            } else {
                $(scrollDiv).fadeIn("slow")
            }
        });
        $(this).click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, "slow")
        })
    }

});

$(function() {
    $("#scroll-to-top").scrollToTop();
});


///////////////////////////////////////////////////
// Top bar cart "Close" button mobile devices fix
///////////////////////////////////////////////////

$(function() {

    $('.success .close, .warning .close, .attention .close, .information .close').on('click', function (event) {
        event.preventDefault();
        $('#notification').removeClass('active');
    });

});
