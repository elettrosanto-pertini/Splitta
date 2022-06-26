<?php
require_once('DB_constants.php');

class Database {
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASSWORD;
    private $conn;

    // DB connection

    public function connect(){
        $this->conn = null;
        try{
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $ex){
            echo 'Connection Error: '. $ex->getMessage();
        }

        return $this->conn;
    }
}