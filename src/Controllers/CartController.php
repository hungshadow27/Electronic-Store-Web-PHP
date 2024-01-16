<?php
require "./src/Models/ProductModel.php";
require "./src/Models/UserEntity.php";
require "./src/Models/CartItemsModel.php";
class CartController
{
    use Controller;
    public function index()
    {
        $data = null;
        if (!isset($_SESSION['USER'])) {
            redirect('login');
        } else {
            $cartItems = $_SESSION['CARTITEMS'];
            $productModel = new ProductModel;
            $products = array();
            foreach ($cartItems as $cit) {
                $product = $productModel->getProductById($cit->product_id);
                $cartProduct = new CartProductEntity($product->product_id, $product->name, $product->description, $product->price, $product->image, $product->sale_price, $product->stock_quantity, $product->category_id, $cit->quantity);
                $products[] = $cartProduct;
            }
            $data['products'] = $products;
            $this->view('cart.view', $data);
        }
    }
    public function add()
    {
        if (isset($_POST['id'])) {
            $product_id = $_POST['id'];

            if (isset($_SESSION['CARTITEMS'])) {
                $cartItems = $_SESSION['CARTITEMS'];

                // Check if the product is already in the cart
                $productExists = false;
                foreach ($cartItems as $key => $cartItem) {
                    if ($cartItem->product_id == $product_id) {
                        $cartItems[$key]->quantity += 1;
                        $productExists = true;

                        // Update quantity in the database
                        $cartItemsModel = new CartItemsModel;
                        $cartItemsModel->updateQuantityCartItem($product_id, $cartItems[$key]->quantity);
                        break;
                    }
                }
                // If the product is not in the cart, add it
                if (!$productExists) {
                    $cartItemsModel = new CartItemsModel;
                    $cartItemsModel->createCartItem($_SESSION['CART']->cart_id, $product_id, 1);
                    $cartItems = $cartItemsModel->getCartItems($_SESSION['CART']->cart_id);
                }

                $_SESSION['CARTITEMS'] = array_values($cartItems); // Re-index the array
                echo count($_SESSION['CARTITEMS']);
            }
        } else {
            echo "Error";
        }
    }
    public function updateQuantity()
    {
        if (isset($_POST['id']) && isset($_POST['quantity'])) {
            $product_id = $_POST['id'];
            $quantity = $_POST['quantity'];

            if (isset($_SESSION['CARTITEMS'])) {
                $cartItems = $_SESSION['CARTITEMS'];
                foreach ($cartItems as $key => $cartItem) {
                    if ($cartItem->product_id == $product_id) {
                        $cartItems[$key]->quantity = $quantity;
                        $cartItemsModel = new CartItemsModel;
                        $cartItemsModel->updateQuantityCartItem($product_id, $quantity);
                        break;
                    }
                }
                $_SESSION['CARTITEMS'] = array_values($cartItems); // Re-index the array
                var_dump($cartItems);
            }
        } else {
            echo "Error";
        }
    }
    public function delete()
    {
        if (isset($_POST['id'])) {
            $product_id = $_POST['id'];

            if (isset($_SESSION['CARTITEMS'])) {
                $cartItems = $_SESSION['CARTITEMS'];
                foreach ($cartItems as $key => $cartItem) {
                    if ($cartItem->product_id == $product_id) {
                        unset($cartItems[$key]);
                        $cartItemsModel = new CartItemsModel;
                        $cartItemsModel->deleteCartItem($product_id);
                        break;
                    }
                }
                $_SESSION['CARTITEMS'] = array_values($cartItems); // Re-index the array
                echo count($_SESSION['CARTITEMS']);
            }
        } else {
            echo "Error";
        }
    }
}
