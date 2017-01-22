<?php
$uid = $_GET["id"];
include ("includes/functions/swConnect.php");

$query1 = "SELECT user_name, first_name, last_name, location, avatar, title, user_bio FROM user u JOIN project p ON u.email=p.creator WHERE user_ID='" . $uid . "'";
$query_projects = "SELECT title, current_status, goal, project_ID FROM user u JOIN project p ON u.email=p.creator WHERE user_ID='" . $uid . "' LIMIT 5";
$result1 = mysqli_query($conn, $query1);
$result_projects = mysqli_query($conn, $query_projects);
$output1 = mysqli_fetch_assoc($result1);
$name = "";
$i = 0;
$allow_edit = false;
if(isset($_SESSION["username"])){
    if ($_SESSION["username"] == $output1["user_name"]){
    $allow_edit = true;
}}

if ($output1["first_name"] == "NULL") {
    $name = $output1["user_name"];
} else {
    $name = $output1["first_name"];
}
?>

<div id="user_wrap">
    <div id="projects">
        <h3><?=$name?>'s Projekte</h3>
        <table>
            <tr>
                <th>Projektname</th>
                <th>Fortschritt</th>
            </tr>
                <?php while ($output2 = mysqli_fetch_assoc($result_projects)) { 
                    if ($i <= 5) {
                    ?>
                    <tr>
                        <td>
                            <a href="index.php?page=projects&q=<?=$output2["project_ID"]?>"><?=$output2["title"]?></a>
                        </td>
                        <td>
                            <?= number_format((($output2["current_status"] / $output2["goal"]) * 100)) . "%" ?>
                        </td>
                    </tr>
                <?php $i++;} } ?>
        </table>
        <a href='index.php?page=my_projects&uname=<?=$output1["user_name"]?>'>Mehr anzeigen</a>
        <h3 class="second">Projekte die <?=$name?> unterstützt</h3>
        <table>
            <tr>
                <th>Projektname</th>
                <th id="amount_th">Betrag</th>
            </tr>
            <?php
            $query2 = "SELECT amount, title, date, t.project_ID FROM user u JOIN transaction t ON u.email=t.user_email"
             . " JOIN project p ON t.project_ID=p.project_ID WHERE user_ID='" . $uid . "' ORDER BY t.date LIMIT 5";
            $result3 = mysqli_query($conn, $query2);
            $i = 0;
            while ($output3 = mysqli_fetch_assoc($result3)) { 
                if ($i <= 5) {
                ?>            
                    <tr>
                        <td>
                            <a href="index.php?page=projects&q=<?=$output3["project_ID"]?>"><?=$output3["title"]?></a>
                        </td>
                        <td>
                            <?=$output3["amount"]?>€
                        </td>
                    </tr>
                
                <?php $i++;} } ?>
        </table>
        <a href='index.php?page=my_projects&uname=<?=$output1["user_name"]?>'>Mehr anzeigen</a>
    </div>
    <div id="user">
        <div id="user_img">
            <?php if ($output1["avatar"] == NULL) {?>
            <img src="images/u_images/standard_avatar.png" alt="user_img"/>
            <?php } else { ?>
            <img src="<?=$output1["avatar"]?>" alt="user_img"/>
            <?php } ?>
            <div id="user_info">
            <p>
                <?php if ($output1["first_name"] == NULL || $output1["last_name"] == NULL) {
                echo "<b>" . utf8_encode($output1["user_name"]) . "</b>";
            } else {
                echo "<b>" . utf8_encode($output1["first_name"]) . " " . utf8_encode($output1["last_name"]) . "</b> <br/>";
                echo utf8_encode($output1["user_name"]);
            }?>
            </p>
            <p>
                <b>
                   <?php if ($output1["location"] != "NULL") {?>
                    <i class="fa fa-map-marker" aria-hidden="true" style='color:#4CAF50'></i><a href='http://maps.google.com/?q=<?=utf8_encode($output1["location"])?>'> <?=utf8_encode($output1["location"])?></a> 
                   <?php } ?>
                </b>
            </p>
            <?php if ($allow_edit == true){?>
            <a href="index.php?page=edit_profile&id=<?=$uid?>" style="color:blue">Profil bearbeiten</a>
            <?php } ?>
        </div>
        </div>
        <div id="user_bio">
            <h2><?=$name?>'s Biografie</h2>
            <?php if($output1["user_bio"] == NULL) {?>
            Dieser Nutzer hat leider noch keine Biografie festgelegt.
            <?php } else {
                echo utf8_encode($output1["user_bio"]);
            } ?>
        </div>
    </div>
</div>
