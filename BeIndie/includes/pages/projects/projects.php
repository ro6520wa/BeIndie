
<div id="all_projects">
    <?php

    
    
        include ("includes/functions/swConnect.php");
    ?>
    <a href="../../functions/swConnect.php"></a>
    <?php
        //echo $_GET["q"];    
        $project_ID = $_GET["q"];
    
        $titel = "select * from project where project_ID = $project_ID";
        $result1 = mysqli_query($conn, $titel);
        $row1 = mysqli_fetch_array($result1)
    ?>
    
    <div id="project">
            <h1><?=  $row1["title"] ?></h1>
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
        $search = array("ä", "ö", "ü", "ß", "Ä", "Ö", 
        "Ü");
        $replace = array("ae", "oe", "ue", "ss", "Ae", "Oe", 
        "Ue");
    
        
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

           <div id ="backing">                
                    <h2>Dieses Projekt unterstützen</h2>
                    <button type="button" >Unterstützen</button>
            <?php 
            $rewards = "SELECT * from reward where project_ID = $project_ID order by min_amount asc";
            $result8 = mysqli_query($conn, $rewards);             
            while ($row8 = mysqli_fetch_array($result8)){ 
            $text = file_get_contents($row8["r_text"]); 
            echo str_replace($search,$replace,$text);
            
            
            ?>  
                    <h3>Ab <?= $row8["min_amount"]?> € oder mehr</h3>
                    <h4><?= $row8["r_title"]?></h4>
                    <p><?= file_get_contents($row8["r_text"]) ?></p>


               <?php  } ?>
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