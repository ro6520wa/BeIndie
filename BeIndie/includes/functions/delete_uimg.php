<?php
session_start();

$uid = $_GET["id"];

include("swConnect.php");

$query = "UPDATE user SET avatar='' WHERE user_ID = '" . $uid . "'";
$result = mysqli_query($conn, $query);

if($result == true){
    $output = mysqli_fetch_assoc($result);
    unlink("../../" . $output["avatar"]);
    header('Location: ../../index.php?page=edit_profile&id=' . $uid . "&succ=1");
    exit();
}
else{
    header('Location: ../../index.php?page=edit_profile&id=' . $uid . "&err=db");
    exit(1);
}