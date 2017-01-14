
$(document).ready(function () {
    //database search via ajax when search value is changed
    $("#search").keyup(function () {
        $("#display_all").hide();
        var x = $(this).val();
        var searchfor = $("input:radio[name ='searchfor']:checked").val();
        var category = [];
        $("input:checkbox[name ='category']:checked").each(function (i) {
            category[i] = $(this).val();
        })
        var q = "q=" + x + "." + searchfor;
        for (var i = 0; i < category.length; i++) {
            q += "." + category[i];
        }
        $.ajax(
                {
                    type: "GET",
                    url: "includes/functions/search.php",
                    data: q,
                    success: function (data) {
                        $("#search_result").html(data);
                    }
                })
    })
    
    //database search via ajax when category value is changed
    $(".category").change(function () {
        $("#display_all").hide();
        var x = $("#search").val();
        var searchfor = $("input:radio[name ='searchfor']:checked").val();
        var category = [];
        $("input:checkbox[name ='category']:checked").each(function (i) {
            category[i] = $(this).val();
        })
        var q = "q=" + x + "." + searchfor;
        for (var i = 0; i < category.length; i++) {
            q += "." + category[i];
        }
        $.ajax(
                {
                    type: "GET",
                    url: "includes/functions/search.php",
                    data: q,
                    success: function (data) {
                        $("#search_result").html(data);
                    }
                })
    })
    
    //database search via ajax when searchfor value is changed
    $(".searchfor").change(function () {
        $("#display_all").hide();
        var x = $("#search").val();
        var searchfor = $("input:radio[name ='searchfor']:checked").val();
        var category = [];
        $("input:checkbox[name ='category']:checked").each(function (i) {
            category[i] = $(this).val();
        })
        var q = "q=" + x + "." + searchfor;
        for (var i = 0; i < category.length; i++) {
            q += "." + category[i];
        }
        $.ajax(
                {
                    type: "GET",
                    url: "includes/functions/search.php",
                    data: q,
                    success: function (data) {
                        $("#search_result").html(data);
                    }
                })
    })
})


