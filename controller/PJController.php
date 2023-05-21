<?php 

require_once 'model/PjModel.php';

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
            case 'pinsert':
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name = $_POST['name'];
                    $addressid = $_POST['addressId'];
                    $razaosocial = $_POST['razaosocial'];
                    $cnpj = $_POST['cnpj'];
                    $this->model->ProInsertPJ($name,$addressid,$razaosocial,$cnpj);
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