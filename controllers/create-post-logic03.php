<?php require_once "init.php";
require_once "functions.php";
require_once "views.php"; ?>
<?php //save title content first
if(POST("submit") == 'create'){
    $title = POST("title");
    $content = POST("content");
    $_SESSION['title'] = $title;
    $_SESSION['content'] = $content;
} ?>

<?php if(SESSION('login') === true) {
    $title = POST("title");
    $content = POST("content");
    $statement = savePost2Database($title, $content);
    showModalNotification("Post saved!", "New post has saved with post id: $statement");
}elseif( POST('submit') == 'login'){
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
//        $title = POST("title");
//        $content = POST("content");
//        global $title, $content;
        $statement = savePost2Database($_SESSION['title'], $_SESSION['content']);
        echo "<h3>Login success, saved!</h3>";

//        showModalNotification("Login succes", "Welcome $username comes back!", "loginSuccess");
//        showModalNotification("Post saved!", "New post has saved with post id: $statement", "savePostSuccess");
    }else {
        $_SESSION['login'] = false;
        showModalNotification("Login failed", "Please login again");
    }
}else{
    showModalSessionLoginFalse("Action");
    //showModalWhenEdit("myModal"); ?>

<?php } ?>