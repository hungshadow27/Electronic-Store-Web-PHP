<?php
require "./src/Models/ProductModel.php";
require "./src/Models/CategoryModel.php";
require "./src/Models/BrandModel.php";
require "./src/Models/OrderModel.php";
require "./src/Models/OrderItemsModel.php";

class OrderController
{
    use Controller;
    public function index($categorySlug, $brandSlug = null) {}
    public function getAllOrder()
    {
        //Authentication
        if (!isset($_SESSION['USER'])) {
            echo json_encode(['error' => '403: You cannot access this data']);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $orderModel = new OrderModel();
            $orders = $orderModel->getAllOrder();
            header('Content-Type: application/json');
            echo json_encode($orders);
        } else {
            echo json_encode(['error' => 'Student ID is not provided']);
        }
    }
    public function getById()
    {
        //Authentication
        if (!isset($_SESSION['USER'])) {
            echo json_encode(['error' => '403: You cannot access this data']);
            exit;
        }
        if (isset($_GET['id'])) {
            $order_id = $_GET['id'];
            $orderModel = new OrderModel();
            $order = $orderModel->getOrderById($order_id);


            header('Content-Type: application/json');
            echo json_encode($order);
        } else {
            echo json_encode(['error' => 'Student ID is not provided']);
        }
    }
    public function update()
    {
        ///Authentication
        if (!isset($_SESSION['USER'])) {
            echo json_encode(['error' => '403: You cannot access this data']);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $json_data = file_get_contents('php://input');
            if (!empty($json_data)) {
                $data = json_decode($json_data, true); // true parameter converts objects to associative arrays
                if ($data !== null) {
                    $order_id = $data['order_id'];
                    $user_id = $data['user_id'];
                    $payment_method = $data['payment_method'];
                    $shipping_address = $data['shipping_address'];
                    $order_status = $data['order_status'];
                    // $order_date = $data['order_date'];
                    $total_cost = $data['total_cost'];
                    $finish_date = $data['finish_date'];
                    $orderModel = new OrderModel();
                    $orderModel->updateOrderById($order_id, $user_id, $payment_method, $shipping_address, $order_status, $total_cost, $finish_date);

                    header('Content-Type: application/json');
                    echo json_encode(['success' => true, 'message' => 'Data received successfully']);
                    exit; // Terminate the script after sending the response
                } else {
                    echo json_encode(['error' => 'Invalid JSON data']);
                }
            } else {
                echo json_encode(['error' => 'No data received']);
            }
        } else {
            echo json_encode(['error' => 'Only POST requests are allowed']);
        }
    }
    public function add()
    {
        //Authentication
        // if (!isset($_SESSION['USER']) || (isset($_SESSION['USER']) && unserialize($_SESSION['USER'])->role !== 'admin')) {
        //     echo json_encode(['error' => '403: You cannot access this data']);
        //     exit;
        // }
        if (!isset($_SESSION['USER'])) {
            echo json_encode(['error' => '403: You cannot access this data']);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $json_data = file_get_contents('php://input');

            if (!empty($json_data)) {
                $data = json_decode($json_data, true); // true parameter converts objects to associative arrays

                // Check if JSON decoding was successful
                if ($data !== null) {
                    $slug = $data['slug'];
                    $name = $data['name'];
                    $categoryModel = new CategoryModel();
                    $categoryModel->addCategory($name, $slug);
                    header('Content-Type: application/json');
                    echo json_encode(['success' => true, 'message' => 'Data received successfully']);
                    exit; // Terminate the script after sending the response
                } else {
                    echo json_encode(['error' => 'Invalid JSON data']);
                }
            } else {
                echo json_encode(['error' => 'No data received']);
            }
        } else {
            echo json_encode(['error' => 'Only POST requests are allowed']);
        }
    }
    public function delete()
    {
        //Authentication
        // if (!isset($_SESSION['USER']) || (isset($_SESSION['USER']) && unserialize($_SESSION['USER'])->role !== 'admin')) {
        //     echo json_encode(['error' => '403: You cannot access this data']);
        //     exit;
        // }
        if (!isset($_SESSION['USER'])) {
            echo json_encode(['error' => '403: You cannot access this data']);
            exit;
        }
        if (isset($_GET['id'])) {
            $order_id = $_GET['id'];
            $orderModel = new OrderModel();
            $orderModel->deleteOrderById($order_id);
            $oderItemModel = new OrderItemsModel();
            $oderItemModel->deleteOrderItemByOrderId($order_id);

            header('Content-Type: application/json');
            echo json_encode(['success' => 'Deleted']);
        } else {
            echo json_encode(['error' => 'Student ID is not provided']);
        }
    }
}
