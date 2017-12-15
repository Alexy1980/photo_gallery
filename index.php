<?php
    require_once("admin/includes/constants.php");
    require_once("admin/includes/config.php");
    require_once("admin/includes/database.php");
    require_once("admin/includes/db_object.php");
    require_once("admin/includes/user.php");
    require_once("admin/includes/photo.php");
    require_once("admin/includes/comment.php");
    require_once("admin/includes/session.php");
    require_once("admin/includes/paginate.php");
    // pagination
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    $items_per_page = 6;
    $items_total_count = Photo::count_all();
    // $photos = Photo::find_all();
    $paginate = new Paginate($page, $items_per_page, $items_total_count);
    $sql = "SELECT * FROM photos ";
    $sql .= "LIMIT {$items_per_page} ";
    $sql .= "OFFSET {$paginate->offset()}";
    $photos = Photo::find_by_query($sql);
?>
<?php include_once "includes/header_front.php"?>
<?php include_once "includes/navigation.php"?>
    <!-- Page Content -->
    <div class="container">
        <div id="content">
            <div class="thumbnails row">
                <!-- Blog Entries Column -->
                <div class="col-md-8">
                    <?php foreach($photos as $photo): ?>
                        <div class="col-md-3 col-sm-4 col-xs-6 thumb" style="width: 200px; height: 150px;">
                            <a class="fancyimage" rel="group" href="admin/<?php echo $photo->picture_path(); ?>">
                                <img class="img-responsive" src="admin/<?php echo $photo->picture_path(); ?>" />
                            </a>
                            <a href="photo.php?id=<?php echo $photo->id ?>">Комментировать фото</a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Blog Sidebar Widgets Column -->
                <?php include_once "includes/sidebar.php"?>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <ul class="pagination">
                        <?php
                            if($paginate->page_total() > 1){
                                if($paginate->has_next()){
                                    echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";
                                }
                            }

                            for($i = 1; $i <= $paginate->page_total(); $i++){
                                if($i == $paginate->current_page){
                                   echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
                                } else {
                                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                                }
                            }

                            if($paginate->has_previous()){
                                echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                            }
                        ?>
                        <!--<li><a href='#'></a></li>-->
                        <!--<li class="previous"><a href="">Previous</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.row -->
    <?php include_once "includes/footer.php"?>
