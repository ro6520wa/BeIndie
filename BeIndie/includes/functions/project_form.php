    
<?php 

include ("includes/functions/swConnect.php");

    $title = $_SESSION["form_title"];
    $cat = $_SESSION["form_category"];

    $user = $_SESSION["username"];
    $query1 = "insert into project(creator, title, category) VALUES ((SELECT email from user where user_name = '$user'), '$title', '$cat')";
    $result1 = mysqli_query($conn, $query1);
   
    
include ("includes/functions/swClose.php");  
    
?>