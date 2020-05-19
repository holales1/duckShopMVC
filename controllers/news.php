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
        $this->model->updateNews($arrayPost);
        $this->function->redirect_to('news');
    }
    
    public function addNewsPage(){
        $this->view->render('news/addNews');
        $newsID=$this->model->getMaxNewsID()[0]["MAX(NewsID)"] +1;
        $title=$_POST['title'];
        $description=$_POST['description'];
        $this->model->saveNews($newsID,$title,$description);
        $this->function->redirect_to('main');
       
    }


}
?>