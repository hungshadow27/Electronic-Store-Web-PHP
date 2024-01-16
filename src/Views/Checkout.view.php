<?php require "./src/Views/layouts/header.php";
$totalCost1 = 0;
$transportFee = 30000;
?>
<div class="container mb-4">
    <div class="mt-3 p-3 border shadow">
        <div class="text-danger fs-5 mb-2">ĐỊA CHỈ NHẬN HÀNG</div>
        <div class="">
            <span class="fw-bold me-4"><?= $user->getName() ?> - <?= $user->getPhone_number() ?></span><span><?= $user->getAddress() ?></span>
            <a href="#" class="text-decoration-none ms-4">Thay đổi</a>
        </div>
    </div>
    <div class="mt-3 p-3 border shadow overflow-hidden">
        <div class="row">
            <span class="col-6 fs-5 text-center fw-bold">Sản phẩm</span>
            <span class="col-2 text-muted text-center">Đơn giá</span>
            <span class="col-2 text-muted text-center">Số lượng</span>
            <span class="col-2 text-muted text-center">Thành tiền</span>
        </div>
        <hr />
        <?php foreach ($products as $product) :
            $totalCost1 += $product->getSale_price() * $product->getQuantity() ?>
            <div class="row align-items-center mt-2">
                <div class="col-6">
                    <div class="d-flex">
                        <img class="w-25" src="<?= $product->getImage() ?>" alt="" />
                        <span class="fs-5 fw-medium px-3"><?= $product->getName() ?></span>
                    </div>
                </div>
                <div class="col-2 text-center"><?= number_format($product->getSale_price()) ?>₫</div>
                <div class="col-2 text-center"><?= $product->getQuantity() ?></div>
                <div class="col-2 text-danger text-center"><?= number_format($product->getSale_price() * $product->getQuantity()) ?>₫</div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="mt-3 p-4 border shadow">
        <div class="d-flex justify-content-between align-items-center">
            <span class="fs-5 fw-bold">Phương thức thanh toán</span>
            <div>
                <span class="mx-5">Thanh toán khi nhận hàng COD</span><a href="#" class="text-decoration-none">THAY ĐỔI</a>
            </div>
        </div>
        <hr />
        <div class="ms-auto">
            <div class="row mb-3">
                <div class="col-6">Tổng tiền hàng</div>
                <div class="col-6 text-end"><?= number_format($totalCost1) ?>₫</div>
            </div>
            <div class="row mb-3">
                <div class="col-6">Phí vận chuyển</div>
                <div class="col-6 text-end"><?= number_format($transportFee) ?>₫</div>
            </div>
            <div class="row mb-3">
                <div class="col-6">Tổng thanh toán</div>
                <div class="col-6 fs-4 text-danger text-end"><?= number_format($totalCost1 + $transportFee) ?>₫</div>
            </div>
        </div>
        <div class="text-end">
            <a href="<?= ROOT ?>/checkout/success?totalcost=<?= $totalCost1 + $transportFee ?>" class="btn btn-danger px-5">Đặt hàng</a>
        </div>
    </div>
</div>
<?php require "./src/Views/layouts/footer.php";
