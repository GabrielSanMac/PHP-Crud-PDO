<?php 

class EditoraController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listEditora($this->model->getAllEditora());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $editora_nome = $_POST['editora_nome'];
                    $telefone_id = $_POST['telefone_id'];
                    $endereco_id = $_POST['endereco_id'];
                    $gerente_id = $_POST['gerente_id'];
                    $this->model->insertEditora($editora_nome, $telefone_id, $endereco_id, $gerente_id);
                    $this->listEditora($this->model->getAllEditora());
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $editoraid = $_GET['id'];
                    $editora = $this->model->getEditoraById($editoraid);
                    if($editora){
                        $this->showUpdateForm($editora);
                    } else {
                        echo "AUTHOR NOT FOUND 404";
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $id = $_POST['id'];
                    $editora_nome = $_POST['editora_nome'];
                    $telefone_id = $_POST['telefone_id'];
                    $endereco_id = $_POST['endereco_id'];
                    $gerente_id = $_POST['gerente_id'];
                    $this->model->updateEditora($id,$editora_nome,$telefone_id,$endereco_id,$gerente_id);
                    $this->listEditora($this->model->getAllEditora());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteEditora($id);
                    $this->listEditora($this->model->getAllEditora());
                }
            break;
        }
    }

    public function listEditora($editoras) {
        $view = new EditoraView();
        $view->showListEditora($editoras);
    }

    public function showInsertForm() {
        $view = new EditoraView();
        $view->showInsertForm();
    }

    public function showUpdateForm($editora) {
        $view = new EditoraView();
        $view->showUpdateForm($editora);
    }
}

?>