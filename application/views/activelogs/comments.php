<?php
//var_dump($comments);
foreach ($comments as $comment) {
    ?>

    <li class = "media panel">
        <a class = "pull-left commenter-img" href ="../users/<?php echo $comment->user_id ?>">
            <img class = "media-object img-circle img-thumbnail" width="80px" height="80px" src = "<?php echo base_url() . "img/profilepic/pp (" . $comment->user_id . ").jpg" ?>" alt = "Generic placeholder image">
        </a>
        <div class = "media-body">
            <div class="voteblock pull-left">
                <a href="" class="voted glyphicon glyphicon-chevron-up"></a><br>
                <span class="badge"> 5 </span> <br>
                <a href="" class="voted glyphicon glyphicon-chevron-down"></a><br>
            </div>
            <div class="pull-left">
                <h4 class = "media-heading"><?php echo $comment->nick_name ?></h4>

                <p>
                    <?php echo $comment->content ?>
                </p>
            </div>

        </div>
    </li>
    <?php
}
?>