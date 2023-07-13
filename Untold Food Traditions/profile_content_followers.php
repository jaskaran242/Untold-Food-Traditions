<div style="min-height: 400px; width: 1000px; margin:auto; text-align: center;">
    <div style="padding: 20px;">
        <?php
        
            $image_class = new Image();
            $follow_class = new Follow();
            $user_class = new User();
            
            $followers = $follow_class->get_followers($user_data['user_id']);

            if(is_array($followers)) {
                foreach($followers as $follower) {
                    $follower_row = $user_class->get_user($follower['userid']);
                    $follow_row = $follower_row;
                    include("user.php");
                }
            } else {
                echo "No followers were found!!";
            }

        ?>
    </div>
</div>