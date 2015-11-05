<?php
$statement = getAllPosts(); ?>
<ul>
    <?php while( $post = $statement->fetchObject() ) { ?>
        <li id="<?php echo $post->id; ?>">
            <form method="post" class="form-ajax">
                <input type="hidden" name="submit" value="read"/>
                <button class="btn btn-default"><?php echo $post->title; ?></button>
            </form>
        </li>
    <?php } ?>
</ul>
