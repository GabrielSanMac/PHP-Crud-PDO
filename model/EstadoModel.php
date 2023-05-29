<?php 

require_once('config/config.php');
require_once conn;
class EstadoModel extends DB{
    protected $conn;

    public function getAllEstado() {
        $statement = $this->conn->query("SELECT * FROM estado");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEstadoById($id){
        $statement = $this->conn->prepare("SELECT * FROM estado WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertEstado($estado_nome,$pais_id) {
        try {
            $statement = $this->conn->prepare("INSERT INTO estado VALUES (0,:estado_nome,:pais_id)");
            $statement->bindParam(":estado_nome",$estado_nome);
            $statement->bindParam(":pais_id",$pais_id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function updateEstado($id,$estado_nome,$pais_id) {
        try {
            $statement = $this->conn->prepare("UPDATE estado SET estado_nome = :estado_nome, pais_id = :pais_id WHERE id = :id");
            $statement->bindParam(":estado_nome",$estado_nome);
            $statement->bindParam(":pais_id",$pais_id);
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function deleteEstado($id) {
        try {
            $statement = $this->conn->prepare("DELETE FROM estado WHERE id = :id");
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

}

?>