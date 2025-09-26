<?php
require_once 'config/db.php';

class Home {
    private $conn;
    public function __construct(){
        $this->conn = Database::connection();
    }

    public function createCustomer($tel, $location, $delivery_id, $userid) {
        $stmt = $this->conn->prepare("
            INSERT INTO customers (tel, location, delivery_id, user_id)
            VALUES (?, ?, ?, ?)
        ");
        if (!$stmt) return false;
        $stmt->bind_param('ssii', $tel, $location, $delivery_id, $userid);
        if ($stmt->execute()) {
            $id = $this->conn->insert_id;
            $stmt->close();
            return $id;
        }
        $stmt->close();
        return false;
    }

    public function order($customer_id, $userid, $cart) {
        if (empty($cart)) return false;

        $stmt = $this->conn->prepare("
            INSERT INTO orders (product_id, qty, total, customer_id, user_id)
            VALUES (?, ?, ?, ?, ?)
        ");
        if (!$stmt) return false;

        foreach ($cart as $item) {
            $productId = (int)($item['id'] ?? 0);
            $qty       = (int)($item['qty'] ?? 0);
            $total     = (float)($item['subTotal'] ?? ($item['price'] * $qty ?? 0));
            if ($productId <= 0 || $qty <= 0) continue;

            $stmt->bind_param('iiddi', $productId, $qty, $total, $customer_id, $userid);
            $stmt->execute();
        }
        $stmt->close();
        return true;
    }

    // FIXED: Use MySQLi consistently for all methods
    public function getTotalOrders($userid){
        $sql = "SELECT COUNT(*) as total FROM orders WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['total'] ?? 0;
    }

    public function getTotalCustomers($userid){
        $sql = "SELECT COUNT(DISTINCT id) as total FROM customers WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['total'] ?? 0;
    }

    public function getTotalIncome($userid){
        $sql = "SELECT SUM(total) as income FROM orders WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['income'] ?? 0;
    }

    public function getTotalProducts($userid){
        $sql = "SELECT COUNT(*) as total FROM products WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['total'] ?? 0;
    }
}
?>