<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Minha Livraria</title>
</head>
<body>
    <header>
        <a href="http://localhost/mvc/index.php?route=home&&action=index">HOME</a>
        <a href="http://localhost/mvc/index.php?route=client&&action=list">CLIENT</a>
        <a href="http://localhost/mvc/index.php?route=pj&&action=list">PESSOA JURIDICA</a>
        <a href="http://localhost/mvc/index.php?route=pf&&action=list">PESSOA FISICA</a>
        <a href="http://localhost/mvc/index.php?route=autor&&action=list">AUTOR</a>
        <a href="http://localhost/mvc/index.php?route=genero&&action=list">GENERO</a>
        <a href="http://localhost/mvc/index.php?route=gerente&&action=list">GERENTE</a>
        <a href="http://localhost/mvc/index.php?route=instituicao&&action=list">INSTITUIÇÃO</a>
    </header>

    <div class="container">
        <?php 
            require_once 'controller/ClientController.php';
            require_once 'view/ClientView.php';
            $route = $_GET['route'] ?? 'home';

            $route_controller = [
                'home' => 'HomeController',
                'client' => 'ClientController',
                'pj' => 'PJController',
                'pf' => 'PFController',
                'autor' => 'AutorController',
                'genero' => 'GeneroController',
                'gerente' => 'GerenteController',
                'instituicao' => 'InstituicaoController',
            ];

            $route_model = [
                'client' => 'ClientModel',
                'pj' => 'PJModel',
                'pf' => 'PFModel',
                'autor' => 'AutorModel',
                'genero' => 'GeneroModel',
                'gerente' => 'GerenteModel',
                'instituicao' => 'InstituicaoModel',
            ];

            $route_view = [
                'home' => 'HomeView',
                'client' => 'ClientView',
                'pj' => 'PJView',
                'pf' => 'PFView',
                'genero' => 'GeneroView',
                'autor' => 'AutorView',
                'gerente' => 'GerenteView',
                'instituicao' => 'InstituicaoView',
            ];

            if(isset($route_controller[$route]) && isset($route_model[$route]) && isset($route_view[$route])){
                $controllerName = $route_controller[$route];
                $modelName = $route_model[$route];
                $viewName = $route_view[$route];

                require_once 'controller/'.$controllerName.'.php';
                require_once 'model/'.$modelName.'.php';
                require_once 'view/'.$viewName.'.php';

                $model = new $modelName();
                $controller = new $controllerName($model);
                $view = new $viewName($controller, $model);
                $action = isset($_GET['action']) ? $_GET['action'] : 'index';
                $controller->reqAction($action);
            } else if(isset($route_controller[$route]) && $route=='home'){
                $controllerName = $route_controller[$route];
                $viewName = $route_view[$route];

                require_once 'controller/'.$controllerName.'.php';
                require_once 'view/'.$viewName.'.php';

                $controller = new $controllerName;
                $view = new $viewName($controller);
                $action = isset($_GET['action']) ? $_GET['action'] : 'index';
                $controller->reqAction($action);
            } else {
                echo 'INVALID ROUTE';
            }
        ?>
    </div>
</body>
</html>