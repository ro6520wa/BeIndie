jQuery(document).ready(function ()
{
    var navOffset = jQuery(".topnav").offset().top; //62

    jQuery(window).scroll(function ()
    {
        var scrollPos = jQuery(window).scrollTop();

        if (scrollPos >= navOffset)
        {
            $(".topnav").addClass("fixed");
            $("header").css("margin-top", "48px");
            $(".subnav").css("position", "fixed");
        } else
        {
            $(".topnav").removeClass("fixed");
            $("header").css("margin-top", "0");
            $(".subnav").css("position", "absolute");
        }
    });
});


