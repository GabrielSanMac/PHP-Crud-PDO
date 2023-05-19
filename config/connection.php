<?php

class BD {
    private $server = "localhost";
    private $username;
    private $password;
    private $dataBaseName;
    protected $connection;

    public function __construct($username, $password, $dataBaseName) {
        try {
            // recebendo dados para conexão
            $this->username = $username;
            $this->password = $password;
            $this->dataBaseName = $dataBaseName;

            // configurando conexão com PDO
            $this->connection = new PDO
            ("mysql:
                host=$this->server;
                dbname=$this->dataBaseName;
                $this->username, $this->password
            ");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $error) {
            echo "Erro na conexão: ".$error->getMessage();
        }
    }

    public function disconnect() {
        $this->connection = NULL;
    }
}

?>