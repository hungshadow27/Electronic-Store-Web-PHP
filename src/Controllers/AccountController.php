<?php
require "./src/Models/OrderModel.php";
require "./src/Models/OrderItemsModel.php";
require "./src/Models/UserModel.php";
require "./src/Models/RatingModel.php";
class AccountController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        $data = null;
        if (isset($_SESSION['USER'])) {
            $user = new UserEntity();
            $user = unserialize($_SESSION['USER']);
            $data['user'] = $user;
            $this->view('account.view', $data);
        } else {
            redirect('login');
            exit;
        }
    }
    public function edit($a = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        $user = new UserEntity();
        $user = unserialize($_SESSION['USER']);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $phoneNumber = $_POST["phoneNumber"];
            $dateOfBirth = $_POST["dateOfBirth"];
            $gender = $_POST["gender"];
            $address = $_POST["address"];

            $usermodel = new UserModel;
            $usermodel->updateUserInfo($user->getId(), $name, $phoneNumber, $dateOfBirth, $gender, $address);
            $user->setUserInfo($name, $phoneNumber, $dateOfBirth, $gender, $address);
            $_SESSION['USER'] = serialize($user);
            echo "<script>alert('Bạn đã cập nhật thông tin tài khoản thành công!');
            window.location.replace('" . ROOT . "/account');
            </script>";
        }
    }
    public function orders($orderId = '', $b = '', $c = '')
    {
        $data = null;
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        $user = new UserEntity();
        $user = unserialize($_SESSION['USER']);

        $orderModel = new OrderModel;
        $orderItemsModel = new OrderItemsModel;
        $orders = $orderModel->getOrdersByUserId($user->getId());
        $orderItems = array();

        if (!empty($orderId)) {
            // Filter orders by orderId
            $orders = array_filter($orders, function ($order) use ($orderId) {
                return $order->order_id == $orderId;
            });
            if (empty($orders)) {
                redirect("_404");
                exit;
            }
            $order = $orders;

            // Get order items for the filtered order(s)
            foreach ($orders as $order) {
                $orderItems[] = $orderItemsModel->getOrderItemsByOrderId($order->order_id);
            }

            $data['user'] = $user;
            $data['orders'] = $order;
            $data['orderItems'] = $orderItems;
            $this->view('orderdetail.view', $data);
        } else {
            // No specific orderId provided, display all orders
            $status = 0;

            if (isset($_GET['status'])) {
                $status = $_GET['status'];
            }

            // Define an array of allowed statuses when $status is 1
            $allowedStatuses = ($status == 1) ? [1, 2, 3] : [$status];

            // Filter orders based on the allowed statuses
            $filteredOrders = array_filter($orders, function ($order) use ($allowedStatuses) {
                return in_array($order->order_status, $allowedStatuses);
            });

            foreach ($filteredOrders as $order) {
                $orderItems[] = $orderItemsModel->getOrderItemsByOrderId($order->order_id);
            }


            $data['user'] = $user;
            $data['orders'] = $filteredOrders;
            $data['orderItems'] = $orderItems;
            $this->view('orders.view', $data);
        }
    }
    public function rating($orderId = '', $b = '', $c = '')
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        if (empty($orderId)) {
            redirect("_404");
            exit;
        }
        $user = new UserEntity();
        $user = unserialize($_SESSION['USER']);
        $ratingModel = new RatingModel;
        if (!empty($ratingModel->getRatingsByOrderId($orderId))) {
            $ratingModel->DeleteRatingsByOrderId($orderId);
        }
        $orderItemsModel = new OrderItemsModel;
        $orderItems = $orderItemsModel->getOrderItemsByOrderId($orderId);
        $rating = array();
        foreach ($orderItems as $orderItem) {
            if (isset($_POST['product-' . $orderItem->product_id])) {
                $rating[] = $_POST['product-' . $orderItem->product_id];
            } else {
                redirect("_404");
                exit;
            }
        }
        $currenDateTime = getCurrentDateTime();
        $ratingModel = new RatingModel;
        foreach ($orderItems as $key => $orderItem) {
            $ratingModel->createNewRating($orderId, $orderItem->product_id, $user->getId(), $rating[$key], $currenDateTime);
        }
        echo "<script>alert('Bạn đã đánh giá đơn hàng thành công!');
            window.location.replace('" . ROOT . "/account/orders');
            </script>";
    }
}
