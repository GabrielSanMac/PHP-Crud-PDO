<?php 

require_once ('config/config.php');
require_once conn;

class PFModel extends DB {
    protected $conn;

    public function getAllPF(){
        $statement = $this->conn->query("SELECT * FROM pessoa_fisica");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // public function getAllPF(){
    //     $statement = $this->conn->query("SELECT * FROM v_informacao_clientes where CPF IS NOT NULL");
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function insertPF($nome, $endereco_id, $cpf, $data_nascimento, $sexo){
        try{
            $statement = $this->conn->prepare("CALL p_inserir_cliente_pessoa_fisica(:endereco_id,:nome,:cpf,:data_nascimento,:sexo)");
            $statement->bindParam(":endereco_id",$endereco_id);
            $statement->bindParam(":nome",$nome);
            $statement->bindParam(":cpf",$cpf);
            $statement->bindParam(":data_nascimento",$data_nascimento);
            $statement->bindParam(":sexo",$sexo);
            $statement->execute();

            $error = $statement->errorinfo();
            if($error[0] != "00000"){
            throw new Exception("ERROR PROCEDURE INSERT PESSOA FISICA MODULE".$error[2]);
            }
        } catch (Exception $error){
            echo "ERROR INSERT PF MODULE ".$error->getMessage();
        }
    }

    // DELETE E UPDATE DEVEM TER UMA PROCEDURE
}

?>