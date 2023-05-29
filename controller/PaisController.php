<?php 

class PaisController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listPais($this->model->getAllPais());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $pais_nome = $_POST['pais_nome'];
                    $this->model->insertPais($pais_nome);
                    $this->listPais($this->model->getAllPais());
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET"){
                    $paisid = $_GET['id'];
                    $pais = $this->model->getPaisById($paisid);
                    if($pais){
                        $this->showUpdateForm($pais);
                    } else {
                        echo "AUTHOR NOT FOUND 404";
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $id = $_POST['id'];
                    $pais_nome = $_POST['pais_nome'];
                    $this->model->updatePais($id,$pais_nome);
                    $this->listPais($this->model->getAllPais());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deletePais($id);
                    $this->listPais($this->model->getAllPais());
                }
            break;
        }
    }

    public function listPais($pais) {
        $view = new PaisView();
        $view->showListPais($pais);
    }

    public function showInsertForm() {
        $view = new PaisView();
        $view->showInsertForm();
    }

    public function showUpdateForm($pais) {
        $view = new PaisView();
        $view->showUpdateForm($pais);
    }
}

?>