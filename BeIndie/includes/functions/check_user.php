<?php

session_start();
include ("swConnect.php");

$email = strtolower($_POST["email"]);
$psw = $_POST["psw"];

$query = "SELECT crypt_pw, user_name FROM user WHERE LOWER(email) ='" . $email . "'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    if(password_verify($psw, $row["crypt_pw"]))
    {
        $_SESSION["username"] = $row["user_name"];
        header('Location: ../../index.php?page=user_profile');
        exit;
    }
}

$_POST["login_success"] = false;
header('Location: ../../index.php?page=login');
exit(1);