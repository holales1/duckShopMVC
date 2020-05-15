<?php

class Main extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->product_array=[];
        $this->view->product_array_admin=[];
        $this->view->product_of_the_day=[];
    }

    function render(){
        $product_array_admin=$this->model->readDuckAdmin();
        $this->view->product_array_admin = $product_array_admin;

        $product_array=$this->model->readDuck();
        $this->view->product_array = $product_array;

        $product_of_the_day=$this->model->readDuckOfTheDay();
        $this->view->product_of_the_day = $product_of_the_day;

        $this->view->render('main/index');
    }

    public function addDeleteDuck(){
        $ProductID=$_POST['productID'];
        $product=$this->model->getDuckById($ProductID);
        var_dump($product);
        if($product[0]['isAvaliable']=="0"){
            $this->model->deleteDuck($ProductID);
            
        }else{
            $this->model->addDuck($ProductID);
        }
        header("HTTP/1.1 303 See Other");
        header("Location: http://localhost/duckShopMVC/main");
    }

}
?>