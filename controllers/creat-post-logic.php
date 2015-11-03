<?php //$_SESSION['login'] = false; ?>
<?php //if( !isset( $_SESSION['login'] ) ) {
//	showModalSessionLoginFalse();
//}elseif( $_SESSION['login'] === false ) {
//	showModalSessionLoginFalse();
//}elseif( $_SESSION['login'] === true ) {
//	showModalSessionLoginTrue();
//} ?>

<?php //if( isset( $_POST['submit'] ) ) {
//	if( $_POST['submit'] == 'create' ) {
//		showModalWhenEdit("myModal");
//	}
//    if( $_POST['submit'] == 'login' ) {
//        showModalWhenEdit("myModal");
//    }
//} ?>



<?php //function showModalWhenSubmit() { ?>
<!--	<script type="text/javascript">-->
<!--		$(document).ready(function(){-->
<!--			$("#myModal").modal('show');-->
<!--		});-->
<!--//        $(document.body).on('hidden.bs.modal', function () {-->
<!--//            window.alert('hidden event fired!');-->
<!--//        });-->
<!--	</script>-->
<?php //} ?>
<?php echo "load create post logic|"; ?>
<?php global $loginStatus;
/** @var Boolean $loginStatus */
$loginStatus = false;
if(isset($_SESSION['login'])) {
    echo "session: isset|";
    $isLogin = $_SESSION['login'];
    if ($isLogin === true) {
//        echo "session: true|";
        $loginStatus = true;
    }
} ?>

<?php if($loginStatus === true){
    echo "session true|";
    savePost();
}elseif(isset($_POST['submit'])){
        $submitType = $_POST['submit'];
        if($submitType == 'login'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $statement = getEncryptedPassword($username);
            $encryptedPassword ="";
            $databaseInfo = $statement->fetchObject();
            if( $databaseInfo ) {
                $encryptedPassword = $databaseInfo->password;
            }
            if( strtoupper(md5($password)) == $encryptedPassword ) {
                $_SESSION['login'] = true;
                //save post
//                savePost();

            }else{
                //show modal login failed!, login again
                showModalNotification("Login failed!", "Please try again!");
                showModalSessionLoginFalse();
            }
        }
}else{
        echo "session false|";
        showModalSessionLoginFalse();
} ?>

<?php function savePost() {
    submitAJAX("create-post-form");
//    $title = $_POST['title'];
//    echo $title;
}




