<?php

class Settings {
    public function get_settings($id) {
        $DB = new Database();
        $sql = "SELECT * FROM `user` WHERE `user_id`='$id' limit 1";
        $row = $DB->read($sql);

        if(is_array($row)) {
            return $row[0];
        }
    }

    public function save_settings($data,$userid) {
        $DB = new Database();

        $username = $data['username'];
        $name = $data['name'];
        $email = $data['email'];
        $old_pass = $data['old_password'];
        $new_pass = $data['new_password'];
        $conf_pass = $data['conf_pass'];

        $hash_old_pass = hash("sha1", $old_pass);

        $sql = "SELECT `username` FROM `user`";
        $users = $DB->read($sql);

        $count = 0;
        $usernames[] = "";

        if($users) {
            foreach($users as $key) {
                $count++;
            }
            for($i=0;$i<$count;$i++) {
                $usernames[$i] = $users[$i]['username'];
            }
        }

        $sql = "SELECT * FROM `user` WHERE `user_id`='$userid' limit 1";
        $user_data = $DB->read($sql);

        $ERROR = "";

        if($new_pass == $conf_pass) {
            if($hash_old_pass == $user_data[0]['password']) {
                $flag = 0;
                for($i=0;$i<$count;$i++) {
                    if($usernames[$i] == $username) {
                        $flag = 1;
                    }
                }

                if($flag == 0 || $username == $user_data[0]['username']) {
                    $hash_new_pass = hash("sha1",$new_pass);

                    $sql = "UPDATE `user` SET `username`='$username',`name`='$name',`email`='$email',`password`='$hash_new_pass' WHERE `user_id`='$userid' limit 1";

                    $DB->write($sql);
                } else {
                    $ERROR .= "Username Already Exists!<br>";
                }
            } else {
                $ERROR .= "Old Password Incorrect!<br>";
            }
        } else {
            $ERROR .= "New Password and Confirm Password do not match!";
        }

        return $ERROR;
    }
}

?>