<!DOCTYPE html>
<html lang="en">
<head>
    <title>Index | Untold Food Traditions</title>

    <link rel="stylesheet" href="styles.css">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
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
        width: 90%;
        margin: auto;
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

    #card-btn {
        border:0px;
        width: 95%;
        height: 60px;
        font-weight: 500;
        font-size: 18px;
        padding: 17px;
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
                <a href="signup.php" class="btn btn-outline-light" style="margin-right:40px; border:0px;">SIGN UP </a>
                <a href="aboutus.php"class="btn btn-outline-light" style="border:0px;">ABOUT US</a>        <!--aboutus.html-->
    
            </div>
        </div>
    </nav>

    <div class = "slider">
        <div class = "load"></div>

        <div class="row">
            <div class="col-4"></div>  
            
            <div class="col-4">
                <div class="card text-center" style="margin-top:120px;border: 0px;">
                    <div class="card-header">
                    WELCOME!
                    </div>
                            
                    <div class="card-body">
                        <br>
                        <a href="login.php" class="btn btn-dark" id="card-btn"><i class="bi bi-box-arrow-in-right"></i>&nbsp&nbspLOGIN</a><br><br><br>
                        <a href="signup.php" class="btn btn-dark" id="card-btn"><i class="bi bi-people-fill"></i>&nbsp&nbspSIGN UP </a>
                        <br><br>
                    </div>
                        
                    <div class="card-footer text-muted">
                        <a href="aboutus.php" style="text-decoration: none;">About the Developers!</a>
                    </div>
                </div>
            </div>
            
            <div class="col-4"></div>
        </div>
    </div>

</body>
</html>