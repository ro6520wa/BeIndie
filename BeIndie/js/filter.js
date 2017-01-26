//var acc = document.getElementsByClassName("filter");
//var i;
$(document).ready(function(){
    var clicks = 0;
    $(".filter").on("click" , function(){
        if(clicks === 0){
            $(".filter").addClass("active");
        }else{
            $(".filter").removeClass("active");
        }
        $(".filter_panel").toggle();
    })
})
//for (i = 0; i < acc.length; i++) {
//    acc[i].onclick = function(){
//        this.classList.toggle("active");
//        this.nextElementSibling.classList.toggle("show");
//    }
//}




