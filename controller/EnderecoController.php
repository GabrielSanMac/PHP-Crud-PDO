<?php 

require_once("./model/CidadeModel.php");
class EnderecoController {
    private $model;
    private $cidade;

    public function __construct($model){
        $this->model = $model;
        $this->cidade = new CidadeModel;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listEndereco($this->model->getAllEndereco(),$this->cidade);
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nome'])){
                    $nome = $_POST['nome'];
                    $this->model->insertEndereco($nome);
                    $this->listEndereco($this->model->getAllEndereco(),$this->cidade);
                } else {
                    $this->showInsertForm();
                }
                break;
            case 'edit':
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $enderecoid = $_GET['id'];
                    $endereco = $this->model->getEnderecoById($enderecoid);
                    if($endereco){
                        $this->showUpdateForm($endereco,$this->cidade->getAllCidade());
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
                    $this->listEndereco($this->model->getAllEndereco(),$this->cidade);
                }
            break;
            case 'delete':
                if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->model->deleteEndereco($id);
                    $this->listEndereco($this->model->getAllEndereco(),$this->cidade);
                }
            break;
        }
    }

    public function listEndereco($enderecos,$cidade) {
        $view = new EnderecoView();
        $view->showListEndereco($enderecos,$cidade);
    }

    public function showInsertForm() {
        $view = new EnderecoView();
        $view->showInsertForm();
    }

    public function showUpdateForm($endereco, $cidade) {
        $view = new EnderecoView();
        $view->showUpdateForm($endereco,$cidade);
    }
}

?>