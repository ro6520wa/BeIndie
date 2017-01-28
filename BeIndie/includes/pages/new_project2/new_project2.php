<!DOCTYPE html>
    <?php 
    include ("includes/functions/swConnect.php");
        
    $title = $_SESSION["form_title"] ;
    $cat = $_SESSION["form_category"] ;
    $user = $_SESSION["username"];
        
    $pid = "select project_ID from project where title = '$title'";
    $result1 = mysqli_query($conn, $pid);
    $row1 = mysqli_fetch_array($result1);    
    $newprojectID = $row1["project_ID"];
    $_SESSION["new_pid"] = $newprojectID;
    
    $slideshow = "select image_path from project_image pi join project p on pi.project_ID = p.project_ID where pi.project_ID = '$newprojectID'";
    $result2 = mysqli_query($conn, $slideshow);
    
    $query2 = "select description from project where project_ID= $newprojectID";
    $result3 = mysqli_query($conn, $query2);  
    $row3 = mysqli_fetch_array($result3);
    $text = $row3["description"];
    ?>


            
<div id="newproject">  
    <h1>Dein Projekt</h1>
    <div id = form>
        <?php
            if (!file_exists("images/project_images/$newprojectID")) {
            mkdir("images/project_images/$newprojectID");
            }
        ?>            
  
            <h2>Projektbilder</h2>    
            <!--action="includes/functions/slideshow_img.php"--> 

            <form  method="POST" action="includes/functions/slideshow_img.php" enctype="multipart/form-data">
                
            <?php                   

            while ($row2 = mysqli_fetch_array($result2)) {

            ?>               
                <img class="slideshow" width="160" height="90" src=<?= $row2["image_path"] ?> >
            <?php }
            ?> 
            <br>
                
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
  
            </form>
            
            
<!--            action="index.php?page=new_project3"-->
            <form  method="post" action="includes/functions/project_desc.php">
                <h2>Beschreibe dein Projekt</h2>
                <textarea id="descbox" name="descbox" rows="20" cols="75"><?=$text?></textarea>                
                
                <h2>Dein Ziel</h2>
                <input type="text" name="goal" id="goal" placeholder="Ohne € angeben...">    
                
                <h2>Dauer</h2>
                <input type="text" name="time"  id="time" placeholder="In Tagen angeben...">
                
                <button type="submit" class="next" > weiter... </button> 
            </form>

            
            
            
    </div>
</div>

<?php

  include ("includes/functions/swClose.php"); 
 ?>