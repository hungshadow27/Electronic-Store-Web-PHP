<?php require_once "./src/Views/layouts/header.php" ?>
<div class="container mt-3">
    <div class="row gap-2">
        <?php require_once "./src/Views/modules/account/AccountMenu.php" ?>
        <div class="col-lg-9 col-sm-12">
            <h4 class="border rounded p-3 mb-3">Hồ sơ của tôi</h4>
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="row mb-3 border rounded shadow p-3">
                        <form method="post" action="<?= ROOT ?>/account/edit">
                            <div class="form-group row mb-3">
                                <label for="staticUsername" class="col-3 col-form-label">Tên đăng nhập</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="staticUsername" value="<?= $user->getUsername() ?>" />
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputName" class="col-3 col-form-label">Tên</label>
                                <div class="col-sm-9">
                                    <input name="name" required type="text" class="form-control" id="inputName" value="<?= $user->getName() ?>" />
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputName" class="col-3 col-form-label">Số điện thoại</label>
                                <div class="col-sm-9">
                                    <input name="phoneNumber" required type="text" class="form-control" id="inputName" value="<?= $user->getPhone_number() ?>" />
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="startDate" class="col-3">Ngày sinh</label>
                                <div class="col-9">
                                    <input name="dateOfBirth" id="startDate" class="form-control" type="date" value="<?= $user->getDate_of_birth(); ?>" />
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="startDate" class="col-3">Giới tính</label>
                                <div class="col-9">
                                    <select name="gender" class="form-control">
                                        <option value="0" <?= ($user->getGender()) == 0 ? "selected" : ""; ?>>Nam</option>
                                        <option value="1" <?= ($user->getGender()) == 1 ? "selected" : ""; ?>>Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputName" class="col-3 col-form-label">Địa chỉ</label>
                                <div class="col-sm-9">
                                    <input name="address" required type="text" class="form-control" id="inputName" value="<?= $user->getAddress(); ?>" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger d-block mx-auto">
                                Lưu
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 py-3 text-center">
                    <?php if ($user->getImage() == '') : ?>
                        <img class="rounded-circle w-75" src="https://static-00.iconduck.com/assets.00/user-icon-2048x2048-ihoxz4vq.png" alt="" />
                    <?php else : ?>
                        <img class="rounded-circle object-fit-cover " width="250" height="250" src="<?= ROOT ?>/Public/images/<?= $user->getImage() ?>" alt="" />
                    <?php endif; ?>
                    <form action="<?= ROOT ?>/uploadimage" method="post" enctype="multipart/form-data">
                        <div class="fs-5 fw-medium py-2">Chọn ảnh để tải lên!</div>
                        <input type="file" class="btn btn-secondary my-2 fw-medium" name="fileUpload" id="fileToUpload">
                        <input type="submit" class="btn btn-warning fw-medium" value="Upload" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "./src/Views/layouts/footer.php" ?>