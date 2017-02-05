<?php
$uid = $_GET["id"];
$uname_err = false;
$img_err = false;
$edit_succ = false;
$img_string = "";
if (isset($_GET["err"])) {
    $err = $_GET["err"];
    if ($err == "uname") {
        $uname_err = true;
    }
    if ($err == "img") {
        $img_err = true;
        $img_string = "Das Bild wird nicht akzeptiert. Das ist kein Bild.";
    }
    if ($err == "img1") {
        $img_err = true;
        $img_string = "Das Bild wird nicht akzeptiert. Max. Dateigröße 5MB.";
    }
    if ($err == "img0") {
        $img_err = true;
        $img_string = "Das Bild wird nicht akzeptiert. Akzeptierte Dateiformate: JPG, JPEG, PNG, and GIF.";
    }
    if ($err == "img2") {
        $img_err = true;
        $img_string = "Es gab einen Fehler beim Löschen deines alten Bildes.";
    }
    if ($err == "img3") {
        $img_err = true;
        $img_string = "Es gab einen Fehler beim Kopieren deines Bildes.";
    }
}
if (isset($_GET["succ"])){
    if ($_GET["succ"] == "1")
    {
        $edit_succ = true;
    }
}

include ("includes/functions/swConnect.php");

$query1 = "SELECT user_name, first_name, last_name, location, avatar, user_bio, email FROM user u WHERE user_ID='" . $uid . "'";
$result1 = mysqli_query($conn, $query1);
$output1 = mysqli_fetch_assoc($result1);

$allow_edit = false;
if(isset($_SESSION["username"])){
    if ($_SESSION["username"] == $output1["user_name"]){
    $allow_edit = true;
}}

//small check if user really is the user that is logged in
if($allow_edit == false){
    header('Location: index.php?page=user_profile&id=' . $uid);
    exit(1);
}

$location_explode = explode(", ", $output1["location"]);

?>

<div id='edit_success' class='<?php if ($edit_succ == true) {echo "show";} ?>'>
        <div id="edit_success_msg" class='<?php if ($edit_succ == true) {echo "show";} ?>'><i class="fa fa-check" aria-hidden="true"></i>
            Daten erfolgreich gespeichert!
        </div>
</div>

<div id="edit_wrapper">   
    <fieldset>
        <legend>Profil bearbeiten</legend>
        <form id="user_info" action="includes/functions/check_profile_edit.php?id=<?=$uid?>" method="POST" enctype="multipart/form-data">
            <label><p>Nutzername</p></label>
            <input type="text" id="uname" name="uname" maxlength="30" value="<?=$output1["user_name"]?>" required>
            <div id="err_uname" class='<?php
                     if ($uname_err) {
                         echo "show";
                     }
                     ?>'>
                    <i class="fa fa-times" aria-hidden="true"></i> Der Nutzername ist bereits vergeben!
            </div>
            <label><p>Vorname</p></label>
            <input type="text" id="fname" name="fname" maxlength="200" placeholder="Vorname" <?php if ($output1["first_name"] != NULL){?> value="<?=utf8_encode($output1["first_name"])?>" <?php } ?>>
            <label><p>Nachname</p></label>
            <input type="text" id="lname" name="lname" maxlength="200" placeholder="Nachname" <?php if ($output1["last_name"] != NULL){?> value="<?=utf8_encode($output1["last_name"])?>" <?php } ?>>
            <label><p>Standort</p></label>
            <input type="text" id="city" name="location_city" placeholder="Stadt" class="location" maxlength="100" value="<?=utf8_encode($location_explode[0])?>">
            <input type="text" id="country" name="location_country" placeholder="Land" class="location" maxlength="100" <?php if ($output1["location"] != NULL) {?> value="<?=utf8_encode($location_explode[1])?>" <?php } ?>>
            <label><p>Profilbild</p></label>
            <div id='img'>
                <img src="<?php if($output1["avatar"] != NULL){ echo $output1["avatar"]; }else{ echo "images/u_images/standard_avatar.png"; }?>"><br/>
                <?php if($output1["avatar"] != NULL){?><a href='includes/functions/delete_uimg.php?id=<?=$uid?>' id='deleteimg'>Profilbild löschen</a> <?php } ?>
            </div>
            <input id="uimg" type="file" name="uimg">
            <p id="img_info">Max. Dateigröße 5MB. Akzeptierte Dateiformate: JPG, JPEG, PNG, and GIF.</p>
            <div id="err_img" class='<?php
                     if ($img_err == true) {
                         echo "show";
                     }
                     ?>'>
                    <i class="fa fa-times" aria-hidden="true"></i> <?=$img_string//Das Bild wird nicht akzeptiert. Max. Dateigröße 5MB. Akzeptierte Dateiformate: JPG, JPEG, PNG, and GIF.?>
            </div>
            <label><p>Biografie</p></label>
            <textarea name="bio" form="user_info" rows="10" cols="50" maxlength="500"><?php if($output1["user_bio"]!=NULL){echo utf8_encode($output1["user_bio"]);}else{echo "Deine Biografie. Schreibe hier unter anderem auch Kontaktdaten für andere Nutzer hinein.";} ?></textarea><br/>
            <p id="reminder">Maximal 500 Zeichen</p>
            <button type="submit" class="save_button" name="submit">Speichern</button>
            <ul id='abort'><li><a href="index.php?page=user_profile&id=<?=$uid?>">Abbrechen</a></li></ul>
        </form>
    </fieldset>
</div>
<script src="js/edit_succ.js" type="text/javascript"></script>
<?php
include ("includes/functions/swClose.php");
?>