
<div id="all_projects">
    <?php
        include ("includes/functions/swConnect.php");
    ?>
    <?php
        //echo $_GET["q"];    
        $project_ID = 2;
    
        $titel = "select * from project where project_ID = $project_ID";
        $result1 = mysqli_query($conn, $titel);
        $row1 = mysqli_fetch_array($result1)
    ?>
    
    <div id="project">
            <h1 align="center"><?=  $row1["title"] ?></h1>
        <div id="slideshow">
    <?php 
                   
        $slideshow = "select image_path from project_image pi join project p on pi.project_ID = p.project_ID where pi.project_ID = $project_ID";
        $result2 = mysqli_query($conn, $slideshow);
        while ($row2 = mysqli_fetch_array($result2)) {
           
        ?>               
        <img class="slideshow" src=<?= $row2 ["image_path"] ?> >
        <?php }
        ?>

        <a class="left" onclick="plusDivs(-1)">&#10094;</a>
        <a class="right" onclick="plusDivs(1)">&#10095;</a>

        </div>

        <?php
        $current = "select current_status from project where project_ID = $project_ID";
        $result3 = mysqli_query($conn, $current);        
        $goal = "select goal from project where project_ID = $project_ID";
        $result4 = mysqli_query($conn, $goal);
        $row3 = mysqli_fetch_array($result3);
        $row4 = mysqli_fetch_array($result4);
        ?>
        <div id="progress">
          <div id="progressbar">
            <div id="label"><?= round($row3["current_status"] / $row4["goal"] * 100) . '%'  ?></div>
            
            <style>#progressbar { 
                    width: <?= round($row3["current_status"] / $row4["goal"] * 100) . '%'  ?> ;
                    }
            </style>
            
          </div>
        </div>
        <?php
        $hours= "select UNIX_TIMESTAMP(end_date) from project where project_ID = $project_ID";
        $result5 = mysqli_query($conn, $hours);
        $row5 = mysqli_fetch_array($result5);
        $time = round(($row5["UNIX_TIMESTAMP(end_date)"] - strtotime(date('Y-m-d')))/ 3600);
        $days = round(($row5["UNIX_TIMESTAMP(end_date)"] - strtotime(date('Y-m-d')))/ 86400);
        ?>
        <div id="info"> 
            <div id ="timetogo">
                <?php
                if ($time <= 0) { ?> 
                <h2> <?php echo 'Fertig' ?> </h2>                
                <?php }
                elseif ($time > 72) { ?> 
                    <h2> <?php echo $days ?> </h2>
                    <p><b>Tage</b> bis zum Ziel</p>
                <?php }
                else { ?>
                   <h2><?php echo $time ?></h2>
                   <p><b>Stunden</b> bis zum Ziel</p>
                <?php } ?>
                    
            </div>
        <?php
        $backers = "select count(t.project_ID) from transaction t join project p on t.project_ID = p.project_ID where t.project_ID = $project_ID";
        $result6 = mysqli_query($conn, $backers);
        $row6 = mysqli_fetch_array($result6);   
        
        ?>
            <div id ="backers">
                    <h2><?= $row6["count(t.project_ID)"]?></h2>
                    <p>Unterstützer</p>
            </div>
        
        
        
            <div id="goal">                   
            <h2> <?= $row3["current_status"]?> € / <?=$row4["goal"]?> €</h2>
            <p>Fortschritt</p>
            </div>
        </div> 
        <?php    
        $text = "select description from project where project_ID = $project_ID";
        $result7 = mysqli_query($conn, $text);
        $row7 = mysqli_fetch_array($result7);
        $content = file_get_contents($row7["description"]);
        ?>
            
        <div id ="Text">            
            <div id ="desciption">
                <h2>Was ist '<?php echo $row1["title"] ?>' ?</h2>
                <p><?php echo $content ?></p>
            </div>
        
        <?php 
        $reward1 = "select 1plus_Reward from project where project_ID = $project_ID";
        $result8 = mysqli_query($conn, $reward1);
        $row8 = mysqli_fetch_array($result8);  
        $reward2 = "select 10plus_Reward from project where project_ID = $project_ID";
        $result9 = mysqli_query($conn, $reward2);
        $row9 = mysqli_fetch_array($result9);   
        $reward3 = "select 50plus_Reward from project where project_ID = $project_ID";
        $result10 = mysqli_query($conn, $reward3);
        $row10 = mysqli_fetch_array($result10);   
        $reward4 = "select 100plus_Reward from project where project_ID = $project_ID";
        $result11 = mysqli_query($conn, $reward4);
        $row11 = mysqli_fetch_array($result11);   
        $reward5 = "select 250plus_Reward from project where project_ID = $project_ID";
        $result12 = mysqli_query($conn, $reward5);
        $row12 = mysqli_fetch_array($result12); 
        ?>
        
            <div id ="backing">                
                <h2>Dieses Projekt unterstützen</h2>
                <button type="button" >Unterstützen</button>
                
                <?php if(isset($row8["1plus_Reward"])) {?>
                <h3>1€ aufwärts</h3>
                <h4>Belohnung</h4>
                <p><?= $row8["1plus_Reward"]?></p> <?php ;}
                
                if(isset($row9["10plus_Reward"])) {?>
                <h3>10€ aufwärts</h3>
                <h4>Belohnung</h4>
                <p><?= $row9["10plus_Reward"]?></p> <?php ;}
                
                if(isset($row10["50plus_Reward"])) {?>
                <h3>50€ aufwärts</h3>
                <h4>Belohnung</h4>
                <p><?= $row10["50plus_Reward"]?></p> <?php ;} 
                
                if(isset($row11["100plus_Reward"])) {?>
                <h3>100€ aufwärts</h3>
                <h4>Belohnung</h4>
                <p><?= $row11["100plus_Reward"]?></p> <?php ;}
                
                if(isset($row12["250plus_Reward"])) {?>
                <h3>250€ aufwärts</h3>
                <h4>Belohnung</h4>
                <p><?= $row12["250plus_Reward"]?></p> <?php ;}
                
                ?>
                
            </div>
        </div>
    </div>
    <?php  
    
    include ("includes/functions/swClose.php");  ?>

</div>


<!--Slideshow JS-->
<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("slideshow");
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1 ;}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 5000); 
    }   
    
    
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("slideshow");
      if (n > x.length) {slideIndex = 1 ;}    
      if (n < 1) {slideIndex = x.length ;}
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
      }
      x[slideIndex-1].style.display = "block";  
    }
</script>