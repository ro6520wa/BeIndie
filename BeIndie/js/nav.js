jQuery(document).ready(function ()
{
    var navOffset = jQuery(".topnav").offset().top; //62

//    jQuery(".topnav").wrap('<div class="nav-placeholder"></div>');
//    jQuery(".nav-placeholder").height(jQuery(".topnav").outerHeight);

    jQuery(window).scroll(function()
    {
        var scrollPos = jQuery(window).scrollTop();
        
        if (scrollPos >= navOffset)
        {
            jQuery(".topnav").addClass("fixed");
            $('header').css('margin-top', '48px');
        }
        else
        {
            jQuery(".topnav").removeClass("fixed");
            $('header').css('margin-top', '0');
        }
    });
});


