
<?php
session_start();
    include ("swConnect.php");
    
    $_SESSION["descbox"] = $_POST["descbox"] ;
    $newdesc = $_SESSION["descbox"];
    
    $pid = $_SESSION["new_pid"];
    $query1 = "update project set description='$newdesc' WHERE project_ID= $pid";
    $result1 = mysqli_query($conn, $query1); 
    
    
    
    $_SESSION["rewardunits"] = $_POST["rewardunits"];

    
    //header ('Location: ../../index.php?page=new_project2');
    header ('Location: ../../index.php?page=new_project3');
    include ("swClose.php");  
?>

