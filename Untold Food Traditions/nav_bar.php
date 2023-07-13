<?php

    include_once("classes/autoload.php");

    $login = new Login();
    $USER = $login->check_login($_SESSION['uft_user_id']);

    $nav_dp = "";

    if(file_exists($USER['profile_img'])) {
        $nav_dp = $USER['profile_img'];
    }

?>

<style>
    .navbar-brand {
        font-family: 'Dancing Script', cursive;
        font-size: 26px;
    }

    #search_box {
        width: 500px;
        height: 30px;
        margin-top:2px;
    }

    #profile_img_navbar {
        width: 38px;
        margin-top: 3px;
        margin-right: 20px;
        border: solid 2px white;
        border-radius: 50%;
    }

    .display-img {
        position: relative;
        cursor: pointer;
    }

    .menu {
        position: absolute;
        top: 80px;
        right: 15px;
        padding-top: 10px;
        background: #fff;
        width: 140px;
        box-sizing: 0 5px 25px rgba(0,0,0,0.1);
        border-radius: 15px;
        transition: 0.5s;
        visibility: hidden;
        opacity: 0;
    }

    .menu.active {
        top: 62px;
        visibility: visible;
        opacity: 1;
    }

    .menu::before {
        content: '';
        position: absolute;
        top: -4px;
        right: 30px;
        width: 20px;
        height: 20px;
        background: #fff;
        transform: rotate(45deg);
    }

    .menu ul li {
        list-style: none;
        padding-top: 10px;
        margin-left: -40px;
        display: flex;
        align-items: center;
    }

    #menu-btn {
        width: 100%;
        border: 0px;
    }

    #menu-btn:hover {
        background-color: black;
    }
</style>

<script>
    function menuToggle() {
        const toggleMenu = document.querySelector('.menu');
        toggleMenu.classList.toggle('active');
    }
</script>

<nav class="navbar sticky-top navbar-light bg-light" style="margin:0;padding:0;">
    <div class="container-fluid" style="background-color: black">
        <a class="navbar-brand" href="home_page.php" style="color: white"> 
            <img src="images/logo_white.png" alt="" width="45" height="30" class="d-inline-block align-top" style="margin-top: 3px;">
            Untold Food Traditions
        </a>

        <form method="get" action="search.php">
            <div class="input-group flex-nowrap" id="search_box" style="margin-right: 180px;">
                <span class="input-group-text" style="margin-right: -2px;"><i class="bi bi-search"></i></span>
                <input class="form-control" type="text" name="find" placeholder="Search">
            </div>
        </form>

        <div class="profile-menu">
            <div class="display-img" onclick="menuToggle();">
                <img src="<?php echo $nav_dp ?>" id="profile_img_navbar" alt=""> 
            </div>
            <div class="menu">
                <ul>
                    <li><a href="user_profile.php" class="btn btn-outline-dark" id="menu-btn"><i class="bi bi-person-circle"></i> Profile</a></li>
                    <li><a href="setting.php" class="btn btn-outline-dark" id="menu-btn"><i class="bi bi-gear"></i> Settings</a></li>
                    <li><a href="logout.php" class="btn btn-outline-dark" id="menu-btn"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>