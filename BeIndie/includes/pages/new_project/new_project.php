
<!DOCTYPE html>
    <?php  
    include ("includes/functions/swConnect.php");    
    ?>
    <link href="css/new_project.css" rel="stylesheet" type="text/css"/>
    <div id="newproject">
        <h1>Starten Sie jetzt neues Projekt</h1>
        <div id = form>

            <form action="index.php?page=new_project2" method="POST" enctype="multipart/form-data">
                <h2>Name des Projekts</h2>  
                <li>
                
                
                <input type="$text" name="title" id="title" placeholder="Projectname...">

                
                <h2>Kategorie</h2>
                    <input type="radio" name="category" id="cat"> Gaming
                    <input type="radio" name="category" id="cat"> Sport
                    <input type="radio" name="category" id="cat"> Technology
                    <input type="radio" name="category" id="cat"> Fashion & Beauty    
                    </br> 
                 <button type="submit" class="next" >weiter... </button>

<!--                <a href="index.php?page=new">weiter... </a> -->
               
                <?php
//                $query1 = "insert into project(creator, title, category) VALUES ((SELECT email from user where user_name = 'JD'), $text, $category)";
//                $result1 = mysqli_query($conn, $query1);
                ?>
            </form> 

        </div>
    </div>
    <?php      
    include ("includes/functions/swClose.php");      
    ?>
