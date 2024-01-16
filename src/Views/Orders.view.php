<?php require_once "./src/Views/layouts/header.php";
require_once "./src/Models/ProductModel.php";
require_once "./src/Models/OrderModel.php";
require_once "./src/Models/RatingModel.php";
$orderModel = new OrderModel();
$productModel = new ProductModel();
$ratingModel = new RatingModel;
$ratings = null;
$product = null;
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<div class="container mt-3">
    <div class="row gap-2">
        <?php require "./src/Views/modules/account/AccountMenu.php" ?>
        <div class="col-lg-9 col-sm-12 mb-3" style="min-height: 500px;">
            <h4 class="border rounded p-3 mb-2">Tất cả đơn hàng</h4>
            <nav class="navbar navbar-expand-lg border rounded mb-2">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <?php if ($actual_link == ROOT . "/account/orders?status=0" || $actual_link == ROOT . "/account/orders") : ?>
                                <a class="nav-link fw-medium active" href="<?= ROOT ?>/account/orders?status=0">Đang xác nhận</a>
                            <?php else : ?>
                                <a class="nav-link fw-medium" href="<?= ROOT ?>/account/orders?status=0">Đang xác nhận</a>
                            <?php endif; ?>
                            <a class="nav-link fw-medium <?= $actual_link == ROOT . "/account/orders?status=1" ? "active" : "" ?>" href="<?= ROOT ?>/account/orders?status=1">Đang giao hàng</a>
                            <a class="nav-link fw-medium <?= $actual_link == ROOT . "/account/orders?status=4" ? "active" : "" ?>" href="<?= ROOT ?>/account/orders?status=4">Đã hoàn thành</a>
                            <a class="nav-link fw-medium <?= $actual_link == ROOT . "/account/orders?status=-1" ? "active" : "" ?>" href="<?= ROOT ?>/account/orders?status=-1">Đã huỷ</a>
                        </div>
                    </div>
                </div>
            </nav>
            <?php if (!empty($orders)) : ?>
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <?php foreach ($orders as $order) : ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?= $order->order_id ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Đơn hàng ID: <?= $order->order_id ?>
                                    <div class="col-2 d-flex flex-column justify-content-between align-items-start ps-4 w-50 ">
                                        <div class="text-primary text-start"><?= $orderModel->getOrderStatus($order->order_status) ?></div>
                                    </div>
                                </button>

                            </h2>
                            <div id="panelsStayOpen-collapse<?= $order->order_id ?>" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <?php foreach ($orderItems as $key => $orderItem) : ?>
                                        <?php foreach ($orderItem as $key => $item) : ?>
                                            <?php if ($item->order_id == $order->order_id) :
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
                                                <div class="row mb-3 border rounded shadow p-3">
                                                    <img class="col-lg-2 col-sm-3" src="<?= $product->getImage() ?>" alt="" />
                                                    <div class="col-lg-8 col-sm-8">
                                                        <div class="fs-4 fw-bold"><?= $product->getName() ?></div>
                                                        <div class="fs-6 text-black"><?= number_format($product->getSale_price()) ?>₫</div>
                                                        <div>Số lượng: <?= $orderItem[$key]->quantity ?></div>
                                                        <div>
                                                            Thành tiền:
                                                            <span class="fs-5 text-danger fw-bold"><?= number_format($product->getSale_price() * $orderItem[$key]->quantity) ?>₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="text-end pe-4">
                                    <span class="fs-6">Thành tiền: <span class="fs-4 fw-medium text-danger"><?= number_format($order->total_cost) ?>₫</span></span>
                                </div>
                                <div class="d-flex justify-content-end my-3">
                                    <a href="<?= ROOT ?>/account/orders/<?= $order->order_id ?>" class="text-decoration-none btn btn-danger me-3">Chi tiết đơn hàng</a>
                                    <?php if ($order->order_status != -1) : ?>
                                        <a href="#" class="text-decoration-none btn btn-warning me-3">Liên hệ CSKH</a>
                                    <?php endif; ?>
                                    <?php if ($order->order_status == 4) : ?>
                                        <!-- <a href="<?= ROOT ?>/account/rating/<?= $order->order_id ?>" class="text-decoration-none btn btn-success me-3">Đánh giá</a> -->
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success me-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Đánh giá
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="<?= ROOT ?>/account/rating/<?= $order->order_id ?>" method="post">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Đánh giá sản phẩm</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php foreach ($orderItems as $key => $orderItem) : ?>
                                                                <?php foreach ($orderItem as $key => $item) :

                                                                    $ratings = $ratingModel->getRatingsByOrderId($order->order_id); ?>
                                                                    <?php if ($item->order_id == $order->order_id) :
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
                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text text-wrap" for="inputGroupSelect02"><?= $product->getName() ?></label>
                                                                            <select name="product-<?= $product->getId() ?>" class="form-select text-warning fs-4" id="inputGroupSelect02">
                                                                                <?php for ($i = 5; $i >= 1; $i--) : ?>
                                                                                    <?php
                                                                                    $stars = str_repeat('&#9733;', $i); // Repeat the star symbol based on the loop index
                                                                                    ?>
                                                                                    <?php if ($ratings == null) : ?>
                                                                                        <option class="text-warning fs-4" value="<?= $i ?>" <?= $i == 5 ? "selected" : "" ?>>
                                                                                            <?= $stars; ?>
                                                                                        </option>
                                                                                    <?php else : ?>
                                                                                        <option class="text-warning fs-4" value="<?= $i ?>" <?= $i == $ratings[$key]->star ? "selected" : "" ?>>
                                                                                            <?= $stars; ?>
                                                                                        </option>
                                                                                    <?php endif; ?>
                                                                                <?php endfor; ?>
                                                                            </select>
                                                                            <label class="input-group-text" for="inputGroupSelect02">Sao</label>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            <?php endforeach; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                            <button type="submit" class="btn btn-danger">Đánh giá</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="text-primary fs-3 fw-medium text-center p-3">Chưa có sản phẩm nào!</div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require_once "./src/Views/layouts/footer.php" ?>