<?php
require "./src/Models/ProductModel.php";
require "./src/Models/OrderModel.php";
require "./src/Models/OrderItemsModel.php";
require "./src/Models/UserEntity.php";
class CheckoutController
{
    use Controller;

    public function index($a = '', $b = '', $c = '')
    {
        if (isset($_POST['productForCheckout'])) {
            $productForCheckout = $_POST['productForCheckout'];
            if (isset($_SESSION['productForCheckout'])) {
                unset($_SESSION['productForCheckout']);
            }
            $_SESSION['productForCheckout'] = $productForCheckout;
        } else {
            echo "0";
        }
    }

    public function order()
    {
        if (!isset($_SESSION['productForCheckout']) || !isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        $user = new UserEntity();
        $user = unserialize($_SESSION['USER']);
        if ($user->getName() == '' || $user->getPhone_number() == '' || $user->getAddress() == '') {
            echo "<script>alert('Bạn cần cập nhật thông tin số điện thoại, tên và địa chỉ nhận hàng!');
            window.location.replace('" . ROOT . "/account');
            </script>";
            exit;
        }
        $productForCheckout = $_SESSION['productForCheckout'];
        $productModel = new ProductModel;
        $products = array();
        foreach ($productForCheckout as $pd) {
            $productTemp = $productModel->getProductById($pd['id']);
            $products[] = new CartProductEntity($pd['id'], $productTemp->name, $productTemp->description, $productTemp->price, $productTemp->image, $productTemp->sale_price, $productTemp->stock_quantity, $productTemp->category_id, $pd['quantity']);
        }
        $data['products'] = $products;
        $data['user'] = $_SESSION['USER'];

        $this->view('checkout.view', $data);
    }

    public function success()
    {
        if (!isset($_GET['totalcost']) || !isset($_SESSION['USER']) || !isset($_SESSION['productForCheckout'])) {
            redirect('home');
            exit;
        }

        //create new order
        $totalCost = $_GET['totalcost'];
        $user = new UserEntity();
        $user = unserialize($_SESSION['USER']);
        $currenDateTime = getCurrentDateTime();
        $orderModel = new OrderModel;
        $orderModel->createNewOrder($user->getId(), 0, $user->getAddress(), 0, $currenDateTime, $totalCost);
        $orders = $orderModel->getOrdersByUserId($user->getId());
        $order = end($orders);

        //create new order items
        $productForCheckout = $_SESSION['productForCheckout'];
        $orderItemsModel = new OrderItemsModel;
        $productModel = new ProductModel;
        foreach ($productForCheckout as $pd) {
            $productTemp = $productModel->getProductById($pd['id']);
            $orderItemsModel->createOrderItem($order->order_id, $pd['id'], $pd['quantity'], $productTemp->sale_price);
        }
        unset($_SESSION['productForCheckout']);

        $this->view('ordersuccess.view');
        exit;
        die();
    }
}
