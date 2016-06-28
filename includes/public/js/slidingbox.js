/**
 * Created by mario.cuevas on 6/27/2016.
 */
///////////////
// LEFT SIDE
///////////////

// custom YouTube box
(function(TVA){
    TVA(document).ready(function(){
        var $dur = "medium"; // Duration of Animation
        TVA(".custom-youtube-box").css({left:-472})
        TVA(".custom-youtube-box").hover(function () {
            TVA(this).stop().animate({
                left: 0
            }, $dur);
        }, function () {
            TVA(this).stop().animate({
                left: -472
            }, $dur);
        });
        TVA(".custom-youtube-box").show();
    });
})(jQuery);

// custom HTML/text box
(function(TVA){
    TVA(document).ready(function(){
        var $dur = "medium"; // Duration of Animation
        TVA(".custom-html-box").css({left:-302})
        TVA(".custom-html-box").hover(function () {
            TVA(this).stop().animate({
                left: 0
            }, $dur);
        }, function () {
            TVA(this).stop().animate({
                left: -302
            }, $dur);
        });
        TVA(".custom-html-box").show();
    });
})(jQuery);



///////////////
// RIGHT SIDE
///////////////

// custom Facebook like box
(function(TVA){
    TVA(document).ready(function(){
        var $dur = "medium"; // Duration of Animation
        TVA(".custom-fb-box").css({right:-304})
        TVA(".custom-fb-box").hover(function () {
            TVA(this).stop().animate({
                right: 0
            }, $dur);
        }, function () {
            TVA(this).stop().animate({
                right: -304
            }, $dur);
        });
        TVA(".custom-fb-box").show();
    });
})(jQuery);

// custom Twitter box
(function(TVA){
    TVA(document).ready(function(){
        var $dur = "medium"; // Duration of Animation
        TVA(".custom-twitter-box").css({right:-304})
        TVA(".custom-twitter-box").hover(function () {
            TVA(this).stop().animate({
                right: 0
            }, $dur);
        }, function () {
            TVA(this).stop().animate({
                right: -304
            }, $dur);
        });
        TVA(".custom-twitter-box").show();
    });
})(jQuery);
