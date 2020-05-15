<?php

class ShopCar extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render('main/index');
    }
}
?>