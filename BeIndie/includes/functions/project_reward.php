
<?php

session_start();
include ("swConnect.php");



    $rtitle = $_SESSION["rewardname"] = $_POST["rewardname"];
    $ramount = $_SESSION["rewardamount"] = $_POST["rewardamount"];
    $rtext = $_SESSION["rewarddesc"] = $_POST["rewarddesc"];
    $pid = $_SESSION["new_pid"];

    
    $query5 = "insert into reward(r_title, r_text, min_amount, project_ID) values('$rtitle','$rtext','$ramount','$pid')";
    $result5 = mysqli_query($conn, $query5);
    
    

    unset($_SESSION["new_pid"],$_SESSION["editid"],$_SESSION["rewardname"],$_SESSION["rewardamount"],$_SESSION["rewarddesc"],$_SESSION["rewardunits"]);
    
    //header ('Location: ../../index.php?page=new_project3');
    
    header('Location: ../../index.php?page=projects&q='.$pid);
include ("swClose.php"); 

?>