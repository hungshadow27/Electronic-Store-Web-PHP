<?php
require "./src/Models/BannerModel.php";
$BannerModel = new BannerModel();
$Banners = $BannerModel->getAllBanner();
?>
<div class="discount-bn col-lg-3 col-sm-12 text-end">
    <?php foreach ($Banners as $Banner) : ?>
        <a href="<?= $Banner->link ?>">
            <img class="w-100 mb-4 rounded-3 shadow" src="<?= $Banner->image ?>" alt="" />
        </a>
    <?php endforeach; ?>
</div>