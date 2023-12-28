<?php
require "./src/Models/CategoryModel.php";

$categorymodel  = new CategoryModel();
$categories  = $categorymodel->getAllCategory();
?>
<ul class="nav nav-pills flex-column">
    <?php foreach ($categories as $category) : ?>
        <li class="nav-item">
            <a href="<?= ROOT ?>/category/<?= $category->slug ?>" class="nav-link link-dark" aria-current="page"><?= $category->name ?><span style="float: right">></span></a>
        </li>
    <?php endforeach; ?>
</ul>