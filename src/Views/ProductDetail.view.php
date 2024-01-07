<?php require_once "./src/Views/layouts/header.php";
?>
<nav class="container my-2" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= ROOT ?>/home">Trang chủ</a></li>
        <li class="breadcrumb-item">
            <a href="<?= ROOT ?>/category/<?= $category->slug ?>"><?= $category->name ?></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <?= $product->name ?>
        </li>
    </ol>
</nav>
<div class="main-content container">
    <div class="top-content lh-md">
        <span class="fs-4 fw-bold me-2"><?= $product->name ?></span><a href="#" class="text-decoration-none"> 200 bình luận & đánh giá</a><br /><span>Bảo hành 12 tháng chính hãng</span>
        <hr />
    </div>
    <div class="body-content row gap-2">
        <div class="product-details row col-9">
            <div class="product-images col-6">
                <img class="img-fluid" src="<?= $product->image ?>" alt="" />
            </div>
            <div class="product-editions col-6">
                <div class="price my-1">
                    <span class="fs-2 text-danger fw-bold"><?= number_format($product->sale_price) ?>₫</span>
                    <del class="fs-4 text-secondary fw-bold"><?= number_format($product->price) ?>₫</del>
                </div>
                <div class="colors">
                    <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked />
                    <label class="btn btn-outline-success" for="success-outlined">Xanh</label>

                    <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off" />
                    <label class="btn btn-outline-danger" for="danger-outlined">Đỏ</label>
                    <input type="radio" class="btn-check" name="options-outlined" id="black-outlined" autocomplete="off" />
                    <label class="btn btn-outline-dark" for="black-outlined">Đen</label>
                </div>
                <div class="description border px-3 py-3 rounded my-3">
                    <span><?= $product->description ?></span>
                </div>
                <a href="#" class="buy-now d-block text-decoration-none bg-danger text-center rounded p-2 mb-2">
                    <div class="fs-5 fw-bold text-white">ĐẶT MUA NGAY</div>
                    <span class="text-white">Mua trực tiếp $ Giao hàng COD toàn quốc</span>
                </a>
                <a href="#" class="add-to-cart d-block text-decoration-none bg-primary text-center rounded p-2">
                    <div class="fs-5 fw-bold text-white">THÊM VÀO GIỎ HÀNG</div>
                    <span class="text-white">Thêm sản phẩm vào giỏ hàng</span>
                </a>
            </div>
        </div>
        <div class="product-similar col-3 text-center shadow">
            <div class="fs-5 text-white bg-danger p-1">SẢN PHẨM TƯƠNG TỰ</div>

            <div class="d-flex flex-column align-items-start">
                <?php
                foreach ($similarProducts as $pro) : ?>
                    <a href="<?= ROOT ?>/productdetail/<?= $pro->product_id ?>" class="d-flex justify-content-evenly align-items-start mt-3 text-decoration-none text-black">
                        <img class="w-25" src="<?= $pro->image ?>" alt="" />
                        <div class="text-start px-2">
                            <div><?= $pro->name ?></div>
                            <span class="fs-6 text-danger fw-bold"><?= number_format($pro->sale_price) ?>₫</span>
                        </div>
                    </a>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <div class="comments-review border rounded shadow my-3 p-3">
        <div class="fs-5 fw-bold my-2">
            47 Bình luận về iPhone Xs 256GB Đổi Bảo Hành
        </div>
        <div class="row border p-3">
            <?php require "./src/Views/component/Rating.php" ?>
            <div class="col-9">
                <span class="fs-4">Bạn đánh giá sản phẩm này bao nhiêu sao?</span>
                <?php require "./src/Views/component/Rating.php" ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control my-3" placeholder="Mời bạn để lại bình luận..." aria-label="Recipient's username" aria-describedby="basic-addon2" />
                </div>
                <a href="#" class="btn btn-danger">Gửi bình luận</a>
            </div>
        </div>
        <div class="my-3">
            <div class="d-flex align-items-start gap-3 mb-2">
                <img style="width: 5%" class="" src="https://hungmobile.vn/assets/images/logo-web-comment.png" alt="" />
                <div class="">
                    <div class="fs-6 fw-bold">HungMobie - Quản trị viên</div>
                    <span>Sản phẩm tốt <br />Sản phẩm tốt</span>
                    <div class="mt-3">
                        <a class="text-decoration-none me-2" href="#">Trả lời</a>
                        <span>20:34 08/10/2022</span>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start gap-3 mb-2">
                <img style="width: 5%" class="" src="https://hungmobile.vn/assets/images/logo-web-comment.png" alt="" />
                <div class="">
                    <div class="fs-6 fw-bold">HungMobie - Quản trị viên</div>
                    <span>Sản phẩm tốt <br />Sản phẩm tốt</span>
                    <div class="mt-3">
                        <a class="text-decoration-none me-2" href="#">Trả lời</a>
                        <span>20:34 08/10/2022</span>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start gap-3 mb-2">
                <img style="width: 5%" class="" src="https://hungmobile.vn/assets/images/logo-web-comment.png" alt="" />
                <div class="">
                    <div class="fs-6 fw-bold">HungMobie - Quản trị viên</div>
                    <span>Sản phẩm tốt <br />Sản phẩm tốt</span>
                    <div class="mt-3">
                        <a class="text-decoration-none me-2" href="#">Trả lời</a>
                        <span>20:34 08/10/2022</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "./src/Views/layouts/footer.php"; ?>