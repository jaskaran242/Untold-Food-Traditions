<?php

    include_once("classes/autoload.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['uft_user_id']);
    
    $userid = $_SESSION['uft_user_id'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home | Untold Food Tranditions</title>

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
    #top-bar {
        display: flex;
        width: 930px;
        margin: auto;
        margin-top: 20px;
        margin-bottom: -20px;
    }

    #filter-btn, #add-post-btn {
        border: 0px;
        min-width: 90px;
    }

    #filter-btn:hover, #add-post-btn:hover {
        background-color: black;
    }
    
    #post_area {
        min-height:600px;
        width:1000px;
        margin:auto;
        padding-bottom: 45px;
        padding-top: 30px;
    }

    #post {
        font-family: 'Lora', serif;
        background-color: #e3e5e8;
        padding: 10px;
        margin: 35px;
        margin-bottom: -15px;
        border: solid thin black;
        border-radius: 8px;
    }

    #dp_post {
        width: 40px;
        border: solid 2px black;
        border-radius: 50%;
    }

    #poster_name {
        font-size: 16px;
        margin: 2px;
        margin-left: 8px;
        font-weight: bold;
    }

    #poster_username {
        color: #999;
        font-size: 12px;
        margin: 0px;
        margin-left: 8px;
        margin-top: -5px;
    }

    #post_content {
        font-size: 15px;
        margin: 5px;
        margin-left: 50px;
    }

    #lc_btn {
        background-color: #e3e5e8;
        border: 0px;
        font-size: 15px;
        margin-top: -12px;
        margin-right: 25px;
    }
</style>

<body style="background-color: #e9ebee">
    
    <?php include("nav_bar.php"); ?>

    <div id="top-bar">
        <a href="filter_page.php" class="btn btn-outline-dark" id="filter-btn">Filters <i class="bi bi-stars"></i></a>
        <a href="add_post.php" class="btn btn-outline-dark" id="add-post-btn" style="margin-left: auto; margin-right: 0px;"><i class="bi bi-plus-circle"></i> Add Post</a>
    </div>

    <div id="post_area">
        <?php

            $DB = new Database();
            $follow_class = new Follow();
            $user_class = new User();

            $following = $follow_class->get_following($userid);

            $following_ids = false;
            if(is_array($following)) {
                $following_ids = array_column($following, "userid");
                $following_ids = implode("','",$following_ids);
            }

            $filter_str = "[null,null,null]";
            if(isset($_SESSION['filters']) && $_SESSION['filters'] != "[null,null,null]") {
                $filter_str = $_SESSION['filters'];
            }

            $post_data = false;
            if($following_ids) {
                if($filter_str == "[null,null,null]") {
                    $sql = "SELECT * FROM `posts` WHERE `parent`= 0 and `user_id` in('".$following_ids."') ORDER BY `post_no` desc";
                } else {
                    $sql = "SELECT * FROM `posts` WHERE `parent`= 0 and `user_id` in('".$following_ids."') and `filters`='$filter_str' ORDER BY `post_no` desc";
                }
                $post_data = $DB->read($sql);
            }

            if(isset($post_data) && $post_data) {
                foreach($post_data as $ROW) {
                    $user = new User();
                    $ROW_USER = $user->get_user($ROW['user_id']);
                    $profile_img = $ROW_USER['profile_img'];

                    include("post.php");
                }
            }

        ?>
    </div>

</body>
</html>