<?php 

require_once('config/config.php');
require_once conn;
class EditoraModel extends DB{
    protected $conn;

    public function getAllEditora() {
        $statement = $this->conn->query("SELECT * FROM editora");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEditoraById($id){
        $statement = $this->conn->prepare("SELECT * FROM editora WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertEditora($editora_nome, $telefone_id, $endereco_id, $gerente_id) {
        try {
            $statement = $this->conn->prepare("INSERT INTO editora VALUES (0,:editora_nome,:telefone_id,:endereco_id,:gerente_id)");
            $statement->bindParam(":editora_nome",$editora_nome);
            $statement->bindParam(":telefone_id",$telefone_id);
            $statement->bindParam(":endereco_id",$endereco_id);
            $statement->bindParam(":gerente_id",$gerente_id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function updateEditora($id,$editora_nome, $telefone_id, $endereco_id, $gerente_id) {
        try {
            $statement = $this->conn->prepare("UPDATE editora SET editora_nome = :editora_nome, telefone_id = :telefone_id, endereco_id = :endereco_id, gerente_id = :gerente_id WHERE id = :id");
            $statement->bindParam(":editora_nome",$editora_nome);
            $statement->bindParam(":telefone_id",$telefone_id);
            $statement->bindParam(":endereco_id",$endereco_id);
            $statement->bindParam(":gerente_id",$gerente_id);
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function deleteEditora($id) {
        try {
            $statement = $this->conn->prepare("DELETE FROM editora WHERE id = :id");
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

}

?>