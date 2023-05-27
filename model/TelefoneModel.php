<?php 

require_once('config/config.php');
require_once conn;
class TelefoneModel extends DB{
    protected $conn;

    public function getAllTelefone() {
        $statement = $this->conn->query("SELECT * FROM telefone");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTelefoneById($id){
        $statement = $this->conn->prepare("SELECT * FROM telefone WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertTelefone($numero_telefone,$cliente_id) {
        try {
            $statement = $this->conn->prepare("INSERT INTO telefone VALUES (0,:numero_telefone,:cliente_id)");
            $statement->bindParam(":numero_telefone",$numero_telefone);
            $statement->bindParam(":cliente_id",$cliente_id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function updateTelefone($id,$numero_telefone, $cliente_id) {
        try { 
            $statement = $this->conn->prepare("UPDATE telefone SET numero_telefone = :numero_telefone, cliente_id = :cliente_id WHERE id = :id");
            $statement->bindParam(":numero_telefone",$numero_telefone);
            $statement->bindParam(":cliente_id",$cliente_id);
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function deleteTelefone($id) {
        try {
            $statement = $this->conn->prepare("DELETE FROM telefone WHERE id = :id");
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

}

?>