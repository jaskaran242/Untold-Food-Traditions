<?php
    
    include_once("classes/autoload.php");
    
    $username = "";

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
    }

?>

<html>
<head>
    <title>Login | Untold Food Tranditions</title>

    <link rel="stylesheet" href="styles.css">

    <!-- bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- google fonts | Dancing Script & Lora-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&family=Lora:wght@500&display=swap" rel="stylesheet">

</head>

<style>
    body{
        overflow-x: hidden;
        overflow-y: hidden;
    }
    
    .container-fluid {
        background: black;
    }

    .navbar-brand {
        /* font from google fonts */
        font-family: 'Dancing Script', cursive;
        font-size: 26px;
    }

    .card {   
        /* css box shadwow generator */
        -webkit-box-shadow: 10px 10px 47px -9px rgba(0,0,0,0.75);
        -moz-box-shadow: 10px 10px 47px -9px rgba(0,0,0,0.75);
        box-shadow: 10px 10px 47px -9px rgba(0,0,0,0.75);
    }

    .card-header {
        font-family: 'Lora', serif;
        font-size: 30px;
        color: white;
        background-color: black;
    }

    .card-body {
        background-color: #e9ebee;
    }

    .card-footer {
        background-color: #e9ebee;
    }
    
    #message {
        color: red;
        font-size: 12px;
        margin-bottom: 34px;
    }
</style>

<body>
    <nav class="navbar sticky-top navbar-light bg-light" style="margin:0;padding:0;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style = "color: white">
                <img src="images/logo_white.png" alt="" width="45" height="30" class="d-inline-block align-top" style="margin-top: 3px;">
                Untold Food Traditions
            </a>

            <div class="d-flex justify-content-end">
                <a href="index.php" class="btn btn-outline-light" style="margin-right:40px; border:0px;">HOME</a>
                <a href="signup.php" class="btn btn-outline-light" style="margin-right:40px; border:0px;">SIGN UP </a>
                <a href="aboutus.php"class="btn btn-outline-light" style="border:0px;">ABOUT US</a>
            </div>
        </div>
    </nav>

    <div class = "slider">
        <div class = "load"></div>
        
        <div class="row">
            <div class="col-4"></div>  
            
            <div class="col-4">
                <div class="card text-center" style="margin-top:80px;border: 0px;">
                    <div class="card-header">
                    LOG IN 
                    </div>
                            
                    <div class="card-body">
                        <form method="POST" action="login.php">
                            <p id="message"></p>
                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $username?>" required>
                            <br>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                            <br>
                            <br>
                            <button type="submit" name="submit" class="btn btn-dark btn-lg btn-block">LOG IN</button>
                        </form>
                    </div>
                        
                    <div class="card-footer text-muted">
                        <a href="signup.php" style="text-decoration: none;">New here? Register</a>
                    </div>
                </div>
            </div>
            
            <div class="col-4"></div>
        </div>
    </div>
</body>
</html>

<?php

    if(isset($_POST['submit'])) {
        $login = new Login();
        
        $result = $login->evaluate($_POST);

        if($result != "") {
            echo('<style> #message {margin-bottom: 16px} </style>');
            echo('<script>document.getElementById("message").innerHTML = "*Username or Password incorrect!!";</script>');
        } else { 
            echo('<script>window.location="home_page.php"</script>');
        }
    }

?>