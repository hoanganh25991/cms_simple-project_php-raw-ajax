<?php
require_once "functions.php";
if( isset( $_POST['submit'] ) ) {
//    echo "submit, wait check submit = login";
//    echo $_SERVER['PHP_SELF'];
    if( $_POST['submit'] == 'login') {
        //echo "submit = login<br>";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $statement = getEncryptedPassword($username);
        $encryptedPassword ="";
        $o = $statement->fetchObject();
        if( $o ) {
            $encryptedPassword = $o->password;
        }
//        echo "encryptedPasswrod: {$encryptedPassword}<br>";
//        echo "md5(\$password): ";
//        echo md5($password)."<br>";
//        echo "md5(\$password)-UPPER: ";
//        echo strtoupper(md5($password))."<br>";
        if( strtoupper(md5($password)) == $encryptedPassword ) {
            $_SESSION['login'] = true;
//            echo "\$_SESSION['login']= {$_SESSION['login']}";
//            require_once "create-post-logic02.php";
        }else {
            $_SESSION['login'] = false;
        }

    }
}


