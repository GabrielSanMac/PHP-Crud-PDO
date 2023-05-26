<?php 

require_once('config/config.php');
require_once conn;
class LivroModel extends DB{
    protected $conn;

    public function getAllLivro() {
        $statement = $this->conn->query("SELECT * FROM livro");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLivroById($id){
        $statement = $this->conn->prepare("SELECT * FROM livro WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertLivro($titulo,$assunto,$ano_publicado,$preco,$ISBN,$autor_id) {
        try {
            $statement = $this->conn->prepare("INSERT INTO livro VALUES (0,:titulo,:assunto,:ano_publicado,:preco,:ISBN,autor_id)");
            $statement->bindParam(":titulo",$titulo);
            $statement->bindParam(":assunto",$assunto);
            $statement->bindParam(":ano_publicado",$ano_publicado);
            $statement->bindParam(":preco",$preco);
            $statement->bindParam(":ISBN",$ISBN);
            $statement->bindParam(":autor_id",$autor_id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERRO LIVRO INSERT MODULE ($error)";
        }
    }

    public function updateLivro($id,$titulo,$assunto,$ano_publicado,$preco,$ISBN,$autor_id) {
        try {
            $statement = $this->conn->prepare("UPDATE livro SET titulo = :titulo, assunto = :assunto, ano_publicacao = :ano_publicado, preco = :preco, ISBN = :ISBN, autor_id = :autor_id WHERE id = :id");
            $statement->bindParam(":titulo",$titulo);
            $statement->bindParam(":assunto",$assunto);
            $statement->bindParam(":ano_publicado",$ano_publicado);
            $statement->bindParam(":preco",$preco);
            $statement->bindParam(":ISBN",$ISBN);
            $statement->bindParam(":autor_id",$autor_id);
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR LIVRO UPDATE MODULE ($error)";
        }
    }

    public function deleteLivro($id) {
        try {
            $statement = $this->conn->prepare("DELETE FROM livro WHERE id = :id");
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR LIVRO DELETE MODULE ($error)";
        }
    }

}

?>