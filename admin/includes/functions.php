<?php
// Пытаемся автоматически загрузить используемый, но не загруженный ранее, класс
function __autoload($class){
    
    $class = strtolower($class);
    $the_path = "includes/{$class}.php";
    $the_path_admin = "admin/includes/{$class}.php";

    if(file_exists($the_path)) {

        require_once($the_path);

    } else if(file_exists($the_path_admin)) {
        require_once($the_path_admin);
    } else {
      // если файл не найден, то мы увидим вот это
      die("This file name {$class}.php was not found man....");

    }
}

// redirect() определена в constants.php

?>