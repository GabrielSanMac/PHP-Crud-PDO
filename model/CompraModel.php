<?php 

require_once('config/config.php');
require_once conn;
class CompraModel extends DB{
    protected $conn;

    public function getAllCompra() {
        $statement = $this->conn->query("SELECT * FROM compra_livro_cliente");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getClienteById($id){
        $statement = $this->conn->prepare("SELECT * FROM compra_livro_cliente WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertCompra($data_compra,$valor,$livro_id,$cliente_id) {
        try {
            $statement = $this->conn->prepare("INSERT INTO compra_livro_cliente VALUES (0,:data_compra,:valor,:livro_id,:cliente_id)");
            $statement->bindParam(":data_compra",$data_compra);
            $statement->bindParam(":valor",$valor);
            $statement->bindParam(":livro_id",$livro_id);
            $statement->bindParam(":cliente_id",$cliente_id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }
}

?>