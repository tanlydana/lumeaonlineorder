<?php 

    // call connection from config/db.php
    require_once 'config/db.php';

    class Product{
        // data member for connection 
        private $conn;
        
        // construction for calling database connection
        public function __construct()
        {
            $this->conn = Database::connection();
        }

        // function for create account user
        public function insert($name,$price,$stock,$image,$type_id,$user_id){
            // preparing query for insert in to database
            try {
                $stmt = $this->conn->prepare('INSERT INTO `products`(`name`, `price`,`stock`, `image`,`type_id`, `user_id`) VALUES (?,?,?,?,?,?)');
                $stmt->bind_param("sdissi",$name,$price,$stock,$image,$type_id,$user_id);
            
                $rs = $stmt->execute();
                return $rs;

            } catch (mysqli_sql_exception $e) {
                echo "Message: ". $e->getMessage();
                return false;
            }

        }

        public function getAll($id){
            $data = [];
            try {
                $sql = "SELECT 
                        p.id,
                        p.name,
                        p.price,
                        p.stock,
                        p.image,
                        p.created_at,
                        p.type_id,
                        t.type,
                        u.name AS username
                    FROM products p
                    LEFT JOIN types t ON p.type_id = t.id
                    LEFT JOIN users u ON p.user_id = u.id
                    WHERE p.user_id =?;";

                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param('i',$id);
                $stmt->execute();


                $rs = $stmt->get_result();
                if($rs->num_rows >0){
                    while($row = $rs ->fetch_assoc()){
                        $data[] = $row;
                    }
                }
            } catch (mysqli_sql_exception $e) {
                echo "Message: ". $e->getMessage();
                
            }
            return $data;

        }

        public function delete($id){
            try {
                $stmt = $this->conn->prepare("DELETE FROM `products` WHERE id = ?");
                $stmt->bind_param("i",$id);
                $rs = $stmt->execute();
                return $rs;
            } catch (mysqli_sql_exception $e) {
                echo "Database Error: ". $e->getMessage();
                
            }
        }

        public function update($id,$name,$price,$stock,$image,$type_id){
            try {
                    $stmt = $this->conn->prepare("UPDATE `products` SET `name`=?,`price`=?,`stock`=?,`image`=?,`type_id`=? WHERE `id` = ?");
                    $stmt->bind_param("sdisii",$name,$price,$stock,$image,$type_id,$id);
                    $rs = $stmt->execute();
                    return $rs;
                } catch (mysqli_sql_exception $e) {
                    echo "Database: ". $e->getMessage();
                    
                }
            }
    }

?>