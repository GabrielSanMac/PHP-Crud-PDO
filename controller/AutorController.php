<?php 

class AutorController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listAutores($this->model->getAllAutores());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nome'])){
                    $nome = $_POST['nome'];
                    $this->model->insertAutor($nome);
                    $this->listAutores($this->model->getAllAutores());
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $autorId = $_GET['id'];
                    $autor = $this->model->getAutorById($autorId);
                    if($autor){
                        $this->showUpdateForm($autor);
                    } else {
                        echo "AUTHOR NOT FOUND 404";
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nome'])){
                    $id = $_POST['id'];
                    $nome = $_POST['nome'];
                    $this->model->updateAutor($id,$nome);
                    $this->listAutores($this->model->getAllAutores());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteAutor($id);
                    $this->listAutores($this->model->getAllAutores());
                }
            break;
        }
    }

    public function listAutores($autores) {
        $view = new AutorView();
        $view->showListAutores($autores);
    }

    public function showInsertForm() {
        $view = new AutorView();
        $view->showInsertForm();
    }

    public function showUpdateForm($autor) {
        $view = new AutorView();
        $view->showUpdateForm($autor);
    }
}

?>