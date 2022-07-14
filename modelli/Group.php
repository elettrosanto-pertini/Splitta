<?php
//include_once('../database/DB_constants.php');

class Group{
    private $table = GROUPS_TABLE;
    private $conn;

    public $group_name;
    public $total_credit;
    public $size;
    public $creator_name;
    public $group_id;

    public function __construct($db){
        $this->conn = $db;
    }



    public function create(){

        $result = $this->read_single();
        $num = $result->rowCount();

        if($num>0){
            return false;
        }else{

            //polish raw data
            $this->group_name = htmlspecialchars(stripslashes(trim($this->group_name)));
            $this->size = htmlspecialchars(stripslashes(trim($this->size)));
            $this->total_credit = htmlspecialchars(stripslashes(trim($this->total_credit)));
            $this->creator_name = htmlspecialchars(stripslashes(trim($this->creator_name)));

            //invio a Db
            $query='INSERT INTO '.$this->table.'
            (group_name, total_credit, size, creator_name) 
            VALUES (:group_name, :total_credit, :size, :creator_name);';

            $stmt= $this->conn->prepare($query);

            $stmt->bindParam(':group_name', $this->group_name);
            $stmt->bindParam(':total_credit', $this->total_credit);
            $stmt->bindParam(':size', $this->size);
            $stmt->bindParam(':creator_name', $this->creator_name);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
    }

    public function delete(){
        $query='DELETE FROM '.$this->table.'
        WHERE group_id=:group_id LIMIT 1 ;
        ';

        $this->group_id = htmlspecialchars(stripslashes(trim($this->group_id)));

        $stmt= $this->conn->prepare($query);
        $stmt->bindParam(':group_id', $this->group_id);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

    
    public function read_single(){
        $this->group_name = htmlspecialchars(stripslashes(trim($this->group_name)));
        $this->creator_name = htmlspecialchars(stripslashes(trim($this->creator_name)));

        $query='SELECT * FROM '.$this->table.' 
        WHERE group_name= :group_name AND creator_name= :creator_name ;
        ';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':group_name', $this->group_name);
        $stmt->bindParam(':creator_name', $this->creator_name);
        
        $stmt->execute();

        return $stmt;
    }

    public function name_check(){
        $query='
        SELECT * FROM '.$this->table.' 
        WHERE group_id=:group_id AND group_name=:group_name ;
        ';

        $this->group_name = htmlspecialchars(stripslashes(trim($this->group_name)));
        $this->group_id = htmlspecialchars(stripslashes(trim($this->group_id)));

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':group_name', $this->group_name);
        $stmt->bindParam(':group_id', $this->group_id);

        $stmt->execute();

        return $stmt;
    }


}