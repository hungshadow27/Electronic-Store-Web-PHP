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
            <div class="top-title row align-items-center justify-content-between">
                <h4 class="fw-bold col-lg-3 col-sm-12"><?= strtoupper($cat->name) ?></h4>
                <div class="list-category-tags col-lg-9 col-sm-12 text-end">
                    <?php foreach ($listBrand as $brand) : ?>
                        <?php if ($brand->category == $cat->category_id) : ?>
                            <a href="<?= ROOT ?>/category/<?= $cat->slug ?>/<?= strtolower($brand->slug) ?>" class="btn btn-secondary mb-1"><?= $brand->brand_name ?></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="list-product mt-3 row justify-content-start align-items-strength flex-wrap">
                <?php $item = 0;
                foreach ($listProduct as $product) : ?>
                    <?php if ($product->category_id == $cat->category_id) :
                        $item++; ?>
                        <?php if ($item > 8) : break; ?>
                        <?php endif; ?>
                        <?php require "./src/Views/component/Product.php"; ?>
                    <?php endif; ?>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>