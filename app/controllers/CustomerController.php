<?php
require_once 'app/models/Customer.php';

class CustomerController {
    private $model;

    public function __construct() {
        $this->model = new Customer();
    }

    public function index(){
        $views = 'app/views/pages/customerpage.php';
        include 'app/views/layout.php';
    }

    public function fetchData(){
        $count = 0;
        $userid = $_POST['userid'] ?? 0;
        
        // Debug: Check if userid is received
        error_log("Fetching customers for user ID: " . $userid);
        
        $customerModel = new Customer();
        $datas = $customerModel->getAllWithOrders($userid);

        // Debug: Check what data is returned
        error_log("Number of customers found: " . count($datas));

        if (!empty($datas)) {
            foreach ($datas as $data) {
                $count++;
                $customer_id = $data['customer_id'];
                $tel = $data['tel'];
                $location = $data['location'];
                $item_name = $data['item_name'];
                $item_price = $data['item_price'];
                $qty = $data['qty'];
                $total = $data['total'];
                $order_date = $data['order_date'];

                echo <<<HTML
                <tr>
                    <td>#$count</td>
                    <td>$tel</td>
                    <td>$location</td>
                    <td>$item_name</td>
                    <td>\$$item_price</td>
                    <td>x$qty</td>
                    <td>\$$total</td>
                    <td>$order_date</td>
                    <td class="text-center">
                        <button class="btn btn-danger delete-btn" 
                                data-customer-id="$customer_id" 
                                data-bs-toggle="modal" 
                                data-bs-target="#delete-cus">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </td>
                </tr>
                HTML;
            }
        } else {
            echo '<tr><td colspan="9" class="text-center text-muted py-4">No customers found</td></tr>';
        }
    }

    public function deleteData() {
        $customer_id = $_POST['customer_id'] ?? 0;
        $userid = $_POST['userid'] ?? 0;
        
        error_log("Delete attempt - Customer ID: $customer_id, User ID: $userid");
        
        if(!$customer_id || !$userid) {
            echo 'Invalid Request';
            return;
        }

        $customerModel = new Customer();
        if($customerModel->delete($customer_id, $userid)) {
            echo 'Success';
        } else {
            echo 'Failed to delete customer (check server logs)';
        }
    }
}
?>
