<?php 

require_once('config/config.php');
require_once conn;
class AutorModel extends DB{
    protected $conn;

    public function getAllAutores() {
        $statement = $this->conn->query("SELECT * FROM autor");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAutorById($id){
        $statement = $this->conn->prepare("SELECT * FROM autor WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertAutor($nome) {
        try {
            $statement = $this->conn->prepare("INSERT INTO autor VALUES (0,:nome)");
            $statement->bindParam(":nome",$nome);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERRO AUTHOR INSERT MODULE ($error)";
        }
    }

    public function updateAutor($id,$nome) {
        try {
            $statement = $this->conn->prepare("UPDATE autor SET nome_autor = :nome WHERE id = :id");
            $statement->bindParam(":nome",$nome);
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR AUTHOR UPDATE MODULE ($error)";
        }
    }

    public function deleteAutor($id) {
        try {
            $statement = $this->conn->prepare("DELETE FROM autor WHERE id = :id");
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR AUTHOR DELETE MODULE ($error)";
        }
    }

}

?>