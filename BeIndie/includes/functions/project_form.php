    

<?php

    function DBupload() {

        if (isset($_POST["form_title"]) === true && isset($_POST["form_category"]) === true)
        {                    
        $title = $_POST["form_title"];
        $cat = $_POST["form_category"];
        $user = $_SESSION["username"];
        $query1 = "insert into project(creator, title, category) VALUES ((SELECT email from user where user_name = '$user'), '$title', '$cat')";
        $result1 = mysqli_query($conn, $query1);
        }

    }


    
    $target_dir = "../../images/project_images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {            
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {            
        } else {
            echo "Sorry, there was an error uploading your file.";
    }}
?>
