<style>
    #user_div {
        border: 2px solid black;
        border-radius: 6px;
        min-width: 200px;
        margin: 10px;
        margin-top: 0px;
        padding: 3px;
    }

    #user_block {
        text-decoration: none;
        color: black;
        font-weight: 500;
    }

    #dp {
        width: 80px;
        border: solid 2px black;
        padding: 1px;
        border-radius: 50%;
        margin-top: -26px;
    }
</style>

<div style="display: inline-block;">
    <?php
        $dp = $follow_row['profile_img'];
    ?>
    
    <div id="user_div">
        <a id="user_block" href="user_profile.php?id=<?php echo $follow_row['user_id']; ?>">
            <div style="display: inline-block;">
                <img id="dp" src="<?php echo $dp ?>">
            </div>

            <div style="display: inline-block; margin-top: 15px;">
                <?php
                    echo $follow_row['name']."<br>";
                    echo "@".$follow_row['username'];
                ?>
            </div>
        </a>
    </div>
</div>