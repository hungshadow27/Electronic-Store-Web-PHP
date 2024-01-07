<?php var_dump(count($allProducts));
$totalPage = ceil(count($allProducts) / $limit); ?>
<nav aria-label="Page navigation example" class="mt-3">
    <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="<?= ROOT ?>/category/dien-thoai?page=<?= $current > 1 ? $current - 1 : "1" ?>">Previous</a></li>
        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
            <li class="page-item"><a class="page-link <?= $current == $i ? "active" : "" ?>" href="<?= ROOT ?>/category/dien-thoai?page=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor; ?>
        <li class="page-item"><a class="page-link" href="<?= ROOT ?>/category/dien-thoai?page=<?= $current = $totalPage ? $current : $current + 1 ?>">Next</a></li>

    </ul>
</nav>