
<!DOCTYPE html>

<fieldset>
    
    <div id="newproject">
        <div id="headline">
        <h1>Starte jetzt Dein Projekt</h1>
        <p>Diese Daten kannst du später <b>nicht</b> mehr ändern</p>
        </div>
        <div id = form>
            <!--action="index.php?page=new_project2"-->
            
            <form method="POST" action="includes/functions/project_title.php" enctype="multipart/form-data">
                
                <h2>Name des Projekts</h2>                  
                
                <input type="text" name="form_title"  id="title" placeholder="Projectname..." required>

                <h2>Kategorie</h2>
                    <input type="radio" name="form_category" value="games" id="cat">Spiele
                    <input type="radio" name="form_category" value="sport" id="cat">Sport
                    <input type="radio" name="form_category" value="technology" id="cat">Technologie
                    <input type="radio" name="form_category" value="beauty" id="cat">Fashion & Beauty

                    <h2>Dein Ziel</h2>
                    <input type="text" name="form_goal"  id="goal" placeholder="Ohne € angeben..." required>

                    <h2>Dauer</h2>
                    <input type="text" name="form_time"  id="time" placeholder="In Tagen angeben..."required>
                    
                    <input type="submit" class="next" value="speichern" </button>
            </form>                
        </div>            
    </div>  
</fieldset>
    
<!--    <script>  function DBupload(){
        //hier die daten erst prüfen wenn sie stimmen in die session eintragen und weiter, wenn nicht dann zurück und sagen was nicht stimmt
        //kann eigentlich ja nur der projektname sein und wenn du die zeichlich und mit required begrenzt sollte die überprüfung nicht nötig sein
        //dann kannst du es eigentlich auch ohne die überprüfung weitergeben sondern einfach in die session eintragen
        //weiß nicht inwiefern hier evtl. probleme entstehen können weil das im js steht und nicht als php
            if (isset($_POST["form_title"]) === true && isset($_POST["form_category"]) === true)       

            {                    
            $title = $_POST["form_title"];
            $cat = $_POST["form_category"];
            $user = $_SESSION["username"];

            $query1 = "insert into project(creator, title, category) VALUES ((SELECT email from user where user_name = '$user'), '$title', '$cat')";
            $result1 = mysqli_query($conn, $query1);            

            }?>
        }
    
    </script>-->
    <?php
      

            
    
    
    
//    if (isset($_POST["form_title"]) === true && isset($_POST["form_category"]) === true)
//    {                    
//    $title = $_POST["form_title"];
//    $cat = $_POST["form_category"];
//    $user = $_SESSION["username"];
//    $query1 = "insert into project(creator, title, category) VALUES ((SELECT email from user where user_name = '$user'), '$title', '$cat')";
//    $result1 = mysqli_query($conn, $query1);
//    }
    
    
//        if (isset($_POST["form_title"]) === true && isset($_POST["form_category"]) === true)
//    {   
//            
//            
//    $title = $_SESSION["form_title"] = $_POST["form_title"]  ;
//    $cat = $_SESSION["form_category"] = $_POST["form_category"];
//    $user = $_SESSION["username"];
//    $query1 = "insert into project(creator, title, category) VALUES ((SELECT email from user where user_name = '$user'), '$title', '$cat')";
//    $result1 = mysqli_query($conn, $query1);
//    }
//    
    