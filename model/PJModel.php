<?php 

require_once('config/config.php');
require_once conn;

class PJModel extends DB {
    protected $conn;

    public function getAllPJ(){
        $statement = $this->conn->query("SELECT * FROM pessoa_juridica");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ProInsertPJ($name, $addressId, $razaosocial, $cnpj) {
        $statement = $this->conn->prepare('CALL p_inserir_cliente_pessoa_juridica(:name, :addressId, :razaosocial, :cnpj)');
        $statement->bindParam(":name",$name);
        $statement->bindParam(":addressId",$addressId);
        $statement->bindParam(":razaosocial",$razaosocial);
        $statement->bindParam(":cnpj",$cnpj);
        $statement->execute();
    }
}

?>