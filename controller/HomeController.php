<?php 
class HomeController {

    public function reqAction($action){
        switch($action) {
            case 'index':
                $this->index();
            break;
        }
    }

    public function index(){
        $view = new HomeView();
        $view->showIndex();
    }
}

?>