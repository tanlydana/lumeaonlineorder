<?php
require_once 'app/models/Delivery.php';

class DeliveryController {

    public function index() {
        $views = 'app/views/pages/deliverypage.php';
        include 'app/views/layout.php';
    }

    public function createData() {
        $userid = $_POST['userid'] ?? '';
        $category = $_POST['category'] ?? '';
        $delivery_price = $_POST['delivery_price'] ?? '';

        if(empty($userid) || empty($category) || empty($delivery_price)){
            echo "Form is empty please input again";
            return;
        }

        if(!is_numeric($delivery_price)){
            echo "Delivery price must be a number";
            return;
        }

        $deliveryModel = new Delivery();
        $rs = $deliveryModel->create($userid, $category, $delivery_price);

        if($rs){
            echo "success";
        } else {
            echo "error";
        }
    }

    public function fetchData(){
        $userid = $_POST['userid'] ?? '';
        $deliveryModel = new Delivery();
        $deliveries = $deliveryModel->read($userid); // only pass userid
        $count = 0;

        if(!empty($deliveries)){
            foreach($deliveries as $delivery){
                $count++;
                $id = $delivery['id'];
                $category = $delivery['category'];
                $delivery_price = $delivery['delivery_price'];
                $created_at = $delivery['created_at'];

                echo <<<HTML
                <tr>
                <td>$count</td>
                <td>$category</td>
                <td class="text-danger">$delivery_price</td>
                <td>
                    <span
                    class="text-secondary bg-secondary-subtle rounded-3 px-2 fw-medium"
                    >Date was created : $created_at</span
                    >
                </td>
                <td class="text-center">
                    <button
                    title="Edit Data"
                    class="btn btn-warning btn-edit-delivery"
                    data-id="$id" data-category="$category" data-price="$delivery_price"
                    data-bs-toggle="modal"
                    data-bs-target="#editDeliveryPrice"
                    >
                    <i class="bi bi-pencil"></i>
                    </button>
                    <button
                    class="btn btn-danger btn-delete-delivery" data-id="$id"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteDeliveryModal"
                    >
                    <i class="bi bi-trash3-fill"></i>
                    </button>
                </td>
                </tr>
                HTML;
            }
        } else {
        echo <<<HTML
            <tr>
                <td colspan="5">
                    <p class="text-center m-0 text-secondary">No deliveries found</p>
                </td>
            </tr>
        HTML;
    }
}


    public function deleteData() {
        $id = $_POST['id'] ?? '';

        $deliveryModel = new Delivery();
        $rs = $deliveryModel->delete($id);

        echo $rs ? "success" : "fail to delete data";
    }

    public function updateData() {
        $id = $_POST['id'] ?? '';
        $category = $_POST['category'] ?? '';
        $delivery_price = $_POST['delivery_price'] ?? '';

        if(empty($id) || empty($category) || empty($delivery_price)){
            echo "Form is empty please input again";
            return;
        }

        if(!is_numeric($delivery_price)){
            echo "Delivery price must be a number";
            return;
        }

        $deliveryModel = new Delivery();
        $rs = $deliveryModel->update($id, $category, $delivery_price);

        echo $rs ? 'success' : 'Failed to update data';
    }
}
?>
