$(document).ready(function () {
    searchResultHover();
});

function searchResultHover() {
    $(".project_img").hover(
            function () {
                $(this).find(">:first-child").addClass("project_img_opacity");
                $(this).find(".desc_text").show();
//                $(this).find(".support_button").addClass("support_button_show");
            }, function () {
        $(this).find(">:first-child").removeClass("project_img_opacity");
        $(this).find(".desc_text").hide();
//        $(this).find(".support_button").removeClass("support_button_show");
    });
};