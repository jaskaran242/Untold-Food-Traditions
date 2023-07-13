<?php

    include_once("classes/autoload.php");

    $login = new Login();
    
    $user_data = $login->check_login($_SESSION['uft_user_id']);
    $ERROR = "";

    if(isset($_SERVER['HTTP_REFERER']) && !strstr($_SERVER['HTTP_REFERER'], "delete.php")) {
        $_SESSION['$return_to'] = $_SERVER['HTTP_REFERER'];
    }
    
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

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $post = new Post();
        $post->delete_post($_POST['postid'],$_SESSION['uft_user_id']);
        echo('<script>window.location="'.$_SESSION['$return_to'].'"</script>');
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Post | Untold Food Tranditions</title>

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

    #del_error {
        color: red;
        font-size: 14px;
    }

    #confirmation-text {
        margin-top: 30px;
        margin-left: 40px;
        margin-bottom: -15px;
    }

    #post {
        font-family: 'Lora', serif;
        background-color: #e3e5e8;
        padding: 10px;
        margin: 35px;
        border: solid thin black;
        border-radius: 8px;
    }

    #del-btn {
        width: 100px;
        margin-right: 50px;
        margin-top: -10px;
        margin-bottom: 20px;
        background-color: #e3e5e8;
        
    }

    #del-btn:hover {
        background-color: black;
    }

</style>

<body style="background-color: #e9ebee">
    
    <?php include("nav_bar.php"); ?>

    <div id="post_area" style="width:1000px; margin:auto;">
        
        <h4 id="confirmation-text">Are you sure you want to delete this post?</h4>
        <div id="post">
            
            <?php

                if($ERROR != "") {
                    echo "<p id='del_error'>$ERROR</p>";
                    die;
                }
                
                $post_content = nl2br($row['post']);
                echo ($post_content);

                if(file_exists($row['image'])) {
                    $post_image = $row['image'];
                    echo    "<br><br>
                            <div style='text-align: center'>
                                <img src='$post_image' style='width:50%'>
                            </div>";
                }
            ?>
            <br><br>
            <div style="display: flex;">
                <div style="margin-left: auto; margin-right: 5px; margin-top:-5px;"><span style="color: #999;"><i class="bi bi-calendar3"></i> Apr 23, 2022</span></div>
            </div>
        </div>
        <div style="float: right;">
            <form method="post">
                <input type="hidden" name="postid" value="<?php echo $row['post_id'] ?>">
                <input type="submit" id="del-btn" class="btn btn-outline-dark" value="Delete">
            </form>
        </div>
        
    </div>

</body>
</html>