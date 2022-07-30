<?php
class Club{
    private $conn;
    private $table = CLUBS_TABLE;

    public $club_user_name;
    public $club_group_id;
    public $balance;


    public function __construct($db){
        $this->conn = $db;
    }

    public function create(){
        //polish raw data
        $this->club_user_name = htmlspecialchars(stripslashes(trim($this->club_user_name)));
        $this->club_group_id = htmlspecialchars(stripslashes(trim($this->club_group_id)));
        $this->balance = 0;

        //invio a Db
        $query='INSERT INTO '.$this->table.'
        (club_user_name, club_group_id, balance) 
        VALUES (:club_user_name, :club_group_id, :balance);';

        $stmt= $this->conn->prepare($query);

        $stmt->bindParam(':club_user_name', $this->club_user_name);
        $stmt->bindParam(':club_group_id', $this->club_group_id);
        $stmt->bindParam(':balance', $this->balance);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function read_from_username(){
        $query='SELECT * FROM '.$this->table.' 
        WHERE club_user_name=:club_user_name ;
        ';

        $this->club_user_name = htmlspecialchars(stripslashes(trim($this->club_user_name)));

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':club_user_name', $this->club_user_name);
        $stmt->execute();

        return $stmt;
    }

    public function read_from_group_id(){
        $query='SELECT * FROM '.$this->table.' 
        WHERE club_group_id=:club_group_id ;
        ';

        $this->club_group_id =  htmlspecialchars(stripslashes(trim($this->club_group_id)));

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':club_group_id', $this->club_group_id);
        $stmt->execute();

        return $stmt;
    }

    public function get_group_from_id(){
        $query='SELECT * FROM '.GROUPS_TABLE.' 
        WHERE group_id= :club_group_id ;
        ';

        $this->club_group_id = htmlspecialchars(stripslashes(trim($this->club_group_id)));

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':club_group_id', $this->club_group_id);
        $stmt->execute();

        return $stmt;
    }

    public function update_balance(){
        $query='UPDATE '.$this->table.' 
        SET balance=:balance WHERE club_group_id=:club_group_id AND club_user_name=:club_user_name;
        ';

        $this->club_user_name = htmlspecialchars(stripslashes(trim($this->club_user_name)));
        $this->club_group_id = htmlspecialchars(stripslashes(trim($this->club_group_id)));
        $this->balance = htmlspecialchars(stripslashes(trim($this->balance)));

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':club_group_id', $this->club_group_id);
        $stmt->bindParam(':club_user_name', $this->club_user_name);
        $stmt->bindParam(':balance', $this->balance);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}