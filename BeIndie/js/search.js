
$(document).ready(function() {
    $("#search").keyup(function() {
        $("#display_all").hide();
        var x = $(this).val();
        var searchfor = $("input:radio[name ='searchfor']:checked").val();
        $.ajax(
                {
                    type:"GET",
                    url:"includes/functions/search.php",
                    data:"q="+x + "." + searchfor,
                    success: function(data) {
                        $("#search_result").html(data);
                    }
                })
    })
})


