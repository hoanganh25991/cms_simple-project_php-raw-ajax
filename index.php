<!DOCTYPE html>
<html>
<head>
	<title>Learning Note</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <?php require_once "controllers/functions.php"; ?>
    <?php require_once "controllers/views.php"; ?>
    <?php require_once "controllers/init.php"; ?>
</head>
<body>
<div class='wrapper'>
    <ol class="rounded-list">
        <li><a href="">List item</a></li>
        <li><a href="">List item</a></li>
        <li><a href="">List item</a>
            <ol>
                <li><a href="">List sub item</a></li>
                <li><a href="">List sub item</a></li>
                <li><a href="">List sub item</a></li>
            </ol>
        </li>
        <li><a href="">List item</a></li>
        <li><a href="">List item</a></li>
    </ol>
    <ol class="rectangle-list">
        <li><a href="">List item</a></li>
        <li><a href="">List item</a></li>
        <li><a href="">List item</a>
            <ol>
                <li><a href="">List sub item</a></li>
                <li><a href="">List sub item</a></li>
                <li><a href="">List sub item</a></li>
            </ol>
        </li>
        <li><a href="">List item</a></li>
        <li><a href="">List item</a></li>
    </ol>
    <ol class="circle-list">
        <li><a href="">List item</a></li>
        <li><a href="">List item</a></li>
        <li><a href="">List item</a>
            <ol>
                <li><a href="">List sub item</a></li>
                <li><a href="">List sub item</a></li>
                <li><a href="">List sub item</a></li>
            </ol>
        </li>
        <li><a href="">List item</a></li>
        <li><a href="">List item</a></li>
    </ol>
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
                <?php //require_once "controllers/get-post-list.php"; ?>
                <ul class="live-search-list">
                    <input type="text" class="live-search-box" placeholder="search here" />
                    <li><a href="#">Zurich</a></li>
                    <li><a href="#">Geneva</a></li>
                    <li><a href="#">Winterthur</a></li>
                    <li><a href="#">Lausanne</a></li>
                    <li><a href="#">Lucerne</a></li>
                </ul>
                <script>
                    jQuery(document).ready(function($){

                        $('.live-search-list li').each(function(){
                            $(this).attr('data-search-term', $(this).text().toLowerCase());
                        });

                        $('.live-search-box').on('keyup', function(){

                            var searchTerm = $(this).val().toLowerCase();

                            $('.live-search-list li').each(function(){

                                if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
                                    $(this).show();
                                } else {
                                    $(this).hide();
                                }

                            });

                        });

                    });
                </script>
			</div>
			<div class="col-md-8" id="post-info">
                <ul>
                    <li>
                        <a href="#">
                            <div>
                                <span class="label">Richard F. Godwin</span><br/>
                                <span class="subtext">Direct Research Representative</span><br/>
                                <span class="subtext">Ann Arbor, MI</span>
                            </div>
                        </a>
                        <div class="button">
                        </div>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <span class="label">Larry O. Stegall</span><br/>
                                <span class="subtext">Product Paradigm Agent</span><br/>
                                <span class="subtext">Tobin Creek, MO</span>
                            </div>
                        </a>
                        <div class="button">
                        </div>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <span class="label">Steven D. McDonald</span><br/>
                                <span class="subtext">Customer Solutions Director</span><br/>
                            </div>
                        </a>
                        <div class="button">
                        </div>
                    </li>
                </ul>
                <!-- other design -->

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