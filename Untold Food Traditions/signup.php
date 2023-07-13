<?php

    include_once("classes/autoload.php");

    $name = "";
    $username = "";
    $email = "";

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
    }

?>

<html>
<head>
    <title>Sign Up | Untold Food Tranditions</title>

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

    #username_msg, #email_msg, #password_msg {
        color: red;
        font-size: 12px;
        text-align: left;
        margin-left: 5px;
        margin-bottom: 0px;
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
            <a href="login.php" class="btn btn-outline-light" style="margin-right:40px; border:0px;">LOGIN</a>
                <a href="index.php" class="btn btn-outline-light" style="margin-right:40px; border:0px;">HOME</a>
                <a href="aboutus.php"class="btn btn-outline-light" style="border:0px;">ABOUT US</a>
            </div>
        </div>
    </nav>

    <div class = "slider">
        <div class = "load"></div>
        
        <div class="row">
            <div class="col-4"></div>

            <div class="col-4">
                <div class="card text-center" style="margin-top: 70px; border: 0px;">
                    <div class="card-header" >
                    SIGN UP 
                    </div>
                            
                    <div class="card-body">
                        <form name="signupForm" method="POST" action="signup.php">     <!--onsubmit="signupValidation()"-->
                            <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $name?>" required>
                            <br>
                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $username?>" required>
                            <p id="username_msg"></p>
                            <br>
                            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email?>" required>
                            <p id="email_msg"></p>
                            <br>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                            <p id="password_msg"></p>
                            <br>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_pass" required>
                            <br>
                            <button type="submit" name="submit" class="btn btn-dark btn-lg btn-block">SIGN UP</button>
                        </form>
                    </div>
                        
                    <div class="card-footer text-muted" style="margin-top: -15px;">
                        <a href="login.php" style="text-decoration: none;">Already have an account? Log in</a>
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
        $signup = new Signup();
        
        $result_username = $signup->username_exists($_POST);
        $result_email = $signup->email_used($_POST);

        if(!$result_username) {
            echo('<style> #username_msg {margin-bottom: -18px} </style>');
            echo('<script>document.getElementById("username_msg").innerHTML = "*Username already exists!!";</script>');
        } else if (!$result_email) {
            echo('<style> #email_msg {margin-bottom: -18px} </style>');
            echo('<script>document.getElementById("email_msg").innerHTML = "*Email-id already used!!";</script>');
        } else if ($_POST['password'] != $_POST['confirm_pass']) {
            echo('<style> #password_msg {margin-bottom: -18px} </style>');
            echo('<script>document.getElementById("password_msg").innerHTML = "*Password & Confirm Password do not match!!";</script>');
        } else { 
            $signup->create_user($_POST);
            echo('<script>window.location="login.php"</script>');
        }
    }

?>