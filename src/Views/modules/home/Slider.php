<?php
require "./src/Models/SliderModel.php";
$sliderModel = new SliderModel();
$sliders = $sliderModel->getAllSlider();
?>
<div id="carouselExample" class="carousel slide w-75 mx-4 shadow" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php foreach ($sliders as $slider) : ?>
            <div class="carousel-item <?= $slider->id === 1 ? "active" : "" ?>" data-bs-interval="4000">
                <a href="<?= $slider->link ?>"> <img src="<?= $slider->image ?>" class="d-block w-100" alt="...">
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>