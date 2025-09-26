<?php
require_once 'app/models/Product.php';
require_once 'app/models/Delivery.php';
require_once 'app/models/Home.php';

class HomeController {
    public function index(){
        $views = 'app/views/pages/homepage.php';
        include 'app/views/layout.php';
    }

    public function order(){
        $homeModel = new Home();

        // 🔥 decode cart from JSON string
        $cartJson = $_POST['cart'] ?? '[]';
        $cart = json_decode($cartJson, true);

        $userid = $_POST['userid'] ?? null;
        $tel = $_POST['tel'] ?? '';
        $location = $_POST['location'] ?? '';
        $delivery_id = $_POST['delivery_id'] ?? null;

        if (!$userid || empty($cart)) {
            echo 'Invalid data: userid or cart missing';
            return;
        }

        // Create customer and associate with user
        $cusId = $homeModel->createCustomer($tel, $location, $delivery_id, $userid);

        // Save orders for customer
        $rs = $homeModel->order($cusId, $userid, $cart);

        if ($rs) {
            echo 'Success';
        } else {
            echo 'Failed';
        }
    }

    public function getProduct(){
        $count = 0;
        $userid = $_POST['userid'] ?? 0;
        $productModel = new Product();
        $items = $productModel->getAll($userid);

        if(!empty($items)){
            foreach($items as $item){
                $count++;
                $id = $item['id'];
                $name = $item['name'];
                $price = $item['price'];
                $stock = $item['stock'];
                $image = $item['image'];
                $type = $item['type'];

                echo <<<HTML
                <tr>
                    <td>#$count</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img class="object-fit-cover" src="app/assets/uploads/$image" alt="" width="50px" height="50px">
                            <div class="ms-1">
                                <div class="product-name">$name</div>
                                <div class="product-type" style="font-size: 12px">$type</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="stock-badge">x$stock</span></td>
                    <td><span class="price-text">$$price</span></td>
                    <td>
                        <button
                        data-id="$id"
                        data-name="$name"
                        data-price="$price"
                        class="add-btn">Add</button>
                    </td>
                </tr>
                HTML;
            }
        } else {
            echo '<tr><td colspan="8" class="text-center">No data found</td></tr>';
        }
    }

    public function getDeliveryPrice(){
        $userid = $_POST['userid'] ?? "";
        $deliveryModel = new Delivery();
        $deliveries = $deliveryModel->read($userid);

        if (!empty($deliveries)) {
            foreach ($deliveries as $delivery) {
                $id = $delivery['id'];
                $category = $delivery['category'];
                $delivery_price = $delivery['delivery_price'];
                echo "<option data-price='$delivery_price' value='$id'>$category</option>";
            }
        } else {
            echo "<option value=''>No Delivery</option>";
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        echo "Logout success..";
    }

    public function getStats(){
        $homeModel = new Home();
        $userid = $_POST['userid'] ?? null;

        if(!$userid){
            echo json_encode([
                'orders' => 0,
                'customers' => 0,
                'income' => 0,
                'products' => 0
            ]);
            return;
        }

        $totalOrders = $homeModel->getTotalOrders($userid);
        $totalCustomers = $homeModel->getTotalCustomers($userid);
        $totalIncome = $homeModel->getTotalIncome($userid);
        $totalProducts = $homeModel->getTotalProducts($userid);

        echo json_encode([
            'orders' => $totalOrders,
            'customers' => $totalCustomers,
            'income' => $totalIncome,
            'products' => $totalProducts
        ]);
        exit;
    }
}
?>
