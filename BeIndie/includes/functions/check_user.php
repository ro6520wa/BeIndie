<?php

session_start();
include ("swConnect.php");

$email = strtolower($_POST["email"]);
$psw = $_POST["psw"];

$query = "SELECT crypt_pw, user_name FROM user WHERE LOWER(email) ='" . $email . "'";
$result = mysqli_query($conn, $query);

//check if the given email is in the database
while ($row = mysqli_fetch_assoc($result)) {
    //if the password matches the email set the session parameters and exit with a success msg
    if(password_verify($psw, $row["crypt_pw"]))
    {
        $_SESSION["username"] = $row["user_name"];
        $query2 = "SELECT user_id FROM user WHERE user_name='" . $_SESSION["username"] . "'";
        $result2 = mysqli_query($conn, $query2);
        $id = mysqli_fetch_assoc($result2);
        $_SESSION["user_id"] = $id["user_id"];
        header('Location: ../../index.php?page=start&login=succ');
        exit;
    }
}

header('Location: ../../index.php?page=login&err=login');
exit(1);