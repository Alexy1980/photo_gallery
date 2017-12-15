<?php
    require_once("../admin/includes/constants.php");
    require_once("../admin/includes/config.php");
    require_once("../admin/includes/database.php");
    require_once("../admin/includes/db_object.php");
    require_once("../admin/includes/user.php");
    require_once("../admin/includes/photo.php");
    require_once("../admin/includes/comment.php");
    require_once("../admin/includes/session.php");

    if(isset($_POST['comment_author']) && isset($_POST['comment_body']) && isset($_POST['comment_created_at']) && isset($_POST['photo_id'])) {
        // ответ с сервера
        $comment = Comment::create_comment($_POST['photo_id'], trim(strip_tags($_POST['comment_author'])), trim(strip_tags($_POST['comment_body'])), $_POST['comment_created_at']);
		$comment->save();
        //var_dump($comment);
        echo "OK!!!";
} else {
        echo "Ошибка ajax";
    }