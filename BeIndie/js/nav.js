jQuery(document).ready(function ()
{
    var navOffset = jQuery(".topnav").offset().top; //62

    jQuery(window).scroll(function ()
    {
        var scrollPos = jQuery(window).scrollTop();

        if (scrollPos >= navOffset)
        {
            jQuery(".topnav").addClass("fixed");
            $('header').css('margin-top', '48px');
//            jQuery(".subnav").addClass("fixed");
//            $('.subnav').css('z-index', '5');
//            $('.subnav').css('margin-top', '60px');
        } else
        {
            jQuery(".topnav").removeClass("fixed");
            $('header').css('margin-top', '0');
        }
    });
});


