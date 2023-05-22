<?php 

class GerenteController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listGerentes($this->model->getAllGerentes());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nome'])){
                    $nome = $_POST['nome'];
                    $this->model->insertGerente($nome);
                    $this->listGerentes($this->model->getAllGerentes());
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $gerenteId = $_GET['id'];
                    $gerente = $this->model->getGerenteById($gerenteId);
                    if($gerente){
                        $this->showUpdateForm($gerente);
                    } else {
                        echo "GENDER NOT FOUND 404";
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nome'])){
                    $id = $_POST['id'];
                    $nome = $_POST['nome'];
                    $this->model->updateGerente($id,$nome);
                    $this->listGerentes($this->model->getAllGerentes());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteGerente($id);
                    $this->listGerentes($this->model->getAllGerentes());
                }
            break;
        }
    }

    public function listGerentes($gerentes) {
        $view = new GerenteView();
        $view->showListGerentes($gerentes);
    }

    public function showInsertForm() {
        $view = new GerenteView();
        $view->showInsertForm();
    }

    public function showUpdateForm($gerente) {
        $view = new GerenteView();
        $view->showUpdateForm($gerente);
    }
}

?>