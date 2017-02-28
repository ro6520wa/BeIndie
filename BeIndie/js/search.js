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
        database_query();
    });

    //database search via ajax when category value is changed
    $(".category").change(function () {
        database_query();
    });

    //database search via ajax when searchfor value is changed
    $(".searchfor").change(function () {
        database_query();
    });

    //database search via ajax when OR value is changed
    $(".or").change(function () {
        database_query();
    });

    //database search via ajax when ORDER BY is changed
    $("#order_select").change(function () {
        database_query();
    });

    function database_query() {
        var x = $("#search").val();     //get value of searchbar
        var searchfor = $("input:radio[name ='searchfor']:checked").val();  //search for username or projectname
        var or = false;     //search with or?
        if ($(".or").is(":checked")) {
            or = true;
        }
        var order_by = $("#order_select").find(":selected").text();     //get order_by
        var category = [];      //get all categories set
        $("input:checkbox[name ='category']:checked").each(function (i) {
            category[i] = $(this).val();
        });
        var q = "q=" + x + "." + searchfor + "." + or + "." + order_by;     //build the query string
        for (var i = 0; i < category.length; i++) {
            q += "." + category[i];
        }
        search_ajax(q);
    }
    ;

    //search via ajax
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
});