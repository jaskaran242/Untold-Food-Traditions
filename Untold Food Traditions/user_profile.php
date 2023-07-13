<?php

    include_once("classes/autoload.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['uft_user_id']);
    $USER = $user_data;
    
    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $profile = new Profile();
        $profile_data = $profile->get_profile($_GET['id']);
        $user_data = $profile_data[0];
    }
    
    $userid = $user_data['user_id'];
    
    $post = new Post();
    $post_data = $post->get_post($userid);

    $profile_img = "";

    if(file_exists($user_data['profile_img'])) {
        $profile_img = $user_data['profile_img'];
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile | Untold Food Tranditions</title>

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
    #profile_img {
        width: 170px;
        margin-top: 60px;
        margin-left: 100px;
        border: solid 3px black;
        border-radius: 50%;
    }

    #name {
        font-family: 'Lora', serif;
        font-size: 23px;
        font-weight: bold;
        margin-left: 70px;
        margin-top: 90px;
    }
    
    #username {
        font-family: 'Lora', serif;
        font-size: 17px;
        color: #999;
        margin-top: 97px;
        margin-left: 10px;
    }

    #n_post,#n_follower,#n_following {
        font-family: 'Lora', serif;
        font-size: 17px;
    }

    #follow-btn, #add-post-btn {
        margin-left: 70px;
    }

    #follow-btn:hover, #add-post-btn:hover {
        background-color: black;
    }

    #profile-btn {
        border:0px;
        font-size: 20px;
        margin-top: -22px;
    }

    #profile-btn:hover {
        background-color: black;
    }
</style>

<body style="background-color: #e9ebee">
    
    <?php include("nav_bar.php"); ?>
    
    <div style="width:900px; height: 300px; margin:auto; display: flex;">
        <div>
            <a href="change_dp.php">
                <img src="<?php echo $profile_img ?>" id="profile_img" alt="">
            </a>
        </div>
        <div>
            <div style="display: flex">
                <div id="name"><?php echo $user_data['name'] ?></div>
                <div id="username">@<?php echo $user_data['username'] ?></div>
            </div>
            <br>
            <div style="display: flex; margin-top: -10px;">
                <div id="n_post" style="margin-left: 70px;"><b><?php echo $user_data['nposts'] ?></b> Posts</div>
                <div id="n_follower" style="margin-left: 30px"><b><?php echo $user_data['nfollowers'] ?></b> Followers</div>
                <div id="n_following" style="margin-left: 30px"><b><?php echo $user_data['nfollowing'] ?></b> Following</div>
            </div>
            <br>
            <div style="display: flex">
                <?php
                    $follow_class = new Follow();

                    $followings = $follow_class->get_following($_SESSION['uft_user_id']);

                    $follow_icon = "bi bi-plus";
                    $follow_btn_txt = "Follow";
                    if(is_array($followings)) {
                        foreach($followings as $key) {
                            if($user_data['user_id'] == $key['userid']) {
                                $follow_icon = "bi bi-check2";
                                $follow_btn_txt = "Following";
                            }
                        }
                    }

                    if($user_data['user_id'] != $_SESSION['uft_user_id']) {
                        echo '<a href="follow.php?id='.$user_data['user_id'].'" class="btn btn-outline-dark" id="follow-btn"><i class="'.$follow_icon.'"></i>'.$follow_btn_txt.'</a>';
                    } else {
                        echo '<a href="add_post.php" class="btn btn-outline-dark" id="add-post-btn"><i class="bi bi-plus-circle"></i> Add Post</a>';
                    }
                ?>
            </div>
        </div>
    </div>
    
    <hr style="width:1000px; margin-top: -20px;">

    <div style="text-align: center;">
        <a href="user_profile.php?id=<?php echo $user_data['user_id'] ?>"><div class="btn btn-outline-dark" id="profile-btn">Posts</div></a>
        <!-- <a href="user_profile.php?id=<?php echo $user_data['user_id'] ?>&section=likes"><div class="btn btn-outline-dark" id="profile-btn" style="margin-left: 75px;">Likes</div></a>
        <a href="user_profile.php?id=<?php echo $user_data['user_id'] ?>&section=comments"><div class="btn btn-outline-dark" id="profile-btn" style="margin-left: 75px;">Comments</div></a> -->
        <a href="user_profile.php?id=<?php echo $user_data['user_id'] ?>&section=followers"><div class="btn btn-outline-dark" id="profile-btn" style="margin-left: 150px;">Followers</div></a>
        <a href="user_profile.php?id=<?php echo $user_data['user_id'] ?>&section=following"><div class="btn btn-outline-dark" id="profile-btn" style="margin-left: 150px;">Following</div></a>
    </div>
    <hr style="width:1000px; margin-top: -2px;">

    <?php

        $section = "default";

        if(isset($_GET['section'])) {
            $section = $_GET['section'];
        }
        
        if($section == "default") {
            include("profile_content_default.php");
        } else if($section == "likes") {
            include("profile_content_likes.php");
        } else if($section == "comments") {
            include("profile_content_comments.php");
        } else if($section == "followers") {
            include("profile_content_followers.php");
        } else if($section == "following") {
            include("profile_content_following.php");
        } 

    ?>

</body>
</html>