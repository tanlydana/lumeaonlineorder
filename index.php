<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// for test if database connect with our project
// require_once 'config/db.php';
// if(Database::connection()){
//     echo "sucess..";
// }else{
//     echo "error...";
// }

// session start
session_start(); // call session

// get page when click link website
$page = $_GET['page'] ?? 'homepage';

$publicPage = ['login', 'register'];

// return 0
// (!0) = 1
if (!isset($_SESSION['person']) && !in_array($page, $publicPage)) {
    header('Location: index.php?page=login');
    exit;
}

// call all controllers
require_once 'app/controllers/CategoryController.php';
require_once 'app/controllers/CustomerController.php';
require_once 'app/controllers/DeliveryController.php';
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/ProductController.php';
require_once 'app/controllers/RegisterController.php';
require_once 'app/controllers/LoginController.php';

// check function
$func = $_POST['func'] ?? null;

switch ($page) {
    case 'login':
        $login = new LoginController();
        switch ($func) {
            case 'loginUser':
                $login->login();
                break;
            default:
                $login->index();
                break;
        }
        break;

    case 'register':
        $reg = new RegisterController();
        switch ($func) {
            case 'regis':
                $reg->register();
                break;
            default:
                $reg->index();
                break;
        }
        break;

    // for homepage
    case 'homepage':
        $home = new HomeController();
        switch ($func) {
            case 'logout':
                $home->logout();
                break;
            case 'getProduct':
                $home->getProduct();
                break;
            case 'getDelivery':
                $home->getDeliveryPrice();
                break;
            case 'order':
                $home->order();
                break;
            case 'getStats':       // ✅ Add this
                $home->getStats();
                break;
            // default page to index function in HomeController
            default:
                $home->index();
                break;
        }
        break;

    // for categorypage
    case 'categorypage':
        $cate = new CategoryController();
        switch ($func) {
            case 'create':
                $cate->createData();
                break;
            case 'read':
                $cate->fetchData();
                break;
            case 'update':
                $cate->updateData();
                break;
            case 'delete':
                $cate->deleteData();
                break;
            default:
                $cate->index();
                break;
        }
        break;

    // for customerpage
    case 'customerpage':
        $cus = new CustomerController();
        switch ($func) {
            case 'delete':
                $cus->deleteData();
                break;
            case 'read':
                $cus->fetchData();
                break;
            default:
                $cus->index();
                break;
        }
        break;

    // for deliverypage
    case 'deliverypage':
        $deliver = new DeliveryController();
        switch ($func) {
            case 'create':
                $deliver->createData();
                break;
            case 'read':
                $deliver->fetchData();
                break;
            case 'update':
                $deliver->updateData();
                break;
            case 'delete':
                $deliver->deleteData();
                break;
            default:
                $deliver->index();
                break;
        }
        break;

    // for productpage
    case 'productpage':
        $pro = new ProductController();
        switch ($func) {
            case 'create':
                $pro->create();
                break;
            case 'read':
                $pro->fetchData();
                break;
            case 'delete':
                $pro->delete();
                break;
            case 'update':
                $pro->update();
                break;
            case 'getType':
                $pro->getCateOption();
                break;
            default:
                $pro->index();
                break;
        }
        break;

    default:
        echo '<h1> 🌚 Page Not Found.... </h1>';
        break;
}
?>