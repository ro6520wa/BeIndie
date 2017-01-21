<?php

session_start();
include ("swConnect.php");

$email = strtolower($_POST["email"]);
$uname = $_POST["uname"];
$psw = $_POST["psw"];
$psw_repeat = $_POST["psw_repeat"];

if(!($psw == $psw_repeat))
{
    header('Location: ../../index.php?page=login&err=psw');
    exit(1);
}

$query1 = "SELECT email, user_name FROM user WHERE LOWER(email) ='" . $email . "'";
$result1 = mysqli_query($conn, $query1);

while ($row = mysqli_fetch_assoc($result1)) {
    header('Location: ../../index.php?page=login&err=email');
    exit(1);
}

$query2 = "SELECT email, user_name FROM user WHERE LOWER(user_name) ='" . strtolower($uname) . "'";
$result2 = mysqli_query($conn, $query2);

while ($row = mysqli_fetch_assoc($result2)) {
    header('Location: ../../index.php?page=login&err=uname');
    exit(1);
}

$crypt_psw = password_hash($psw,  PASSWORD_DEFAULT);

$query3 = "INSERT INTO user (email, user_name, crypt_pw) VALUES ('" . $email . "','" . $uname . "','" . $crypt_psw ."')";

$result3 = mysqli_query($conn, $query3);

if($result3 == true) {
    header('Location: ../../index.php?page=user_profile');
    $_SESSION["username"] = $uname;
    exit();
}