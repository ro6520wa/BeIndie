<?php
$proid = 0;
if(isset($_GET["id"])){
    $proid = $_GET["id"];
}

$err = false;
if(isset($_GET["succ"])){
    if($_GET["succ"] == "0"){
        $err = true;
    }
}

$uname = "";
if(!isset($_SESSION["username"])){
    header("Location: index.php?page=login");
    exit(1);
}else{
    $uname = $_SESSION["username"];
}
include("includes/functions/swConnect.php");
$query_project = "SELECT title, image_path FROM project p JOIN project_image pi ON p.project_ID=pi.project_ID WHERE p.project_ID=" . $proid . " GROUP BY title";
$result_project = mysqli_query($conn, $query_project);
$output_project = mysqli_fetch_assoc($result_project);
?>

<div id='error' class='<?php if ($err == true) {echo "show_err";} ?>'>
   <div id="trans_error" class='<?php if ($err == true) {echo "show_err";} ?>'><i class="fa fa-times" aria-hidden="true"></i>
        Es gab einen Fehler beim Verarbeiten deiner Bezahlung!
    </div>
</div>  

<div id="project">
    <div id="title"><h1><?=$output_project["title"]?></h1></div>
    <div id="img">
        <img src="<?=$output_project["image_path"]?>"
    </div>
</div>

<div id="support_wrap">
    <input type=hidden value="<?=$proid?>" id="proid">
    <h2>Bitte gib einen <b>Betrag in €</b> ohne Cent ein(z.B. 50)</h2>
    <div id="input_amount"><input type="text" id="enter_amount" name="enter_amount" placeholder="50" required></div>
    <div id="rewards"></div>
    <div id="submit_button"></div>
    <a id="support_button">Unterstützen</a>
</div>
<script src="js/search_rewards.js" type="text/javascript"></script>

<?php

include("includes/functions/swClose.php");