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
    $title = POST("title");
    $content = POST("content");
    $statement = savePost2Database($title, $content);
    $return = '{"status": "1", "id": "'.$statement.'"}';
    echo $return;
}