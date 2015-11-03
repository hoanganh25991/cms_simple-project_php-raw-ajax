<?php
require_once "functions.php";
if( isset($_GET['id']) ) {
    $id = $_GET['id'];
    $post = getPost($id)->fetchObject();
    displayPost($post);
}
function displayPost($post) { ?>
    <h3><?php echo $post->title; ?></h3>
    <p><?php echo $post->content; ?></p>
 <?php } ?>