<?php 

class LivrariaController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listLivraria($this->model->getAllLivraria());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nome'])){
                    $nome = $_POST['nome'];
                    $this->model->insertLivraria($nome);
                    $this->listLivraria($this->model->getAllLivraria());
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $livrariaId = $_GET['id'];
                    $livraria = $this->model->getLivrariaById($livrariaId);
                    if($livraria){
                        $this->showUpdateForm($livrariaId);
                    } else {
                        echo "AUTHOR NOT FOUND 404";
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nome'])){
                    $id = $_POST['id'];
                    $nome = $_POST['nome'];
                    $this->model->updateLivraria($id,$nome);
                    $this->listLivraria($this->model->getAllLivraria());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteLivraria($id);
                    $this->listLivraria($this->model->getAllLivraria());
                }
            break;
        }
    }

    public function listLivraria($livrarias) {
        $view = new LivrariaView();
        $view->showListLivraria($livrarias);
    }

    public function showInsertForm() {
        $view = new LivrariaView();
        $view->showInsertForm();
    }

    public function showUpdateForm($livraria) {
        $view = new LivrariaView();
        $view->showUpdateForm($livraria);
    }
}

?>