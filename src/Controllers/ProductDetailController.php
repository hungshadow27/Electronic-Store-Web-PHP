<?php
require "./src/Models/ProductModel.php";
class ProductDetailController
{
    use Controller;
    public function index($id = '')
    {
        $productModel = new ProductModel();
        $data['product'] =  $productModel->getProductById($id);
        $this->view('productdetail.view', $data);
    }
}
