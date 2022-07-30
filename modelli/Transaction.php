<?php
class Transaction{
    private $conn;
    private $table = TR_TABLE;

    public $tr_id;
    public $tr_amount;
    public $tr_payer_name;
    public $tr_receiver_name;
    public $tr_group_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create(){
        $query = 'INSERT INTO '.$this->table.'
        (tr_name, tr_amount, tr_payer_name, tr_receiver_name, tr_group_id) 
        VALUES (:tr_name, :tr_amount, :tr_payer_name, :tr_receiver_name, :tr_group_id);
        ';

        $this->tr_name = htmlspecialchars(stripslashes(trim($this->tr_name)));
        $this->tr_amount = htmlspecialchars(stripslashes(trim($this->tr_amount)));
        $this->tr_payer_name = htmlspecialchars(stripslashes(trim($this->tr_payer_name)));
        $this->tr_receiver_name = htmlspecialchars(stripslashes(trim($this->tr_receiver_name)));
        $this->tr_group_id = htmlspecialchars(stripslashes(trim($this->tr_group_id)));

        $stmt = $this->conn->prepare($query); 

        $stmt->bindParam(':tr_name', $this->tr_name);
        $stmt->bindParam(':tr_amount', $this->tr_amount);
        $stmt->bindParam(':tr_payer_name', $this->tr_payer_name);
        $stmt->bindParam(':tr_receiver_name', $this->tr_receiver_name);
        $stmt->bindParam(':tr_group_id', $this->tr_group_id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function read(){
        $query='SELECT * FROM '.$this->table.' 
        WHERE tr_group_id=:tr_group_id ;';

        $this->tr_group_id = htmlspecialchars(stripslashes(trim($this->tr_group_id)));

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':tr_group_id', $this->tr_group_id);
        $stmt->execute();

        return $stmt;
    }
}