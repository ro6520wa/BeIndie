<?php

session_start();
include("swConnect.php");

$uid = $_SESSION["user_id"];
$data = explode(".", $_POST["q"]);
$amount = $data[0];
$proid = $data[1];
$date = date("Y-m-d");
$query_user = "SELECT email FROM user WHERE user_ID=" . $uid;
$result_user = mysqli_query($conn, $query_user);
$output_user = mysqli_fetch_assoc($result_user);
$email = $output_user["email"];

$query_trans = "INSERT INTO transaction (user_email, project_ID, amount, date) VALUES ('" . $email . "','" . $proid . "','" . $amount . "','" . $date . "')";
$result_trans = mysqli_query($conn, $query_trans);

if ($result_trans == true) {
    $query_proj = "UPDATE project SET current_status = current_status + " . $amount . " WHERE project_ID = " . $proid;
    $result_proj = mysqli_query($conn, $query_proj);
    if ($result_trans == true) {
        echo "true";
    } else {
        return;
    }
}