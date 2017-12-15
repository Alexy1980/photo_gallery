<?php

require_once("includes/init.php");

if(!$session->is_signed_in()) {
    redirect("login.php");
}

if(empty($_GET['id'])) {
    redirect("comments.php");
} else {

    $comment = Comment::find_by_id($_GET['id']);
    if($comment) {
        $comment->delete();
        $session->message("Комментарий {$comment->id} успешно удален!");
        redirect("comments.php");
    } else {
        redirect("comments.php");
    }
}
?>