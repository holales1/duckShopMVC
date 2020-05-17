<?php

class Order extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->users_array=[];
        $this->view->orders_array=[];
    }

    function render(){
        $users_array=$this->model->readUsers();
        $this->view->users_array=$users_array;

        if (isset($_POST['submit'])){
            $orders_array=$this->model->readOrdersUser($_POST['users']);
            $this->view->orders_array=$orders_array;

        }

        $this->view->render('order/index');
    }

    function readOrder($orderID){
        $this->view->orderProducts=$this->model->readOrderProducts($orderID[0]);
        $this->view->render('order/readOrder');
    }

}