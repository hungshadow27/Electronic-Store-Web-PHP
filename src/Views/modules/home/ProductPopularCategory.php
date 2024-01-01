<?php
require_once "./src/Models/ProductModel.php";
require_once "./src/Models/CategoryModel.php";
require_once "./src/Models/BrandModel.php";
$categoryModel = new CategoryModel();
$listCategoty = $categoryModel->getAllCategory();

$productModel = new ProductModel();
$listProduct = $productModel->getAllProduct();

$brandModel = new BrandModel();
$listBrand = $brandModel->getAllBrand();
?>
<?php foreach ($listCategoty as $cat) : ?>
    <div class="list-popular-product mt-3">
        <div class="container">
            <div class="top-title d-flex align-items-center justify-content-between">
                <h4 class="fw-bold"><?= strtoupper($cat->name) ?></h4>
                <div class="list-category-tags">
                    <?php foreach ($listBrand as $brand) : ?>
                        <?php if ($brand->category == $cat->category_id) : ?>
                            <a href="<?= ROOT ?>/category/<?= $cat->slug ?>/<?= strtolower($brand->brand_name) ?>" class="btn btn-secondary"><?= $brand->brand_name ?></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="list-product mt-3 d-flex justify-content-center align-items-strength flex-wrap">
                <?php $categoryProducts = array_slice($listProduct, 0, 8);
                foreach ($categoryProducts as $product) : ?>
                    <?php if ($product->category_id == $cat->category_id) : ?>

                        <?php require "./src/Views/component/Product.php"; ?>
                    <?php endif; ?>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>