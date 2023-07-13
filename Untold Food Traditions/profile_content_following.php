<div style="min-height: 400px; width: 1000px; margin:auto; text-align: center;">
    <div style="padding: 20px;">
        <?php
        
            $image_class = new Image();
            $follow_class = new Follow();
            $user_class = new User();
            
            $following = $follow_class->get_following($user_data['user_id']);

            if(is_array($following) && $following!=[]) {
                foreach($following as $follow) {
                    $following_row = $user_class->get_user($follow['userid']);
                    $follow_row = $following_row;
                    include("user.php");
                }
            } else {
                echo "User is not following anyone!!";
            }

        ?>
    </div>
</div>