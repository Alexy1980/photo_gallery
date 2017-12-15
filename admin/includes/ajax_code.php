<?php

require("init.php");
$photo = new Photo();

if(isset($_POST['photo_name']) && isset($_POST['image_id'])){
     // ответ с сервера
     $photo->ajax_save_photo_image($_POST['photo_name'], $_POST['image_id']);
}

if(isset($_POST['photo_id'])){
     // ответ с сервера
     Photo::display_sidebar_data($_POST['photo_id']);
}