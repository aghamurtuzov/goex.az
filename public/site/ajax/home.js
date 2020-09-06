$(window).on("load", function() {
    $("#fullscreen-slider").slider();
    $("#demo1").slider({
        speed : 500,
        delay : 7000
    });

});

$(document).ready(function () {
    GetLatestReleaseInfo();
});


$('#basicSlider').multislider({
    continuous: true,
    duration: 2000
});
$('#mixedSlider').multislider({
    duration: 750,
    interval: 3000
});

$(function() {
    $('#dg-container').gallery({
        autoplay	:	true
    });
});
