<?php
session_start();

$uid = $_GET["id"];

include("swConnect.php");
$query_temp = "SELECT avatar FROM user WHERE user_ID =" . $uid;
$result_temp = mysqli_query($conn, $query_temp);
$output_temp = mysqli_fetch_assoc($result_temp);
$query = "UPDATE user SET avatar='' WHERE user_ID = '" . $uid . "'";
$result = mysqli_query($conn, $query);

//if the avatar was updated successfully return a success msg and delete the image on the server
if($result == true){
    unlink("../../" . $output_temp["avatar"]); 
    header('Location: ../../index.php?page=edit_profile&id=' . $uid . "&succ=1");
    exit();
}
else{
    header('Location: ../../index.php?page=edit_profile&id=' . $uid . "&err=db");
    exit(1);
}