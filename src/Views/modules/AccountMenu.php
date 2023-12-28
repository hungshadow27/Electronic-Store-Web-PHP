<div class="col-2">
    <div class="row justify-content-evenly align-items-center">
        <img class="col-4 rounded-circle" src="https://down-vn.img.susercontent.com/file/a86c4f073489c042e3db7cb9c86668a8_tn" alt="" />
        <div class="col-8">
            <div class="fs-5 fw-bold"><?= $user->getName() ?></div>
            <a href="<?= ROOT ?>/account" class="text-primary text-decoration-none">Sửa hồ sơ</a>
        </div>
    </div>
    <hr />
    <div class="d-flex flex-column align-items-start">
        <a href="<?= ROOT ?>/account" class="text-decoration-none  fs-5 <?= ($_GET['url']) == "account" ? "text-danger" : "text-black" ?>">Tài khoản của tôi</a>
        <a href="<?= ROOT ?>/account/orders" class="text-decoration-none fs-5 <?= ($_GET['url']) == "account/orders" ? "text-danger" : "text-black" ?>">Đơn mua</a>
        <a href="<?= ROOT ?>/logout" class="text-decoration-none text-black fs-5">Đăng xuất</a>
    </div>
</div>