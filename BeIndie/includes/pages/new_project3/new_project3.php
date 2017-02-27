<?php  
include ("includes/functions/swConnect.php"); 


    $pid = $_SESSION["new_pid"];
    $query1 = "select * from reward where project_ID = $pid";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_array($result1);
    $rewardname = $row1["r_title"];
    $min_amount = $row1["min_amount"];
    $r_text = $row1["r_text"];
    
    $query3 = "select count(project_ID) from reward where project_ID= $pid";
    $result3 = mysqli_query($conn, $query3);  
    $row3 = mysqli_fetch_array($result3);
    $rewardunits = $row3["count(project_ID)"];
     
?>
    <h1>Wie sollen deine Unterstützer belohnt werden?</h1>

    
        
    
    
        
        <div id="newproject">
            
            <a href="index.php?page=new_project2" >speichern & zurück</a>
            
                    
                <?php 
                
                while ($_SESSION["rewardunits"] > 0){
                    $_SESSION["rewardunits"]--;
                
                
                ?>
            <!--action="includes/functions/project_reward.php"-->
                <form id="form3" method="post" action="includes/functions/project_reward.php" enctype="multipart/form-data">

                <div id = Rewards> 
                <h2>Titel der Belohnung</h2>
                <input type="text" id="rewardname" name="rewardname" value="<?=$rewardname?>" placeholder="Titel der Belohnungsstufe">
                <h2>Mindestbetrag</h2>
                <input type="text" id="rewardamount" name="rewardamount" value="<?=$min_amount?>" placeholder="Mindestbetrag für diese Belohnung">
                <h2>Belohnungsinhalt</h2>
                <textarea id="rewarddesc" name="rewarddesc" placeholder="Beschreiben die Belohnung..."><?=$r_text?></textarea> </div> 
                
                    
                </form>

                <?php 
                }
                
                
                ?>
                
                <input form="form3" type="submit" class="done" value="Abschließen" </button>
                    
                <?php  
                ?>
    
        </div> 
    

     <?php
    include ("includes/functions/swClose.php"); 

