<?php

$uname = $_GET["uname"];
$sess_user = "";
if(isset($_SESSION["username"])){
    $sess_user = $_SESSION["username"];
}

include ("includes/functions/swConnect.php");
$query = "SELECT user_name, first_name, user_ID FROM user WHERE user_name ='" . $uname . "'";
$result = mysqli_query($conn, $query);
$query_myprojects = "SELECT title, current_status, goal, project_ID, UNIX_TIMESTAMP(end_date), category FROM user u JOIN project p ON u.email=p.creator WHERE u.user_name='" . $uname . "'";
$query_supportprojects = "SELECT creator, amount, title, category, date, t.project_ID FROM user u JOIN transaction t ON u.email=t.user_email"
                        . " JOIN project p ON t.project_ID=p.project_ID WHERE u.user_name='" . $uname . "'";
$result_myprojects = mysqli_query($conn, $query_myprojects);
$result_supportprojects = mysqli_query($conn, $query_supportprojects);
$output = mysqli_fetch_assoc($result);
$name = "";

if ($output["first_name"] == NULL) {
    $name = $output["user_name"];
} else {
    $name = $output["first_name"];
}

$allow_edit = false;
if($output["user_name"] == $sess_user){
    $allow_edit = true;
}

?>

<div id="myproject_wrap">
    <div id="myprojects_table">
        <h2><?=$name?>'s Projekte</h2>
        <table>
            <tr>
                <th class="first">
                    Projektname
                </th>
                <th class="second">
                    Kategorie
                </th>
                <th class="third">
                    Fortschritt
                </th>
                <th class="fourth">
                    Endet in
                </th>
            </tr>
            <?php
               while($output1 = mysqli_fetch_assoc($result_myprojects)){ ?>
            <tr>
                <td>
                    <a class="project_links" href="index.php?page=projects&q=<?=$output1["project_ID"]?>"><?=$output1["title"]?></a>
                    <?php if($allow_edit == true) { $_SESSION["editid"] = $output1["project_ID"];?> <a class="edit_links" href="index.php?page=new_project2"><i class="fa fa-pencil" aria-hidden="true"></i></a> <?php } ?>
                </td>
                <td>
                    <?=$output1["category"]?>
                </td>
                <td>
                    <div class='percent_goal'>
                        <?php
                            $percent = number_format((($output1["current_status"] / $output1["goal"]) * 100));
                            echo $percent . "%";
                        ?>
                    </div>
                    <div class='goal_bar_table'><div class='current_bar_table' style='width:<?= $percent ?>%'></div></div>
                </td>
                <td>
                    <?php
                        $time = round(($output1["UNIX_TIMESTAMP(end_date)"] - strtotime(date('Y-m-d'))) / 3600);
                        $days = round(($output1["UNIX_TIMESTAMP(end_date)"] - strtotime(date('Y-m-d'))) / 86400);
                        $is_finished = false;
                        if ($time <= 0) {
                            echo 'Fertig';
                            $is_finished = true;
                        } elseif ($time > 72) {
                            echo $days . " Tagen";
                        } else {
                            echo $time . " Stunden";
                        }
                    ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div id="supportprojects_table">
        <h2>Projekte, die <?=$name?> unterstützt</h2>
        <table>
            <tr>
                <th class="first">
                  Projektname
                </th>
                <th class="second">
                    Projektkategorie
                </th>
                <th class="third_1">
                    Betrag
                </th>
                <th class="third_2">
                    Projektersteller
                </th>
                <th class="fourth">
                    Datum
                </th>
            </tr>
            <?php while($output2 = mysqli_fetch_assoc($result_supportprojects)) { ?>
            <tr>
                <td>
                    <a class="project_links" href="index.php?page=projects&q=<?=$output2["project_ID"]?>"><?=$output2["title"]?></a>
                </td>
                <td>
                    <?=$output2["category"]?>
                </td>
                <td>
                    <?=$output2["amount"]?>€
                </td>
                <td>
                    <?php $query_temp = "SELECT user_name, user_ID FROM user WHERE email='" . $output2["creator"] . "'";
                          $result_temp = mysqli_query($conn, $query_temp);
                          $output_temp = mysqli_fetch_assoc($result_temp);
                          echo "<a class='user_links' href='index.php?page=user_profile&id=" . $output_temp["user_ID"] ."'>" . $output_temp["user_name"] . "</a>";
                    ?>
                </td>
                <td>
                    <?=date("d.m.Y",strtotime($output2["date"]))?>
                </td>
            </tr>            
            <?php } ?>
        </table>
    </div>
    <a id="profile_link" href="index.php?page=user_profile&id=<?=$output["user_ID"]?>">Zu <?=$name?>'s Profil</a>
</div>
    
    