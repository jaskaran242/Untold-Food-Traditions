<?php

    include_once("classes/autoload.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['uft_user_id']);

    $userid = $_SESSION['uft_user_id'];

    if(isset($_GET['find'])) {

        $find = addslashes($_GET['find']);

        $sql = "SELECT * FROM `user` WHERE (`name` LIKE '%$find%' || `username` LIKE '%$find%') AND `user_id`!='$userid'";

        $DB = new Database();
        $result = $DB->read($sql);
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Search | Untold Food Tranditions</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- google fonts | Dancing Script && Lora-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&family=Lora:wght@500&display=swap" rel="stylesheet">
</head>

<body style="background-color: #e9ebee">

    <?php include("nav_bar.php"); ?>

    <div style="margin-top: 40px; text-align: center;">
        <?php
            $user = new User();
            
            if(is_array($result)) {
                foreach($result as $row) {
                    $follow_row = $user->get_user($row['user_id']);
                    include("user.php");
                }
            } else {
                echo "No results found!!";
            }
        ?>
    </div>

</body>
</html>