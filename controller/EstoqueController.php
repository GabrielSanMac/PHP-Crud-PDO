<?php 

class EstoqueController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listEstoque($this->model->getAllEstoque());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $livro_id = $_POST['livro_id'];
                    $livraria_id = $_POST['livraria_id'];
                    $qtd = $_POST['qtd'];
                    $this->model->insertEstoque($livro_id,$livraria_id,$qtd);
                    $this->listEstoque($this->model->getAllEstoque());
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $estoqueid = $_GET['id'];
                    $estoque = $this->model->getEstoqueById($estoqueid);
                    if($estoque){
                        $this->showUpdateForm($estoque);
                    } else {
                        echo "AUTHOR NOT FOUND 404";
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nome'])){
                    $id = $_POST['id'];
                    $livro_id = $_POST['livro_id'];
                    $livraria_id = $_POST['livraria_id'];
                    $qtd = $_POST['qtd'];
                    $this->model->updateEstoque($id,$livro_id,$livraria_id,$qtd);
                    $this->listEstoque($this->model->getAllEstoque());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteEstoque($id);
                    $this->listEstoque($this->model->getAllEstoque());
                }
            break;
        }
    }

    public function listEstoque($estoques) {
        $view = new EstoqueView();
        $view->showListEstoque($estoques);
    }

    public function showInsertForm() {
        $view = new EstoqueView();
        $view->showInsertForm();
    }

    public function showUpdateForm($estoque) {
        $view = new EstoqueView();
        $view->showUpdateForm($estoque);
    }
}

?>