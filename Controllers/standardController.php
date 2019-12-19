<?php
class standardController extends Controller
{
    public function error($code)
    {
        $this->render($code);
    }

    public function dashboard()
    {
        $this->layout = false;
        return $this->render('dashboard');
    }
}
?>