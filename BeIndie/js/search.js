$(document).ready(function () {
    //initial load of all elements once the document is ready
    $(document).ready(function () {
        var search = $("#search").val();
        var q = "q=" + search + "." + $("input:radio[name ='searchfor']:checked").val();
        search_ajax(q);
    });

    //database search via ajax when search value is changed
    $("#search").keyup(function () {
        $("#display_all").hide();
        var x = $(this).val();
        var searchfor = $("input:radio[name ='searchfor']:checked").val();
        var category = [];
        $("input:checkbox[name ='category']:checked").each(function (i) {
            category[i] = $(this).val();
        });
        var q = "q=" + x + "." + searchfor;
        for (var i = 0; i < category.length; i++) {
            q += "." + category[i];
        }
        search_ajax(q);
    });

    //database search via ajax when category value is changed
    $(".category").change(function () {
        $("#display_all").hide();
        var x = $("#search").val();
        var searchfor = $("input:radio[name ='searchfor']:checked").val();
        var category = [];
        $("input:checkbox[name ='category']:checked").each(function (i) {
            category[i] = $(this).val();
        });
        var q = "q=" + x + "." + searchfor;
        for (var i = 0; i < category.length; i++) {
            q += "." + category[i];
        }
        search_ajax(q);
    });

    //database search via ajax when searchfor value is changed
    $(".searchfor").change(function () {
        $("#display_all").hide();
        var x = $("#search").val();
        var searchfor = $("input:radio[name ='searchfor']:checked").val();
        var category = [];
        $("input:checkbox[name ='category']:checked").each(function (i) {
            category[i] = $(this).val();
        });
        var q = "q=" + x + "." + searchfor;
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


//$(document).ready(function () {
//    $.ajax(
//            {
//                type: "GET",
//                url: "includes/functions/search.php",
//                data: q,
//                success: function (data) {
//                    $("#search_result").html(data);
//                },
//                complete: function () {
//                    searchResultHover();
//                }
//            })
//})