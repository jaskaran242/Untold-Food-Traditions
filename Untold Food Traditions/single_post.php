<?php

    include_once("classes/autoload.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['uft_user_id']);

    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $profile = new Profile();
        $profile_data = $profile->get_profile($_GET['id']);

        if(is_array($profile_data)) {
            $user_data = $profile_data[0];
        }
    }

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $userid = $_SESSION['uft_user_id'];
        
        $post = new Post();
        $result = $post->create_post($userid,$_POST,$_FILES);
    
        if($result == "") {
            echo('<script>window.location="single_post.php?id='.$_GET['id'].'"</script>');
        } else {
            echo('<script>document.getElementById("errors").innerHTML = "Please type your recipe!";</script>');
        }
    }

    $user = new User();
    $post = new Post();
    $ROW = false;

    $ERROR = "";

    if(isset($_GET['id'])) {
        $ROW = $post->get_one_post($_GET['id']);
        $ROW_USER = $user->get_user($ROW['user_id']);
    } else {
        $ERROR = "No post was found!";
    }

    $profile_img = "";

    if(file_exists($ROW_USER['profile_img'])) {
        $profile_img = $ROW_USER['profile_img'];
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Post | Untold Food Tranditions</title>

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
    #comment-box {
        padding: 5px;
        margin: auto;
        width: 930px;
    }
    
    textarea {
        width: 100%;
        height: 40px;
        padding: 8px;
        border: solid thin #aaa;
        font-family: 'Lora', serif;
        font-size: 14px;
    }

    #comment-btn-div {
        text-align: right;
        margin-right: 40px;
    }

    #comment-btn:hover {
        background-color: black;
    }
</style>

<body style="background-color: #e9ebee">

    <?php include("nav_bar.php"); ?>

    <div style="width:1000px; margin:auto; margin-top: 40px;">
        <?php
            $user = new User();
            
            if(is_array($ROW)) {
                include("post.php");
            }
            
        ?>

        <hr style="margin-top: -10px; margin-bottom: 5px; width: 960px;">
        
        <form method="post">
            <div id="comment-box">
                <textarea name="post" placeholder="Add Comment"></textarea>
            </div>

            <div id="comment-btn-div">
                <input type="hidden" name="parent" value="<?php echo $ROW['post_id'] ?>">
                <input class="btn btn-outline-dark" id="comment-btn" type="submit" value="Comment">
            </div>
        </form>
        
        <hr style="width: 960px;">

        <div id="comments-div">
            <?php
                $comments = $post->get_comments($ROW['post_id']);

                if(is_array($comments)) {
                    foreach($comments as $COMMENT) {
                        
                        $comment_user = $user->get_user($COMMENT['user_id']);

                        $profile_img = "";

                        if(file_exists($comment_user['profile_img'])) {
                            $profile_img = $comment_user['profile_img'];
                        }

                        include("comment.php");
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>