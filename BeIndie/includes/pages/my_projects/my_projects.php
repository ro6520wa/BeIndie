    
 
<section class="product">
    <div class="product">
        <h1 align="center">Projekttitel</h1>
    </div>
    <div id="slideshow">
       
    <img class="slideshow" src="images/slideshow1.jpg" >
    <img class="slideshow" src="images/slideshow2.jpg" >
    <img class="slideshow" src="images/slideshow3.jpg" >    
    
    </div>
    

    <h2>3'951€</h2>

    <div id="progress">
      <div id="progressbar">
        <div id="label">82%</div>
      </div>
    </div>
    
    
    <div id ="desciption">
        <h2>Projektbeschreibung</h2>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
    </div>
    
    <div id ="backing">
        <h2>Dieses Projekt unterstützen</h2>
        <h3>1€ aufwärts</h3>
        <h4>Belohnung</h4>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>   
        <h3>5€ aufwärts</h3>
        <h4>Belohnung</h4>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>
        <h3>10€ aufwärts</h3>
        <h4>Belohnung</h4>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>
</section>



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
        setTimeout(carousel, 2000); 
    }   
</script>

