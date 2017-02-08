
<?php

session_start();
include ("swConnect.php");


    echo $_SESSION["new_pid"];

    $rtitle = $_SESSION["rewardname"] = $_POST["rewardname"];
    $ramount = $_SESSION["rewardamount"] = $_POST["rewardamount"];
    $rtext = $_SESSION["rewarddesc"] = $_POST["rewarddesc"];
    $pid = $_SESSION["new_pid"];
       
    
                        
    $query2 = "insert reward(project_ID) values('$pid')";
    $result2 = mysqli_query($conn, $query2); 
    
    
    $query = "select reward_ID from reward where project_ID = $pid";
    $result = mysqli_query($conn, $query);  
    $row = mysqli_fetch_array($result);
    $rewardid = $row["reward_ID"];
    

    
    $query3 = "update reward set r_text='$rtext' WHERE project_ID= $rewardid";
    $result3 = mysqli_query($conn, $query3);
    
    $query4 = "update reward set min_amount='$ramount' WHERE project_ID= $rewardid";
    $result4 = mysqli_query($conn, $query4); 
    
    
    unset($_SESSION["new_pid"],$_SESSION["editid"],$_SESSION["rewardname"],$_SESSION["rewardamount"],$_SESSION["rewarddesc"],$_SESSION["rewardunits"]);
    
    
    header('Location: ../../index.php?page=projects&q='.$pid);
include ("swClose.php"); 
?>