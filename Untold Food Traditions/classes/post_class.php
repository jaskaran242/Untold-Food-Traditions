<?php

class Post {
    private $error="";
    
    public function create_post($user_id,$data,$files) {
        if(!empty($data['post'])) {
            $post = addslashes($data['post']);

            $filters[] = $data['dish-type'];
            $filters[] = $data['cuisine'];
            $filters[] = $data['ingredients'];

            $filters_str = json_encode($filters);
            
            $myimage = "";
            $has_image = 0;

            if(!empty($files['file']['name'])) {
                $folder = "uploads/" . $user_id . "/";

                if(!file_exists($folder)) {
                    mkdir($folder,0777,true);
                    file_put_contents($folder."index.php","");
                }

                $image_class = new Image();

                $myimage = $folder . $image_class->generate_filename(15) . ".jpeg";
                move_uploaded_file($_FILES['file']['tmp_name'], $myimage);

                $image_class->crop_img($myimage,$myimage,800,800);
                
                $has_image = 1;
            }
            
            $post_id = $this->create_postid();
            $parent = 0;

            $DB = new Database();

            if(isset($data['parent']) && is_numeric($data['parent'])) {
                $parent = $data['parent'];
                $sql = "UPDATE `posts` SET `ncomments`=`ncomments`+1 WHERE `post_id`='$parent' limit 1";
                $DB->write($sql);
            } else {
                $query1 = "UPDATE `user` SET `nposts`=`nposts`+1 WHERE `user_id`='$user_id' limit 1";
                $DB->write($query1);
            }

            $query = "INSERT INTO `posts` (`post_id`,`user_id`,`parent`,`post`,`image`,`has_image`,`filters`) VALUES ('$post_id','$user_id','$parent','$post','$myimage','$has_image','$filters_str')";
            $DB->write($query);
        
        } else {
            $this->error .= "Please type something to post!<br>";
        }

        return $this->error;
    }

    private function create_postid() {
        $length = rand(4,19);
        $number = "";

        for($i=0;$i<$length;$i++) {
            $number .= rand(0,9);
        }

        return $number;
    }

    public function get_post($id) {
        $query = "SELECT * FROM `posts` WHERE `user_id`='$id' and `parent`= 0 order by `post_no` desc";

        $DB = new Database();
        $result = $DB->read($query);

        if($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function get_comments($id) {
        $query = "SELECT * FROM `posts` WHERE `parent`='$id' order by `nlikes` desc";

        $DB = new Database();
        $result = $DB->read($query);

        if($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function get_one_post($postid) {
        
        if(!is_numeric($postid)) {
            return false;
        }

        $query = "SELECT * FROM `posts` WHERE `post_id`='$postid' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function edit_post($user_id,$data,$files) {
        if(!empty($data['post'])) {
            $post = addslashes($data['post']);
            
            $myimage = "";
            $has_image = 0;

            if(!empty($files['file']['name'])) {
                $folder = "uploads/" . $user_id . "/";

                if(!file_exists($folder)) {
                    mkdir($folder,0777,true);
                    file_put_contents($folder."index.php","");
                }

                $image_class = new Image();

                $myimage = $folder . $image_class->generate_filename(15) . ".jpeg";
                move_uploaded_file($_FILES['file']['tmp_name'], $myimage);

                $image_class->crop_img($myimage,$myimage,800,800);
                
                $has_image = 1;
            }
            
            $post_id = addslashes($data['postid']);

            if($has_image) {
                $query = "UPDATE `posts` set `post`='$post',`image`='$myimage' WHERE `post_id`='$post_id' limit 1";
            } else {
                $query = "UPDATE `posts` set `post`='$post' WHERE `post_id`='$post_id' limit 1";
            }

            $DB = new Database();
            $DB->write($query);
        } else {
            $this->error .= "Please type something to post!<br>";
        }

        return $this->error;
    }

    public function delete_post($postid,$user_id) {
        
        if(!is_numeric($postid)) {
            return false;
        }
        
        $DB = new Database();

        $sql = "SELECT `parent` FROM `posts` WHERE `post_id`='$postid' limit 1";
        $result = $DB->read($sql);

        if(is_array($result)) {
            if($result[0]['parent']>0) {
                $parent = $result[0]['parent'];
                $sql = "UPDATE `posts` SET `ncomments`=`ncomments`-1 WHERE `post_id`='$parent' limit 1";
                $DB->write($sql);
            }
        }

        $query = "DELETE FROM `posts` WHERE `post_id`='$postid' limit 1";
        $DB->write($query);

        $query1 = "UPDATE `user` SET `nposts`=`nposts`-1 WHERE `user_id`='$user_id' limit 1";
        $DB->write($query1);
    }

    public function post_owner($postid,$userid) {
        
        if(!is_numeric($postid)) {
            return false;
        }

        $query = "SELECT * FROM `posts` WHERE `post_id`='$postid' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if(is_array($result)) {
            if($result[0]['user_id'] == $userid) {
                return true;
            }
        }

        return false;
    }

    public function like_post($id,$type,$userid) {
        $DB = new Database();

        if($type == "post") {
            $sql = "SELECT `likes` FROM `likes` WHERE `type`='post' && `contentid`='$id' limit 1";
            $result = $DB->read($sql);

            if(is_array($result)) {
                $likes = json_decode($result[0]['likes'],true);
                $user_ids = array_column($likes,"userid");

                if(!in_array($userid,$user_ids)) {
                    $arr["userid"] = $userid;
                    $arr["date"] = date("Y-m-d H:i:s");

                    $likes[] = $arr; 
                    $likes_str = json_encode($likes);

                    $sql = "UPDATE `likes` SET `likes`='$likes_str' WHERE `type`='post' && `contentid`='$id' limit 1";
                    $DB->write($sql);

                    $sql = "UPDATE `posts` SET `nlikes`=`nlikes`+1 WHERE `post_id`='$id' limit 1";
                    $DB->write($sql);
                } else {
                    $key = array_search($userid,$user_ids);
                    unset($likes[$key]);

                    $likes_str = json_encode($likes);

                    $sql = "UPDATE `likes` SET `likes`='$likes_str' WHERE `type`='post' && `contentid`='$id' limit 1";
                    $DB->write($sql);

                    $sql = "UPDATE `posts` SET `nlikes`=`nlikes`-1 WHERE `post_id`='$id' limit 1";
                    $DB->write($sql);
                }
            } else {
                $arr["userid"] = $userid;
                $arr["date"] = date("Y-m-d H:i:s");
                $arr2[] = $arr;

                $likes = json_encode($arr2);

                $sql = "INSERT INTO `likes`(`type`,`contentid`,`likes`) VALUES('$type','$id','$likes')";
                $DB->write($sql);

                $sql = "UPDATE `posts` SET `nlikes`=`nlikes`+1 WHERE `post_id`='$id' limit 1";
                $DB->write($sql);
            }
        }
    }
}

?>