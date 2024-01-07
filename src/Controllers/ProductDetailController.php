<?php
require "./src/Models/ProductModel.php";
require "./src/Models/CategoryModel.php";
class ProductDetailController
{
    use Controller;
    public function index($id = '')
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();
        $product = $productModel->getProductById($id);
        $category = $categoryModel->getCategoryById($product->category_id);
        //get similar products and filter product has id current
        $similarProducts = $productModel->getProductByCategoryId($product->category_id, 5, 0);
        foreach ($similarProducts as $key => $similarProduct) {
            if ($similarProduct->product_id == $product->product_id) {
                unset($similarProducts[$key]);
                break;
            }
        }
        $similarProducts = array_values($similarProducts);

        $data['product'] =  $product;
        $data['category'] =  $category;
        $data['similarProducts'] =  $similarProducts;
        $this->view('productdetail.view', $data);
    }
}
