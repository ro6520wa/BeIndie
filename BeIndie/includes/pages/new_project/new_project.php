
<!DOCTYPE html>
    <?php  
    include ("includes/functions/swConnect.php");   
 
    ?>

    <div id="newproject">
        <h1>Starten Sie jetzt neues Projekt</h1>
        <div id = form>
            <!--action="index.php?page=new_project2"-->
            
            <form method="POST" enctype="multipart/form-data">
                
                <h2>Name des Projekts</h2>                  
                
                <input type="$text" name="form_title"  id="title" placeholder="Projectname...">

                <h2>Kategorie</h2>
                    <input type="radio" name="form_category" value="games" id="cat">Spiele
                    <input type="radio" name="form_category" value="sport" id="cat">Sport
                    <input type="radio" name="form_category" value="technology" id="cat">Technologie
                    <input type="radio" name="form_category" value="beauty" id="cat">Fashion & Beauty
                    

                    
                    <input type="submit" class="next" onclick="DBupload()" value="speichern" </button>
                <ul id='abort'><li><a href="index.php?page=new_project2">weiter...</a></li></ul> 
            </form>                
        </div>            
    </div>  

    
    <script>  function DBupload(){
         <?php   if (isset($_POST["form_title"]) === true && isset($_POST["form_category"]) === true)       

            {                    
            $title = $_POST["form_title"];
            $cat = $_POST["form_category"];
            $user = $_SESSION["username"];

            $query1 = "insert into project(creator, title, category) VALUES ((SELECT email from user where user_name = '$user'), '$title', '$cat')";
            $result1 = mysqli_query($conn, $query1);            

            }?>
        }
    
    </script>
    <?php
      

            
    include ("includes/functions/swClose.php");
    
    
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
    