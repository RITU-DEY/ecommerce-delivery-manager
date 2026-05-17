<?php
require_once __DIR__ . '/../config/db.php';

class AgentModel {

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function getAll(){
        return $this->conn->query("SELECT * FROM agents");
    }

    public function getActive(){
        return $this->conn->query("SELECT * FROM agents WHERE status='Active'");
    }
}
?>