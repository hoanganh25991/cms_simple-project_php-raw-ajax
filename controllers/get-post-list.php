<?php
require_once "functions.php";
$statement = getAllPosts(); ?>
<ul>
    <?php while( $post = $statement->fetchObject() ) { ?>
        <li id="<?php echo $post->id; ?>"><a href="index.php?id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a></li>
    <?php } ?>
</ul>
