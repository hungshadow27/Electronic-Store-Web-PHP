<?php require_once("./src/Views/layouts/header.php"); ?>

<nav class="container my-2" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tìm kiếm: <?= htmlspecialchars($searchTerm) ?></li>
    </ol>
</nav>

<div class="main-content my-3">
    <div class="container row justify-content-center align-items-start mx-auto">
        <div class="table-product border rounded shadow p-2 col-12">
            <div class="top-title d-flex justify-content-between align-items-center">
                <h4>Kết quả tìm kiếm cho "<?= htmlspecialchars($searchTerm) ?>"</h4>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sắp xếp theo: Giá tăng dần
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Giá tăng dần</a></li>
                        <li><a class="dropdown-item" href="#">Giá giảm dần</a></li>
                    </ul>
                </div>
            </div>
            <hr />
            <div class="list-product row justify-content-between align-items-stretch">
                <?php if (empty($listProduct)) : ?>
                    <div class="col-12 text-center py-4">
                        <span class="text-primary fs-5">Không tìm thấy sản phẩm nào!</span>
                    </div>
                <?php else : ?>
                    <?php foreach ($listProduct as $product) : ?>
                        <?php require "./src/Views/component/ProductCategory.php" ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <!-- Pagination -->
            <?php if (count($allProducts) > 0) : ?>
                <?php $totalPage = ceil(count($allProducts) / $limit) ?>
                <nav aria-label="Page navigation example" class="mt-3">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="<?= ROOT ?>/search?q=<?= urlencode($searchTerm) ?>&page=<?= $current > 1 ? $current - 1 : "1" ?>">Previous</a></li>
                        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                            <li class="page-item"><a class="page-link <?= $current == $i ? "active" : "" ?>" href="<?= ROOT ?>/search?q=<?= urlencode($searchTerm) ?>&page=<?= $i ?>"><?= $i ?></a></li>
                        <?php endfor; ?>
                        <li class="page-item"><a class="page-link" href="<?= ROOT ?>/search?q=<?= urlencode($searchTerm) ?>&page=<?= $current == $totalPage ? $current : $current + 1 ?>">Next</a></li>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once("./src/Views/layouts/footer.php"); ?>