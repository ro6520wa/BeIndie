
<div class="projects">
    <?php
        include ("includes/functions/swConnect.php");
    ?>
    <?php
        $titel = "select * from project where project_ID = 2";
        $result1 = mysqli_query($conn, $titel);
        $row1 = mysqli_fetch_array($result1)
    ?>
    
    <div id="project">
            <h1 align="center"><?=  $row1["title"] ?></h1>
        <div id="slideshow">
    <?php 
                   
        $slideshow = "select slideshow_picture from project_image pi join project p on pi.project_ID = p.project_ID where pi.project_ID = 2";
        $result2 = mysqli_query($conn, $slideshow);
        while ($row2 = mysqli_fetch_array($result2)) {
           
        ?>               
        <img class="slideshow" src=<?= $row2 ["slideshow_picture"] ?> >
        <?php }
        ?>

        <a class="left" onclick="plusDivs(-1)">&#10094;</a>
        <a class="right" onclick="plusDivs(1)">&#10095;</a>

        </div>

        <?php
        $current = "select current_status from project where project_ID = 2";
        $result3 = mysqli_query($conn, $current);        
        $goal = "select goal from project where project_ID = 2";
        $result4 = mysqli_query($conn, $goal);
        $row3 = mysqli_fetch_array($result3);
        $row4 = mysqli_fetch_array($result4);
        ?>
        <div id="progress">
          <div id="progressbar">
            <div id="label"><?= $row3["current_status"] / $row4["goal"] * 100 . '%'  ?></div>
          </div>
        </div>
        <?php 
        ?>
        <div id="info"> 
            <div id ="timetogo">
                    <h2>27</h2>
                    <p>Stunden bis zum Ziel</p>
            </div>

            <div id ="backers">
                    <h2>10</h2>
                    <p>Unterstützer</p>
            </div>
            
            <div id="goal">   
            <h2>8.000€ / 10.000€</h2>
            <p>Fortschritt</p>
            </div>
        </div> 
        <div id ="Text">
            
            <div id ="desciption">
                <h2>Projektbeschreibung</h2>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.  
                    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   
                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.   
                    Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.   
                    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.   
                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur
            </div>

            <div id ="backing">
                
                <h2>Dieses Projekt unterstützen</h2>
                <button type="button" >Unterstützen</button>
                <h3>1€ aufwärts</h3>
                <h4>Belohnung</h4>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>   
                <h3>5€ aufwärts</h3>
                <h4>Belohnung</h4>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>
                <h3>10€ aufwärts</h3>
                <h4>Belohnung</h4>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>
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
        if (myIndex > x.length) {myIndex = 1}    
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
      if (n > x.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
      }
      x[slideIndex-1].style.display = "block";  
    }
</script>

