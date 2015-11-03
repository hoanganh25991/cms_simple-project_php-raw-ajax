<?php if( !isset($_GET['id']) ) {
    //echo "khong co post->select";
    showModalSelectPost("Please select a post");
}elseif( isset($_POST['submit']) ) {
    $submitType = $_POST['submit'];
    //echo $submitType;
    if($submitType == 'delete') {
        $id = $_GET['id'];
        deletePost($id);
        showModalDeletePostSuccess();
        showModalWhenEdit("myModal-delete");
        header('Refresh: 0.75; url=index.php');
    }
}else {
    showModalDeletePostConfirm();
} ?>



