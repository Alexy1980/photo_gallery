<?php 

require_once("includes/init.php");

if(!$session->is_signed_in()) {
    redirect("login.php");
}

// очистим сессию сообщений
$_SESSION['message'] = '';

require_once("includes/header.php");

$users = User::find_all();

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
        <ul>
            <input type="text" placeholder="Поиск пользователя" class="search"/>&nbsp;<i class="fa fa-search" aria-hidden="true"></i>
            <div class="search-result"></div>
            <div class="container-fluid">
        </ul>

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <p class="bg-success">
                        <?php echo $message; ?>
                    </p>
                    <h1 class="page-header">
                        USERS <!--<small>Statistics Overview</small>-->
                    </h1>
                    <a href="add_user.php" class="btn btn-primary">Добавить пользователя</a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Фото</th>
                                <th>Имя</th>
                                <th>Пароль</th>
                                <th>first_name</th>
                                <th>last_name</th>
                                <th>Действие</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php foreach($users as $user) : ?>
                            <tr>
                                <td><?=$user->id;?></td>
                                <td><img src="<?=$user->image_path_and_placeholder();?>" alt="" class="image_user img-thumbnail admin-photo-thumbnail"></td>
                                <td><?=$user->username;?></td>
                                <td><?=$user->password;?></td>
                                <td><?=$user->first_name;?></td>
                                <td><?=$user->last_name;?></td>
                                <td>
                                    <div class="pictures_link">
                                        <a href="delete_user.php?id=<?=$user->id?>">Delete</a>
                                        <a href="edit_user.php?id=<?=$user->id?>">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>