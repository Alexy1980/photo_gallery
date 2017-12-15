<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin <!--<small>Statistics Overview</small>-->
            </h1>

<?php

/* $photo = new Photo();

 $photo->title = "Just some test title";
 $photo->size = 20;


 $photo->create(); */

/*$photo = Photo::find_by_id(8);

echo $photo->filename;*/


/*$photos = Photo::find_all();
    foreach ($photos as $photo) {
    echo $photo->title.'<br/>';
}*/

/*

$users = User::find_all();
foreach ($users as $user) {
echo $user->username;

}*/

/*$user = new User();

$user->username = "Bill Geits";
$user->password = "170680";
$user->first_name = "Bill";
$user->last_name = "Geits";
$user->save();*/

/*$result_sets = User::find_all();
foreach($result_sets as $result_set){
    echo $result_set->username.'<br/>';
}*/

/* $result_sets = User::find_all_users();
while($row = mysqli_fetch_array($result_set)){
    echo $row['username'].'<br/>';
} */

/*$found_user = User::find_by_id(9);
echo $found_user->username;*/

/*$user = User::find_by_id(9);
$user->last_name = "NIKOLAEVA";
$user->save();*/

/*$user = User::find_by_id(20);
$user->delete();*/

//update
/*$user = User::find_user_by_id(4);

$user->username = "Дмитрий";
$user->update();*/

// новый пользователь
/*$user = new User();

$user->username = "John Smith";
$user->password = "170680";
$user->first_name = "John";
$user->last_name = "Smith";

$user->create();*/

//update
/*$user = User::find_by_id(4);
$user->username = "Дмитрий";
$user->password = "170680";
$user->first_name = "Дима";
$user->last_name = "Петров";

$user->update();*/
?>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $session->count ?></div>
                        <div>Страница просмотрена</div>
                    </div>
                </div>
            </div>
                <div class="panel-footer">
                    <a href="">
                        <div> Смотреть детально
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <i class="fa fa-file-photo-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo Photo::count_all(); ?></div>
                        <div>Новых фото</div>
                    </div>
                </div>
            </div>
            <div class="panel-footer panel-green">
                <a href="photos.php">
                    <div>Смотреть фото в галерее
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo User::count_all(); ?></div>
                        <div>Новых пользователя</div>
                    </div>
                </div>
            </div>
            <div class="panel-footer panel-yellow">
                <a href="users.php">
                    <div> Всего пользователей
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo Comment::count_all(); ?></div>
                        <div>Новых комментария</div>
                    </div>
                </div>
            </div>
            <div class="panel-footer panel-red">
                <a href="comments.php">
                    <div> Всего комментариев
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</div>


        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<div class="row">
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</div>