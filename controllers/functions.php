<?php
require_once "views.php";
function includeModels() {
    foreach (glob("models/*.php") as $filename)
    {
        require_once $filename;
    }
}
function includeFile($folder, $filename) {
    foreach (glob($folder."/".$filename) as $file)
    {
        include_once $file;
    }
}
function requireFile($folder, $filename) {
    foreach (glob($folder."/".$filename) as $file)
    {
        require_once $file;
    }
}
function savePost2Database ( $title, $content ) {
    //echo "insert";
    global $db;
    $sql = "INSERT INTO php_raw02_post ( title, content ) VALUES ( ?, ?)";
    $db->prepare( $sql );
    $formData = array( $title, $content );
    makeStatement( $sql, $formData );
    return $db->lastInsertId();
}
function updatePost ($title, $content, $id) {
    $sql = "UPDATE php_raw02_post SET title = ?, content = ? WHERE id = ?";
    $data = array( $title, $content, $id );
    $statement = makeStatement( $sql, $data) ;
    return $statement;
}
function deletePost ( $id ) {
    $sql = "DELETE FROM php_raw02_post WHERE id = ?";
    $data = array( $id );
    $statement = makeStatement( $sql, $data );
}
function getEncryptedPassword( $username ) {
    $sql = "SELECT password FROM php_raw02_user WHERE username = ?";
    $data = array( $username );
    $statement = makeStatement( $sql, $data );
    return $statement;
}
function getPost( $postID ) {
    $sql = "SELECT * FROM php_raw02_post WHERE id = ?";
    $data = array($postID);
    $statement = makeStatement($sql, $data);
    return $statement;
}
function getAllPosts() {
	$sql = "SELECT id, title FROM php_raw02_post";
	$statement = makeStatement($sql);
	return $statement;
}
function makeStatement ( $sql, $data = null ){
    global $db;
    $statement = $db->prepare( $sql );
    try {
        $statement->execute( $data );
    } catch (Exception $e) {
        $exceptionMessage = "<p>You tried to run this sql: $sql <p>
		<p>Exception: $e</p>";
        trigger_error($exceptionMessage);
    }
    return $statement;
} ?>

<?php function POST($field) {
    if(isset($_POST[$field])){
        return $_POST[$field];
    }else {
        return false;
    }
} ?>
<?php function GET($field){
    if(isset($_GET[$field])){
        return $_GET[$field];
    }else {
        return false;
    }
} ?>
<?php function SERVER($field){
    if(isset($_SERVER[$field])){
        return $_SERVER[$field];
    }else {
        return false;
    }
} ?>
<?php function SESSION($field){
    if(isset($_SESSION[$field])){
        return $_SESSION[$field];
    }else {
        return false;
    }
} ?>

<?php function preventSubmitEvent($formID){ ?>
    <script>
        $(document).ready(function(){
            var formID = "<?php echo $formID; ?>";
            $('#' + formID).submit(function(e){
                e.preventDefault();
                window.data = $(this).serialize();
                console.log(window.data);
            });
        });
    </script>
<?php } ?>

<?php function sendData2Action($formID){ ?>
    <script>
    $(document).ready(function(){
        var formID = "<?php echo $formID; ?>";
        $('#' + formID).submit(function(e){
            e.preventDefault();
            window.data = $(this).serialize();
            console.log(window.data);
            $.post("controllers/action.php", window.data, function(response){
                $('#result').html(response);
            })
        });
    });
    </script>
<?php } ?>

