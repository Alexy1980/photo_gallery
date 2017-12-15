<?php

require_once("includes/init.php");

if(!$session->is_signed_in()) {
    redirect("login.php");
}

if(empty($_GET['id'])) {
    redirect("comments.php");
} else {

    $comments = Comment::find_the_comments($_GET['id']);
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
        <!--Comments-->
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Автор</th>
                <th>Текст</th>
                <th>Добавлено</th>
                <th>Действие</th>
            </tr>
            </thead>

            <p class="bg-success">
                <?php echo $message; ?>
            </p>

            <tbody>
            <?php foreach($comments as $comment) : ?>
                <tr>
                    <td><?=$comment->id;?></td>
                    <td><?=$comment->author;?></td>
                    <td><?=$comment->body;?></td>
                    <td><?=$comment->created_at;?></td>
                    <td>
                        <div class="pictures_link">
                            <a href="delete_comment_photo.php?id=<?=$comment->id?>">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("includes/footer.php"); ?>
