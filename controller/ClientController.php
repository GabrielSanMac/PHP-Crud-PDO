<?php 

require_once('./model/EnderecoModel.php');
class ClientController{
    private $model;
    private $endereco;

    public function __construct($model){
       $this->model = $model; 
       $this->endereco = new EnderecoModel();
    }

    public function reqAction($action){
        switch($action){
            case 'list':
                $clients = $this->model->getAllClients();
                $this->listClients($clients,$this->endereco);
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = $_POST['name'];
                    $addressId = $_POST['addressId'];
                    $this->model->insertClient($name,$addressId);
                    $this->listClients($this->model->getAllClients(),$this->endereco);
                } else {
                    $this->showInsertForm($this->endereco);
                }
            break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
                    $clientId = $_GET['id'];
                   
                    $client = $this->model->getClienteById($clientId);

                    if($client) {
                        $this->showUpdateForm($client,$this->endereco);
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
                    $this->listClients($this->model->getAllClients(),$this->endereco);
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteClient($id);
                }
                $this->listClients($this->model->getAllClients(),$this->endereco);
        }
    }
    
    public function listClients($clients,$endereco) {
        $view = new ClientView();
        $view->showClients($clients,$endereco);
    }

    public function showInsertForm($endereco){
        $view = new ClientView($endereco);
        $view->showInsertForm($endereco);
    }

    public function showUpdateForm($client,$endereco){
        $view = new ClientView();
        $view->showUpdateForm($client,$endereco);
    }
}

?>