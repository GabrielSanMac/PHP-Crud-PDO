<?php 

require_once 'model/ClientModel.php';

class ClientController{
    private $model;

    public function __construct($model){
       $this->model = $model; 
    }

    public function reqAction($action){
        switch($action){
            case 'list':
                $clients = $this->model->getAllClients();
                $this->listClients($clients);
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = $_POST['name'];
                    $addressId = $_POST['addressId'];
                    $this->model->insertClient($name,$addressId);
                    $this->listClients($this->model->getAllClients());
                } else {
                    $this->showInsertForm();
                }
            break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
                    $clientId = $_GET['id'];
                   
                    $client = $this->model->getClienteById($clientId);

                    if($client) {
                        $this->showUpdateForm($client);
                    } else {
                        echo 'CLIENTE NÃO ENCONTRADO';
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $id = $_POST['id'];
                    $name = $_POST['nome'];
                    $addressId = $_POST['endereco_id'];

                    $this->model->updateClient($id,$name,$addressId);
                    $this->listClients($this->model->getAllClients());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteClient($id);
                }
                $this->listClients($this->model->getAllClients());
        }
    }
    
    public function listClients($clients) {
        $view = new ClientView();
        $view->showClients($clients);
    }

    public function showInsertForm(){
        $view = new ClientView();
        $view->showInsertForm();
    }

    public function showUpdateForm($client){
        $view = new ClientView();
        $view->showUpdateForm($client);
    }
}

?>