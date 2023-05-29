<?php 

require_once("./model/ClientModel.php");
require_once("./model/InstituicaoModel.php");
class CarterinhaController {
    private $model;
    private $cliente;
    private $instituicao;
    public function __construct($model){
        $this->model = $model;
        $this->cliente = new ClientModel;
        $this->instituicao = new InstituicaoModel;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listCarterinha($this->model->getAllCarterinha(),$this->cliente,$this->instituicao);
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $data_validade = $_POST['data_validade'];
                    $instituicao_id = $_POST['instituicao_id'];
                    $cliente_id = $_POST['cliente_id'];
                    $this->model->insertCarterinha($data_validade,$instituicao_id,$cliente_id);
                    $this->listCarterinha($this->model->getAllCarterinha(),$this->cliente,$this->instituicao);
                } else {
                    $this->showInsertForm($this->cliente->getAllClients(),$this->instituicao->getAllInstituicao());
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $carterinhaId = $_GET['id'];
                    $carterinha = $this->model->getCarterinhaById($carterinhaId);
                    if($carterinha){
                        $this->showUpdateForm($carterinha,$this->cliente->getAllClients(),$this->instituicao->getAllInstituicao());
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
                    $this->listCarterinha($this->model->getAllCarterinha(),$this->cliente,$this->instituicao);
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteCarterinha($id);
                    $this->listCarterinha($this->model->getAllCarterinha(),$this->cliente,$this->instituicao);
                }
            break;
        }
    }

    public function listCarterinha($carterinhas,$cliente,$instituicao) {
        $view = new CarterinhaView();
        $view->showListCarterinha($carterinhas,$cliente,$instituicao);
    }

    public function showInsertForm($cliente,$instituicao) {
        $view = new CarterinhaView();
        $view->showInsertForm($cliente,$instituicao);
    }

    public function showUpdateForm($carterinha,$cliente,$instituicao) {
        $view = new CarterinhaView();
        $view->showUpdateForm($carterinha,$cliente,$instituicao);
    }
}

?>