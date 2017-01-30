<?php  
include ("includes/functions/swConnect.php"); 

    

    $pid = $_SESSION["new_pid"];
    $query1 = "select * from reward where project_ID = $pid";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_array($result1);
    
    $query2 = "select * from reward where project_ID = $pid";
    $result2 = mysqli_query($conn, $query2);
    
    $query3 = "select count(project_ID) from reward where project_ID= $pid";
    $result3 = mysqli_query($conn, $query3);  
    $row3 = mysqli_fetch_array($result3);
    $rewardunits = $row3["count(project_ID)"];
    
    $i = $_SESSION["rewardunits"];
     
?>
    <h1>Wie sollen deine Ünterstützer belohnt werden?</h1>

        
    <form  method="post" action="includes/functions/project_reward.php" enctype="multipart/form-data">
        
        <div id="newproject">
            
            <a href="index.php?page=new_project2" >speichern & zurück</a>
            
            <?php 
            
                    
                if (isset($row1["project_ID"]) == true){
                    while ($row2 = mysqli_fetch_array($result2) ){
                    
                    while ($rewardunits > 0){
                        $rewardunits -= 1;
                        ?> 

                        <div id = Rewards>
                        <h2>Titel der Belohnung</h2>
                        <input type="text" id="rewardname" name="rewardname" value="<?= $row1["r_title"] ?>" placeholder="Titel der Belohnungsstufe">

                        <h2>Mindestbetrag</h2>
                        <input type="text" id="rewardamount" name="rewardamount" value="<?= $row1["min_amount"] ?>" placeholder="Mindestbetrag für diese Belohnung">

                        <h2>Belohnungsinhalt</h2>
                        <textarea id="rewarddesc" name="rewarddesc"><?= $row1["r_text"] ?></textarea> </div>  
                            
                            
                            
                          
                            <?php            
                }}}  
                else{ ?> 
        
                    <?php 
                    
                    while ($i > 0){
                        $i -= 1;
                        $query2 = "insert reward(project_ID) values('$pid')";
                        $result2 = mysqli_query($conn, $query2);

                        ?>
                        <div id = Rewards> 
                        <h2>Titel der Belohnung</h2>
                        <input type="text" id="rewardname" name="rewardname" placeholder="Titel der Belohnungsstufe">
                        <h2>Mindestbetrag</h2>
                        <input type="text" id="rewardamount" name="rewardamount" placeholder="Mindestbetrag für diese Belohnung">
                        <h2>Belohnungsinhalt</h2>
                        <textarea id="rewarddesc" name="rewarddesc"></textarea> </div>           
                    
                <?php
                
                    } 
                } 

                
                
            ?>
            
            <input type="submit" class="done" value="Abschließen" </button>
            


    
        </div> 
    </form>
    
    
    
     

    
     <?php
    include ("includes/functions/swClose.php"); 

