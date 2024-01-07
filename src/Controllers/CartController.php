<?php
require "./src/Models/ProductModel.php";
require "./src/Models/UserEntity.php";
require "./src/Models/CartModel.php";
require "./src/Models/CartItemsModel.php";
class CartController
{
    use Controller;
    public function index()
    {
        $data = null;
        if (isset($_SESSION['USER'])) {
            $user = new UserEntity();
            $user = unserialize($_SESSION['USER']);
            $cartmodel = new CartModel;
            $cart = $cartmodel->getCartByUserId($user->getId());
            //create new cart if user's cart not exist
            if (empty($cart)) {
                $currentDateTime = getCurrentDateTime();
                $cartmodel->createNewCart($user->getId(), $currentDateTime);
                $cart = $cartmodel->getCartByUserId($user->getId());
            }
        } else { //if user is not logged in yet redirect to login
            redirect('login');
        }
        $cartItemsModel = new CartItemsModel;
        $cart_items = $cartItemsModel->getCartItems($cart->cart_id);
        $productModel = new ProductModel;
        $products = array();
        foreach ($cart_items as $cit) {
            $pro = $productModel->getProductById($cit->product_id);
            $cartProduct = new CartProductEntity($pro->product_id, $pro->name, $pro->description, $pro->price, $pro->image, $pro->sale_price, $pro->stock_quantity, $pro->category_id, $cit->quantity);
            $products[] = $cartProduct;
        }
        $data['products'] = $products;
        $data['cart_items'] = $cart_items;
        $this->view('cart.view', $data);
    }
}
