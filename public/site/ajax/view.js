$("#form").validate();
$(function () {
    $(window).on("scroll", function () {
        if ($(window).scrollTop()) {
            $(".header_bottom").addClass("fixed");
        } else {
            $(".header_bottom").removeClass("fixed");
        }
    });
})

$('.totop').tottTop({
    scrollTop: 100
});
