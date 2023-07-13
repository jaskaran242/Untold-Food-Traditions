<?php

    include_once("classes/autoload.php");

    $login = new Login();
    
    
    $user_data = $login->check_login($_SESSION['uft_user_id']);
    $ERROR = "";
    
    if(isset($_GET['postid'])) {
        $post = new Post();
        $row = $post->get_one_post($_GET['postid']);

        if(!$row) {
            $ERROR = "No such post was found!";
        } else if ($row['user_id'] != $_SESSION['uft_user_id']) {
            $ERROR = "Access Denied! You can't delete this file!";
        }
    } else {
        $ERROR = "No such post was found!";
    }
    
    $_SESSION['return_to'] = "user_profile.php";
    if(isset($_SERVER['HTTP_REFERER']) && !strstr($_SERVER['HTTP_REFERER'], "edit.php")) {
        $_SESSION['return_to'] = $_SERVER['HTTP_REFERER'];
    }
    
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $userid = $_SESSION['uft_user_id'];
        
        $post = new Post();
        $post->edit_post($userid,$_POST,$_FILES);

        header("Location: ". $_SESSION['return_to']);
        die;
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post | Untold Food Tranditions</title>

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

    #save_error {
        color: red;
        font-size: 14px;
    }

    #edit-post-txt {
        margin-top: 30px;
        margin-left: 20px;
        margin-bottom: -10px;
    }

    textarea {
        width: 100%;
        min-height: 200px;
        border: none;
        font-family: 'Lora', serif;
        font-size: 14px;
    }
    
    #img-display {
        margin-top: -20px;
        margin-bottom: 20px;
    }

    #save-btn {
        width: 100px;
        margin-right: 30px;
        margin-top: 25px;
        margin-bottom: 20px;
        background-color: #e3e5e8;
        
    }

    #save-btn:hover {
        background-color: black;
    }

</style>

<body style="background-color: #e9ebee">
    
    <?php include("nav_bar.php"); ?>

    <div id="post_area" style="width:1000px; margin:auto;">
        
        <h4 id="edit-post-txt">Edit Post</h4>

        <?php
            if($ERROR != "") {
                echo "<p id='save_error'>$ERROR</p>";
                die;
            }
        ?>
        
        <div style="min-height:600px; width:1000px; margin:auto; padding: 20px;">
            <form method="post" enctype="multipart/form-data">
                <div style="border:solid thin #aaa; padding: 5px;">
                    <textarea name="post" placeholder="Enter your Recipe"><?php echo $row['post'] ?></textarea>
                </div>
                <div id="img-display">
                    <?php
                        $aorc = "Add";

                        if(file_exists($row['image'])) {
                            $aorc = "Change";
                            $post_image = $row['image'];
                            echo    "<br><br>
                                    <div style='text-align: center;'>
                                        <img src='$post_image' style='width:50%; border: 2px solid; padding: 1px;'>
                                    </div>";
                        }

                    ?>
                </div>    
                <div style="display: flex">
                    <div style="margin-left: 20px; margin-top: 18px;"><?php echo $aorc ?> Image: <input type="file" name="file"></div>
                    <div style="margin-left: auto; margin-right: 0px;">
                        <input type="hidden" name="postid" value="<?php echo $row['post_id'] ?>">
                        <input type="submit" id="save-btn" class="btn btn-outline-dark" value="Save">
                    </div>
                </div>
            </form>
        </div>
        
    </div>

</body>
</html>