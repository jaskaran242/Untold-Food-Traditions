<?php

    class Follow {
        public function follow_user($id_followed,$active_userid) {
            $DB = new Database();
            
            $sql = "SELECT `followers`,`following` FROM `follows` WHERE `userid`='$active_userid' limit 1";
            $active_user_info = $DB->read($sql);
            $sql = "SELECT `followers`,`following` FROM `follows` WHERE `userid`='$id_followed' limit 1";
            $user_followed = $DB->read($sql);

            if(is_array($active_user_info) && is_array($user_followed)) {
                $following = json_decode($active_user_info[0]['following'],true);
                $user_ids_following = array_column($following,"userid");
                
                $followers = json_decode($user_followed[0]['followers'],true);
                $user_ids_followers = array_column($followers,"userid");

                if(!in_array($id_followed,$user_ids_following)) {
                    $arr["userid"] = $id_followed;
                    $arr["date"] = date("Y-m-d H:i:s");

                    $following[] = $arr;
                    $following_str = json_encode($following);
                    
                    $sql = "UPDATE `follows` SET `following`='$following_str' WHERE `userid`='$active_userid' limit 1";
                    $DB->write($sql);

                    $sql = "UPDATE `user` SET `nfollowing`=`nfollowing`+1 WHERE `user_id`='$active_userid' limit 1";
                    $DB->write($sql);
                    
                    $arr3["userid"] = $active_userid;
                    $arr3["date"] = date("Y-m-d H:i:s");

                    $followers[] = $arr3;
                    $follower_str = json_encode($followers);

                    $sql = "UPDATE `follows` SET `followers`='$follower_str' WHERE `userid`='$id_followed' limit 1";
                    $DB->write($sql);

                    $sql = "UPDATE `user` SET `nfollowers`=`nfollowers`+1 WHERE `user_id`='$id_followed' limit 1";
                    $DB->write($sql);
                } else {
                    $key1 = array_search($id_followed,$user_ids_following);
                    unset($following[$key1]);
                    
                    $following_str = json_encode($following);
                    
                    $sql = "UPDATE `follows` SET `following`='$following_str' WHERE `userid`='$active_userid' limit 1";
                    $DB->write($sql);

                    $sql = "UPDATE `user` SET `nfollowing`=`nfollowing`-1 WHERE `user_id`='$active_userid' limit 1";
                    $DB->write($sql);

                    $key2 = array_search($active_userid,$user_ids_followers);
                    unset($followers[$key2]);

                    $follower_str = json_encode($followers);

                    $sql = "UPDATE `follows` SET `followers`='$follower_str' WHERE `userid`='$id_followed' limit 1";
                    $DB->write($sql);

                    $sql = "UPDATE `user` SET `nfollowers`=`nfollowers`-1 WHERE `user_id`='$id_followed' limit 1";
                    $DB->write($sql);
                }
            } else if(is_array($active_user_info) && !is_array($user_followed)) {
                $empty_arr = [];
                $empty_str = json_encode($empty_arr);
                
                $arr["userid"] = $active_userid;
                $arr["date"] = date("Y-m-d H:i:s");
                $arr2[] = $arr;

                $follower = json_encode($arr2);
                
                $sql = "INSERT INTO `follows`(`userid`,`followers`,`following`) VALUES('$id_followed','$follower','$empty_str')";
                $DB->write($sql);

                $sql = "UPDATE `user` SET `nfollowers`=`nfollowers`+1 WHERE `user_id`='$id_followed' limit 1";
                $DB->write($sql);

                $following = json_decode($active_user_info[0]['following'],true);

                $arr3["userid"] = $id_followed;
                $arr3["date"] = date("Y-m-d H:i:s");

                $following[] = $arr3;
                $following_str = json_encode($following);
                
                $sql = "UPDATE `follows` SET `following`='$following_str' WHERE `userid`='$active_userid' limit 1";
                $DB->write($sql);

                $sql = "UPDATE `user` SET `nfollowing`=`nfollowing`+1 WHERE `user_id`='$active_userid' limit 1";
                $DB->write($sql);
            } else if(!is_array($active_user_info) && is_array($user_followed)) {
                $empty_arr = [];
                $empty_str = json_encode($empty_arr);
                
                $arr["userid"] = $id_followed;
                $arr["date"] = date("Y-m-d H:i:s");
                $arr2[] = $arr;

                $following = json_encode($arr2);

                $sql = "INSERT INTO `follows`(`userid`,`followers`,`following`) VALUES('$active_userid','$empty_str','$following')";
                $DB->write($sql);

                $sql = "UPDATE `user` SET `nfollowing`=`nfollowing`+1 WHERE `user_id`='$active_userid' limit 1";
                $DB->write($sql);

                $followers = json_decode($user_followed[0]['followers'],true);

                $arr3["userid"] = $active_userid;
                $arr3["date"] = date("Y-m-d H:i:s");

                $follower[] = $arr3;
                $follower_str = json_encode($follower);

                $sql = "UPDATE `follows` SET `followers`='$follower_str' WHERE `userid`='$id_followed' limit 1";
                $DB->write($sql);

                $sql = "UPDATE `user` SET `nfollowers`=`nfollowers`+1 WHERE `user_id`='$id_followed' limit 1";
                $DB->write($sql);
            } else {
                $empty_arr = [];
                $empty_str = json_encode($empty_arr);

                $arr["userid"] = $active_userid;
                $arr["date"] = date("Y-m-d H:i:s");
                $arr2[] = $arr;

                $follower = json_encode($arr2);
                
                $sql = "INSERT INTO `follows`(`userid`,`followers`,`following`) VALUES('$id_followed','$follower','$empty_str')";
                $DB->write($sql);

                $sql = "UPDATE `user` SET `nfollowers`=`nfollowers`+1 WHERE `user_id`='$id_followed' limit 1";
                $DB->write($sql);
                
                $arr3["userid"] = $id_followed;
                $arr3["date"] = date("Y-m-d H:i:s");
                $arr4[] = $arr3;

                $following = json_encode($arr4);

                $sql = "INSERT INTO `follows`(`userid`,`followers`,`following`) VALUES('$active_userid','$empty_str','$following')";
                $DB->write($sql);

                $sql = "UPDATE `user` SET `nfollowing`=`nfollowing`+1 WHERE `user_id`='$active_userid' limit 1";
                $DB->write($sql);
            }
            
        }

        public function get_followers($userid) {
            $DB = new Database();

            if(is_numeric($userid)) {
                $sql = "SELECT `followers` FROM `follows` WHERE `userid`='$userid' limit 1";
                $result = $DB->read($sql);

                if(is_array($result)) {
                    $followers = json_decode($result[0]['followers'],true);
                    return $followers;
                }
            }
        }

        public function get_following($userid) {
            $DB = new Database();

            if(is_numeric($userid)) {
                $sql = "SELECT `following` FROM `follows` WHERE `userid`='$userid' limit 1";
                $result = $DB->read($sql);

                if(is_array($result)) {
                    $following = json_decode($result[0]['following'],true);
                    return $following;
                }
            }
        }
    }

?>