<!DOCTYPE html>
<html>
<head>
	<title>Learning Note</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <?php require_once "controllers/functions.php"; ?>
    <?php require_once "controllers/views.php"; ?>
    <?php require_once "controllers/init.php"; ?>
</head>
<body>
<div class='wrapper'>
	<div id='header'>
		<h1>Welcome to Hoang Anh's Note</h1>
		<hr>
	</div>
	<div id='main'>
		<form method='post' id="form-ajax_create-post">
			<input type='text' name='title' class="input" placeholder='Add Title'/>
			<input type='text' name='content' class="input" placeholder='...'/>
            <input type="hidden" name="submit" value="create"/>
            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#<?php global $modalLoginID; $modalLoginID = "modal-login"; echo $modalLoginID; ?>"><span class="glyphicon glyphicon-plus"></span></button>
        </form>
        <?php preventSubmitEvent("form-ajax_create-post"); ?>

        <?php //Nếu $_SESSION['login'] === false > load 'modal-login' ở đây luôn
        if(SESSION('login') === false){
            global $modalLoginID; ?>
            <div id="result">
                <?php modalLogin($modalLoginID); ?>
            </div>
        <?php } else{ ?>
            <div id="result"></div>
            <?php sendData2Action("form-ajax_create-post");

        } ?>
        <div id="result02"></div>
        <hr>
        <div class="row" id="post-table">
			<div class="col-md-4" id="post-list">
                <?php require_once "controllers/get-post-list.php"; ?>
			</div>
			<div class="col-md-8" id="post-info">
				<div>
					<?php require_once "controllers/get-post.php"; ?>
                </div>
				<div id="edit-post">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal-edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                    <?php require_once "controllers/update-post-logic.php"; ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal-delete">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                    <?php require_once "controllers/delete-post-logic.php"; ?>
				</div>
			</div>
		</div>
		<hr>
	</div>
	<div id='footer'>
		<p>Contact me: lehoanganh25991@gmail.com</p>
		<p>Mobile phone: +84903 86 56 57</p>
	</div>
</div>
</body>
</html>