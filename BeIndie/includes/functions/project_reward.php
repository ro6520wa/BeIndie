
<?php

session_start();
include ("swConnect.php");


    echo $_SESSION["new_pid"];

    $rtitle = $_SESSION["rewardname"] = $_POST["rewardname"];
    $ramount = $_SESSION["rewardamount"] = $_POST["rewardamount"];
    $rtext = $_SESSION["rewarddesc"] = $_POST["rewarddesc"];
    $pid = $_SESSION["new_pid"];
    
    $query1 = "update reward set r_title='$rtitle' WHERE project_ID= $pid";
    $result1 = mysqli_query($conn, $query1);    
    
    $query2 = "update reward set min_amount='$ramount' WHERE project_ID= $pid";
    $result2 = mysqli_query($conn, $query2); 
    
    $query3 = "update reward set r_text='$rtext' WHERE project_ID= $pid";
    $result3 = mysqli_query($conn, $query3);
    
    
    header('Location: ../../index.php?page=projects&q='.$pid);
include ("swClose.php"); 
?>