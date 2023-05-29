<?php 

require_once('config/config.php');
require_once conn;
class EstoqueModel extends DB{
    protected $conn;

    public function getAllEstoque() {
        $statement = $this->conn->query("SELECT * FROM estoque");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEstoqueById($id){
        $statement = $this->conn->prepare("SELECT * FROM estoque WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertEstoque($livro_id, $livraria_id, $quantidade_em_estoque) {
        try {
            $statement = $this->conn->prepare("INSERT INTO estoque VALUES (0,:livro_id,:livraria_id,:quantidade_em_estoque)");
            $statement->bindParam(":livro_id",$livro_id);
            $statement->bindParam(":livraria_id",$livraria_id);
            $statement->bindParam(":quantidade_em_estoque",$quantidade_em_estoque);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function updateEstoque($id,$livro_id, $livraria_id, $quantidade_em_estoque) {
        try {
            $statement = $this->conn->prepare("UPDATE estoque SET livro_id = :livro_id, livraria_id = :livraria_id, quantidade_em_estoque = :quantidade_em_estoque WHERE id = :id");
            $statement->bindParam(":nome",$livro_id);
            $statement->bindParam(":nome",$livraria_id);
            $statement->bindParam(":nome",$quantidade_em_estoque);
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function deleteEstoque($id) {
        try {
            $statement = $this->conn->prepare("DELETE FROM estoque WHERE id = :id");
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

}

?>