<?php 

class InstituicaoController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listInstituicao($this->model->getAllInstituicao());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nome'])){
                    $nome = $_POST['nome'];
                    $this->model->insertInstituicao($nome);
                    $this->listInstituicao($this->model->getAllInstituicao());
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $instId = $_GET['id'];
                    $inst = $this->model->getInstituicaoById($instId);
                    if($inst){
                        $this->showUpdateForm($inst);
                    } else {
                        echo "INSTITUIÇÃO NOT FOUND 404";
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nome'])){
                    $id = $_POST['id'];
                    $nome = $_POST['nome'];
                    $this->model->updateInstituicao($id,$nome);
                    $this->listInstituicao($this->model->getAllInstituicao());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteInstituicao($id);
                    $this->listInstituicao($this->model->getAllInstituicao());
                }
            break;
        }
    }

    public function listInstituicao($insts) {
        $view = new InstituicaoView();
        $view->showListInstituicao($insts);
    }

    public function showInsertForm() {
        $view = new InstituicaoView();
        $view->showInsertForm();
    }

    public function showUpdateForm($inst) {
        $view = new InstituicaoView();
        $view->showUpdateForm($inst);
    }
}

?>