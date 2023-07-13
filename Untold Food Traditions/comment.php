<?php

    include_once("classes/autoload.php");

?>

<style>
    #post {
        font-family: 'Lora', serif;
        background-color: #e3e5e8;
        padding: 10px;
        margin: 35px;
        margin-top: 0px;
        margin-bottom: 20px;
        border: solid thin black;
        border-radius: 8px;
    }

    #dp_post {
        width: 40px;
        border: solid 2px black;
        border-radius: 50%;
    }

    #poster_name {
        font-size: 16px;
        margin: 2px;
        margin-left: 8px;
        font-weight: bold;
    }

    #poster_username {
        color: #999;
        font-size: 12px;
        margin: 0px;
        margin-left: 8px;
        margin-top: -5px;
    }

    #post_content {
        font-size: 15px;
        margin: 5px;
        margin-left: 50px;
    }

    #ed_btn {
        color: grey;
        background-color: #e3e5e8;
        border: 0px;
        font-size: 13px;
        margin-right: 18px;
    }

    #lc_btn {
        background-color: #e3e5e8;
        border: 0px;
        font-size: 15px;
        margin-top: -12px;
        margin-right: 25px;
    }
</style>

<div id="post">
    <div id="poster_info" style="display: flex">
        <a href="user_profile.php?id=<?php echo $comment_user['user_id'] ?>" style="text-decoration: none; color: black;">
            <div style="display: flex">
                <div>
                    <img src="<?php echo $profile_img ?>" id="dp_post">
                </div>
                <div>
                    <p id="poster_name"><?php echo htmlspecialchars($comment_user['name']) ?></p>
                    <p id="poster_username">@<?php echo htmlspecialchars($comment_user['username']) ?></p>
                </div>
            </div>
        </a>
        <div style="margin-left: auto; margin-right: 0px;">
            <?php
                $post = new Post();
                if ($post->post_owner($COMMENT['post_id'],$_SESSION['uft_user_id'])) {
                    echo   "<a href='edit.php?postid=$COMMENT[post_id]' class='btn btn-light' id='ed_btn'><i class='bi bi-pencil-square'></i> Edit</a>
                            <a href='delete.php?postid=$COMMENT[post_id]' class='btn btn-light' id='ed_btn'><i class='bi bi-trash3'></i> Delete</a>";
                }
            ?>
        </div>
    </div>

    <div id="post_content">
        <?php
            $post_content = nl2br($COMMENT['post']);
            echo ($post_content);
            
            if(file_exists($COMMENT['image'])) {
                $post_image = $COMMENT['image'];
                echo    "<br><br>
                        <div style='text-align: center'>
                            <img src='$post_image' style='width:50%'>
                        </div>";
            }

            $DB = new Database();

            $sql = "SELECT * FROM `likes` WHERE `type`='post' AND `contentid`='$COMMENT[post_id]'";
            $result = $DB->read($sql);

            if(is_array($result)) {
                $likes = json_decode($result[0]['likes']);
                
                $userids = array_column($likes, "userid");

                $thumb_icon = "bi bi-hand-thumbs-up";
                foreach($userids as $key) {
                    if($_SESSION['uft_user_id'] == $key) {
                        $thumb_icon = "bi bi-hand-thumbs-up-fill";
                        break;
                    }
                }
            }
        ?>
        <br><br>
        <div style="display: flex;">
            <a href="like.php?type=post&id=<?php echo $COMMENT['post_id'] ?>" class="btn btn-light" id="lc_btn" style="margin-left: -16px;"><i class="<?php echo $thumb_icon ?>"></i> Like (<?php echo $COMMENT['nlikes'] ?>)</a>
            <div style="margin-left: auto; margin-right: 5px; margin-top: -2px;"><span style="color: #999;"><i class="bi bi-calendar3"></i> <?php echo htmlspecialchars($COMMENT['date']) ?></span></div>
        </div>
    </div>
</div>