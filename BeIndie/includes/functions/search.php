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
$select_string = "SELECT p.project_ID, title, goal, current_status, UNIX_TIMESTAMP(end_date), user_name, image_path, description, user_id";
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
    $desc = file_get_contents("../../" . $output["description"]);
    if (strlen($desc) > 450) {
        $desc = substr($desc, 0, 450) . "...";
    }
    ?>
    <div class = 'projects_display'>
        <div class = 'project_img'>
            <a href='index.php?page=projects&q=<?= $output["project_ID"] ?>'><img src='<?= $output["image_path"] ?>'></a>
            <a href='index.php?page=projects&q=<?= $output["project_ID"] ?>'> <p class="desc_text"><?php echo $desc;?></p></a>
            <!--<ul><li class="support_button"><a href='index.php?page=projects&q=<? $output["project_ID"] ?>'>Unterstützen</a></li></ul>-->
        </div>
        <h3 class='project_title'>
            <a href='index.php?page=projects&q=<?= $output["project_ID"] ?>'>
                <?= $output["title"] ?></a>
        </h3>
        <p class='project_user'>
            <a href="index.php?page=user_profile&id=<?=$output["user_id"]?>"><?= $output["user_name"] ?></a>
        </p>
        <div class='percent_goal'>
            <?php
            $percent = number_format((($output["current_status"] / $output["goal"]) * 100));
            echo $percent . "%";
            ?>
        </div>
        <div class='goal_bar'><div class='current_bar' style='width:<?= $percent ?>%'></div></div>
        <div class='project_stats'>
            <table>
                <tr>
                    <th>
                        <?= $output["current_status"] ?> €
                    </th>
                    <th>
                        <?= $output["goal"] ?> €
                    </th>
                    <th>
                        <?php
                        $time = round(($output["UNIX_TIMESTAMP(end_date)"] - strtotime(date('Y-m-d'))) / 3600);
                        $days = round(($output["UNIX_TIMESTAMP(end_date)"] - strtotime(date('Y-m-d'))) / 86400);
                        $is_finished = false;
                        if ($time <= 0) {
                            echo 'Fertig';
                            $is_finished = true;
                        } elseif ($time > 72) {
                            echo $days . " Tage";
                        } else {
                            echo $time . " Stunden";
                        }
                        ?>
                    </th>
                </tr>
                <tr>
                    <td>
                        Stand
                    </td>
                    <td>
                        Ziel
                    </td>
                    <td>
                        <?php
                        if (!$is_finished) {
                            echo "bis zum Ziel";
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php } ?>