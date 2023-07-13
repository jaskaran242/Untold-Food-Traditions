<?php

    include_once("classes/autoload.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['uft_user_id']);
    
    $userid = $_SESSION['uft_user_id'];

    $profile_img = "";

    if(file_exists($user_data['profile_img'])) {
        $profile_img = $user_data['profile_img'];
    }

    $ERROR = "";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $setting_class = new Settings();
        $ERROR = $setting_class->save_settings($_POST, $userid);
    }

    

?>

<!DOCTYPE html>
<html>
<head>
    <title>Settings | Untold Food Tranditions</title>

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
        width: 160px;
        margin-top: 40px;
        border: solid 3px black;
        border-radius: 50%;
    }

    #content {
        width: 550px;
        margin: auto;
        padding: 20px;
    }

    #textbox {
        width: 100%;
        border-radius: 5px;
        border: grey solid thin;
        padding: 4px;
        font-size: 14px;
        margin: 10px;
    }

    #ERROR {
        color: red;
        font-size: 12px;
    }

</style>

<body style="background-color: #e9ebee;text-align: center;">
    
    <?php include("nav_bar.php"); ?>

    <div style="padding-bottom: 10px;">
        <a href="change_dp.php">
            <img src="<?php echo $profile_img ?>" id="profile_img" alt="">
        </a>
    </div>

    <div id="content">
        <form method="post">
            <p id="ERROR"></p>
            <?php

                echo('<script>document.getElementById("ERROR").innerHTML = "'.$ERROR.'";</script>');

                $setting_class = new Settings();

                $settings = $setting_class->get_settings($userid);

                if(is_array($settings)) {
                    echo "<input type='text' id='textbox' name='username' value='".htmlspecialchars($settings['username'])."' placeholder='Username'  required>";
                    echo "<input type='text' id='textbox' name='name' value='".htmlspecialchars($settings['name'])."' placeholder='Name'  required>";
                    echo "<input type='email' id='textbox' name='email' value='".htmlspecialchars($settings['email'])."' placeholder='Email Id'  required>";
                    echo "<input type='password' id='textbox' name='old_password' placeholder='Old Password'  required>";
                    echo "<input type='password' id='textbox' name='new_password' placeholder='New Password'  required>";
                    echo "<input type='password' id='textbox' name='conf_pass' placeholder='Confirm Password'  required>";

                    echo '<input type="submit" value="Apply" style="margin: 30px;">';
                }

            ?>
        </form>
    </div>
</body>