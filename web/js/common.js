$(function() {
    $(".top-line .sf-menu").superfish({
        cssArrows: false,
        hoverClass: 'no-class',
        delay: 200
    });
    var main = $(".sf-menu");
    main.after("<div id='my-menu'>")
        .clone()
        .appendTo("#my-menu");
    var my = $("#my-menu");
    my.find("ul").removeClass("sf-menu");
    my.mmenu({
        extensions : [ 'widescreen', 'theme-white', 'effect-menu-slide', 'pagedim-black' ],
        navbar: {
            title: "Меню"
        }
    });

    var api = my.data("mmenu");
    api.bind("closed", function () {
        $(".toggle-menu").removeClass("on");
    });

    $(".mobile-menu").click(function() {
        var mmAPI = $("#my-menu").data( "mmenu" );
        mmAPI.open();
        var thiss = $(this).find(".toggle-menu");
        thiss.toggleClass("on");
        $(".main-menu").slideToggle();
        return false;
    });
    $(window).resize(function() {
        var mmAPI = $("#my-menu").data( "mmenu" );
        mmAPI.close();
    });

    $(".preloader").fadeOut();
});