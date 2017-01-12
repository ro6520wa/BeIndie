//$("#search").on("input", function () {
//    $search = $("#search").val();
//    if ($search.length > 0) {
//        $.get("includes/functions/search.php", {"search": $search}, function ($data) {
//            $("#search_result").html($data);
//        });
//    }
//    var value = $.trim($("#search").val());
//    if (value.length === 0)
//    {
//        //do some stuffs. 
//    }
//});

$(document).ready(function(e) {
    $("#search").keyup(function() {
        $("#display_all").hide();
        var x = $(this).val();
        var name = $("input:radio[name ='searchfor']:checked").val();
        $.ajax(
                {
                    type:"GET",
                    url:"includes/functions/search.php",
                    data:"q="+x + "." + name,
                    success: function(data) {
                        $("#search_result").html(data);
                    }
                })
    })
})


