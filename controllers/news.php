<?php

    class News extends Controller{
    function __construct(){
    parent::__construct();
        
    }

    function render(){

        $news = $this->model->readNews();
        $this->view->news = $news;
        $this->view->render('news/index');
    }

    function updateNews(){

        $arrayPost=$_POST;
        $result=$this->model->updateNews($arrayPost);
        if($result){
            $_SESSION['message']="News updated";
        }else{
            $_SESSION['message']="News not updated";
        }
        $this->function->redirect_to('news');
    }
    
    public function addNewsPage(){
        $this->view->render('news/addNews');
    }

    public function createNews(){
        $arrayPost=$_POST;
        $result=$this->model->createNews($arrayPost);
        if($result){
            $_SESSION['message']="New created";
        }else{
            $_SESSION['message']="New not created";
        }
        $this->function->redirect_to('news');
    }


}
?>