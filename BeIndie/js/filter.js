$(document).ready(function(){
    var clicks = 0;
    $(".filter").on("click" , function(){
        if(clicks === 0){
            $(".filter").addClass("active");
            clicks++;
        }else{
            $(".filter").removeClass("active");
            clicks--;
        }
        $(".filter_panel").toggle();
    })
})