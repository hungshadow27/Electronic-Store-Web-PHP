<?php
require "./src/Models/ProductModel.php";
require "./src/Models/CategoryModel.php";
require "./src/Models/CommentModel.php";
require "./src/Models/RatingModel.php";
class ProductDetailController
{
    use Controller;
    public function index($id = '')
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();
        $product = $productModel->getProductById($id);
        if (empty($product)) {
            redirect("_404");
            exit;
        }
        $category = $categoryModel->getCategoryById($product->category_id);
        //get similar products and filter product has id current
        $similarProducts = $productModel->getProductByCategoryId($product->category_id, 5, 0); //WILL BE CREATE GET SIMILAR PRODUCT Model
        foreach ($similarProducts as $key => $similarProduct) {
            if ($similarProduct->product_id == $product->product_id) {
                unset($similarProducts[$key]);
                break;
            }
        }
        $similarProducts = array_values($similarProducts);
        $ratingModel = new RatingModel;
        $ratings = $ratingModel->getRatingsByProductId($id);
        $commentModel = new CommentModel;
        $comments = $commentModel->getCommentsByProductId($id);

        $data['product'] =  $product;
        $data['category'] =  $category;
        $data['similarProducts'] =  $similarProducts;
        $data['ratings'] =  $ratings;
        $data['comments'] =  $comments;
        $this->view('productdetail.view', $data);
    }
    public function getAllProduct()
    {
        //Authentication
        if (!isset($_SESSION['USER'])) {
            echo json_encode(['error' => '403: You cannot access this data']);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $productModel = new ProductModel();
            $products = $productModel->getAllProduct();
            header('Content-Type: application/json');
            echo json_encode($products);
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
            $product_id = $_GET['id'];
            $productModel = new ProductModel();
            $product = $productModel->getProductById($product_id);

            header('Content-Type: application/json');
            echo json_encode($product);
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
                    $product_id = $data['product_id'];
                    $name = $data['name'];
                    $description = $data['description'];
                    $price = $data['price'];
                    $sale_price = $data['sale_price'];
                    $stock_quantity = $data['stock_quantity'];
                    $category_id = $data['category_id'];
                    $brand_id = $data['brand_id'];
                    $image = $data['image'];
                    $productModel = new ProductModel();
                    $productModel->updateProductById($product_id, $name, $description, $price, $sale_price, $stock_quantity, $category_id, $brand_id, $image);

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
                    $product_id = $data['product_id'];
                    $name = $data['name'];
                    $description = $data['description'];
                    $price = $data['price'];
                    $sale_price = $data['sale_price'];
                    $stock_quantity = $data['stock_quantity'];
                    $category_id = $data['category_id'];
                    $brand_id = $data['brand_id'];
                    $image = $data['image'];

                    $productModel = new ProductModel();
                    $productModel->addProduct($name, $description, $price, $sale_price, $stock_quantity, $category_id, $brand_id, $image);

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
            $product_id = $_GET['id'];
            $productModel = new ProductModel();
            $productModel->deleteProductById($product_id);


            header('Content-Type: application/json');
            echo json_encode(['success' => 'Deleted']);
        } else {
            echo json_encode(['error' => 'Student ID is not provided']);
        }
    }
}
