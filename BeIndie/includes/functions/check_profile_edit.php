<?php

$uid = $_GET["id"];
session_start();
include ("swConnect.php");

$query1 = "SELECT avatar FROM user u WHERE user_ID='" . $uid . "'";
$result1 = mysqli_query($conn, $query1);
$output1 = mysqli_fetch_assoc($result1);

$uname = $_POST["uname"];
$fname = NULL;
$lname = NULL;
$loc_country = $_POST["location_country"];
$loc_city = $_POST["location_city"];
if (!empty($_POST["fname"])) {
    $fname = $_POST["fname"];
}
if (!empty($_POST["lname"])) {
    $lname = $_POST["lname"];
}
if (!empty($_POST["loc_country"])) {
    $loc_country = $_POST["loc_country"];
}
if (!empty($_POST["loc_city"])) {
    $loc_city = $_POST["loc_city"];
}
$location = NULL;
if ($loc_city != NULL && $loc_country != NULL) {
    $location = $loc_city . ", " . $loc_country;
} else if ($loc_city != NULL && $loc_country == NULL) {
    $location = $loc_city;
} else if ($loc_city == NULL && $loc_country != NULL) {
    $location = $loc_country;
}

$user_bio = NULL;
if ($_POST["bio"] != "Deine Biografie. Schreibe hier unter anderem auch Kontaktdaten für andere Nutzer hinein.") {
    $user_bio = $_POST["bio"];
}

$avatar = "";
//img file upload vars
if ($_FILES['uimg']['size'] > 0) {
    $target_dir = "../../images/u_images/";
    $target_file = $target_dir . basename($_FILES["uimg"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($output1["avatar"] == NULL) {
        $target_file = $target_dir . $uid . "." . $imageFileType;
        $avatar = "images/u_images/" . $uid . "." . $imageFileType;
    } else {
        $target_file = $output1["avatar"];
        $avatar = $output1["avatar"];
    }
    $uploadOk = false;
    // Check if image file is a actual image or fake image
    if ($_FILES['uimg']['error'] == UPLOAD_ERR_OK) {
        if (is_uploaded_file($_FILES['uimg']['tmp_name']))
        {
            $uploadOk = true;
        } else {
            header('Location: ../../index.php?page=edit_profile&id=' . $uid . "&err=img");
            exit(1);
        }
    }

    // Check file size 5MB
    if ($_FILES["uimg"]["size"] > 5000000) {
        header('Location: ../../index.php?page=edit_profile&id=' . $uid . "&err=img1");
        exit(1);
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        header('Location: ../../index.php?page=edit_profile&id=' . $uid . "&err=img0");
        exit(1);
    }
    $tmp = $_FILES["uimg"]["tmp_name"];
    if (move_uploaded_file($tmp, $target_file)) {
        
    } else {
        
        header('Location: ../../index.php?page=edit_profile&id=' . $uid . "&err=img3");
        exit(1);
    }
} else {
    if ($output1["avatar"] != NULL){
        $avatar = $output1["avatar"];
    }
    else{
        $avatar = NULL; 
    }
}

$query2 = "SELECT user_name FROM user WHERE LOWER(user_name) ='" . strtolower($uname) . "' && user_id !='" . $uid . "'";
$result2 = mysqli_query($conn, $query2);

while ($row = mysqli_fetch_assoc($result2)) {
    header('Location: ../../index.php?page=edit_profile&id=' . $uid . "&err=uname");
    exit(1);
}

$query3 = "UPDATE user SET user_name='" . $uname . "', first_name='" . $fname . "', last_name='" . $lname . "', avatar='" . $avatar . "', location='" . $location . "', user_bio ='" . $user_bio . "' WHERE user_ID ='" . $uid . "'";
$result3 = mysqli_query($conn, $query3);

if ($result3 == true) {
    header('Location: ../../index.php?page=edit_profile&id=' . $uid . "&succ=1");
    $_SESSION["username"] = $uname;
    exit();
}