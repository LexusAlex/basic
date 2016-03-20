$(function() {
    $(".top-line .sf-menu").superfish({
        cssArrows: false,
        hoverClass: 'no-class',
        delay: 200
    });

    $(".mobile-menu").click(function() {
        /*var mmAPI = $("#my-menu").data( "mmenu" );
        mmAPI.open();*/
        var thiss = $(this).find(".toggle-menu");
        thiss.toggleClass("on");
        $(".main-menu").slideToggle();
        return false;
    });
});