<?php function showModalSelectPost($message) { ?>
    <div class="modal fade" id="myModal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $message; ?></h4>
                </div>
                <div class="modal-body">
                    <p>Choose one post on 'Post list'</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php function showModalNotification($title, $message, $modalName = "myModal-notification") { ?>
    <div class="modal fade" id="<?php echo $modalName; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $title; ?></h4>
                </div>
                <div class="modal-body">
                    <p><?php echo $message; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            //var modalLogin = "<?php global $modalLoginID; echo $modalLoginID; ?>";
            if( $('#modal-login').length){
                $(this).on('hidden.bs.modal', function(){
                    var modalName = "<?php echo $modalName; ?>";
                    $("#" + modalName).modal('show').on('hidden.bs.modal', function () {
                        window.location.reload();
                    })
                })
            }else{
                var modalName = "<?php echo $modalName; ?>";
                $("#" + modalName).modal('show').on('hidden.bs.modal', function () {
                    window.location.reload();
                })
            }
        });
    </script>
<?php } ?>

<?php function showModalWhenEdit($modal_id) { ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var modalID = "<?php echo $modal_id; ?>";
            $("#"+modalID).modal('show');
//            $('#myModal-edit').on('hidden.bs.modal', function () {
//                window.location.reload();
//            }
        });
    </script>
<?php } ?>

<?php function showModalDeletePostConfirm() { ?>
    <div class="modal fade" id="myModal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Deleted Post ID: <?php global $id; echo $id; ?></h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete this post?</p>
                </div>
                <div class="modal-footer">
                    <form action="" method="post">
                        <button class="btn btn-sm btn-danger" name="submit" value="delete">Delete</button>
                        <button class="btn btn-sm btn-success" data-dimiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php function showModalDeletePostSuccess() { ?>
    <div class="modal fade" id="myModal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Deleted!</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php function showModalUpdatePost() { ?>
    <div class="modal fade" id="myModal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Post ID: <?php global $id; echo $id; ?></h4>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <input type="text" name="title" value="<?php global $title; echo $title; ?>"/>
                        <input type="text" name="content" value="<?php global $content; echo $content; ?>"/>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-success" name="submit" value="update">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<?php function showModalUpdatePostSuccess() { ?>
    <div class="modal fade" id="myModal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Saved! ID: <?php echo $_POST['id'];//vi chuyen trang, nen luu global cung khong an thua, phai luu vao $_POST thoi ?></h4>
                </div>
                <div class="modal-body">
                    <h3><?php global $title; echo $title; ?></h3>
                    <p><?php global $content; echo $content; ?></p>
                </div>
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>
<?php } ?>

<?php function showModalSessionLoginFalse($title) { ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $title; ?></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form id="login-form" method="post"><!--action="--><?php /*echo $_SERVER['PHP_SELF'] */?>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-eye-close"></span></span>
                                    <input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="basic-addon2">
                                    <input type="hidden" name="submit" value="login"/>
                                </div>
                                <button class="btn btn-success btn-sm" name="submit" value="login" style="width: 100%;">Login</button>
                            </form>
                            <div id="login-result02"></div>

                            <?php require_once "login-logic02.php"; ?>
                        </div>
                        <div class="col-md-6">
                            <div style="border: solid 1px #EEEEEE; overflow: scroll; height: 70px; width: 100%; margin-bottom: 10px;">
                                <h3><?php echo $_POST['title'] ?></h3>
                                <p><?php echo $_POST['content'] ?></p>
                            </div>
                            <button type="button" class="btn btn-success btn-sm" style="width: 100%;">Send us email</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#myModal").modal('show').on('hidden.bs.modal', function(){
                window.location.reload();
            });
        });
        $("#login-form").submit(function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.post("controllers/create-post-logic03.php", data, function (data) {
                $("#login-result02").html(data);
            });
        });
    </script>
<?php } ?>

<?php function showModalSessionLoginTrue() { ?>
    <!-- Modal -->
    <?php require_once "create-post-logic02.php"; ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Saved! ID: <?php echo $_SESSION['id']; ?></h4>
                </div>
                <div class="modal-body">
                    <?php if( isset($_POST['title']) && isset($_POST['content']) ) { ?>
                        <h3><?php echo $_POST['title']; ?></h3>
                        <p><?php echo $_POST['content']; ?></p>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <!--footer-->
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php function modalLogin($modalID){ ?>
    <div class="modal fade" id="<?php echo $modalID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Action</h4>
                </div>
                <div class="modal-body">
                    <form id="form-ajax-login" method="post">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-eye-close"></span></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="basic-addon2">
                            <input type="hidden" name="submit" value="login"/>
                        </div>
                        <button class="btn btn-success btn-sm" style="width: 100%;">Login</button>
                    </form>
                    <!--<div id="check-fade-out">Check fade out</div>-->
                    <div id="login-result"></div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <script>
        //Modal được show onclick button '+' > không cần modal('show') function
        //form-ajax-login ngăn submit và send data cho action.php xử lý
        $('#form-ajax-login').submit(function(e){
            e.preventDefault();
            //Khi login được click, nhờ action.php check auth
            var data = $(this).serialize();
            $.post('controllers/action.php', data, function(response){
                $('#result').html(response);
//                $('#check-fade-out').fadeOut();
                //$('#form-ajax-login').slideUp(500);
            });
        });
    </script>
<?php } ?>