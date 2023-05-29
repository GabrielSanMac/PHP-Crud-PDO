<?php 

require_once("./model/ClientModel.php");
require_once("./model/EnderecoModel.php");

class PJController{
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
                $PJs = $this->model->getAllPJ();
                $this->listPJs($PJs,$this->cliente);
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $nome = $_POST['nome'];
                    $endereco_id = $_POST['endereco_id'];
                    $razao_social = $_POST['razao_social'];
                    $cnpj = $_POST['cnpj'];
                    $this->model->insertPJ($nome,$endereco_id,$razao_social,$cnpj);
                    $this->listPJs($this->model->getAllPJ(),$this->cliente);
                } else {
                    $this->showPJproInsertForm($this->endereco);
                }
        }
    }

    public function listPJs($PJs,$cliente){
        $view = new PJView();
        $view->showPJs($PJs,$cliente);
    }

    public function showPJproInsertForm($endereco){
        $view = new PJView();
        $view->showPJproInsertForm($endereco);
    }
}

?>