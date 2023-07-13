<?php

    include_once("classes/autoload.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['uft_user_id']);

    if(isset($_SERVER['HTTP_REFERER'])) {
        $return_to = $_SERVER['HTTP_REFERER'];
    } else {
        $return_to = "user_profile.php";
    }

    if(isset($_GET['type']) && isset($_GET['id'])) {
        if(is_numeric($_GET['id'])) {
            $allowed[] = 'post';
            $allowed[] = 'comment';

            if(in_array($_GET['type'],$allowed)) {
                $post = new Post();
                $post->like_post($_GET['id'],$_GET['type'],$_SESSION['uft_user_id']);
            }
        }
    }

    header("Location: ". $return_to);
    die;

?>