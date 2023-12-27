<div class="col-2">
    <div class="row justify-content-evenly align-items-center">
        <img class="col-4 rounded-circle" src="https://down-vn.img.susercontent.com/file/a86c4f073489c042e3db7cb9c86668a8_tn" alt="" />
        <div class="col-8">
            <div class="fs-5 fw-bold"><?= $user->getName() ?></div>
            <span class="text-primary">Sửa hồ sơ</span>
        </div>
    </div>
    <hr />
    <div class="d-flex flex-column align-items-start">
        <a href="<?= ROOT ?>/account" class="text-decoration-none text-danger fs-5">Tài khoản của tôi</a>
        <a href="<?= ROOT ?>/account/orders" class="text-decoration-none text-black fs-5">Đơn mua</a>
        <a href="<?= ROOT ?>/logout" class="text-decoration-none text-black fs-5">Đăng xuất</a>
    </div>
</div>