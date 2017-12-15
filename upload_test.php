<?php
// если подключать через init.php, то php путает класс photo.php с файлом photo.php в корне сайта и редиректит на index. Разобраться.
// require_once("admin/includes/init.php");
    require_once("admin/includes/constants.php");
    require_once("admin/includes/config.php");
    require_once("admin/includes/database.php");
    require_once("admin/includes/db_object.php");
    require_once("admin/includes/user.php");
    require_once("admin/includes/photo.php");
    require_once("admin/includes/comment.php");
    require_once("admin/includes/session.php");

if(isset($_POST['submit'])) {
/*    echo "<pre>";
    print_r($_FILES['file_upload']);
    echo "</pre>";*/
    $upload_errors = array(
        // ключи данного массива соответствуют значениям массива $_FILES['file_upload']['error']
        UPLOAD_ERR_OK => 'There is no error, the file uploaded with success',
        UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded',
        UPLOAD_ERR_NO_FILE => 'No file was uploaded',
        UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
        UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
        UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload.',
    );
    $tmp_name = $_FILES['file_upload']['tmp_name'];
    $tmp_file = $_FILES['file_upload']['name'];
    $directory = 'uploads';
    // Перемещаем загруженный файл в новое место
    if(move_uploaded_file($tmp_name, $directory.'/'.$tmp_file)){
        echo $the_message = 'Файл успешно загружен!';
    } else {
        $the_error = $_FILES['file_upload']['error'];
        echo $the_message = $upload_errors[$the_error];
    }
}
/*echo '<pre>';
    echo SITE_ROOT;
echo '</pre>';*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload test</title>
</head>
<body>
<form action="upload_test.php" method="post" enctype="multipart/form-data">
    <h2>
        <?php
            if(!empty($upload_errors)){
                echo $the_message;
            }
        ?>
    </h2>
    <div class="form-group">
        <input type="file" name="file_upload" class="form-control" multiple>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" class="btn">
    </div>
</form>
</body>
</html>