<?php

    include_once("classes/autoload.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['uft_user_id']);

    $userid = $_SESSION['uft_user_id'];

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_FILES['profile_img']['name']) && $_FILES['profile_img']['name'] != "") {
            if($_FILES['profile_img']['type'] == "image/jpeg") {
                $allowed_size = 3 * (1024*1024);
                if ($_FILES['profile_img']['size'] < $allowed_size) {
                    $folder = "uploads/" . $user_data['user_id'] . "/";

                    if(!file_exists($folder)) {
                        mkdir($folder,0777,true);
                        file_put_contents($folder."index.php","");
                    }

                    $image = new Image();

                    $filename = $folder . $image->generate_filename(15) . ".jpeg";
                    move_uploaded_file($_FILES['profile_img']['tmp_name'], $filename);
                    
                    if(file_exists($user_data['profile_img']) && $user_data['profile_img']!="images/profile_placeholder.jpg")  {
                        unlink($user_data['profile_img']);
                    }

                    $image->crop_img($filename,$filename,800,800);
                    
                    if(file_exists($filename)) {
                        $query = "UPDATE `user` SET `profile_img` = '$filename' WHERE `user_id` = '$userid' limit 1";
                        
                        $DB = new Database();
                        $DB->write($query);

                        echo('<script>window.location="user_profile.php"</script>');
                    }
                } else {
                    echo('<script>document.getElementById("upload_error").innerHTML = "Only images of size 3MB or lower allowed!!";</script>');
                }
            } else {
                echo('<script>document.getElementById("upload_error").innerHTML = "Please add a valid jpeg image!!";</script>');
            }
        } else {
            echo('<script>document.getElementById("upload_error").innerHTML = "Please add a valid jpeg image!!";</script>');
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Profile Photo | Untold Food Tranditions</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- google fonts | Dancing Script && Lora-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&family=Lora:wght@500&display=swap" rel="stylesheet">
</head>

<style>
    #main-body {
        height: 600px;
        width:1000px;
        margin:auto;
        padding-top: 80px;
    }

    #upload_error {
        color: red;
        font-size: 14px;
    }
</style>

<body style="background-color: #e9ebee">
    
    <?php include("nav_bar.php"); ?>
    
    <div id="main-body">
        <form method="post" enctype="multipart/form-data">
            <div style="margin-left: 290px; display: flex;">
                <p id="upload_error"></p>
                <span>Choose a Photo: &nbsp</span>
                <input type="file" name="profile_img">
                <input type="submit" value="Apply">
            </div>
        </form>
        <?php
            echo "<img src='$user_data[profile_img]' style='width: 200px; margin-top: 80px; margin-left: 420px;border-radius: 8%; border: 2px solid; padding: 1px;'>";
        ?>
    </div>

</body>
</html>