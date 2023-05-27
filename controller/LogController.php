<?php 

class LogController {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function reqAction($action){
        switch($action) {
            case 'list':
                $this->listLog($this->model->getAllLog());
                $this->model->disconnect();
            break;

        }
    }

    public function listLog($logs) {
        $view = new LogView();
        $view->showListLog($logs);
    }
}

?>