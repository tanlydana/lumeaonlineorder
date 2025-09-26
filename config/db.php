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
            // Production settings (InfinityFree) - USING YOUR REAL DETAILS
            $host = 'sql100.infinityfree.com';
            $username = 'if0_40029492';
            $password = 'iOF7HeXC8K'; // Your MySQL password
            $database = 'if0_40029492_online_order'; // Your actual database name
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