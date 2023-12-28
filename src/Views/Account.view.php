<?php require_once "./src/Views/layouts/header.php" ?>
<div class="container mt-3">
    <div class="row gap-2">
        <?php require_once "./src/Views/modules/AccountMenu.php" ?>
        <div class="col-9">
            <h4 class="border rounded p-3 mb-3">Hồ sơ của tôi</h4>
            <div class="row">
                <div class="col-8">
                    <div class="row mb-3 border rounded shadow p-3">
                        <form>
                            <div class="form-group row mb-3">
                                <label for="staticUsername" class="col-3 col-form-label">Tên đăng nhập</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="staticUsername" value="<?= $user->getUsername() ?>" />
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputName" class="col-3 col-form-label">Tên</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputName" value="<?= $user->getName() ?>" />
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputName" class="col-3 col-form-label">Số điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputName" value="<?= $user->getPhone_number() ?>" />
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="startDate" class="col-3">Ngày sinh</label>
                                <div class="col-9">
                                    <input id="startDate" class="form-control" type="date" value="<?= $user->getDate_of_birth(); ?>" />
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="startDate" class="col-3">Giới tính</label>
                                <div class="col-9">
                                    <select class="form-control">
                                        <option <?= ($user->getGender()) == 0 ? "selected" : ""; ?>>Nam</option>
                                        <option <?= ($user->getGender()) == 1 ? "selected" : ""; ?>>Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputName" class="col-3 col-form-label">Địa chỉ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputName" value="<?= $user->getAddress(); ?>" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger d-block mx-auto">
                                Lưu
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-4 py-5 text-center">
                    <img class="rounded-circle" src="https://down-vn.img.susercontent.com/file/a86c4f073489c042e3db7cb9c86668a8_tn" alt="" />
                    <div class="btn btn-danger btn-rounded mx-auto d-block w-50 my-3">
                        <label class="form-label text-white m-1" for="customFile1">Chọn ảnh</label>
                        <input type="file" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "./src/Views/layouts/footer.php" ?>