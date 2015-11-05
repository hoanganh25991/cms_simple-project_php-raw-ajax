<!DOCTYPE html>
<html>
<head>
	<title>Learning Note</title>

    <link rel="stylesheet" type="text/css" href="style.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

    <script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

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
		<form method='post' id="form-create-post" class="form-ajax">
            <input type="hidden" name="submit" value="create"/>
            <input type='text' name='title' class="input" placeholder='Add Title'/>
			<input type='text' name='content' class="input" placeholder='...'/>
            <button class="btn btn-sm btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span></button>
        </form>
        <div id="modal-store">
            <!--modal login-->
            <div class='modal fade' id='modal-login' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' >
                <div class='modal-dialog' role='document' >
                    <div class='modal-content' >
                        <div class='modal-header' >
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close' ><span aria-hidden='true'>&times;</span></button>
                            <h4 class='modal-title' id='myModalLabel' >Action</h4>
                        </div>
                        <div class='modal-body' >
                            <form id='form-login' method='post' class='form-ajax_modal'>
                                <input type='hidden' name='submit' value='login'/>
                                <div class='input-group input-group-sm' >
                                    <span class='input-group-addon' id='basic-addon1' ><span class='glyphicon glyphicon-user'></span></span>
                                    <input type='text' class='form-control' name='username' placeholder='Username' aria-describedby='basic-addon1'>
                                </div>
                                <div class='input-group input-group-sm'>
                                    <span class='input-group-addon' id='basic-addon2'><span class='glyphicon glyphicon-eye-close'></span></span>
                                    <input type='password' class='form-control' name='password' placeholder='Password' aria-describedby='basic-addon2'>
                                </div>
                                <button class='btn btn-success btn-sm' style='width: 100%;'>Login</button>
                            </form>
                        </div>
                        <div class='modal-footer'></div>
                    </div>
                </div>
            </div>
            <!--modal post saved-->
            <div class='modal fade' id='modal-post-saved' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' >
                <div class='modal-dialog' role='document' >
                    <div class='modal-content' >
                        <div class='modal-header' >
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close' ><span aria-hidden='true'>&times;</span></button>
                            <h4 class='modal-title' >Saved!</h4>
                        </div>
                        <div class='modal-body' id='modal-login-body'><!--content modified by JS--></div>
                        <div class='modal-footer'>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--modal login success-->
            <div class='modal fade' id='modal-login-success' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' >
                <div class='modal-dialog' role='document' >
                    <div class='modal-content' >
                        <div class='modal-header' >
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close' ><span aria-hidden='true'>&times;</span></button>
                            <h4 class='modal-title' >Login</h4>
                        </div>
                        <div class='modal-body' id='modal-login-body'><!--content modified by JS-->Success</div>
                        <div class='modal-footer'>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--modal update post-->
            <div class='modal fade' id='modal-update-post' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' >
                <div class='modal-dialog' role='document' >
                    <div class='modal-content' >
                        <div class='modal-header' >
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close' ><span aria-hidden='true'>&times;</span></button>
                            <h4 class='modal-title' >Update Post</h4>
                        </div>
                        <form id='form-login' method='post' class='form-ajax_modal' >
                            <div class='modal-body'><!--content modified by JS-->
                                <input type='hidden' name='submit' value='update'/>
                                <input type='hidden' name='id'/>
                                <div class='input-group input-group-sm' >
                                    <span class='input-group-addon' id='basic-addon1' ><span class='glyphicon glyphicon-user'></span></span>
                                    <input type='text' class='form-control' name='title' aria-describedby='basic-addon1'>
                                </div>
                                <div class='input-group input-group-sm'>
                                    <span class='input-group-addon' id='basic-addon2'><span class='glyphicon glyphicon-eye-close'></span></span>
                                    <input type='text' class='form-control' name='content' aria-describedby='basic-addon2'>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button class='btn btn-success btn-sm'>Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--modal update success-->
            <div class='modal fade' id='modal-update-success' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' >
                <div class='modal-dialog' role='document' >
                    <div class='modal-content' >
                        <div class='modal-header' >
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close' ><span aria-hidden='true'>&times;</span></button>
                            <h4 class='modal-title' >Update</h4>
                        </div>
                        <div class='modal-body' id='modal-login-body'>Post updated!</div>
                        <div class='modal-footer'>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--modal delete confirm-->
            <div class='modal fade' id='modal-delete-confirm' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' >
                <div class='modal-dialog' role='document' >
                    <div class='modal-content' >
                        <div class='modal-header' >
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close' ><span aria-hidden='true'>&times;</span></button>
                            <h4 class='modal-title' >Delete</h4>
                        </div>
                        <div class='modal-body' id='modal-login-body'>Do you want to delete this post?</div>
                        <div class='modal-footer'>
                            <form class="form-ajax_modal">
                                <input type="hidden" name="submit" value="delete"/>
                                <input type="hidden" name="id"/>
                                <button class="btn btn-danger">Delete</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--modal delete success-->
            <div class='modal fade' id='modal-delete-success' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' >
                <div class='modal-dialog' role='document' >
                    <div class='modal-content' >
                        <div class='modal-header' >
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close' ><span aria-hidden='true'>&times;</span></button>
                            <h4 class='modal-title' >Delete</h4>
                        </div>
                        <div class='modal-body' id='modal-login-body'>Post deleted!</div>
                        <div class='modal-footer'>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        <hr>
        <input type="text" class="live-search-box" placeholder="search here" />
        <div class="row" id="post-table">
            <div class="col-md-4" >
                <ul class="live-search-list" id="post-list">
                    <?php $statement = getAllPosts();
                    while( $post = $statement->fetchObject() ) { ?>
                        <li id="<?php echo $post->id; ?>">
                            <?php echo $post->title; ?>
                        </li>
                    <?php } ?>
                </ul>
                <script>
                    $(function(){
                        $('#post-list').find('li').click(function(){
                            var postTitle = $(this).html();
                            console.log(postTitle);
                            var postID = this.id;
                            var dataSend = "submit=read&id=" + postID;
                            console.log(dataSend);
                            //modify ACTION-update|delete on Page with list-item ID
                            $('#edit-post').find('input[name="id"]').val(postID);
                            //modify for modal update post
                            var modalUpdatePost = $('#modal-update-post');
                            modalUpdatePost.find('input[name="title"]').val($.trim(postTitle));
                            modalUpdatePost.find('input[name="id"]').val(postID);
                            //modify modal delete confirm
                            $('#modal-delete-confirm').find('input[name="id"]').val(postID);
                            //addClass cho list-item 'selected'
                            $(this).siblings().find(".selected").removeClass("selected");
                            $(this).addClass("selected");
                            $.post('controllers/action.php', dataSend, function(response){
                                var postInfo = '<h4>' + postTitle + '</h4>' + '<p>' + response + '</p>';
                                $('#post-info').html(postInfo);
                                //right after we have post-content from response, update it to modal-update-post
                                modalUpdatePost.find('input[name="content"]').val(response);
                            });
                        });
                    });
                </script>
                <script>
                    /*
                     |--------------------------------------------------------------------------
                     | Search Box
                     |--------------------------------------------------------------------------
                     | Search title, list sorted.
                     */
                    $(function(){
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
                <div id="tabs">
                    <ul>
                        <li><a>item 1</a></li>
                        <li class="here"><a>item 3</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8" style="position: relative">
                <div id="post-info" style="width: 100%"><!--content modified by action.php response--></div>
                <div id="edit-post">
                    <form class="form-ajax" id="form-update-post" style="display: inline-block">
                        <input type="hidden" name="submit" value="edit"/>
                        <input type="hidden" name="id" value=""/>
                        <button class="btn btn-sm btn-success">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                    </form>
                    <form class="form-ajax" id="form-delete-post" style="display: inline-block">
                        <input type="hidden" name="submit" value="delete-confirm"/>
                        <input type="hidden" name="id" value=""/>
                        <button class="btn btn-sm btn-success">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </form>
                </div>
            </div>
		</div>
		<hr>
    </div>
	<div id='footer'>
		<p>Contact me: lehoanganh25991@gmail.com</p>
		<p>Mobile phone: +84903 86 56 57</p>
	</div>
    <script>
        $(function(){
            window.isLogin = false;
            /*
             |--------------------------------------------------------------------------
             | Main Action in Page: Create, Read, Update, Delete
             |--------------------------------------------------------------------------
             | Each time submit-button clicked, hold data wait for Modal-Navigation
             */
            $('.form-ajax').submit(function(e){
                e.preventDefault();
                window.dataSerialize = $(this).serialize();
                console.log(dataSerialize);
                window.dataSerializeArray = $(this).serializeArray();
//            console.log(window.dataSerialize);
//            console.log(window.dataSerializeArray);
//            var title = dataSerializeArray[0]['value'];
//            console.log(title);
                modalControl();
            });
            /*
             |--------------------------------------------------------------------------
             | Action form Modal: Login, Delete-confirm, Save changed-confirm
             |--------------------------------------------------------------------------
             | Modal submit-button clicked, sent data wait for action.php
             */
            $('.form-ajax_modal').submit(function (e) {
                e.preventDefault();
                window.dataModalSerialize = $(this).serialize();
                window.dataModalSerializeArray = $(this).serializeArray();
                console.log(dataModalSerialize);
                var submitModalType = dataModalSerializeArray[0]['value'];
                $.post('controllers/action.php', dataModalSerialize, function(response){
                    //tam thoi bo qua response ti viet tiep ve response status
                    console.log("response: " + response);
                    if(submitModalType == 'login'){
                        window.isLogin = true;//confirm that login success (SESSION-login is set, but need reload page)
                        $('#modal-login-success').on('shown.bs.modal', function(){
                            $('#modal-login').modal('hide');
                        }).modal('show');
                        modalControl();
                    }
                    if(submitModalType == 'update'){
                        //tam thoi bo qua check response
                        //update lai post-info, post-list >>> addClass-selected cho list-item
                        var postTitle = dataModalSerializeArray[1]['value'];
                        var postContent = dataModalSerializeArray[2]['value'];
                        $('#post-list').find('li').siblings().find(".selected").text(postTitle);
                        var x = '<h4>' + postTitle + '</h4><p>' + postContent + '</p>';
                        $('#post-info').html(x);
                        //control view of modal
                        $('#modal-update-success').on('shown.bs.modal', function(){
                            $('#modal-update-post').modal('hide');
                        }).modal('show');
                    }
                    if(submitModalType == 'delete'){
                        //tam thoi bo qua check response
                        $('#modal-delete-success').on('shown.bs.modal', function () {
                            $('#modal-delete-confirm').modal('hide');
                        }).modal('show');
                    }

                });
            });
            /*
             |--------------------------------------------------------------------------
             | Modal Control
             |--------------------------------------------------------------------------
             | check $_SESSION['login'], than check submit-type to decide which modal displayed
             */
            function modalControl(){
                var a = "<?php echo SESSION('login'); ?>";
                console.log("SESSION_login: " + a);
                var submitType = dataSerializeArray[0]['value'];
                console.log("submitType: " + submitType);
                if(a == '1'){
                    window.isLogin = true;
                }
                console.log("window.isLogin: " + isLogin);
                if( isLogin == '1' ) {
                    //have SESSION-login > if-else for CRUD, modal action LSD
                    //for CREATE
                    if(submitType == 'create'){
                        $.post('controllers/action.php', dataSerialize, function(response){
                            console.log("response: " + response);
                            var status = jQuery.parseJSON(response);
                            var isSaved = status.status;
                            if(isSaved == '1'){
                                var id = status.id;
                                $('#modal-login-body').html("<p>Post ID: " + id + "</p>");
                                var modalLoginSuccess = $('#modal-login-success');


                                if( (modalLoginSuccess.data('bs.modal')||{}).isShown ){
                                    console.log('modal-login-success: isShown');
                                    modalLoginSuccess.on('hidden.bs.modal',function(){
                                        console.log('modal-post-saved: show');
                                        $('#modal-post-saved').modal('show');
                                    });
                                }else{
                                    $('#modal-post-saved').modal('show');
                                }
                            }
                        });
                    }else if(submitType == 'edit'){
                        //update need modal to get input text-changes, modify INPUT-text
                        //update when list-item click, find modify on li-click event
                        var modalLoginSuccess = $('#modal-login-success');


                        if( (modalLoginSuccess.data('bs.modal')||{}).isShown ){
                            console.log('modal-login-success: isShown');
                            modalLoginSuccess.on('hidden.bs.modal',function(){
                                console.log('modal-post-saved: show');
                                $('#modal-update-post').modal('show');
                            });
                        }else{
                            $('#modal-update-post').modal('show');
                        }



                    }else if(submitType == 'delete-confirm'){
                            $('#modal-delete-confirm').modal('show');
                    }
                }else {
                    //insert modal-login
                    $('#modal-login').modal('show');
                }
                //for READ (no need LOGIN AUTH)
            }
        })
    </script>
</div>
</body>
</html>
