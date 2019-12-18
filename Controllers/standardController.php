<?php
class standardController extends Controller
{
    public function error($code)
    {
        $this->render($code);
    }
}
?>