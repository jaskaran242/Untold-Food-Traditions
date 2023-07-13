<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Us | Untold Food Traditions</title>

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
    .container-fluid {
        background: black;
    }

    .navbar-brand {
        /* font from google fonts */
        font-family: 'Dancing Script', cursive;
        font-size: 26px;
    }

    .card{
        /* CSS box shadow generator */
        -webkit-box-shadow: 10px 10px 60px -13px rgba(0,0,0,0.75);
        -moz-box-shadow: 10px 10px 60px -13px rgba(0,0,0,0.75);
        box-shadow: 10px 10px 60px -13px rgba(0,0,0,0.75);
    }

    .card-header{
        font-family: 'Lora', serif;
        font-size: 30px;
        color: white;
        background-color: black;
    }

    body{
        overflow-x: hidden;
        overflow-y: hidden;
    }
</style>

<body>
    <nav class="navbar sticky-top navbar-light bg-light" style="margin:0;padding:0;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="color: white">
                <img src="images/logo_white.png" alt="" width="45" height="30" class="d-inline-block align-top" style="margin-top: 3px;">
                Untold Food Traditions
            </a>

            <div class="d-flex justify-content-end">

                <a href="login.php" class="btn btn-outline-light" style="margin-right:40px; border:0px;">LOGIN</a>
                <a href="signup.php" class="btn btn-outline-light" style="margin-right:40px; border:0px;">SIGN UP </a>
                <a href="index.php" class="btn btn-outline-light" style="border:0px;">HOME</a>
                <!--aboutus.html-->

            </div>
        </div>
    </nav>

    <div class="slider">
        <div class="load"></div>

        <div class="row">
            <div class="col-sm-3"></div>
            
            <div class="col-sm-6">
                <div class="card" style="margin-top: 65px;">
                    <div class="card-header">
                        <p class="text-center" style="font-family: 'Fredoka One', cursive;font-size: 35px; margin-top: 2%;">ABOUT THE DEVELOPERS!</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <b>
                                <p style="font-family: 'Fredoka One', cursive; font-size: 18px;">
                                    This website was created by a group of SE students, studying at RAIT Nerul, as a part of Mini Project-2 for Sem-4. 
                                    It was created to provide a platform for people to share and learn all kinds of recipes.
                                </p>

                                <p style="font-family: 'Fredoka One', cursive; font-size: 18px;">
                                    Group Members:
                                </p>
                                
                                <div style="display: flex; width: 100%; font-family: 'Fredoka One', cursive; font-size: 16px;">
                                    <div style="display: flex; margin-left: 90px;">
                                        1.&nbsp;
                                        <p>
                                            Rajveer Motta<br>
                                            Roll No.: 20CE1092<br>
                                            Division/Batch: SE-A/A2
                                        </p>
                                    </div>

                                    <div style="display: flex; margin-left: auto; margin-right: 140px;">
                                        2.&nbsp;
                                        <p>
                                            Jaskaran Singh Chawla<br>
                                            Roll No.: 20CE1157<br>
                                            Division/Batch: SE-A/A1
                                        </p>
                                    </div>
                                </div>

                                <br>

                                <div style="display: flex; width: 100%; font-family: 'Fredoka One', cursive; font-size: 16px;">
                                    <div style="display: flex; margin-left: 90px;">
                                        3.&nbsp;
                                        <p>
                                            Tanishq Patil<br>
                                            Roll No.: 20CE1160<br>
                                            Division/Batch: SE-A/A2
                                        </p>
                                    </div>

                                    <div style="display: flex; margin-left: auto; margin-right: 140px;">
                                        4.&nbsp;
                                        <p>
                                            Pratik Jha<br>
                                            Roll No.: 20CE1173<br>
                                            Division/Batch: SE-A/A1
                                        </p>
                                    </div>
                                </div>
                            </b>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-3"></div>
        </div>
    </div>

</body>

</html>