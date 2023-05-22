<?php 


class PJController{
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action){
            case 'list':
                $PJs = $this->model->getAllPJ();
                $this->listPJs($PJs);
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $nome = $_POST['nome'];
                    $endereco_id = $_POST['endereco_id'];
                    $razao_social = $_POST['razao_social'];
                    $cnpj = $_POST['cnpj'];
                    $this->model->insertPJ($nome,$endereco_id,$razao_social,$cnpj);
                    $this->listPJs($this->model->getAllPJ());
                } else {
                    $this->showPJproInsertForm();
                }
        }
    }

    public function listPJs($PJs){
        $view = new PJView();
        $view->showPJs($PJs);
    }

    public function showPJproInsertForm(){
        $view = new PJView();
        $view->showPJproInsertForm();
    }
}

?>