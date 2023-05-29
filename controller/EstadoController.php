<?php 

class EstadoController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listEstado($this->model->getAllEstado());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $nome = $_POST['estado_nome'];
                    $nome = $_POST['pais_id'];
                    $this->model->insertEstado($nome);
                    $this->listEstado($this->model->getAllEstado());
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET"){
                    $estadoid = $_GET['id'];
                    $estado = $this->model->getEstadoById($estadoid);
                    if($estado){
                        $this->showUpdateForm($estado);
                    } else {
                        echo "AUTHOR NOT FOUND 404";
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $id = $_POST['id'];
                    $nome = $_POST['estado_nome'];
                    $nome = $_POST['pais_id'];
                    $this->model->updateEstado($id,$nome);
                    $this->listEstado($this->model->getAllEstado());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteEstado($id);
                    $this->listEstado($this->model->getAllEstado());
                }
            break;
        }
    }

    public function listEstado($estado) {
        $view = new EstadoView();
        $view->showListEstado($estado);
    }

    public function showInsertForm() {
        $view = new EstadoView();
        $view->showInsertForm();
    }

    public function showUpdateForm($estado) {
        $view = new EstadoView();
        $view->showUpdateForm($estado);
    }
}

?>