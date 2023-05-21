<?php

class DB {
    private $server = "localhost";
    private $username = 'api';
    private $password = '';
    private $dataBaseName = "bd_trabalho_livraria_3ads";
    //private $dataBaseName = "teste_api";
    protected $conn;

    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host=$this->server;dbname=$this->dataBaseName",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $error) {
            echo "Erro na conexão: ".$error->getMessage();
        }
    }

    public function disconnect() {
        $this->conn = NULL;
    }
}

?>