<div id="post_area" style="min-height:600px; width:1000px; margin:auto;">
        
    <?php

        if(isset($post_data) && $post_data) {
            foreach($post_data as $ROW) {
                $user = new User();
                $ROW_USER = $user->get_user($ROW['user_id']);

                include("post.php");
            }
        }
        
    ?>

</div>