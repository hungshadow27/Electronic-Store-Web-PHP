<?php
require "./src/Models/ProductModel.php";
require "./src/Models/CategoryModel.php";
require "./src/Models/BrandModel.php";

class BrandController
{
    use Controller;
    public function index($categorySlug, $brandSlug = null) {}
    public function getAllBrand()
    {
        //Authentication
        if (!isset($_SESSION['USER'])) {
            echo json_encode(['error' => '403: You cannot access this data']);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $brandModel = new BrandModel();
            $brands = $brandModel->getAllBrand();
            header('Content-Type: application/json');
            echo json_encode($brands);
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
            $brand_id = $_GET['id'];
            $brandModel = new BrandModel();
            $brand = $brandModel->getBrandById($brand_id);

            header('Content-Type: application/json');
            echo json_encode($brand);
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
                    $brand_id = $data['brand_id'];
                    $slug = $data['slug'];
                    $name = $data['brand_name'];
                    $category_id = $data['category_id'];
                    $image = $data['image'];
                    $brandModel = new BrandModel();
                    $brandModel->updateBrand($brand_id, $slug, $name, $category_id, $image);

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
                    $brand_name = $data['brand_name'];
                    $category_id = $data['category_id'];
                    $image = $data['image'];
                    $brandModel = new BrandModel();
                    $brandModel->addBrand($slug, $brand_name, $category_id, $image);

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
            $brand_id = $_GET['id'];
            $brandModel = new BrandModel();
            $brandModel->deleteBrand($brand_id);

            header('Content-Type: application/json');
            echo json_encode(['success' => 'Deleted']);
        } else {
            echo json_encode(['error' => 'Student ID is not provided']);
        }
    }
}
