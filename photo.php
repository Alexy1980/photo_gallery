<?php
    require_once("admin/includes/constants.php");
    require_once("admin/includes/config.php");
    require_once("admin/includes/database.php");
    require_once("admin/includes/db_object.php");
    require_once("admin/includes/user.php");
    require_once("admin/includes/photo.php");
    require_once("admin/includes/comment.php");
    require_once("admin/includes/session.php");

    if(empty($_GET['id'])){
        redirect("index.php");
    }
    // 
    $photo = Photo::find_by_id($_GET['id']);
    // echo $photo->title;
    // print_r($_SESSION);
    /*if(isset($_POST['submit'])){
        $author = trim($_POST['author']);
        $body = trim($_POST['body']);
        $created_at = $_POST['created_at'];
        $new_comment = Comment::create_comment($photo->id, $author, $body, $created_at);

        if($new_comment && $new_comment->save()){
            redirect("photo.php?id={$photo->id}");
        } else {
            $message = "There are some problems saving comment";
        }
    } else {
        $author = "";
        $body = "";
        $created_at = "";
    }*/
    $comments = Comment::find_the_comments($photo->id);
?>
<?php include_once "includes/header_front.php"?>
<?php include_once "includes/navigation.php"?>
<!-- Page Content -->
<div class="container">

    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h3 class="media-heading"><?=$photo->title;?> <br>
                <hr>
                <small><i class="fa fa-clock-o" aria-hidden="true"></i> Добавлено <?=$photo->created_at;?></small>
            </h3>
            <hr>
            <!--Сюда будем вставлять контент-->
            <img src="<?='admin/'.$photo->picture_path();?>" alt="" width="500px">
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include_once "includes/sidebar.php"?>
    </div>
    <div class="row">
        <div class="col-md-8">

            <!--Comment form-->
            <div class="well">
                <?php
                    if($message){
                        echo $message;
                    }
                ?>
                <h4>Добавьте комментарий</h4>
                <form action="" method="post" id="my_form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="author">Введите Ваше имя</label><br/>
                        <input type="text" name="author" class="form-control author">
                    </div>
                    <div class="form-group">
                        <textarea name="body" rows="3" class="form-control body"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="created_at" class="form-control created_at" multiple value="<?php echo date("Y-m-d H:i:s"); ?>">
                    </div>
                    <input type="button" id="submit" class="btn btn-primary" value="Добавить комментарий" data="<?php echo $photo->id ?>">
                </form>
            </div>
            <!--Posted comments-->
            <hr>
            <!--Comment-->
            <div id="ajax_comment"></div>
            <?php foreach($comments as $comment): ?>
            <div class="media">
                <a href="#" class="pull-left">
                    <img src="http://placehold.it/64x64&text=image" alt="" class="media-object">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Комментарий добавил:
                        <small><?php echo $comment->author ?></small>
                        <br>
                        <small>Добавлен: <?php echo $comment->created_at ?></small>
                    </h4>
                    <p><?php echo $comment->body ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<!-- /.row -->
<?php include_once "includes/footer.php"?>
