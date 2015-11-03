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
        $_SESSION['login'] = true; ?>
        <h3>Login success</h3>
        <form method="post" id="action-next">
            <button id="action-next-button" class="btn btn-sm btn-success">Next</button>
        </form>
        <script>
            $('#action-next').submit(function(e){
                e.preventDefault();
                $('#action-next-button').text(Sent);
                $.post('controllers/action.php', window.data, function(response){
                    $('#result').html(response);
                })
            })
        </script>
    <?php }else {
        echo "<h3>Login failed</h3>";
    }
}elseif(POST('submit') == 'create'){
    $title = POST("title");
    $content = POST("content");
    $statement = savePost2Database($title, $content);
    showModalNotification("Post saved!", "New post has saved with post id: $statement", "ABC");
}