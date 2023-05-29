<?php 

require_once("./model/ClientModel.php");
require_once("./model/EnderecoModel.php");

class PFController {
    private $model;
    private $cliente;
    private $endereco;

    public function __construct($model){
        $this->model = $model;
        $this->cliente = new ClientModel;
        $this->endereco = new EnderecoModel;
    }

    public function reqAction($action){
        switch($action){
            case 'list':
                $PFs = $this->model->getAllPF();
                $this->listPFs($PFs,$this->cliente);
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $nome = $_POST['nome'];
                    $endereco_id = $_POST['endereco_id'];
                    $cpf = $_POST['cpf'];
                    $data_nascimento = $_POST['data_nascimento'];
                    $sexo = $_POST['sexo'];
                    $this->model->insertPF($nome,$endereco_id,$cpf,$data_nascimento,$sexo);
                    $this->listPFs($this->model->getAllPF(),$this->cliente);
                } else {
                    $this->showPFInsertForm($this->endereco);
                }
        }
    }

    public function listPFs($PFs,$cliente) {
        $view = new PFView();
        $view->showPFs($PFs,$cliente);
    }

    public function showPFInsertForm($endereco) {
        $view = new PFView();
        $view->showPFInsertForm($endereco);
    }

}

?>