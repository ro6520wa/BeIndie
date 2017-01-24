
<!DOCTYPE html>
    <?php  
    include ("includes/functions/swConnect.php");   

 
    ?>

    <div id="newproject">
        <h1>Starten Sie jetzt neues Projekt</h1>
        <div id = form>
            <form  method="POST" action="index.php?page=new_project2" enctype="multipart/form-data">
                <h2>Name des Projekts</h2>                  
                
                <input type="$text" name="form_title" id="title" placeholder="Projectname...">

                <h2>Kategorie</h2>
                    <input type="radio" name="form_category" value="Gaming" id="cat">Gaming
                    <input type="radio" name="form_category" value="Sport" id="cat">Sport
                    <input type="radio" name="form_category" value="Technology" id="cat">Technology
                    <input type="radio" name="form_category" value="Fashion & Beauty" id="cat">Fashion & Beauty
                    </br> 
                
                    <button type="submit" class="next" onClick="DBupload()"> weiter... </button>
                       
            </form>
        </div>
    </div>  
    

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
    include ("includes/functions/swClose.php");