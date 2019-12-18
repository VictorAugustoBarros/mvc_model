<?php

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();

        call_user_func_array(array($controller, $this->request->action), $this->request->params);
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $file = ROOT . 'Controllers/' . $name . '.php';

        try {
            if (file_exists($file)) {
                require_once($file);

                if (class_exists($name, false)) {
                    $_controller = new $name();

                    if (method_exists($_controller, $this->request->action)) {
                        $controller = new $name();
                        return $controller;

                    } else
                        throw new Exception("Action not found");
                } else
                    throw new Exception("Class not found");
            } else
                throw new Exception("File not found");

        } catch (Exception $e) {
            require_once(ROOT . 'Controllers/standardController.php');
            $controller = new standardController();
            $controller->error('404', $e->getMessage());
        }
    }
}

?>