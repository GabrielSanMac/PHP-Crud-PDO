<?php 

require_once("./model/ClientModel.php");

class TelefoneController {
    private $model;
    private $cliente;

    public function __construct($model){
        $this->model = $model;
        $this->cliente = new ClientModel();
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listTelefone($this->model->getAllTelefone(),$this->cliente);
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $numero_telefone = $_POST['numero_telefone'];
                    $cliente_id = $_POST['cliente_id'];
                    $this->model->insertTelefone($numero_telefone,$cliente_id);
                    $this->listTelefone($this->model->getAllTelefone(),$this->cliente);
                } else {
                    $this->showInsertForm($this->cliente->getAllClients());
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $telefoneId = $_GET['id'];
                    $telefone = $this->model->getTelefoneById($telefoneId);
                    if($telefone){
                        $this->showUpdateForm($telefone,$this->cliente->getAllClients());
                    } else {
                        echo "AUTHOR NOT FOUND 404";
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $id = $_POST['id'];
                    $numero = $_POST['numero_telefone'];
                    $cliente_id = $_POST['cliente_id'];
                    $this->model->updateTelefone($id,$numero,$cliente_id);
                    $this->listTelefone($this->model->getAllTelefone(),$this->cliente);
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteTelefone($id);
                    $this->listTelefone($this->model->getAllTelefone(),$this->cliente);
                }
            break;
        }
    }

    public function listTelefone($telefones,$cliente) {
        $view = new TelefoneView();
        $view->showListTelefone($telefones,$cliente);
    }

    public function showInsertForm($cliente) {
        $view = new TelefoneView();
        $view->showInsertForm($cliente);
    }

    public function showUpdateForm($telefone,$cliente) {
        $view = new TelefoneView();
        $view->showUpdateForm($telefone,$cliente);
    }
}

?>