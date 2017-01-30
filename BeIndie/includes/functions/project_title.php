    

<?php

session_start();
include ("swConnect.php");
    

        if (isset($_POST["form_title"]) === true && isset($_POST["form_category"]) === true && 
                 isset($_POST["form_goal"]) === true && isset($_POST["form_time"]) === true)       

            {   
            
            $title = $_SESSION["form_title"] = $_POST["form_title"];
            $cat = $_SESSION["form_category"]= $_POST["form_category"];
            $goal = $_SESSION["form_goal"]= $_POST["form_goal"];            
            $time = $_SESSION["form_time"]= $_POST["form_time"];
            $timestp = $time * 86400;
            $endstp = $timestp + time();
            $enddate = date("Y-m-d",$endstp);
            $today = date("Y-m-d",time());
            $user = $_SESSION["username"];

            $query1 = "insert into project(creator, title, category, goal, start_date,end_date) 
                    VALUES ((SELECT email from user where user_name = '$user'), '$title', '$cat', $goal, '$today', '$enddate')";
            $result1 = mysqli_query($conn, $query1);    
            

 
    
            header('Location: ../../index.php?page=new_project2');
            }
            
            
            
        ?>


<?php
    include ("swClose.php");
?>
