<?php 

require_once("includes/init.php");

if(!$session->is_signed_in()) {
    redirect("login.php");
}

if(empty($_GET['id'])) {
    redirect("photos.php");
} else {
    
    $photo = Photo::find_by_id($_GET['id']);
    if($photo) {
        if($photo){
            $photo->delete_photo();
            $session->message("Фото {$photo->filename} успешно удалено!");
            redirect("photos.php");
        } else {
            $photo->delete();
            redirect("photos.php");
        }
    } else {
        redirect("photos.php");
    }
}
?>
  