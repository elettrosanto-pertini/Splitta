<?php
class Invite{
    private $conn;
    private $table = INVITES_TABLE;

    public $inviter_name;
    public $invited_name;
    public $new_group_id;

    public function __construct($db){
        $this->conn = $db;
    }

    public function create(){
        $query='INSERT INTO '.$this->table.'
        (invited_name, new_group_id, inviter_name) 
        VALUES (:invited_name, :new_group_id, :inviter_name);';

        //polish raw data
        $this->invited_name = htmlspecialchars(stripslashes($this->invited_name));
        $this->new_group_id = htmlspecialchars(stripslashes($this->new_group_id));
        $this->inviter_name = htmlspecialchars(stripslashes($this->inviter_name));

        //execute statement
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':invited_name', $this->invited_name);
        $stmt->bindParam(':new_group_id', $this->new_group_id);
        $stmt->bindParam(':inviter_name', $this->inviter_name);

        if($stmt->execute() === true){
            return true;
        }else{
            return false;
        }
    }
}