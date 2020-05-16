<?php

class Login extends Controller{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('login/index');
    }

    function loginUser(){
        if(isset($_SESSION['UserID'])){
            $_SESSION['message'] = "You are already log in";
            $this->function->redirect_to('login');
        }else{
        // START FORM PROCESSING
            if (isset($_POST['submit'])) { // Form has been submitted.
                $email = $_POST['email'];
                $password = $_POST['pass'];
                $user=$this->model->readUser($email,$password);
                if(password_verify($password, $user[0]['pass'])){
                    $_SESSION['UserID'] = $user[0]['UserID'];
                    $_SESSION['email'] = $user[0]['email'];
                    $_SESSION['isAdmin'] = $user[0]['isAdmin'];
                    $_SESSION['message'] = "You are now log in.";
                    $this->function->redirect_to('login');
                } else {
                    // username/password combo was not found in the database
                    $_SESSION['message'] = "Username/password combination incorrect.<br />
                        Please make sure your caps lock key is off and try again.";
                }
            }
        }
    }

    function logout(){
        $_SESSION = array();
		
		if(isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-42000, '/');
		}
		
        session_destroy();
        
        $this->function->redirect_to('login');
		
    }

    function registerPage(){
        $this->view->render('login/register');
    }

    function registerUser(){
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $result=$this->model->createUser($email,$password);
        if ($result) {
            $_SESSION['message'] = "User created.";

        } else {
            $_SESSION['message'] = "User not created.";

        }
        $this->function->redirect_to('login');
    }


}
?>