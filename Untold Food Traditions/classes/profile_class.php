<?php

    class Profile {
        function get_profile($id) {
            $id = addslashes($id);
            $query = "SELECT * FROM `user` WHERE `user_id` = '$id' limit 1";

            $DB = new Database();
            return $DB->read($query);
        }
    }

?>