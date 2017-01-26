<!DOCTYPE html>
    <?php 
    
    include ("includes/functions/swConnect.php");
    
    
            $title = $_POST["form_title"];
            $cat = $_POST["form_category"];
            $user = $_SESSION["username"];

    
    $pid = "select project_ID from project where title = $title";
    $result2 = mysqli_query($conn, $pid);
    $row1 = mysqli_fetch_array($result2);
    echo $row1["project_ID"] ;
    
    $images = "select image_path from project_image pi join project p on pi.project_ID = p.project_ID where pi.project_ID = $p_ID";
    $result3 = mysqli_query($conn, $images);
    ?>


            
<div id="newproject">  
    <h1>Dein Projekt</h1>
    <div id = form>
        <?php
            $projectID = 2;
            if (!file_exists("images/project_images/$p_ID")) {
            mkdir("images/project_images/$p_ID", 0777, true);
            }
        ?>            
  
            <h2>Slideshow Bilder</h2>    
            <!--action="includes/functions/project_form.php?id"--> 

            <form  method="post" action="includes/functions/project_form.php?id" enctype="multipart/form-data">
                
            <?php                   

            while ($row2 = mysqli_fetch_array($result2)) {

            ?>               
            <img class="slideshow" style="width:150px;height:75px;" src=<?= $row2 ["image_path"] ?>  >
            <?php }
            ?><br>
                
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit"> 
                
            </form>
            
            <h2>Beschreibe dein Projekt</h2>
<!--            action="new_project3.php"-->
            <form  method="post" action="index.php?page=new_project3">
                <textarea id="descbox" name="descbox" rows="20" cols="75"></textarea> 
            
                <button type="submit" class="next" > weiter... </button> 
            </form>    
            
            <?php
            //$desc = $_POST['descbox'];
            
            ?>
    </div>
</div>

<?php

  include ("includes/functions/swClose.php");  
 ?>