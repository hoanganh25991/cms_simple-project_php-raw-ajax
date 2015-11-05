<?php require_once "functions.php"; ?>
<?php require_once "views.php"; ?>
<?php require_once "init.php"; ?>
<?php
if(POST('submit') == 'login'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $statement = getEncryptedPassword($username);
    $encryptedPassword ="";
    $o = $statement->fetchObject();
    if( $o ) {
        $encryptedPassword = $o->password;
    }
    if( strtoupper(md5($password)) == $encryptedPassword ) {
        $_SESSION['login'] = true;
        $return = '{"status": "1"}';
        echo $return;
    }else {
        $return = '{"status": ""}';
        echo $return;
    }
}
if(POST('submit') == 'create'){
    $title = POST('title');
    $content = POST('content');
    $statement = savePost2Database($title, $content);
    //echo '{"status": "1", "id": "'.$statement.'","title": "'.$title.'"}';
    echo '{"status": "1", "id": "'.$statement.'"}';
}
if(POST('submit') == 'read'){
    $id = POST('id');
    $statement = getPost($id);
    $post = $statement->fetchObject();
    if($post){
        $content = $post->content;
        echo $content;
    }else{
        echo "No post with ID: $id";
    }
}
if(POST('submit') == 'update'){
    $id = POST('id');
    $title = POST('title');
    $content = POST('content');
    $statement = updatePost($title, $content, $id);
    echo "{'status': '1'}";
}
if(POST('submit') == 'delete'){
    $id = POST('id');
    deletePost($id);
    echo '{"status": "1"}';
}