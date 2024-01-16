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
}
