<?php require_once "./src/Views/layouts/header.php";
require "./src/Models/UserModel.php";
$userModel = new UserModel();
$childComments = array();
$parentComments = array();
foreach ($comments as $comment) {
    if ($comment->comment_parent == -1) {
        $parentComments[] = $comment;
    } else {
        $childComments[] = $comment;
    }
}
$totalRating = count($ratings);
$totalStar = 0;
$star = 0;
if ($totalRating > 0) {
    foreach ($ratings as $rating) {
        $totalStar += $rating->star;
    }
    $star = $totalStar / $totalRating;
}

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
        <span class="fs-4 fw-bold me-2"><?= $product->name ?></span>
        <?php if ($totalRating == 0) : ?>
            <a href="#" class="text-decoration-none">Chưa có đánh giá</a>
        <?php else : ?>
            <?php for ($i = 0; $i < $star; $i++) : ?>
                <?php require "./src/Views/component/Star.php"; ?>
            <?php endfor; ?>
        <?php endif; ?>

        <br /><span>Bảo hành 12 tháng chính hãng</span>
        <hr />
    </div>
    <div class="body-content row gap-2">
        <div class="product-details row col-lg-9 col-sm-12">
            <div class="product-images col-lg-6 col-sm-12">
                <img class="img-fluid" src="<?= $product->image ?>" alt="" />
            </div>
            <div class="product-editions col-lg-6 col-sm-12">
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
                <a href="#" class="buy-now d-block text-decoration-none bg-danger text-center rounded p-2 mb-2" onclick="checkoutNow(event, <?= $product->product_id ?>)">
                    <div class="fs-5 fw-bold text-white">ĐẶT MUA NGAY</div>
                    <span class="text-white">Mua trực tiếp $ Giao hàng COD toàn quốc</span>
                </a>
                <a href="#" class="add-to-cart d-block text-decoration-none bg-primary text-center rounded p-2" onclick="addCart(event, <?= $product->product_id ?>)">
                    <div class="fs-5 fw-bold text-white">THÊM VÀO GIỎ HÀNG</div>
                    <span class="text-white">Thêm sản phẩm vào giỏ hàng</span>
                </a>
            </div>
        </div>
        <div class="product-similar col-lg-3 col-sm-12 text-center shadow">
            <div class="fs-5 text-white bg-danger p-1">SẢN PHẨM TƯƠNG TỰ</div>

            <div class="d-flex flex-column align-items-start">
                <?php
                foreach ($similarProducts as $pro) : ?>
                    <a href="<?= ROOT ?>/productdetail/<?= $pro->product_id ?>" class="d-flex justify-content-start align-items-start mt-3 text-decoration-none text-black">
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
        <form action="<?= ROOT ?>/comment/<?= $product->product_id ?>" method="post">
            <div class="form-group p-2">
                <label for="exampleFormControlTextarea1" class="fs-5 my-2">Mời bạn để lại bình luận</label>
                <textarea name="content" class="form-control" placeholder="Sản phẩm tốt..." id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button class="btn btn-danger px-4 mt-3 ms-3">Bình luận</button>
        </form>
        <hr>
        <div class="my-3">
            <?php require "./src/Views/component/Comment.php"; ?>
        </div>
    </div>
</div>
<script>
    const checkoutNow = (e, productId) => {
        e.preventDefault();
        productForCheckout = [];
        productForCheckout.push({
            id: productId,
            quantity: 1
        });
        $.ajax({
            url: '<?= ROOT ?>/checkout',
            type: 'POST',
            data: {
                productForCheckout,
            },
            success: function(response) {
                // Handle the success response, if needed
                console.log('Success:', response);
                if (response == '0') {
                    showToast('liveToast', 'toast-data', "Chưa có sản phẩm nào được chọn!")
                } else {
                    window.location.replace("<?= ROOT ?>/checkout/order");
                }
            },
            error: function(error) {
                // Handle the error, if any
                console.error('Error:', error);
                //showToast('liveToast', 'toast-data', "Có lỗi xảy ra!")
            }
        });
    }
</script>
<?php require_once "./src/Views/layouts/footer.php"; ?>