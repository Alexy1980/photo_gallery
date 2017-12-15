<?php

require_once("includes/init.php");

if(!$session->is_signed_in()) {
    redirect("login.php");
}

$user = new User();

if(isset($_POST['submit'])) {

    if($user) {

        $user->username = $_POST['username'];
        $user->password = md5($_POST['password']);
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->set_file($_FILES['user_image']);
        $session->message("Пользователь {$user->username} успешно добавлен!");
        $user->save_user_and_image();
        redirect("users.php");
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
                        Добавление пользователя <!--<small>Обзор статистики</small>-->
                    </h1>
                    <?php if($user->errors){
                        print_r($user->errors);
                    } ?>
                    <p class="bg-success">
                        <?php echo $message; ?>
                    </p>
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="col-md-8">

                            <div class="form-group">
                                <label for="caption">Полное имя</label>
                                <input type="text" name="username" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="alternate_text">Пароль</label>
                                <input type="password" name="password" class="form-control" id="alternate_text">
                            </div>

                            <div class="form-group">
                                <label for="alternate_text">Имя</label>
                                <input type="text" name="first_name" class="form-control" id="alternate_text">
                            </div>

                            <div class="form-group">
                                <label for="alternate_text">Фамилия</label>
                                <input type="text" name="last_name" class="form-control" id="alternate_text">
                            </div>

                            <div class="form-group">
                                <input type="file" name="user_image" class="form-control" multiple>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Добавить">
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

<?php include("includes/footer.php"); ?>