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

    public function get_group_from_id(){
        $this->club_group_id = htmlspecialchars(stripslashes(trim($this->club_group_id)));

        $query='SELECT * FROM '.GROUPS_TABLE.' 
        WHERE group_id= :club_group_id ;
        ';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':club_group_id', $this->club_group_id);
        $stmt->execute();

        return $stmt;
    }
}