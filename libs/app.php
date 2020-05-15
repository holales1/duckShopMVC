<?php
require_once 'controllers/errors.php';
    class App{
        function __construct()
        {
            $url=isset($_GET['url']) ? $_GET['url']: null;

            $url=rtrim($url,'/');
            $url=explode('/',$url);
            
            if(empty($url[0])){
                $fileController='controllers/main.php';
                require_once $fileController;
                $controller= new Main();
                $controller->loadModel('main');
                $controller->render();
                return false;
            }
            $fileController='controllers/'.$url[0] .'.php';

            if(file_exists($fileController)){
                require_once $fileController;
                $controller =new $url[0];
                $controller->loadModel($url[0]);

                $nparam =sizeof($url);
                if($nparam > 1){
                    if($nparam > 2){
                        $param=[];
                        for($i = 2; $i<$nparam; $i++){
                            array_push($param,$url[$i]);
                        }
                        $controller->{$url[1]}($param);
                    }else{
                        $controller->{$url[1]}();
                    }
                }else{
                    $controller->render();
                }
            }else{
               $controller=new Errors(); 
            }

            
        }
    }
?>