<?php 

class PFController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action){
            case 'list':
                $PFs = $this->model->getAllPF();
                $this->listPFs($PFs);
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
                    $this->listPFs($this->model->getAllPF());
                } else {
                    $this->showPFInsertForm();
                }
        }
    }

    public function listPFs($PFs) {
        $view = new PFView();
        $view->showPFs($PFs);
    }

    public function showPFInsertForm() {
        $view = new PFView();
        $view->showPFInsertForm();
    }

}

?>