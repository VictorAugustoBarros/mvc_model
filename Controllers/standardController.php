<?php
class standardController extends Controller
{
    public function error($code)
    {
        $this->render($code);
    }

    public function dashboard()
    {
        return $this->render('dashboard');
    }
}
?>