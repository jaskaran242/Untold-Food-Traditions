<?php

    include_once("classes/autoload.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Apply Filter | Untold Food Tranditions</title>

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

    #apply-btn {
        width: 100px;
        margin: 15px;
        margin-right: 75px;
    }

    #apply-btn:hover {
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
            
            <div style="text-align: right;">
                <input class="btn btn-outline-dark" id="apply-btn" type="submit" value="Apply">
            </div>
        
        </form>
    </div>
    
</body>

</html>

<?php
    
    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $Filters[] = $_POST['dish-type'];
        $Filters[] = $_POST['cuisine'];
        $Filters[] = $_POST['ingredients'];

        $_SESSION['filters'] = json_encode($Filters);
        
        echo('<script>window.location="home_page.php"</script>');
    
    }

?>