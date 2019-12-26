<?php

class loginController extends Controller
{
    var $loginOk = false;

    public function index()
    {
        $this->layout = 'login';
        $this->render('index');
    }

    public function validaLogin404($e)
    {
        $resp = $this->auth();

        if ($resp) {
            require_once(ROOT . 'Controllers/standardController.php');
            $controller = new standardController();
            $controller->error('404', $e->getMessage());

        } else {
            $this->index();
        }
    }

    public function validaLogin()
    {
        $response = array();
        $resp = $this->auth();

        if ($resp) {
            $response = '/standand/dashboard';

        } else {
            $response = '/login/index';
        }

        return $response;
    }


    public function auth()
    {
        $loginModel = new Login();
        $resp = $loginModel->checkSession();
        if ($resp['valida_login']) {
            return true;
        }
        return false;
    }

    public function logout()
    {
        if (isset($_SESSION)) {
            setcookie(session_id(), "", time() - 3600);
            session_destroy();
            session_write_close();
        }
        $this->index();
    }
}