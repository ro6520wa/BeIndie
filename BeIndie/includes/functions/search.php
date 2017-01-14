<?php
include ("swConnect.php");

$filters = explode(".", $_GET["q"]);
$i = 2;
$no_cats = false;
$cat_string = "";
$cat_title_string = "";
$cat_user_string = "";
$title_string = " title like '%$filters[0]%'";
$user_string = " user_name like '%$filters[0]%'";

//building the string when category filters are set
if (sizeof($filters) > $i) {
    do {
        if ($i == 2) {
            $cat_title_string = $cat_title_string . $title_string . " && category='$filters[$i]'";
            $cat_user_string = $cat_user_string . $user_string . " && category='$filters[$i]'";
            $cat_string = $cat_string . " category='$filters[$i]'";
        } else {
            $cat_title_string = $cat_title_string . "||" . $title_string . " && category='$filters[$i]'";
            $cat_user_string = $cat_user_string . "||" . $user_string . " && category='$filters[$i]'";
            $cat_string = $cat_string . " || category='$filters[$i]'";
        }
        $i++;
    } while ($i < sizeof($filters));
} else {
    $no_cats = true;
}

//do this when no categories are selected
if ($no_cats == true) {
    if ($filters[1] == "project_name") {
        if (!empty($filters[0])) {
            $query = "SELECT title FROM project WHERE" . $title_string;
        } else {
            $query = "SELECT title FROM project";
        }
        
        $result = mysqli_query($conn, $query);
        while ($output = mysqli_fetch_assoc($result)) {
            echo $output["title"] . "<br/>";
        }
    } else if ($filters[1] == "user_name") {
        if (!empty($filters[0])) {
            $query = "SELECT title FROM project p JOIN user u ON p.creator=u.email WHERE" . $user_string;
        } else {
            $query = "SELECT title FROM project";
        }

        $result = mysqli_query($conn, $query);
        while ($output = mysqli_fetch_assoc($result)) {
            echo $output["title"] . "<br/>";
        }
    }
} else {        //do this when categories are selected
    if ($filters[1] == "project_name") {
        if (!empty($filters[0])) {
            $query = "SELECT title FROM project WHERE" . $cat_title_string;
        } else {
            $query = "SELECT title FROM project WHERE" . $cat_string;
        }

        $result = mysqli_query($conn, $query);
        while ($output = mysqli_fetch_assoc($result)) {
            echo $output["title"] . "<br/>";
        }
    } else if ($filters[1] == "user_name") {
        if (!empty($filters[0])) {
            $query = "SELECT title FROM project p JOIN user u ON p.creator=u.email WHERE" . $cat_user_string;
        } else {
            $query = "SELECT title FROM project WHERE" . $cat_string;
        }

        $result = mysqli_query($conn, $query);
        while ($output = mysqli_fetch_assoc($result)) {
            echo $output["title"] . "<br/>";
        }
    }
}



