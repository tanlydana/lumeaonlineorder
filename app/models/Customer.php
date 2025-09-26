<?php
require_once 'config/db.php';

class Customer {
    private $conn;

    public function __construct() {
        $this->conn = Database::connection();
        
    }
    // Fetch all customers with their orders for a given user
    public function getAllWithOrders($userid) {
        $stmt = $this->conn->prepare("
            SELECT 
                c.id AS customer_id,
                c.tel,
                c.location,
                o.qty,
                o.total,
                o.created_at AS order_date,
                p.name AS item_name,
                p.price AS item_price
            FROM orders o
            JOIN customers c ON o.customer_id = c.id
            JOIN products p ON o.product_id = p.id
            WHERE o.user_id = ?
            ORDER BY o.created_at DESC
        ");
        $stmt->bind_param('i', $userid);
        $stmt->execute();
        $res = $stmt->get_result();
        $data = [];
        while($row = $res->fetch_assoc()){
            $data[] = $row;
        }
        $stmt->close();
        return $data;
    }

public function delete($customer_id, $user_id) {
    // Start transaction
    $this->conn->begin_transaction();
    
    try {
        // 1. First delete the related orders
        $stmt1 = $this->conn->prepare("DELETE FROM orders WHERE customer_id = ? AND user_id = ?");
        if (!$stmt1) {
            throw new Exception("Order delete prepare failed: " . $this->conn->error);
        }
        $stmt1->bind_param('ii', $customer_id, $user_id);
        $stmt1->execute();
        $stmt1->close();
        
        // 2. Then delete the customer
        $stmt2 = $this->conn->prepare("DELETE FROM customers WHERE id = ? AND user_id = ?");
        if (!$stmt2) {
            throw new Exception("Customer delete prepare failed: " . $this->conn->error);
        }
        $stmt2->bind_param('ii', $customer_id, $user_id);
        $result = $stmt2->execute();
        $stmt2->close();
        
        // Commit transaction if both operations succeed
        $this->conn->commit();
        return $result;
        
    } catch (Exception $e) {
        // Rollback on error
        $this->conn->rollback();
        error_log("Delete error: " . $e->getMessage());
        return false;
    }
}

}
?>
