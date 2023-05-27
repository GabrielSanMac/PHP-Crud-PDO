<?php 

require_once('config/config.php');
require_once conn;
class InstituicaoModel extends DB{
    protected $conn;

    public function getAllInstituicao() {
        $statement = $this->conn->query("SELECT * FROM instituicao order by id asc");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInstituicaoById($id){
        $statement = $this->conn->prepare("SELECT * FROM instituicao WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertInstituicao($nome) {
        try {
            $statement = $this->conn->prepare("INSERT INTO instituicao VALUES (0,:nome)");
            $statement->bindParam(":nome",$nome);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function updateInstituicao($id,$nome) {
        try {
            $statement = $this->conn->prepare("UPDATE instituicao SET nome_instituicao = :nome WHERE id = :id");
            $statement->bindParam(":nome",$nome);
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function deleteInstituicao($id) {
        try {
            $statement = $this->conn->prepare("DELETE FROM instituicao WHERE id = :id");
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }
}

?>