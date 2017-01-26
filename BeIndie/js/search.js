$(document).ready(function () {
    //initial load of all elements once the document is ready
    $(document).ready(function () {
        var search = $("#search").val();
        var or = false;
        var q = "q=" + search + "." + $("input:radio[name ='searchfor']:checked").val() + "." + or + ".Neueste";
        search_ajax(q);
    });
    
    //database search via ajax when search value is changed
    $("#search").keyup(function () {
        var x = $(this).val();
        var searchfor = $("input:radio[name ='searchfor']:checked").val();
        var or = false;
        if($(".or").is(":checked")){
            or = true;
        }
        var order_by = $("#order_select").find(":selected").text();
        var category = [];
        $("input:checkbox[name ='category']:checked").each(function (i) {
            category[i] = $(this).val();
        });
        var q = "q=" + x + "." + searchfor + "." + or + "." + order_by;
        for (var i = 0; i < category.length; i++) {
            q += "." + category[i];
        }
        search_ajax(q);
    });

    //database search via ajax when category value is changed
    $(".category").change(function () {
        var x = $("#search").val();
        var searchfor = $("input:radio[name ='searchfor']:checked").val();
        var or = false;
        if($(".or").is(":checked")){
            or = true;
        }
        var order_by = $("#order_select").find(":selected").text();
        var category = [];
        $("input:checkbox[name ='category']:checked").each(function (i) {
            category[i] = $(this).val();
        });
        var q = "q=" + x + "." + searchfor + "." + or + "." + order_by;
        for (var i = 0; i < category.length; i++) {
            q += "." + category[i];
        }
        search_ajax(q);
    });

    //database search via ajax when searchfor value is changed
    $(".searchfor").change(function () {
        var x = $("#search").val();
        var searchfor = $("input:radio[name ='searchfor']:checked").val();
        var or = false;
        if($(".or").is(":checked")){
            or = true;
        }
        var order_by = $("#order_select").find(":selected").text();
        var category = [];
        $("input:checkbox[name ='category']:checked").each(function (i) {
            category[i] = $(this).val();
        });
        var q = "q=" + x + "." + searchfor + "." + or + "." + order_by;
        for (var i = 0; i < category.length; i++) {
            q += "." + category[i];
        }
        search_ajax(q);
    });
    
    //database search via ajax when OR value is changed
    $(".or").change(function () {
        var x = $("#search").val();
        var searchfor = $("input:radio[name ='searchfor']:checked").val();
        var or = false;
        if($(".or").is(":checked")){
            or = true;
        }
        var order_by = $("#order_select").find(":selected").text();
        var category = [];
        $("input:checkbox[name ='category']:checked").each(function (i) {
            category[i] = $(this).val();
        });
        var q = "q=" + x + "." + searchfor + "." + or + "." + order_by;
        for (var i = 0; i < category.length; i++) {
            q += "." + category[i];
        }
        search_ajax(q);
    });
    
    //database search via ajax when ORDER BY is changed
    $("#order_select").change(function () {
        var x = $("#search").val();
        var searchfor = $("input:radio[name ='searchfor']:checked").val();
        var or = false;
        if($(".or").is(":checked")){
            or = true;
        }
        var order_by = $("#order_select").find(":selected").text();
        var category = [];
        $("input:checkbox[name ='category']:checked").each(function (i) {
            category[i] = $(this).val();
        });
        var q = "q=" + x + "." + searchfor + "." + or + "." + order_by;
        for (var i = 0; i < category.length; i++) {
            q += "." + category[i];
        }
        search_ajax(q);
    });
    
});

function search_ajax(q) {
    $.ajax(
            {
                type: "GET",
                url: "includes/functions/search.php",
                data: q,
                success: function (data) {
                    $("#search_result").html(data);
                },
                complete: function () {
                    searchResultHover();
                }
            })
}