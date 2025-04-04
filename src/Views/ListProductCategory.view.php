<?php require_once("./src/Views/layouts/header.php");
require_once "./src/Models/BrandModel.php";
$brandModel = new BrandModel();
$listBrand = $brandModel->getAllBrand();

// Get filter parameters from URL
$priceRange = isset($_GET['price']) ? $_GET['price'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
?>

<nav class="container my-2" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Trang chủ</a></li>
        <li class="breadcrumb-item <?= empty($brand) ? "active" : "" ?>" aria-current="page"><a class="<?= empty($brand) ? "text-black text-decoration-none" : "" ?>" href="<?= ROOT ?>/category/<?= $category->slug ?>" href="<?= empty($brand) ? "" : "" ?>"><?= $category->name ?></a></li>
        <?= empty($brand) ? "" : '<li class="breadcrumb-item active" aria-current="page">' . $brand->brand_name . '</li>' ?>
    </ol>
</nav>

<div class="list-brand container">
    <div class="row flex-wrap justify-content-start align-items-center">
        <?php foreach ($listBrand as $br) : ?>
            <?php if ($br->category == $category->category_id) : ?>
                <div class="p-1 border rounded-1 text-center m-1 col-lg-2 col-sm-6">
                    <a href="<?= ROOT ?>/category/<?= $category->slug ?>/<?= strtolower($br->slug)  ?>"><img src="<?= $br->image ?>" class="img-fluid" alt="" /></a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<div class="main-content my-3">
    <div class="container row justify-content-center align-items-start mx-auto">
        <div class="filter border rounded shadow p-2 col-lg-3 col-sm-12 mb-2">
            <h4 class="fw-medium">BỘ LỌC</h4>
            <hr />
            <div class="filter-group">
                <div class="filter-group__title fs-5">Hãng <?= $category->name ?></div>
                <div class="filter-group__content">
                    <ul class="list-unstyled">
                        <?php foreach ($listBrand as $br) : ?>
                            <?php if ($br->category == $category->category_id) : ?>
                                <li>
                                    <a class="text-decoration-none <?= isset($brand) && $brand->slug === $br->slug ? 'fw-bold' : '' ?>"
                                        href="<?= ROOT ?>/category/<?= $category->slug ?>/<?= strtolower($br->slug) ?><?= $priceRange ? '?price=' . $priceRange : '' ?><?= $sort ? '&sort=' . $sort : '' ?>">
                                        <?= $br->brand_name ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if (!empty($brand)) : ?>
                            <li>
                                <a class="text-decoration-none" href="<?= ROOT ?>/category/<?= $category->slug ?><?= $priceRange ? '?price=' . $priceRange : '' ?><?= $sort ? '&sort=' . $sort : '' ?>">
                                    Xóa lọc hãng
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="filter-group-custom">
                <div class="filter-group__title fs-5">Lọc theo giá</div>
                <div class="filter-group__content">
                    <ul class="list-unstyled">
                        <?php
                        $priceRanges = [
                            'under-3m' => 'Dưới 3 triệu',
                            '3m-5m' => 'Từ 3 - 5 triệu',
                            '5m-7m' => 'Từ 5 - 7 triệu',
                            '7m-9m' => 'Từ 7 - 9 triệu',
                            'over-12m' => 'Trên 12 triệu'
                        ];
                        ?>
                        <?php foreach ($priceRanges as $key => $label) : ?>
                            <li>
                                <a class="text-decoration-none <?= $priceRange === $key ? 'fw-bold' : '' ?>"
                                    href="<?= ROOT ?>/category/<?= $category->slug ?><?= !empty($brand) ? '/' . $brand->slug : '' ?>?price=<?= $key ?><?= $sort ? '&sort=' . $sort : '' ?>">
                                    <?= $label ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <?php if (!empty($priceRange)) : ?>
                            <li>
                                <a class="text-decoration-none" href="<?= ROOT ?>/category/<?= $category->slug ?><?= !empty($brand) ? '/' . $brand->slug : '' ?><?= $sort ? '?sort=' . $sort : '' ?>">
                                    Xóa lọc giá
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="table-product border rounded shadow p-2 col-lg-9 col-sm-12">
            <div class="top-title d-flex justify-content-between align-items-center">
                <h4><?= $category->name ?><?= !empty($brand) ? ' - ' . $brand->brand_name : '' ?></h4>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sắp xếp theo: <?= $sort === 'price-desc' ? 'Giá giảm dần' : ($sort === 'price-asc' ? 'Giá tăng dần' : 'Mặc định') ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= ROOT ?>/category/<?= $category->slug ?><?= !empty($brand) ? '/' . $brand->slug : '' ?><?= $priceRange ? '?price=' . $priceRange : '' ?>">Mặc định</a></li>
                        <li><a class="dropdown-item" href="<?= ROOT ?>/category/<?= $category->slug ?><?= !empty($brand) ? '/' . $brand->slug : '' ?><?= $priceRange ? '?price=' . $priceRange : '' ?>&sort=price-asc">Giá tăng dần</a></li>
                        <li><a class="dropdown-item" href="<?= ROOT ?>/category/<?= $category->slug ?><?= !empty($brand) ? '/' . $brand->slug : '' ?><?= $priceRange ? '?price=' . $priceRange : '' ?>&sort=price-desc">Giá giảm dần</a></li>
                    </ul>
                </div>
            </div>
            <hr />
            <div class="list-product row justify-content-start align-items-stretch">
                <?php foreach ($listProduct as $product) : ?>
                    <?php require "./src/Views/component/ProductCategory.php" ?>
                <?php endforeach; ?>
            </div>
            <!-- Pagination -->
            <?php if (count($allProducts) > 0) : ?>
                <?php $totalPage = ceil(count($allProducts) / $limit) ?>
                <nav aria-label="Page navigation example" class="mt-3">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="<?= ROOT ?>/category/<?= $category->slug ?><?= !empty($brand) ? "/" . $brand->slug : "" ?>?page=<?= $current > 1 ? $current - 1 : "1" ?><?= $priceRange ? '&price=' . $priceRange : '' ?><?= $sort ? '&sort=' . $sort : '' ?>">Previous</a></li>
                        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                            <li class="page-item"><a class="page-link <?= $current == $i ? "active" : "" ?>" href="<?= ROOT ?>/category/<?= $category->slug ?><?= !empty($brand) ? "/" . $brand->slug : "" ?>?page=<?= $i ?><?= $priceRange ? '&price=' . $priceRange : '' ?><?= $sort ? '&sort=' . $sort : '' ?>"><?= $i ?></a></li>
                        <?php endfor; ?>
                        <li class="page-item"><a class="page-link" href="<?= ROOT ?>/category/<?= $category->slug ?><?= !empty($brand) ? "/" . $brand->slug : "" ?>?page=<?= $current == $totalPage ? $current : $current + 1 ?><?= $priceRange ? '&price=' . $priceRange : '' ?><?= $sort ? '&sort=' . $sort : '' ?>">Next</a></li>
                    </ul>
                </nav>
            <?php else : ?>
                <span class="text-primary fs-5">Không có sản phẩm nào!</span>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require_once("./src/Views/layouts/footer.php"); ?>