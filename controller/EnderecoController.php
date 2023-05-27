<?php 

class EnderecoController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listEndereco($this->model->getAllEndereco());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nome'])){
                    $nome = $_POST['nome'];
                    $this->model->insertEndereco($nome);
                    $this->listEndereco($this->model->getAllEndereco());
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $enderecoid = $_GET['id'];
                    $endereco = $this->model->getEnderecoById($enderecoid);
                    if($endereco){
                        $this->showUpdateForm($endereco);
                    } else {
                        echo "AUTHOR NOT FOUND 404";
                    }
                }
            break;
            case 'update':
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $id = $_POST['id'];
                    $rua_nome = $_POST['rua_nome'];
                    $numero_casa = $_POST['numero_casa'];
                    $bairro_nome = $_POST['bairro_nome'];
                    $cidade_id = $_POST['cidade_id'];
                    $this->model->updateEndereco($id,$rua_nome,$numero_casa,$bairro_nome,$cidade_id);
                    $this->listEndereco($this->model->getAllEndereco());
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteEndereco($id);
                    $this->listEndereco($this->model->getAllEndereco());
                }
            break;
        }
    }

    public function listEndereco($enderecos) {
        $view = new EnderecoView();
        $view->showListEndereco($enderecos);
    }

    public function showInsertForm() {
        $view = new EnderecoView();
        $view->showInsertForm();
    }

    public function showUpdateForm($endereco) {
        $view = new EnderecoView();
        $view->showUpdateForm($endereco);
    }
}

?>