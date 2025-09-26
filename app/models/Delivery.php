<?php 

    // call connection from config/db.php
    require_once 'config/db.php';

    class Delivery{
        // data member for connection 
        private $conn;
        
        // construction for calling database connection
        public function __construct()
        {
            $this->conn = Database::connection();
        }

        // function for create account user
        public function create($userid, $category,$delivery_price){
            // preparing query for insert in to database
            try {
                $stmt = $this->conn->prepare('INSERT INTO `deliveries`(`user_id`, `category`,`delivery_price`) VALUES (?,?,?)');
                $stmt->bind_param("isd",$userid, $category,$delivery_price);
            
                $rs = $stmt->execute();
                if(!$rs){
                    echo "Insert error: " . $stmt->error;
                }
                return $rs;

            } catch (mysqli_sql_exception $err) {
                echo "Database: ". $err->getMessage();
                return false;
            }

        }
        public function read($userid){
            $data = [];
            try {
                $stmt = $this->conn->prepare("SELECT * FROM deliveries WHERE user_id = ?");
                    $stmt->bind_param("i", $userid);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    return $result->fetch_all(MYSQLI_ASSOC);
            } catch (mysqli_sql_exception $e) {
                echo "Database: ". $e;
                return [];
                
            }

        }
        public function update($id,$category,$delivery_price){
        try {
                $stmt = $this->conn->prepare("UPDATE deliveries SET category = ?, delivery_price = ? WHERE id = ?");
                $stmt->bind_param("sdi", $category, $delivery_price, $id); 
                $rs = $stmt->execute();
                return $rs ? "success" : "error";
            } catch (mysqli_sql_exception $e) {
                echo "Database: ". $e->getMessage();
                return false;
            }
        }

        public function delete($id){
            try {
                $stmt = $this->conn->prepare("DELETE FROM deliveries WHERE id = ?");
                $stmt->bind_param("i",$id);
                $rs = $stmt->execute();
                return $rs;
            } catch (mysqli_sql_exception $e) {
                echo "Database: ". $e;
                return false;
            }
        }

    }
?>