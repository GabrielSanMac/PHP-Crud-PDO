<?php 

class TelefoneController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listTelefone($this->model->getAllTelefone());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $numero_telefone = $_POST['numero_telefone'];
                    $cliente_id = $_POST['cliente_id'];
                    $this->model->insertTelefone($numero_telefone,$cliente_id);
                    $this->listTelefone($this->model->getAllTelefone());
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $telefoneId = $_GET['id'];
                    $telefone = $this->model->getTelefoneById($telefoneId);
                    if($telefone){
                        $this->showUpdateForm($telefone);
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
                    $this->listTelefone($this->model->getAllTelefone());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteTelefone($id);
                    $this->listTelefone($this->model->getAllTelefone());
                }
            break;
        }
    }

    public function listTelefone($telefones) {
        $view = new TelefoneView();
        $view->showListTelefone($telefones);
    }

    public function showInsertForm() {
        $view = new TelefoneView();
        $view->showInsertForm();
    }

    public function showUpdateForm($telefone) {
        $view = new TelefoneView();
        $view->showUpdateForm($telefone);
    }
}

?>