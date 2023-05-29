<?php 

class CidadeController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listCidade($this->model->getAllCidade());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $cidade_nome = $_POST['cidade_nome'];
                    $estado_id = $_POST['estado_id'];
                    $this->model->insertCidade($cidade_nome, $estado_id);
                    $this->listCidade($this->model->getAllCidade());
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $cidadeid = $_GET['id'];
                    $cidade = $this->model->getCidadeById($cidadeid);
                    if($cidade){
                        $this->showUpdateForm($cidade);
                    } else {
                        echo "AUTHOR NOT FOUND 404";
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $id = $_POST['id'];
                    $cidade_nome = $_POST['cidade_nome'];
                    $estado_id = $_POST['estado_id'];
                    $this->model->updateCidade($id,$cidade_nome,$estado_id);
                    $this->listCidade($this->model->getAllCidade());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteCidade($id);
                    $this->listCidade($this->model->getAllCidade());
                }
            break;
        }
    }

    public function listCidade($cidade) {
        $view = new CidadeView();
        $view->showListCidade($cidade);
    }

    public function showInsertForm() {
        $view = new CidadeView();
        $view->showInsertForm();
    }

    public function showUpdateForm($cidade) {
        $view = new CidadeView();
        $view->showUpdateForm($cidade);
    }
}

?>