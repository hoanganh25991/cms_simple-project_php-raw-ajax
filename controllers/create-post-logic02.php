<?php
//echo "controll create post logic";
if( isset( $_POST['submit'] ) ) {
    if( $_POST['submit'] == 'create' ) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $_SESSION['id'] = savePost2Database($title, $content);
    }
}
