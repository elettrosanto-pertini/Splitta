<?php
//require_once("../../database/DB_constants.php");

class User{

    //costanti private
    private $conn;
    private $table = USERS_TABLE;

    //attributi pubblici *wink-wink*
    public $username;
    public $password;
    public $email;

    //constructor. $db è istanza di Database
    public function __construct($db){
        $this->conn = $db;
    }



    // FUNZIONI C,R,D PER CLASSE User

    public function create(){
        $result = $this->read_single();
        $num = $result->rowCount();

        if($num>0){
            return 2;
        }else{

            //polish raw data
            $this->username = htmlspecialchars(stripslashes(trim($this->username)));
            $this->password = htmlspecialchars(stripslashes(trim($this->password)));
            $this->email = htmlspecialchars(stripslashes(($this->email)));


            //hash password
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);


            //send data to DB (prepared statements)
            $query = '
                INSERT INTO '.$this->table.'
                (user_name, password, user_mail) 
                VALUES (:user, :password, :email);
            ';

            $stmt = $this->conn->prepare($query);

            if($stmt->execute([':user'=>$this->username, ':password'=>$this->password, ':email'=>$this->email])){
                return true;
            }else{
                return false;
            }
        }
    }

    public function read_single(){
        $query = '
            SELECT * FROM '.$this->table.'
            WHERE user_name = :username ;
        ';

        $this->username = htmlspecialchars(stripslashes(trim($this->username)));

        $stmt = $this->conn->prepare($query);
        $stmt->execute([':username'=>$this->username]);

        return $stmt;
    }
}