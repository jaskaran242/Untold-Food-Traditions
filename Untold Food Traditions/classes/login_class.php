<?php

    class Login {

        private $error = "";

        public function evaluate($data) {
            $username = addslashes($data['username']);
            $password = addslashes($data['password']);

            $query = "SELECT * FROM `user` WHERE `username` = '$username' limit 1";

            $DB = new Database();
            $result = $DB->read($query);

            if($result) {
                $row = $result[0];
                $password = $this->hash_text($password);

                if($password == $row['password']) {
                    $_SESSION['uft_user_id'] = $row['user_id'];
                } else {
                    $this->error .= "Incorrect Password!!";
                }
            } else {
                $this->error .= "Username does not exist!!";
            }
            
            return $this->error;
        }

        private function hash_text($text) {
            $text = hash("sha1",$text);
            return $text;            
        }

        public function check_login($id) {
            if(is_numeric($id)) {
                $query = "SELECT * FROM `user` WHERE `user_id` = '$id' limit 1";

                $DB = new Database();
                $result = $DB->read($query);

                if($result) {
                    $user_data = $result[0];
                    return $user_data;
                } else {
                    echo('<script>window.location="login.php"</script>');
                }
            } else {
                echo('<script>window.location="login.php"</script>');
            }
        }
    }

?>