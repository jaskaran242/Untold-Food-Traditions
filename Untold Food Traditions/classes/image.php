<?php

class Image {
    public function crop_img($original_file_name,$cropped_file_name,$max_width,$max_height) {
        if(file_exists($original_file_name)) {
            $original_img = imagecreatefromjpeg($original_file_name);

            $original_width = imagesx($original_img);
            $original_height = imagesy($original_img);

            if($original_height > $original_width) {
                $ratio = $max_width/$original_width;

                $new_width = $max_width;
                $new_height = $original_height*$ratio;
            } else {
                $ratio = $max_height/$original_height;

                $new_width = $original_width*$ratio;
                $new_height = $max_height;
            }
        }

        $new_img = imagecreatetruecolor($new_width,$new_height);
        imagecopyresampled($new_img, $original_img, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

        imagedestroy($original_img);

        if($new_height > $new_width) {
            $diff = $new_height-$new_width;
            $y = round($diff/2);
            $x = 0;
        } else {
            $diff = $new_width-$new_height;
            $x = round($diff/2);
            $y = 0;
        }
        
        $new_cropped_img = imagecreatetruecolor($max_width,$max_height);
        imagecopyresampled($new_cropped_img, $new_img, 0, 0, $x, $y, $max_width, $max_height, $max_width, $max_height);
        imagedestroy($new_img);
        
        imagejpeg($new_cropped_img,$cropped_file_name,90);
        imagedestroy($new_cropped_img);
    }

    public function generate_filename($length) {
        $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $text = "";

        for($i=0;$i<$length;$i++) {
            $random = rand(0,61);
            $text .= $array[$random];
        }

        return $text;
    }
}

?>