    

<?php

session_start();
include ("swConnect.php");
    

        //hier die daten erst prüfen wenn sie stimmen in die session eintragen und weiter, wenn nicht dann zurück und sagen was nicht stimmt
        //kann eigentlich ja nur der projektname sein und wenn du die zeichlich und mit required begrenzt sollte die überprüfung nicht nötig sein
        //dann kannst du es eigentlich auch ohne die überprüfung weitergeben sondern einfach in die session eintragen
        //weiß nicht inwiefern hier evtl. probleme entstehen können weil das im js steht und nicht als php
         if (isset($_POST["form_title"]) === true && isset($_POST["form_category"]) === true)       

            {   
            
            $title = $_SESSION["form_title"] = $_POST["form_title"];
            $cat = $_SESSION["form_category"]= $_POST["form_category"];
            $user = $_SESSION["username"];

            $query1 = "insert into project(creator, title, category) VALUES ((SELECT email from user where user_name = '$user'), '$title', '$cat')";
            $result1 = mysqli_query($conn, $query1);    
            header('Location: ../../index.php?page=new_project2');
            }
        ?>


<?php
    include ("swClose.php");
?>
