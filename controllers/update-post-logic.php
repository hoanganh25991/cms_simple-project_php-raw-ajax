<?php if( !isset($_GET['id']) ) {
    //echo "khong co post->select";
    showModalSelectPost("Please select a post");
}elseif( isset($_POST['submit']) ) {
    $submitType = $_POST['submit'];
    //echo $submitType;
    if($submitType == 'update') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        global $id;
        $statement = updatePost($title, $content, $id);
        if ($statement) {
            //$_POST['submit'] = 'finished';
            //echo $_POST['submit']
            $_POST['id'] = $id;
            global $post;
            //echo "update complete";
            showModalUpdatePostSuccess();
            showModalWhenEdit("myModal-edit");
            header("Refresh: 0.75;");
            //because page loaded when submit -> modal bien mat ngay lap tuc (vua show len phat, chuyen page, mat), nen khi qua page moi, xet xem co bien submit nam trong POST=update khong, co thi OK hien ra lai modal nay
        }
    }
}else{
    global $id;
    $id = $_GET['id'];
    $statement = getPost($id);
    $post = $statement->fetchObject();
    global $title;
    $title = $post->title;
    global $content;
    $content = $post->content;
    showModalUpdatePost();
} ?>

