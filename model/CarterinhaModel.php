<?php 

require_once('config/config.php');
require_once conn;
class CarterinhaModel extends DB{
    protected $conn;

    public function getAllCarterinha() {
        $statement = $this->conn->query("SELECT * FROM carterinha");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCarterinhaById($id){
        $statement = $this->conn->prepare("SELECT * FROM carterinha WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertCarterinha($data_validade, $instituicao_id, $cliente_id) {
        try {
            $statement = $this->conn->prepare("INSERT INTO carterinha VALUES (0 ,:data_validade, :instituicao_id, :cliente_id)");
            $statement->bindParam(":data_validade",$data_validade);
            $statement->bindParam(":instituicao_id",$instituicao_id);
            $statement->bindParam(":cliente_id",$cliente_id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function updateCarterinha($id,$data_validade, $instituicao_id, $cliente_id) {
        try {
            $statement = $this->conn->prepare("UPDATE carterinha SET data_validade = :data_validade, instituicao_id = :instituicao_id, cliente_id = :cliente_id WHERE id = :id");
            $statement->bindParam(":data_validade",$data_validade);
            $statement->bindParam(":instituicao_id",$instituicao_id);
            $statement->bindParam(":cliente_id",$cliente_id);
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function deleteCarterinha($id) {
        try {
            $statement = $this->conn->prepare("DELETE FROM carterinha WHERE id = :id");
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

}

?>