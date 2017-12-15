<?php 

require_once("includes/init.php");

if(!$session->is_signed_in()) {
    redirect("login.php");
}

// очистим сессию сообщений
$_SESSION['message'] = '';

$comments = Comment::find_all();
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
                            Comments <!--<small>Statistics Overview</small>-->
                        </h1>
                        <p class="bg-success">
                            <?php echo $message; ?>
                        </p>
                        <!--Comments-->
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo_id</th>
                                <th>Автор</th>
                                <th>Текст</th>
                                <th>Добавлено</th>
                                <th>Действие</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach($comments as $comment) : ?>
                                <tr>
                                    <td><?=$comment->id;?></td>
                                    <td><?=$comment->photo_id;?></td>
                                    <td><?=$comment->author;?></td>
                                    <td><?=$comment->body;?></td>
                                    <td><?=$comment->created_at;?></td>
                                    <td>
                                        <div class="pictures_link">
                                            <a href="delete_comment.php?id=<?=$comment->id?>">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> <a href="index.php">Главная страница</a>
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