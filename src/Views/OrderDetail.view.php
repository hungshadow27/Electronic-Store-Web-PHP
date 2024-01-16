<?php require "./src/Views/layouts/header.php";
require_once "./src/Models/ProductModel.php";
require_once "./src/Models/OrderModel.php";
$orderModel = new OrderModel();
$productModel = new ProductModel();
$totalCost1 = 0;
$transportFee = 30000;
$product = null;
?>
<div class="container mb-4">
    <div class="mt-3 p-3 border shadow d-flex justify-content-between align-items-center">
        <a href="<?= ROOT ?>/account/orders" class="text-secondary fs-6 mb-2 text-decoration-none">
            < TRỞ LẠI</a>
                <div>
                    <span class="fw-bold">NGÀY ĐẶT HÀNG: <?= $orders->order_date ?> - MÃ ĐƠN HÀNG: <?= $orders->order_id ?> - TRẠNG THÁI ĐƠN HÀNG: <span class="fw-bold text-danger px-3 fs-5">
                            <?= $orderModel->getOrderStatus($orders->order_status) ?><?= $orders->order_status == 4 ? " - Ngày giao" . $orders->finish_date : "" ?></span></span>

                </div>

    </div>
    <div class="mt-3 p-3 border shadow">
        <div class="row">
            <span class="col-6 fs-5 text-center fw-bold">Sản phẩm</span>
            <span class="col-2 text-muted text-center">Đơn giá</span>
            <span class="col-2 text-muted text-center">Số lượng</span>
            <span class="col-2 text-muted text-center">Thành tiền</span>
        </div>
        <hr />
        <?php foreach ($orderItems as $key => $orderItem) : ?>
            <?php foreach ($orderItem as $key => $item) : ?>
                <?php if ($item->order_id == $orders->order_id) :
                    $productTemp = $productModel->getProductById($item->product_id);
                    $product = new CartProductEntity(
                        $productTemp->product_id,
                        $productTemp->name,
                        $productTemp->description,
                        $productTemp->price,
                        $productTemp->image,
                        $item->price_at_purchase,
                        $productTemp->stock_quantity,
                        $productTemp->category_id,
                        $item->quantity
                    );
                ?>
                    <div class="row align-items-center mt-2 overflow-hidden">
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
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
    <div class="mt-3 p-3 border shadow">
        <div class="text-danger fs-5 mb-2">ĐỊA CHỈ NHẬN HÀNG</div>
        <div class="">
            <span class="fw-bold me-4"><?= $user->getName() ?> - <?= $user->getPhone_number() ?></span><span><?= $orders->shipping_address ?></span>
        </div>
    </div>
    <div class="mt-3 p-4 border shadow">
        <div class="d-flex justify-content-between align-items-center">
            <span class="fs-5 fw-bold">Phương thức thanh toán:</span>
            <div>
                <span class="mx-5 fs-5 fw-bold">Thanh toán khi nhận hàng COD</span>
            </div>
        </div>
        <hr />
        <div class="ms-auto">
            <div class="row mb-3">
                <div class="col-6">Tổng tiền hàng</div>
                <div class="col-6 text-end"><?= number_format($orders->total_cost - $transportFee) ?>₫</div>
            </div>
            <div class="row mb-3">
                <div class="col-6">Phí vận chuyển</div>
                <div class="col-6 text-end"><?= number_format($transportFee) ?>₫</div>
            </div>
            <div class="row mb-3">
                <div class="col-6">Tổng thanh toán</div>
                <div class="col-6 fs-4 text-danger text-end"><?= number_format($orders->total_cost) ?>₫</div>
            </div>
        </div>
        <div class="text-end">
            <a href="#" class="text-decoration-none btn btn-warning my-3">Liên hệ CSKH</a>
        </div>
    </div>
</div>
<?php require "./src/Views/layouts/footer.php";
