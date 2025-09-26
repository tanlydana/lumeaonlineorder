<?php 

    // call connection from config/db.php
    require_once 'config/db.php';

    class Category{
        // data member for connection 
        private $conn;
        
        // construction for calling database connection
        public function __construct()
        {
            $this->conn = Database::connection();
        }

        // function for create account user
        public function create($userid, $type){
            // preparing query for insert in to database
            try {
                $stmt = $this->conn->prepare('INSERT INTO `types`(`user_id`, `type`) VALUES (?,?)');
                $stmt->bind_param("is",$userid, $type);
            
                $rs = $stmt->execute();
                if($rs){
                    return true;
                }else{
                    return false;
                }

            } catch (mysqli_sql_exception $err) {
                echo "Database: ". $err->getMessage();
                
            }

        }
        public function read($userid){
            $data = [];
            try {
                $stmt = $this->conn->prepare('
                    SELECT 
                        t.id AS type_id,
                        t.type,
                        t.created_at,
                        u.name AS user_name
                    FROM types t
                    LEFT JOIN users u ON t.user_id = u.id
                    WHERE t.user_id = ?
                    ORDER BY t.id DESC;
                    ');
                $stmt->bind_param("i",$userid);
                $stmt->execute();
                $rs = $stmt->get_result();
                while($row = $rs->fetch_assoc()){
                    $data[] =[
                        'id' => $row['type_id'],
                        'type' => $row['type'],
                        'created_at' => $row['created_at'],
                        'username' => $row['user_name'],
                    ];
                }
                    return $data;
            } catch (mysqli_sql_exception $e) {
                echo "Database: ". $e;
                
            }

        }
        public function update($id,$type){
        try {
                $stmt = $this->conn->prepare("UPDATE types SET type = ? WHERE id = ?");
                $stmt->bind_param("si",$type,$id);
                $rs = $stmt->execute();
                return $rs;
            } catch (mysqli_sql_exception $e) {
                echo "Database: ". $e->getMessage();
                return false;
                
            }
        }

        public function delete($id){
            try {
                $stmt = $this->conn->prepare("DELETE FROM types WHERE id = ?");
                $stmt->bind_param("i",$id);
                $rs = $stmt->execute();
                return $rs;
            } catch (mysqli_sql_exception $e) {
                echo "Database: ". $e;
                
            }
        }

    }
?>