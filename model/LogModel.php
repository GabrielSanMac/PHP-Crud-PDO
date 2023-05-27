<?php 

require_once('config/config.php');
require_once conn;
class LogModel extends DB{
    protected $conn;

    public function getAllLog() {
        $statement = $this->conn->query("SELECT * FROM log");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLogById($id){
        $statement = $this->conn->prepare("SELECT * FROM log WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}

?>