<?php

    include_once("classes/autoload.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Post | Untold Food Tranditions</title>

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
    #errors {
        color: red;
        font-size: 14px;
        text-align: center;
        margin-left: 5px;
        margin-bottom: 0px;
    }

    textarea {
        width: 100%;
        min-height: 200px;
        border: none;
        font-family: 'Lora', serif;
        font-size: 14px;
    }

    #post-btn {
        width: 100px;
        margin: 15px;
        margin-right: 25px;
    }

    #post-btn:hover {
        background-color: black;
    }
</style>

<body style="background-color: #e9ebee">
    
    <?php include("nav_bar.php"); ?>

    <div style="min-height:600px; width:1000px; margin:auto; padding: 20px;">
        <p id="errors"></p>
        <form method="post" enctype="multipart/form-data">
            
            <br>
            <?php include("filters.php"); ?>
            <br>

            <p id="p-filter">Enter your Recipe:</p><br>

            <div style="border:solid thin #aaa; padding: 5px; width: 900px; margin: auto;">
                <textarea name="post" placeholder="Enter your Recipe"></textarea>
            </div>
            <div style="display: flex">
                <div style="margin-left: 20px; margin-top: 18px;">Add Image: <input type="file" name="file"></div>
                <div style="margin-left: auto; margin-right: 0;"><input class="btn btn-outline-dark" id="post-btn" type="submit" value="Post"></div>
            </div>
        
        </form>
    </div>
    
</body>

</html>

<?php
    
    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $userid = $_SESSION['uft_user_id'];
        
        $post = new Post();
        $result = $post->create_post($userid,$_POST,$_FILES);
    
        if($result == "") {
            echo('<script>window.location="user_profile.php"</script>');
        } else {
            echo('<script>document.getElementById("errors").innerHTML = "Please type your recipe!";</script>');
        }
    }

?>