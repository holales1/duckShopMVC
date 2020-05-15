<?php

class Contact extends Controller{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('contact/index');
    }

    function sendmail(){
        $mymail="alejandrovaltor.x2@gmail.com";
        $email=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        $regexp="/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";

        $body="$message\n\nE-mail: $email";
        if (preg_match($regexp,$email)) {
            mail($mymail,$subject,$body,"From: $email\n");
            $_SESSION['message'] = "Message sended.";
            header("HTTP/1.1 303 See Other");
            header("Location: http://localhost/duckShopMVC/contact");
        }else{
            $_SESSION['message'] = "Message not sended.";

        }
    }

}
?>