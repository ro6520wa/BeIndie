
<?php

session_start();
    include ("swConnect.php");
    $new_pid = $_SESSION["new_pid"];
    $imgname = $_FILES["fileToUpload"]["name"];
    $target_dir = "../../images/project_images/$new_pid/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $query1 = "insert into project_image(project_id, image_path) VALUES ('$new_pid', 'images/project_images/$new_pid/$imgname')";
            $result1 = mysqli_query($conn, $query1);  
        }
    }

            header('Location: ../../index.php?page=new_project2');
            

    include ("swClose.php");  
?>
