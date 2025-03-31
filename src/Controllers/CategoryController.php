<?php
require "./src/Models/ProductModel.php";
require "./src/Models/CategoryModel.php";
require "./src/Models/BrandModel.php";

class CategoryController
{
    use Controller;
    public function index($categorySlug, $brandSlug = null)
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();
        $brandModel = new BrandModel();

        $category = $categoryModel->getCategoryBySlug($categorySlug);
        if (empty($category)) {
            redirect("_404");
            exit;
        }

        $current = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 6;
        $offset = ($current - 1) * $limit;

        // Get filter parameters
        $priceRange = isset($_GET['price']) ? $_GET['price'] : '';
        $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

        // Get all products initially
        if (empty($brandSlug)) {
            $allProducts = $productModel->getProductByCategoryId($category->category_id, 999, 0);
            $data['category'] = $category;
        } else {
            $brand = $brandModel->getBrandBySlug($brandSlug);
            if (empty($brand)) {
                redirect("_404");
                exit;
            }
            $allProducts = $productModel->getProductByBrandId($brand->brand_id, 999, 0);
            $data['brand'] = $brand;
            $data['category'] = $category;
        }

        // Apply filters using PHP
        $filteredProducts = $this->filterProducts($allProducts, $priceRange);

        // Apply sorting
        $filteredProducts = $this->sortProducts($filteredProducts, $sort);

        // Apply pagination
        $data['allProducts'] = $filteredProducts;
        $data['listProduct'] = array_slice($filteredProducts, $offset, $limit);

        $data['limit'] = $limit;
        $data['offset'] = $offset;
        $data['current'] = $current;
        $this->view('listproductcategory.view', $data);
    }

    private function filterProducts($products, $priceRange)
    {
        if (empty($priceRange)) {
            return $products;
        }

        return array_filter($products, function ($product) use ($priceRange) {
            $price = $product->price;
            switch ($priceRange) {
                case 'under-3m':
                    return $price < 3000000;
                case '3m-5m':
                    return $price >= 3000000 && $price <= 5000000;
                case '5m-7m':
                    return $price >= 5000000 && $price <= 7000000;
                case '7m-9m':
                    return $price >= 7000000 && $price <= 9000000;
                case 'over-12m':
                    return $price > 12000000;
                default:
                    return true;
            }
        });
    }

    private function sortProducts($products, $sort)
    {
        if (empty($sort)) {
            return $products;
        }

        usort($products, function ($a, $b) use ($sort) {
            if ($sort === 'price-asc') {
                return $a->price - $b->price;
            } elseif ($sort === 'price-desc') {
                return $b->price - $a->price;
            }
            return 0;
        });

        return $products;
    }

    public function search()
    {
        $productModel = new ProductModel();

        $searchTerm = isset($_GET['q']) ? trim($_GET['q']) : '';
        $current = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 6;
        $offset = ($current - 1) * $limit;

        if (empty($searchTerm)) {
            $data['allProducts'] = [];
            $data['listProduct'] = [];
        } else {
            $data['allProducts'] = $productModel->searchProducts($searchTerm, 999, 0);
            $data['listProduct'] = $productModel->searchProducts($searchTerm, $limit, $offset);
        }

        $data['searchTerm'] = $searchTerm;
        $data['limit'] = $limit;
        $data['offset'] = $offset;
        $data['current'] = $current;

        $this->view('searchresults.view', $data);
    }

    public function getAllCategory()
    {
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
