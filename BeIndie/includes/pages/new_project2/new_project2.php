<!DOCTYPE html>
    <?php 
    
    include ("includes/functions/swConnect.php");
    
    
    if (isset($_SESSION["editid"]) == false){
    
    $title = $_SESSION["form_title"] ;
    
    $pid = "select project_ID from project where title = '$title'";
    $result1 = mysqli_query($conn, $pid);
    $row1 = mysqli_fetch_array($result1);    
    $newprojectID = $row1["project_ID"];
    $_SESSION["new_pid"] = $newprojectID;
    }
    else{
        
    $editid = $_SESSION["editid"];    
    $query = "select title from project where project_ID= $editid";
    $result = mysqli_query($conn, $query);  
    $row = mysqli_fetch_array($result);   
    $title = $row["title"];
    

    $_SESSION["new_pid"] = $editid;
    $newprojectID = $_SESSION["new_pid"];
    }
    
    $slideshow = "select image_path from project_image pi join project p on pi.project_ID = p.project_ID where pi.project_ID = '$newprojectID'";
    $result2 = mysqli_query($conn, $slideshow);
    
    $query2 = "select description from project where project_ID= $newprojectID";
    $result3 = mysqli_query($conn, $query2);  
    $row3 = mysqli_fetch_array($result3);
    $text = $row3["description"];
    
    $query3 = "select count(project_ID) from reward where project_ID= $newprojectID";
    $result4 = mysqli_query($conn, $query3);  
    $row4 = mysqli_fetch_array($result4);
    $rewardunits = $row4["count(project_ID)"];
    
    
    ?>


            
<div id="newproject">  
    <div id ="headline">
    <h1>Dein Projekt</h1>
    <p>Diese Daten kannst du später ändern</p>
    </div>
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
                
                <input type="file" name="fileToUpload" class="fileToUpload">
                <input type="submit" value="Upload Image" class="Upload_Image" name="submit">
  
            </form>
            
            
<!--             -->
            <form  method="post" action="includes/functions/project_desc.php">
                <h2>Beschreibe dein Projekt</h2>
                <textarea class="ckeditor" id="descbox" name="descbox" ><?=$text?></textarea> 
                
                <h2>Wieviele Belohnung braucht dein Projekt?</h2>
                <input type="text" name="rewardunits" value="<?=$rewardunits?>" id="rewardunits" required>
                
                <button type="submit" class="next" > weiter... </button> 
            </form>

            
            
            
    </div>
</div>

<?php

  include ("includes/functions/swClose.php"); 
 ?>