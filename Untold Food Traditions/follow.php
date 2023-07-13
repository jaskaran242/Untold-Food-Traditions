<?php

    include_once("classes/autoload.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['uft_user_id']);

    if(isset($_SERVER['HTTP_REFERER'])) {
        $return_to = $_SERVER['HTTP_REFERER'];
    } else {
        $return_to = "user_profile.php";
    }

    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $follow = new Follow();
        $follow->follow_user($_GET['id'],$_SESSION['uft_user_id']);
    }

    header("Location: ". $return_to);
    die;

?>