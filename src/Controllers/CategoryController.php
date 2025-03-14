<?php
require "./src/Models/ProductModel.php";
require "./src/Models/CategoryModel.php";
require "./src/Models/BrandModel.php";

class CategoryController
{
    use Controller;
    public function index($categorySlug, $brandSlug = null)
    {
        if (empty($brandSlug)) {
            $categoryModel = new CategoryModel();
            $category = $categoryModel->getCategoryBySlug($categorySlug);
            if (empty($category)) {
                redirect("_404");
                exit;
            }
            $productModel = new ProductModel();

            $current = 1;
            if (isset($_GET['page'])) {
                $current  = $_GET['page'];
            }
            $limit = 1;
            $offset = ($current - 1) * $limit;

            $data['allProducts'] = $productModel->getProductByCategoryId($category->category_id, 999, 0);
            $data['category'] = $category;
            $data['limit'] = $limit;
            $data['offset'] = $offset;
            $data['current'] = $current;
            $data['listProduct'] = $productModel->getProductByCategoryId($category->category_id, $limit, $offset);
            $this->view('listproductcategory.view', $data);
        } else {
            $brandModel = new BrandModel();
            $brand = $brandModel->getBrandBySlug($brandSlug);
            if (empty($brand)) {
                redirect("_404");
                exit;
            }
            $categoryModel = new CategoryModel();
            $category = $categoryModel->getCategoryBySlug($categorySlug);
            $productModel = new ProductModel();

            $current = 1;
            if (isset($_GET['page'])) {
                $current  = $_GET['page'];
            }
            $limit = 1;
            $offset = ($current - 1) * $limit;

            $data['allProducts'] = $productModel->getProductByBrandId($brand->brand_id, 999, 0);
            $data['brand'] = $brand;
            $data['category'] = $category;
            $data['limit'] = $limit;
            $data['offset'] = $offset;
            $data['current'] = $current;
            $data['listProduct'] = $productModel->getProductByBrandId($brand->brand_id, $limit, $offset);
            $this->view('listproductcategory.view', $data);
        }
    }
    public function getAllCategory()
    {
        //Authentication
        if (!isset($_SESSION['USER'])) {
            echo json_encode(['error' => '403: You cannot access this data']);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->getAllCategory();
            header('Content-Type: application/json');
            echo json_encode($categories);
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
            $category_id = $_GET['id'];
            $categoryModel = new CategoryModel();
            $category = $categoryModel->getCategoryById($category_id);

            header('Content-Type: application/json');
            echo json_encode($category);
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
                    $category_id = $data['category_id'];
                    $slug = $data['slug'];
                    $name = $data['name'];
                    $categoryModel = new CategoryModel();
                    $categoryModel->updateCategoryById($category_id, $name, $slug);

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
            $category_id = $_GET['id'];
            $categoryModel = new CategoryModel();
            $categoryModel->deleteCategoryById($category_id);

            header('Content-Type: application/json');
            echo json_encode(['success' => 'Deleted']);
        } else {
            echo json_encode(['error' => 'Student ID is not provided']);
        }
    }
}
