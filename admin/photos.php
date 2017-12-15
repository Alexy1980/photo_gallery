<?php

require_once("includes/init.php");

if(!$session->is_signed_in()) {
    redirect("login.php");
}

// очистим сессию сообщений
$_SESSION['message'] = '';
$photos = Photo::find_all();

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
                    Photos <!--<small>Statistics Overview</small>-->
                </h1>
                <p class="bg-success">
                    <?php echo $message; ?>
                </p>
<div class="col-md-12">

    <table class="table table-hover">

        <thead>
            <tr>
                <th>Photo</th>
                <th>Id</th>
                <th>File Name</th>
                <th>Title</th>
                <th>Size</th>
                <th>Comments</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($photos as $photo) : ?>
                <?php $comments = Comment::find_the_comments($photo->id); ?>
                <tr>
                    <td><img src="<?=$photo->picture_path();?>" alt="" class="img-thumbnail admin-photo-thumbnail">
                        <div class="action_links">

                            <a class="delete_link" href="delete_photo.php?id=<?=$photo->id?>">Delete</a>
                            <a href="edit_photo.php?id=<?=$photo->id?>">Edit</a>
                            <a href="../photo.php?id=<?=$photo->id?>">View Front</a>
                            <a href="view_photo.php?id=<?=$photo->id?>">View Back</a>
                            <a href="view_comment.php?id=<?=$photo->id?>">View Comments</a>

                        </div>
                    </td>
                    <td><?=$photo->id;?></td>
                    <td><?=$photo->filename;?></td>
                    <td><?=$photo->title;?></td>
                    <td><?=$photo->size;?></td>
                    <td><?=count($comments);?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</div>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>