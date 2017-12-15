<?php

class User extends Db_object {
  
    protected static $db_table = "users";
    protected static $db_table_fields = array('id', 'username', 'password', 'first_name', 'last_name', 'user_image');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $tmp_path;
    public $upload_directory = "images/users";
    public $image_placeholder = "http://placehold.it/400x400&text=image";

    public function image_path_and_placeholder(){
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
    }
    // db_object.php
    public static function find_all_users(){
        $sql = "SELECT * FROM ".self::$db_table;
        return self::find_by_this_query($sql);
    }

    public static function find_user_by_id($user_id){
        $sql = "SELECT * FROM ".self::$db_table." WHERE id = $user_id LIMIT 1";
        $result_set = self::find_by_this_query($sql);
        $found_user = mysqli_fetch_array($result_set);
        return $found_user;
    }

    public static function find_by_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        return $result_set;
    }

    // проверка введенных значений $username, $password
    public static function verify_user($username, $password){
    global $database;
    $username = $database->escape_string($username);
    $password = md5($database->escape_string($password));
        
    $sql = "SELECT * FROM ".self::$db_table." WHERE ";
    $sql .= "username = '{$username}' ";
    $sql .= "AND ";
    $sql .= "password = '{$password}' ";
    $sql .= "LIMIT 1";

    $the_result_array = self::find_by_query($sql);
    // array_shift() извлекает первый элемент массива
    return !empty($the_result_array) ? array_shift($the_result_array) : false;  

    }

    public function picture_path() {

        return $this->upload_directory.DS.$this->user_image;

    }

    public function delete_user() {

        if($this->delete()) {
            $target_path = SITE_ROOT.DS."admin".DS.$this->picture_path();
            return unlink($target_path) ? true: false;
        } else {
            return false;
        }
    }

    public function search($search){
        global $database;
        $pdo = $database->pdo_database_connect();
        $stmt = $pdo->prepare("SELECT `id`, `username`, `first_name`, `last_name`, `user_image` FROM `users` WHERE `username` LIKE ? OR `first_name` LIKE ?");
        // PDOStatement::bindValue Связывает параметр с заданным значением
        $stmt->bindValue(1,$search.'%', PDO::PARAM_STR);
        $stmt->bindValue(2,$search.'%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function save_user_and_image() {

            if(!empty($this->errors)) {
                return false;
            }

            if(empty($this->user_image) || empty($this->tmp_path)) {
                $this->errors[] = "the file was not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS .$this->upload_directory. DS . $this->user_image;

            if(file_exists($target_path)) {
                $this->errors[] = "The file {$this->user_image} already exists";
                return false;
            }
            // перемещаем загруженный файл в новое место
            if(move_uploaded_file($this->tmp_path, $target_path)) {

                if($this->save()) {
                    unset($this->tmp_path);
                    return true;
                }

            } else {

                $this->errors[] = "the file directory probably does not have permission";
                return false;
            }
    }

    public function delete_photo() {

        if($this->delete()) {
            $target_path = SITE_ROOT.DS."admin".DS.$this->upload_directory.DS.$this->user_image;
            return unlink($target_path) ? true: false;
        } else {
            return false;
        }
    }
} // end User class

?>