<?php

require_once('config/config.php');
require_once conn;

class ClientModel extends DB{
    protected $conn;

    public function getAllClients(){
        $statement = $this->conn->query("SELECT * FROM cliente");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getClienteById($id){
        $statement = $this->conn->prepare("SELECT * FROM cliente  WHERE id = :id");
        $statement->bindParam(':id',$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertClient($clientName, $addressId){
        try {
            $statement = $this->conn->prepare("INSERT INTO cliente VALUES (0, :clientName, :addressId)");
            $statement->bindParam(":clientName",$clientName);
            $statement->bindParam(":addressId",$addressId);
            $statement->execute();
        } catch (PDOException $error){
            echo "ERROR MODULE ".$error->getMessage();
        }
    }
    
    public function updateClient($id, $clientName, $addressId) {
        try {
            $statement = $this->conn->prepare("UPDATE cliente SET nome = :clientName, endereco_id = :addressId WHERE id = :id");
            $statement->bindParam(":clientName",$clientName);
            $statement->bindParam(":addressId",$addressId);
            $statement->bindParam(":id",$id);
            return $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function deleteClient($id){
        try {
            $statement = $this->conn->prepare("DELETE FROM cliente WHERE id = :id");
            $statement->bindParam(":id",$id);
            return $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }
}

?>