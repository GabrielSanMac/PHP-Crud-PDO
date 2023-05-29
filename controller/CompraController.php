<?php 

class CompraController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listCompra($this->model->getAllCompra());
                $this->model->disconnect();
            break;
            case 'insert':
                if($_SERVER['REQUEST_METHOD'] == "POST" ){
                    $data_compra = $_POST['data_compra'];
                    $valor = $_POST['valor'];
                    $livro_id = $_POST['livro_id'];
                    $cliente_id = $_POST['cliente_id'];
                    $this->model->insertCompra($data_compra, $valor, $livro_id, $cliente_id);
                    $this->listCompra($this->model->getAllCompra());
                } else {
                    $this->showInsertForm();
                }
                break;
        }
    }

    public function listCompra($compras) {
        $view = new CompraView();
        $view->showListCompra($compras);
    }

    public function showInsertForm() {
        $view = new CompraView();
        $view->showInsertForm();
    }
}

?>