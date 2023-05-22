<?php 

require_once('config/config.php');
require_once conn;

class PJModel extends DB {
    protected $conn;

    public function getAllPJIndividual(){
        $statement = $this->conn->query("SELECT * FROM pessoa_juridica");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPJ(){
        $statement = $this->conn->query("SELECT * FROM pessoa_juridica");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertPJ($nome, $endereco_id, $razao_social, $cnpj) {
        $statement = $this->conn->prepare('CALL p_inserir_cliente_pessoa_juridica(:nome, :endereco_id, :razao_social, :cnpj)');
        $statement->bindParam(":nome",$nome);
        $statement->bindParam(":endereco_id",$endereco_id);
        $statement->bindParam(":razao_social",$razao_social);
        $statement->bindParam(":cnpj",$cnpj);
        $statement->execute();
    }

    // DELETE E UPDATE DEVEM TER UMA PROCEDURE
}

?>