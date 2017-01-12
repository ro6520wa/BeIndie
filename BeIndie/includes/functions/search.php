<?php

//$con = new mysqli("localhost", "root", "", "beindie");
//if (sizeof(($_GET["search"])) > 0) {
//    $query = "SELECT title FROM project WHERE title like '%$_GET[search]%'";
//}
//else
//{
//    $query = "SELECT title FROM project";
//}
//$data=$con->query($query);
//
//
//while ($result = $data->fetch_assoc()) {
//    echo "$result[title]<br/>";
//}

include ("swConnect.php");

$filters = explode(".", $_GET["q"]);

if ($filters[1] == "project_name") {
    if (!empty($filters[0])) {
        $query = "SELECT title FROM project WHERE title like '%$filters[0]%'";
    } else {
        $query = "SELECT title FROM project";
    }

    $result = mysqli_query($conn, $query);
    while ($output = mysqli_fetch_assoc($result)) {
        echo $output["title"] . "<br/>";
    }
} else if ($filters[1] == "user_name") {
    if (!empty($filters[0])) {
        $query = "SELECT title FROM project p JOIN user u ON p.creator=u.email WHERE user_name like '%$filters[0]%'";
    } else {
        $query = "SELECT title FROM project";
    }

    $result = mysqli_query($conn, $query);
    while ($output = mysqli_fetch_assoc($result)) {
        echo $output["title"] . "<br/>";
    }
}



