<?php 

    // call connection from config/db.php
    require_once 'config/db.php';

    class Login{
        // data member for connection 
        private $conn;
        
        // construction for calling database connection
        public function __construct()
        {
            $this->conn = Database::connection();
        }

        // function for create account user
        public function login($nameoremail, $password){
            // preparing query for insert in to database
            try {
                $stmt = $this->conn->prepare('SELECT id, name, email, pass FROM users WHERE name=? OR email=? LIMIT 1');
                $stmt->bind_param("ss",$nameoremail,$nameoremail);
            
                $stmt->execute();
                $rs = $stmt->get_result();
                if($rs->num_rows===0){
                    return "Username or Email is invalid";
                }
                $user = $rs->fetch_assoc();
                if(password_verify($password,$user['pass'])){
                    return $user;
                }else{
                    return "Invalid Password";
                }

            } catch (mysqli_sql_exception $e) {
                return "Database Error: ". $e->getMessage();
                
            }

        }   

    }
?>