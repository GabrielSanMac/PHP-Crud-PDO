<?php 

require_once('config/config.php');
require_once conn;
class LivrariaModel extends DB{
    protected $conn;

    public function getAllLivraria() {
        $statement = $this->conn->query("SELECT * FROM livraria");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLivrariaById($id){
        $statement = $this->conn->prepare("SELECT * FROM livraria WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertLivraria($nome) {
        try {
            $statement = $this->conn->prepare("INSERT INTO livraria VALUES (0,:nome)");
            $statement->bindParam(":nome",$nome);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERRO LIVRARIA INSERT MODULE ($error)";
        }
    }

    public function updateLivraria($id,$nome) {
        try {
            $statement = $this->conn->prepare("UPDATE livraria SET nome_livraria = :nome WHERE id = :id");
            $statement->bindParam(":nome",$nome);
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR LIVRARIA UPDATE MODULE ($error)";
        }
    }

    public function deleteLivraria($id) {
        try {
            $statement = $this->conn->prepare("DELETE FROM livraria WHERE id = :id");
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR LIVRARIA DELETE MODULE ($error)";
        }
    }

}

?>