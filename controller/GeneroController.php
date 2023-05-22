<?php 

class GeneroController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listGeneros($this->model->getAllGEneros());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nome'])){
                    $nome = $_POST['nome'];
                    $this->model->insertGenero($nome);
                    $this->listGeneros($this->model->getAllGeneros());
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $generoId = $_GET['id'];
                    $genero = $this->model->getGeneroById($generoId);
                    if($genero){
                        $this->showUpdateForm($genero);
                    } else {
                        echo "GENDER NOT FOUND 404";
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nome'])){
                    $id = $_POST['id'];
                    $nome = $_POST['nome'];
                    $this->model->updateGenero($id,$nome);
                    $this->listGeneros($this->model->getAllGeneros());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteGenero($id);
                    $this->listGeneros($this->model->getAllGeneros());
                }
            break;
        }
    }

    public function listGeneros($generos) {
        $view = new GeneroView();
        $view->showListGeneros($generos);
    }

    public function showInsertForm() {
        $view = new GeneroView();
        $view->showInsertForm();
    }

    public function showUpdateForm($genero) {
        $view = new GeneroView();
        $view->showUpdateForm($genero);
    }
}

?>