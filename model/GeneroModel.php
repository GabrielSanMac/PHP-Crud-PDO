<?php 

require_once('config/config.php');
require_once conn;
class GeneroModel extends DB{
    protected $conn;

    public function getAllGeneros() {
        $statement = $this->conn->query("SELECT * FROM genero");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGeneroById($id){
        $statement = $this->conn->prepare("SELECT * FROM genero WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertGenero($nome) {
        try {
            $statement = $this->conn->prepare("INSERT INTO genero VALUES (0,:nome)");
            $statement->bindParam(":nome",$nome);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function updateGenero($id,$nome) {
        try {
            $statement = $this->conn->prepare("UPDATE genero SET nome_genero = :nome WHERE id = :id");
            $statement->bindParam(":nome",$nome);
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function deleteGenero($id) {
        try {
            $statement = $this->conn->prepare("DELETE FROM genero WHERE id = :id");
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

}

?>