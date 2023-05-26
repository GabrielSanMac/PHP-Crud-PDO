<?php 

class LivroController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listLivro($this->model->getAllLivro());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $titulo = $_POST['titulo'];
                    $assunto = $_POST['assunto'];
                    $ano_publicado = $_POST['ano_publicado'];
                    $preco = $_POST['preco'];
                    $ISBN = $_POST['ISBN'];
                    $autor_id = $_POST['autor_id'];
                    $this->model->insertLivro($titulo,$assunto,$ano_publicado,$preco,$ISBN,$autor_id);
                    $this->listLivro($this->model->getAllLivro());
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $livroId = $_GET['id'];
                    $livro = $this->model->getLivroById($livroId);
                    if($livro){
                        $this->showUpdateForm($livro);
                    } else {
                        echo "AUTHOR NOT FOUND 404";
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $id = $_POST['id'];
                    $titulo = $_POST['titulo'];
                    $assunto = $_POST['assunto'];
                    $ano_publicado = $_POST['ano_publicacao'];
                    $preco = $_POST['preco'];
                    $ISBN = $_POST['ISBN'];
                    $autor_id = $_POST['autor_id'];
                    $this->model->updateLivro($id,$titulo,$assunto,$ano_publicado,$preco,$ISBN,$autor_id);
                    $this->listLivro($this->model->getAllLivro());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteLivro($id);
                    $this->listLivro($this->model->getAllLivro());
                }
            break;
        }
    }

    public function listLivro($livros) {
        $view = new LivroView();
        $view->showListLivro($livros);
    }

    public function showInsertForm() {
        $view = new LivroView();
        $view->showInsertForm();
    }

    public function showUpdateForm($livro) {
        $view = new LivroView();
        $view->showUpdateForm($livro);
    }
}

?>