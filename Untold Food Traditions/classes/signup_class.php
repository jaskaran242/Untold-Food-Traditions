<?php

    class Signup {
        public function username_exists($data) {
            $username = $data['username'];

            $query = "SELECT * FROM `user` WHERE `username` = '$username'";

            $DB = new Database();
            $result = $DB->read($query);

            if(!$result) {
                return true;
            } else {
                return false;
            }
        }

        public function email_used($data) {
            $email = $data['email'];

            $query = "SELECT * FROM `user` WHERE `email` = '$email'";

            $DB = new Database();
            $result = $DB->read($query);

            if(!$result) {
                return true;
            } else {
                return false;
            }
        }

        public function create_user($data) {
            $username = addslashes($data['username']);
            $name = addslashes($data['name']);
            $email = addslashes($data['email']);
            $password = hash("sha1",$data['password']);
            
            $url_address = strtolower($username).".".strtolower($name);
            $user_id = $this->create_userid();

            $query = "INSERT INTO `user`(`user_id`,`username`,`name`,`email`,`password`,`url_address`) VALUES ('$user_id','$username','$name','$email','$password','$url_address')";

            $DB = new Database();
            $DB->write($query);
        }

        private function create_userid() {
            $length = rand(4,19);
            $number = "";

            for($i=0;$i<$length;$i++) {
                $number .= rand(0,9);
            }

            return $number;
        }
    }

?>