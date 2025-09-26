<?php 
    require_once "app/models/Login.php";
    class LoginController{
        
        public function index(){
            include 'app/views/login.php';
        }
            // function register account
        public function login(){
            
            // start start
            // session_start();

            // get value from frontend form by method post
            $nameoremail = $_POST['nameoremail'] ?? '';
            $pass = $_POST['password'] ?? '';
            
            // create object for calling function in model
            $loginModel = new Login();

             // calling function create in model
            $user = $loginModel->login($nameoremail,$pass);

            // check if success send name and email back
            if($user){
                $_SESSION['person'] = [
                    'user_id' => $user['id'],
                    'username' => $user['name'],
                    'email' => $user['email'],
                ];
                echo 'Login success';
            }
            // if not message error
            else{
                echo 'Login Failed'; // ✅ Send error to front-end
            }
            exit;
        }
    }
?>