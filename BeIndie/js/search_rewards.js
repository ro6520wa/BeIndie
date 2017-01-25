$(document).ready(function () {
    //load the rewards initially
    var amount = $("#enter_amount").val();
    var proid = $("#proid").val();
    var q = "q=" + amount + "." + proid;
    search_rewards_ajax(q);
    
    //load the rewards
    $("#enter_amount").keyup(function(){
        var amount = $("#enter_amount").val();
        var proid = $("#proid").val();
        var q = "q=" + amount + "." + proid;
        search_rewards_ajax(q);
    })
    
    //do the transaction
    $("#support_button").on("click", function(){
        var amount = $("#enter_amount").val();
        var proid = $("#proid").val();
        var q = "q=" + amount + "." + proid;
        $.ajax(
                {
                    type: "POST",
                    url: "includes/functions/insert_transaction.php",
                    data: q,
                    success: function (data) {
                        if (data !== ""){
                            window.location.href = "index.php?page=projects&q=" + proid + "&succ=1";
                        }
                        else{
                            window.location.href = "index.php?page=support_project&id=" + proid + "&succ=0";
                        }
                    }
                })
    })
    //fadout error if needed
    if ($("#error").css("display") === "block")
    {
        $("#error").delay(500).fadeOut(2500);
    }
})

function search_rewards_ajax(q){
            $.ajax(
            {
                type: "GET",
                url: "includes/functions/search_rewards.php",
                data: q,
                success: function (data) {
                    $("#rewards").html(data);
                }
            })
}