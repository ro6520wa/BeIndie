<?php

include ("swConnect.php");

$filters = explode(".", $_GET["q"]);
$i = 2;
$no_cats = false;
$cat_string = " WHERE";
$cat_title_string = "";
$cat_user_string = "";
$title_string = " title like '%$filters[0]%'";
$user_string = " user_name like '%$filters[0]%'";
$select_string = "SELECT p.project_ID, title, goal, current_status, start_date, end_date, user_name, image_path";
$from_join_string = " FROM project p JOIN user u ON p.creator=u.email JOIN project_image pi ON p.project_ID=pi.project_ID";
$group_string = " GROUP BY p.project_ID";

//building the string when category filters are set
if (sizeof($filters) > $i) {
    do {
        if ($i == 2) {
            $cat_title_string = $cat_title_string . " WHERE" . $title_string . " && category='$filters[$i]'";
            $cat_user_string = $cat_user_string . " WHERE" . $user_string . " && category='$filters[$i]'";
            $cat_string = $cat_string . " category='$filters[$i]'";
        } else {
            $cat_title_string = $cat_title_string . " ||" . $title_string . " && category='$filters[$i]'";
            $cat_user_string = $cat_user_string . " ||" . $user_string . " && category='$filters[$i]'";
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
            $query = $select_string . $from_join_string . " WHERE" . $title_string . $group_string;
        } else {
            $query = $select_string . $from_join_string . $group_string;
        }

        $result = mysqli_query($conn, $query);
        while ($output = mysqli_fetch_assoc($result)) {
            search_output($output);
        }
    } else if ($filters[1] == "user_name") {
        if (!empty($filters[0])) {
            $query = $select_string . $from_join_string . " WHERE" . $user_string . $group_string;
        } else {
            $query = $select_string . $from_join_string . $group_string;
        }

        $result = mysqli_query($conn, $query);
        while ($output = mysqli_fetch_assoc($result)) {
            search_output($output);
        }
    }
} else {        //do this when categories are selected
    if ($filters[1] == "project_name") {
        if (!empty($filters[0])) {
            $query = $select_string . $from_join_string . $cat_title_string . $group_string;
        } else {
            $query = $select_string . $from_join_string . $cat_string . $group_string;
        }

        $result = mysqli_query($conn, $query);
        while ($output = mysqli_fetch_assoc($result)) {
            search_output($output);
        }
    } else if ($filters[1] == "user_name") {
        if (!empty($filters[0])) {
            $query = $select_string . $from_join_string . $cat_user_string . $group_string;
        } else {
            $query = $select_string . $from_join_string . $cat_string . $group_string;
        }

        $result = mysqli_query($conn, $query);
        while ($output = mysqli_fetch_assoc($result)) {
            search_output($output);
        }
    }
}

function search_output($output) {
    echo "<div class = 'projects_display'>";
        echo "<div class = 'project_img'>";
            echo "<a href='index.php?page=projects&q=" . $output["project_ID"] .
                "'><img src='" . $output["image_path"] . "'></a>";
            echo "<a class='support_button' href='index.php?page=projects&q=" .$output["project_ID"] . 
                 "'><button type='button'>Unterstützen</button></a>";
        echo "</div>";
        echo "<h3 class='project_title'>";
            echo "<a href='index.php?page=projects&q=" . $output["project_ID"] . "'>" .
                $output["title"] . "</a>";
        echo "</h3>";
        echo "<p class='project_user'>";
            echo $output["user_name"];
        echo "</p>";
        echo "<div class'percent_goal'>";
            $percent = number_format((($output["current_status"] / $output["goal"])*100));
            echo $percent . "%";
        echo "</div>";
        echo "<div class='goal_bar'><div class='current_bar' style='width:" .
            $percent . "%'></div></div>";
        echo "<div class='project_stats'>";
            echo "<table>";
                echo "<tr>";
                    echo "<th>";
                        echo $output["current_status"] . "€";
                    echo "</th>";
                    echo "<th>";
                        echo $output["goal"] . "€";
                    echo "</th>";
                    echo "<th>";
                        $datetime1 = new DateTime($output["start_date"]);
                        $datetime2 = new DateTime($output["end_date"]);
                        $interval = $datetime1->diff($datetime2);
                        echo $interval->format('%a Tage');
                    echo "</th>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>";
                        echo "Stand";
                    echo "</td>";
                    echo "<td>";
                        echo "Ziel";
                    echo "</td>";
                    echo "<td>";
                        echo "bis zum Ziel";
                    echo "</td>";
                echo "</tr>";
            echo "</table>";
        echo "</div>";
    echo "</div>";
}