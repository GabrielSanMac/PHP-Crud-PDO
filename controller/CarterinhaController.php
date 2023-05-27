<?php 

class CarterinhaController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listCarterinha($this->model->getAllCarterinha());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $data_validade = $_POST['data_validade'];
                    $instituicao_id = $_POST['instituicao_id'];
                    $cliente_id = $_POST['cliente_id'];
                    $this->model->insertCarterinha($data_validade,$instituicao_id,$cliente_id);
                    $this->listCarterinha($this->model->getAllCarterinha());
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $carterinhaId = $_GET['id'];
                    $carterinha = $this->model->getCarterinhaById($carterinhaId);
                    if($carterinha){
                        $this->showUpdateForm($carterinha);
                    } else {
                        echo " CARTERINHA NOT FOUND 404";
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $id = $_POST['id'];
                    $data_validade = $_POST['data_validade'];
                    $instituicao_id = $_POST['instituicao_id'];
                    $cliente_id = $_POST['cliente_id'];
                    $this->model->updateCarterinha($id,$data_validade,$instituicao_id,$cliente_id);
                    $this->listCarterinha($this->model->getAllCarterinha());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteCarterinha($id);
                    $this->listCarterinha($this->model->getAllCarterinha());
                }
            break;
        }
    }

    public function listCarterinha($carterinhas) {
        $view = new CarterinhaView();
        $view->showListCarterinha($carterinhas);
    }

    public function showInsertForm() {
        $view = new CarterinhaView();
        $view->showInsertForm();
    }

    public function showUpdateForm($carterinha) {
        $view = new CarterinhaView();
        $view->showUpdateForm($carterinha);
    }
}

?>