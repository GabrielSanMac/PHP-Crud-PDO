<?php 

require_once('config/config.php');
require_once conn;
class CidadeModel extends DB{
    protected $conn;

    public function getAllCidade() {
        $statement = $this->conn->query("SELECT * FROM cidade");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCidadeById($id){
        $statement = $this->conn->prepare("SELECT * FROM cidade WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertCidade($cidade_nome, $estado_id) {
        try {
            $statement = $this->conn->prepare("INSERT INTO cidade VALUES (0,:cidade_nome, :estado_id)");
            $statement->bindParam(":cidade_nome",$cidade_nome);
            $statement->bindParam(":estado_id",$estado_id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function updateCidade($id,$cidade_nome,$estado_id) {
        try {
            $statement = $this->conn->prepare("UPDATE cidade SET cidade_nome = :cidade_nome, estado_id = :estado_id WHERE id = :id");
            $statement->bindParam(":cidade_nome",$cidade_nome);
            $statement->bindParam(":estado_id",$estado_id);
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function deleteCidade($id) {
        try {
            $statement = $this->conn->prepare("DELETE FROM cidade WHERE id = :id");
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

}

?>