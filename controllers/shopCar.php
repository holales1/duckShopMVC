<?php

class ShopCar extends Controller{
    function __construct(){
        parent::__construct();
        
    }

    function render(){
        $this->view->render('shoppingCart/index');
    }

    function addItem($productID){
        $productByCode = $this->model->readProduct($productID[0]);
        $itemArray = array($productByCode[0]["ProductID"]=>array(
            'description'=>$productByCode[0]["description"],
            'ProductID'=>$productByCode[0]["ProductID"],
            'image'=>$productByCode[0]["image"],
            'quantity'=>$_POST["quantity"],
            'price'=>$productByCode[0]["price"]));
        
        if(!empty($_SESSION["cart_item"])) {
            if(in_array($productByCode[0]["ProductID"],array_keys($_SESSION["cart_item"]))) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($productByCode[0]["ProductID"] == $k) {
                        if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                            $_SESSION["cart_item"][$k]["quantity"] = 0;
                        }
                        $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                    }
                }
            } else {
                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
            }
        } else {
            $_SESSION["cart_item"] = $itemArray;
        }
        $this->function->redirect_to("shopCar");
		
    }

    function removeItem($productID){
        if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($productID[0] == $v['ProductID'])
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
        }
        $this->function->redirect_to("shopCar");
    }

    function removeAllItem(){
        unset($_SESSION["cart_item"]);
        $this->function->redirect_to("shopCar");
    }

    function addOrder(){
        $fOrder=$this->model->getMaxOrderID();

        if($fOrder[0]==null){
            $fOrder[0]=1;
        }else{
            $number=$fOrder[0];
            $fOrder[0]=$number["MAX(OrderID)"] + 1;
        }

        $date=date("Y-m-d");

        $result=$this->model->insertOrder($fOrder,$date);

        if($result){
            unset($_SESSION["cart_item"]);
            $_SESSION['message'] = "Order accepted.";
        }else{
            $_SESSION['message'] = "Order not accepted.";
        }
        $this->function->redirect_to("main");

    }
}
?>