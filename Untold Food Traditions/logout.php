<?php

    include_once("classes/autoload.php");

    if(isset($_SESSION['uft_user_id'])) {
        unset($_SESSION['uft_user_id']);
    }

    echo('<script>window.location="index.php"</script>');

?>