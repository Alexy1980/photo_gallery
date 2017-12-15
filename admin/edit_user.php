<?php

require_once("includes/init.php");

if(!$session->is_signed_in()) {
    redirect("login.php");
}


if(empty($_GET['id'])) {

    redirect("users.php");

} else {

    $user = User::find_by_id($_GET['id']);

    if(isset($_POST['update'])) {

        if($user) {

            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            if(empty($_FILES['user_image'])){
                $user->save();
                redirect("users.php");
                $session->message("Данные пользователя {$user->username} обновлены!");
            } else {
                $user->set_file($_FILES['user_image']);
                $user->save_user_and_image();
                // redirect("edit_user.php?id={$user->id}");
                $session->message("Данные пользователя {$user->username} обновлены!");
                redirect("users.php");
            }
        }
    }
}

require_once("includes/header.php");

?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Top Menu Items -->
        <?php include("includes/top_nav.php"); ?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

        <?php include("includes/side_nav.php"); ?>

        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">


        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Фото <!--<small>Обзор статистики</small>-->
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="col-md-8">

                            <div class="form-group">
                                <label for="username">Имя</label>
                                <input type="text" name="username" class="form-control" value="<?=$user->username?>">
                            </div>

                            <div class="form-group">
                                <p><strong>Текущее фото</strong></p>
                                <!--ссылка на модальное окно-->
                                <a href="#" class="thumbnail" data-toggle="modal" data-target="#photo-library"><img src="<?=$user->image_path_and_placeholder();?>" alt="" width="150" class="img-thumbnail"> </a>
                            </div>

                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="text" name="password" class="form-control" value="<?=$user->password?>">
                            </div>

                            <div class="form-group">
                                <label for="first_name">Имя</label>
                                <input type="text" name="first_name" class="form-control" id="first_name" value="<?=$user->first_name?>" >
                            </div>

                            <div class="form-group">
                                <label for="last_name">Фамилия</label>
                                <input type="text" name="last_name" class="form-control" id="last_name" value="<?=$user->last_name?>" >
                            </div>

                            <div class="form-group">
                                <label for="user_image">Новое фото</label>
                                <input type="file" name="user_image" class="form-control" multiple>
                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="user-info-box side_style">
                                <div class="info-box-header">
                                    <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>

                                <div class="inside">
                                    <div class="box-inner">
                                        <p class="text">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                            Пользователь добавлен: <?=$user->created_at?>
                                        </p>
                                        <p class="text">
                                            user Id: <span class="data user_id_box"><?=$user->id?></span>
                                        </p>

                                        <p class="text">
                                            Username: <span class="data "><?=$user->username?></span>
                                        </p>

                                    </div>

                                    <div class="info-box-footer clearfix">
                                        <div class="info-box-delete pull-left">
                                            <a href="delete_user.php?id=<?=$user->id?>" class="btn btn-lg btn-danger">Delete</a>
                                        </div>

                                        <div class="info-box-update pull-right">
                                            <input type="submit" name="update" value="Update" class="btn btn-lg btn-success">
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    <!--modal window-->
    <?php include("includes/user_modal.php") ?>;
<?php include("includes/footer.php"); ?>