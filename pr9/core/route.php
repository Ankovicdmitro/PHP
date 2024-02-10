<?php
class Route
{
    function start()
    {
        $url = $_SERVER['REQUEST_URI'];

        #$newUrl = str_replace(SITE_ROOT, "", $url);
        $route = explode('/', $url);

        $action = ACTIONDEFAULT;
        $controller_name = CONTROLLERDEFAULT;

        if (isset($route[3])) {
            $controller_name = $route[3];

        }

        if (isset($route[4])) {
            $action = $route[4];
        }

        $controller_path = 'controllers/' . strtolower($controller_name) . '.php';
        $model_path = 'models/' . strtolower($controller_name) . '.php';

        if (file_exists($model_path)) {
            include $model_path;
        }

        if (file_exists($controller_path)) {
            include $controller_path;
            $controller_name .= 'Controller';
            $controller = new $controller_name;
        }

        if (method_exists($controller, $action)) {
            $controller->$action();
        }
    }
}