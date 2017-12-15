<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// defined('SITE_ROOT')? null : define('SITE_ROOT', DS.'Applications'.DS.'mampstack-5.4.38-0'.DS.'apache2'.DS.'htdocs'.DS.'udemy');

// Open Server path
defined('SITE_ROOT') ? null : define('SITE_ROOT', 'D:'.DS.'Games'.DS.'OpenServer'.DS.'domains'.DS.'udemy.php');

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');


function redirect($location){
    header("Location: {$location}");
}