<?php 

require_once('config/config.php');
require_once conn;
class GerenteModel extends DB{
    protected $conn;

    public function getAllGerentes() {
        $statement = $this->conn->query("SELECT * FROM gerente");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGerenteById($id){
        $statement = $this->conn->prepare("SELECT * FROM gerente WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertGerente($nome) {
        try {
            $statement = $this->conn->prepare("INSERT INTO gerente VALUES (0,:nome)");
            $statement->bindParam(":nome",$nome);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function updateGerente($id,$nome) {
        try {
            $statement = $this->conn->prepare("UPDATE gerente SET gerente_nome = :nome WHERE id = :id");
            $statement->bindParam(":nome",$nome);
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function deleteGerente($id) {
        try {
            $statement = $this->conn->prepare("DELETE FROM gerente WHERE id = :id");
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

}

?>