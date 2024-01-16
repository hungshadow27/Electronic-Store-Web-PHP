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
}
