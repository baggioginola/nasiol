/**
 * Created by mario.cuevas on 6/30/2016.
 */
$(document).ready(function () {
    $('div div a').click(function () {
        $('div a').removeClass("active");
        $(this).addClass("active");
    });
});

$(document).ready(function (e) {
    $("#focal .icon1 a.topimg").addClass("active");

    $("#focal a.topimg").click(function () {
        $("#focal a.topimg").addClass("active");
        $("#focal a.rightimg").removeClass("active");
        $("#focal a.leftimg").removeClass("active");
        $("#focal a.bottomimg").removeClass("active");
    });
    $("#focal a.rightimg").click(function () {
        $("#focal a.topimg").removeClass("active");
        $("#focal a.rightimg").addClass("active");
        $("#focal a.leftimg").removeClass("active");
        $("#focal a.bottomimg").removeClass("active");
    });
    $("#focal a.bottomimg").click(function () {
        $("#focal a.topimg").removeClass("active");
        $("#focal a.rightimg").removeClass("active");
        $("#focal a.leftimg").removeClass("active");
        $("#focal a.bottomimg").addClass("active");
    });
    $("#focal a.leftimg").click(function () {
        $("#focal a.topimg").removeClass("active");
        $("#focal a.rightimg").removeClass("active");
        $("#focal a.leftimg").addClass("active");
        $("#focal a.bottomimg").removeClass("active");
    });
});