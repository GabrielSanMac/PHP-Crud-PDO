<?php 

require_once('config/config.php');
require_once conn;
class EnderecoModel extends DB{
    protected $conn;

    public function getAllEndereco() {
        $statement = $this->conn->query("SELECT * FROM endereco");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEnderecoById($id){
        $statement = $this->conn->prepare("SELECT * FROM endereco WHERE id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getEnderecoExtenco($id){
        $statement = $this->conn->prepare("SELECT f_obter_endereco(:id) as enderecoExtenco");
        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insertEndereço($rua_nome,$numero_casa,$bairro_nome,$cidade_id) {
        try {
            $statement = $this->conn->prepare("CALL p_insert_endereco(:rua_nome,:numero_casa,:bairro_nome,:cidade_id)");
            $statement->bindParam(":rua_nome",$rua_nome);
            $statement->bindParam(":numero_casa",$numero_casa);
            $statement->bindParam(":bairro_nome",$bairro_nome);
            $statement->bindParam(":cidade_id",$cidade_id);
            $statement->execute();

            $error = $statement->errorinfo();
            if($error[0] != "00000"){
            throw new Exception("ERROR PROCEDURE INSERT ENDEREÇO MODULE".$error[2]);
            }
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function updateEndereco($id,$rua_nome,$numero_casa,$bairro_nome,$cidade_id) {
        try {
            $statement = $this->conn->prepare("UPDATE endereco SET rua_nome = :rua_nome, numero_casa = :numero_casa, bairro_nome = :bairro_nome, cidade_id = :cidade_id WHERE id = :id");
            $statement->bindParam(":rua_nome",$rua_nome);
            $statement->bindParam(":numero_casa",$numero_casa);
            $statement->bindParam(":bairro_nome",$bairro_nome);
            $statement->bindParam(":cidade_id",$cidade_id);
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

    public function deleteEndereco($id) {
        try {
            $statement = $this->conn->prepare("DELETE FROM endereco WHERE id = :id");
            $statement->bindParam(":id",$id);
            $statement->execute();
        } catch (Exception $error) {
            echo "ERROR MODULE ".$error->getMessage();
        }
    }

}

?>