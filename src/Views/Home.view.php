<?php require_once "./src/Views/layouts/header.php" ?>
<div class="banner mt-4">
    <div class="container row align-items-start justify-content-center mx-auto">
        <div class="category-list col-lg-3 col-sm-12">
            <div class="d-flex flex-column bg-white w-100 shadow rounded-3">
                <?php require_once "./src/Views/modules/home/CategoryMenu.php" ?>
            </div>
        </div>
        <?php require "./src/Views/modules/home/Slider.php"; ?>
        <?php require "./src/Views/modules/home/Banner.php"; ?>
    </div>
</div>
<?php require "./src/Views/modules/home/ProductPopularCategory.php"; ?>
<?php require_once "./src/Views/layouts/footer.php" ?>