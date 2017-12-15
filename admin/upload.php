<?php 

require_once("includes/init.php");
if(!$session->is_signed_in()) {
    redirect("login.php");
}

// очистим сессию сообщений
$_SESSION['message'] = '';

$message = "";
if(isset($_FILES['file'])) {
    
$photo = new Photo();
$photo->title = $_POST['title'];
$photo->caption = $_POST['caption'];
$photo->description = $_POST['description'];
$photo->alternate_text = $_POST['alternate_text'];
$photo->created_at = $_POST['created_at'];
$photo->set_file($_FILES['file']);
    
    
if($photo->save()) {
    
        $message = "Photo uploaded Succesfully";

    } else {

        $message = join("<br>", $photo->errors);

    }
    
} // end if(isset($_POST['submit']))
?>

<?php require_once("includes/header.php"); ?>
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
                            Загрузить фото <!--<small>Обзор статистики</small>-->
                        </h1>
                        <div class="row">
                            <div class="col-md-6">
                                <?=$message?>
                                <form action="upload.php" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="title">Заголовок</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="caption">Подпись</label>
                                        <input type="text" name="caption" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <textarea name="description" id="desc" cols="30" rows="10"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="alternate_text">Альтернативный текст</label>
                                        <input type="text" name="alternate_text" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <input type="file" name="file" class="form-control" multiple>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="created_at" class="form-control" multiple value="<?php echo date("Y-m-d H:i:s"); ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Загрузить">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form action="upload.php" class="dropzone">

                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>              
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>