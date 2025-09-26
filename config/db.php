<?php
class Database{
    static public function connection(){
        // Check if we're on localhost or production
        if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
            // Local development settings
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'online-order-project';
        } else {
            // Production settings (InfinityFree)
            $host = 'sqlXXX.epizy.com'; // You'll get this from InfinityFree
            $username = 'epiz_XXXXXX';   // Your InfinityFree DB username
            $password = 'your_password'; // Your InfinityFree DB password
            $database = 'epiz_XXXXXX_online-order-project'; // InfinityFree DB name
        }
        
        $conn = new mysqli($host, $username, $password, $database);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        return $conn;
    }
}
?>