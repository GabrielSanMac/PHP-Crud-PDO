<?php 

require_once('config/config.php');
require_once conn;
class PaisModel extends DB{
    protected $conn;

    public function getAllPais() {
        $statement = $this->conn->query("SELECT * FROM pais");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPaisById($id){
        $statement = $this->conn->prepare("SELECT * FROM pais WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertPais($pais_nome) {
        try {
            $statement = $this->conn->prepare("INSERT INTO pais VALUES (0,:pais_nome)");
            $statement->bindParam(":pais_nome",$pais_nome);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function updatePais($id,$pais_nome) {
        try {
            $statement = $this->conn->prepare("UPDATE pais SET pais_nome = :pais_nome WHERE id = :id");
            $statement->bindParam(":pais_nome",$pais_nome);
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function deletePais($id) {
        try {
            $statement = $this->conn->prepare("DELETE FROM pais WHERE id = :id");
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

}

?>