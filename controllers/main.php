<?php


class Main extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->product_array=[];
        $this->view->product_array_cheap=[];
        $this->view->product_array_admin=[];
        $this->view->product_of_the_day=[];
    }

    function render(){
        $product_array_admin=$this->model->readDuckAdmin();
        $this->view->product_array_admin = $product_array_admin;

        $product_array=$this->model->readDuck();
        $this->view->product_array = $product_array;

        $product_array_cheap=$this->model->readDuckCheap();
        $this->view->product_array_cheap = $product_array_cheap;

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
        $this->function->redirect_to('main');
        
    }

    public function updatePage($productID){
        $this->view->product=$this->model->getDuckById($productID[0]);
        $this->view->render('main/updateProduct');
    }

    public function updateProductDay(){
        $this->view->productArrayDay=$this->model->readDuckOferrs();
        $this->view->allProducts=$this->model->readDuck();
        $this->view->render('main/updateProductDay');
    }

    public function updateProductDaySave(){
        $dayOfWeekSQL=$_POST['dayOfWeek'];
        $percentageSQL=$_POST['percentage'];
        $ProductIDSQL=$_POST['ProductID'];
        $this->model->saveProductDay($ProductIDSQL,$percentageSQL,$dayOfWeekSQL);
        $this->function->redirect_to('main');

    }

    public function registerProduct(){
        $productID=$_POST['ProductID'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $img=$_FILES['imgfile'];

        if(($_FILES['imgfile']['type']=="image/jpeg" ||
            $_FILES['imgfile']['type']=="image/pjpeg" ||
            $_FILES['imgfile']['type']=="image/gif" ||
            $_FILES['imgfile']['type']=="image/png" ||
            $_FILES['imgfile']['type']=="image/jpg")&& (
            $_FILES['imgfile']['size']< 3000000
            )){
            if ($_FILES['imgfile']['error']>0){
                $_SESSION["message"]= "Error: ". $_FILES['imgfile']['error'];
            }else{
                if (file_exists("upload/".$_FILES['imgfile']['name'])){
                    $_SESSION["message"]="can't upload: ". $_FILES['imgfile']['name']. " Exists";
                }else{
                    move_uploaded_file($_FILES['imgfile']['tmp_name'],
                        constant('PUBLIC_PATH')."img/".$_FILES['imgfile']['name']);
                    $this->model->updateDuck($productID,$description,$price,$img);
                    $this->function->redirect_to('main');
                }
            }
        } 

    }

    public function newProductPage(){
        $this->view->render('main/newProduct');
    }

    public function saveNewProductPage(){
        $productID=$this->model->getMaxProductID()[0]["MAX(ProductID)"] +1;
        $description=$_POST['description'];
        $price=$_POST['price'];
        $img=$_FILES['imgfile'];

        if(($_FILES['imgfile']['type']=="image/jpeg" ||
            $_FILES['imgfile']['type']=="image/pjpeg" ||
            $_FILES['imgfile']['type']=="image/gif" ||
            $_FILES['imgfile']['type']=="image/png" ||
            $_FILES['imgfile']['type']=="image/jpg")&& (
            $_FILES['imgfile']['size']< 3000000
            )){
            if ($_FILES['imgfile']['error']>0){
                $_SESSION["message"]= "Error: ". $_FILES['imgfile']['error'];
            }else{
                if (file_exists("upload/".$_FILES['imgfile']['name'])){
                    $_SESSION["message"]="can't upload: ". $_FILES['imgfile']['name']. " Exists";
                }else{
                    move_uploaded_file($_FILES['imgfile']['tmp_name'],
                        constant('PUBLIC_PATH')."img/".$_FILES['imgfile']['name']);
                    $this->model->saveDuck($productID,$description,$price);
                    $this->function->redirect_to('main');
                }
            }
        } 
    }
}
?>