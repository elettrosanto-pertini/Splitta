<?php
class Invite{
    private $conn;
    private $table = INVITES_TABLE;

    public $invite_id;
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

    public function read(){
        $query='SELECT * FROM '.$this->table.' 
        WHERE invited_name=:invited_name ;
        ';

        $this->invited_name = htmlspecialchars(stripslashes($this->invited_name));

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':invited_name', $this->invited_name);
        $stmt->execute();

        return $stmt;
    }

    public function read_single(){
        $query='SELECT * FROM '.$this->table.' 
        WHERE invite_id=:invite_id';

        $this->invite_id = htmlspecialchars(stripslashes($this->invite_id));

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':invite_id', $this->invite_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);        
    }

    public function delete(){
        $query='DELETE FROM '.$this->table.' 
        WHERE invite_id=:invite_id ;';

         //polish raw data
         $this->invite_id = htmlspecialchars(stripslashes($this->invite_id));
        
 
         //execute statement
         $stmt = $this->conn->prepare($query);
 
         $stmt->bindParam(':invite_id', $this->invite_id);
 
         if($stmt->execute() === true){
             return true;
         }else{
             return false;
         }
    }

    public function get_group_name(){
        $query='SELECT group_name FROM '.GROUPS_TABLE.'
        WHERE group_id = :new_group_id
        ';

        //$this->new_group_id = htmlspecialchars(stripslashes($this->new_group_id));

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':new_group_id', $this->new_group_id);
        $stmt->execute();

        return $stmt;
    }
}