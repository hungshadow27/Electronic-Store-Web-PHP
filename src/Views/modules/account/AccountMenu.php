<div class="col-lg-2 col-sm-12">
    <div class="row justify-content-evenly align-items-center">
        <?php if ($user->getImage() == '') : ?>
            <img class="rounded-circle col-4 rounded-circle" src="https://static-00.iconduck.com/assets.00/user-icon-2048x2048-ihoxz4vq.png" alt="" />
        <?php else : ?>
            <img class="rounded-circle object-fit-cover col-4 p-0" style="width:60px; height:60px;" src="<?= ROOT ?>/Public/images/<?= $user->getImage() ?>" alt="" />
        <?php endif; ?>
        <div class="col-8">
            <div class="fs-5 fw-medium"><?= $user->getName() ?></div>
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