<?php

class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "untold_food_traditions";

    function conn() {
        $conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
        return $conn;
    }

    function read($query) {
        $conn = $this->conn();

        $result = mysqli_query($conn,$query);

        if(!$result) {
            return false;
        } else {
            $data = false;

            while($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }

            return $data;
        }
    }

    function write($query) {
        $conn = $this->conn();

        $result = mysqli_query($conn,$query);

        if(!$result) {
            return false;
        } else {
            return true;
        }
    }
}

?>