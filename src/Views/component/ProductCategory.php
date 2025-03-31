<div class="my-2 col-lg-4 col-sm-12">
    <div class="mx-auto card position-relative shadow" style="width: 99%;">
        <a href="<?= ROOT ?>/productdetail/<?= $product->product_id ?>">
            <img src="<?= $product->image ?>" class="card-img-top w-50 d-block mx-auto mt-3" alt="..." style="width: 150px;height:150px;object-fit: cover;" />
        </a>
        <div class="card-body">
            <a href="<?= ROOT ?>/productdetail/<?= $product->product_id ?>" class="card-title fs-5 fw-semibold text-decoration-none" style="display:block;height: 84px"><?= $product->name ?></a>
            <div class="price my-3">
                <span class="fs-5 text-danger fw-bold"><?= number_format($product->sale_price) ?>₫</span>
                <del class="fs-5 text-secondary fw-bold"><?= number_format($product->price) ?>₫</del>
            </div>
            <p class="card-text bg-body-secondary p-2">
                Giảm ngay 500k khi thanh toán qua VNPay.
            </p>
            <div class="buy-btn text-center">
                <a href="<?= ROOT ?>/productdetail/<?= $product->product_id ?>" class="btn btn-danger my-2">Mua ngay</a>
                <?php if (isset($_SESSION['CARTITEMS'])) : ?>
                    <span class="btn btn-secondary my-2 pe-auto" onclick="addCart(event, <?= $product->product_id ?>)">Thêm vào giỏ hàng</span>
                <?php else : ?>
                    <a href="<?= ROOT ?>/login" class="btn btn-secondary my-2 pe-auto">Thêm vào giỏ hàng</a>
                <?php endif; ?>
            </div>
            <div class="bottom d-flex align-items-center justify-content-between">
                <div class="rate">
                    <?php require "./src/Views/component/Star.php"; ?>
                </div>
                <div class="love">
                    <span>Yêu thích</span>
                    <svg fill="#ff0000" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#ff0000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M20.5,4.609A5.811,5.811,0,0,0,16,2.5a5.75,5.75,0,0,0-4,1.455A5.75,5.75,0,0,0,8,2.5,5.811,5.811,0,0,0,3.5,4.609c-.953,1.156-1.95,3.249-1.289,6.66,1.055,5.447,8.966,9.917,9.3,10.1a1,1,0,0,0,.974,0c.336-.187,8.247-4.657,9.3-10.1C22.45,7.858,21.453,5.765,20.5,4.609Zm-.674,6.28C19.08,14.74,13.658,18.322,12,19.34c-2.336-1.41-7.142-4.95-7.821-8.451-.513-2.646.189-4.183.869-5.007A3.819,3.819,0,0,1,8,4.5a3.493,3.493,0,0,1,3.115,1.469,1.005,1.005,0,0,0,1.76.011A3.489,3.489,0,0,1,16,4.5a3.819,3.819,0,0,1,2.959,1.382C19.637,6.706,20.339,8.243,19.826,10.889Z"></path>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
        <span style="top: 5px; left: 45px" class="position-absolute translate-middle badge rounded-3 bg-danger fs-6">Giảm <?= number_format(($product->price - $product->sale_price) / $product->price * 100) ?>%
        </span>
    </div>
</div>