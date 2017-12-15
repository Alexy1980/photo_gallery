<?php

// require_once("init.php");
require_once("config.php");

class Database {
 
    public $connection;

    function __construct(){
      $this->open_db_connection();
    }

    public function open_db_connection(){

    $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($this->connection->connect_errno){

        die("Database connection failed badly". mysqli_error());

    }

    $this->connection->set_charset("utf8");

    }

    public function pdo_database_connect(){
        $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.'';
        $user = DB_USER;
        $pass = DB_PASS;

        try{
            return new PDO($dsn, $user, $pass);
        } catch (PDOException $e){
            echo 'Проблемы с подключением к базе данных! '.$e->getMessage();
        }
    }

    public function query($sql){

    $result = mysqli_query($this->connection, $sql);
    $this->confirm_query($result);
    return $result;

    }

    private function confirm_query($result){
       if(!$result) {
        die("Query Failed");
       }

    }

    public function escape_string($string) {

      $escaped_string = mysqli_real_escape_string($this->connection, $string);

      return $escaped_string;

    }

    public function the_insert_id(){
        // mysqli_insert_id возвращает автоматически генерируемый ID, используя последний запрос
        return mysqli_insert_id($this->connection);

    }

} // end Database class

$database = new Database();
$db =& $database;

?>