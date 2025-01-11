<?php
require "./src/Models/UserEntity.php";
require "./src/Models/CategoryModel.php";
require "./src/Models/ProductModel.php";
require "./src/Models/BrandModel.php";
require "./src/Models/OrderModel.php";

class AdminController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        //Authentication
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        $user = new UserEntity();
        $user = unserialize($_SESSION['USER']);
        if ($user->getRole() == "admin" || $user->getRole() == "staff") {
            $this->view('AdminHome.view');
            exit;
        }
        redirect('login');
        exit;
    }
    public function categories($a = '', $b = '', $c = '')
    {
        //Authentication
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        $user = new UserEntity();
        $user = unserialize($_SESSION['USER']);
        if ($user->getRole() == "admin" || $user->getRole() == "staff") {
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->getAllCategory();
            $data['categories'] = $categories;
            $this->view('AdminCategories.view', $data);
            exit;
        }
        redirect('login');
        exit;
    }
    public function brands($a = '', $b = '', $c = '')
    {
        //Authentication
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        $user = new UserEntity();
        $user = unserialize($_SESSION['USER']);
        if ($user->getRole() == "admin" || $user->getRole() == "staff") {
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->getAllCategory();
            $brandModel = new BrandModel();
            $brands = $brandModel->getAllBrand();
            $data['brands'] = $brands;
            $data['categories'] = $categories;
            $this->view('AdminBrands.view', $data);
            exit;
        }
        redirect('login');
        exit;
    }
    public function products($a = '', $b = '', $c = '')
    {
        //Authentication
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        $user = new UserEntity();
        $user = unserialize($_SESSION['USER']);
        if ($user->getRole() == "admin" || $user->getRole() == "staff") {
            $productModel = new ProductModel();
            $products = $productModel->getAllProduct();
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->getAllCategory();
            $brandModel = new BrandModel();
            $brands = $brandModel->getAllBrand();
            $data['brands'] = $brands;
            $data['categories'] = $categories;
            $data['products'] = $products;
            $this->view('AdminProducts.view', $data);
            exit;
        }
        redirect('login');
        exit;
    }
    public function orders($a = '', $b = '', $c = '')
    {
        //Authentication
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        $user = new UserEntity();
        $user = unserialize($_SESSION['USER']);
        if ($user->getRole() == "admin" || $user->getRole() == "staff") {
            $productModel = new ProductModel();
            $products = $productModel->getAllProduct();
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->getAllCategory();
            $brandModel = new BrandModel();
            $brands = $brandModel->getAllBrand();
            $orderModel = new OrderModel();
            $orders = $orderModel->getAllOrder();
            $data['brands'] = $brands;
            $data['categories'] = $categories;
            $data['products'] = $products;
            $data['orders'] = $orders;
            $this->view('AdminOrders.view', $data);
            exit;
        }
        redirect('login');
        exit;
    }
}
