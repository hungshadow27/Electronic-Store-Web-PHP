<?php require_once "./src/Views/layouts/headerAdmin.php"; ?>
<div>
    <table class="w-full text-center text-sm font-light text-surface">
        <thead class="border-b border-neutral-200 font-medium">
            <tr>
                <th scope="col" class="px-6 py-4">ID/Nhãn hiệu</th>
                <th scope="col" class="px-6 py-4">Slug</th>
                <th scope="col" class="px-6 py-4">Tên nhãn hiệu</th>
                <th scope="col" class="px-6 py-4">Danh mục</th>
                <th scope="col" class="px-6 py-4">Hình ảnh</th>
                <th scope="col" class="px-6 py-4">Chức năng</th>
            </tr>
        </thead>
        <tbody id="brand-table">
            <?php foreach ($brands as $brand) : ?>
                <tr class="border-b border-neutral-200 brand-row-<?= $brand->brand_id ?>">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                        <?= $brand->brand_id ?>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4"><?= $brand->slug ?></td>
                    <td class="whitespace-nowrap px-6 py-4"><?= $brand->brand_name ?></td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <?php
                        // Lọc danh mục để lấy tên category tương ứng với category_id của nhãn hiệu
                        $category_name = array_filter($categories, function ($category) use ($brand) {
                            return $category->category_id == $brand->category;
                        });
                        $category_name = array_values($category_name)[0]->name ?? 'Không có danh mục';
                        echo $category_name;
                        ?>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <?php if ($brand->image): ?>
                            <img src="<?= $brand->image ?>" alt="Hình ảnh nhãn hiệu" class="w-16 h-16 object-cover">
                        <?php else: ?>
                            Chưa có hình ảnh
                        <?php endif; ?>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <button style="border: 5px solid black; border-radius: 10px;" onclick="btnShowEditForm(event,'<?= $brand->brand_id ?>')" class="p-3 bg-yellow-500">Sửa</button>
                        <button style="border: 5px solid black; border-radius: 10px;" class="p-3 bg-red-500" onclick="handleDelete('<?= $brand->brand_id ?>')">Xóa</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="fixed bottom-0 left-1/2 transform -translate-x-1/2">
        <button style="border: 5px solid black; border-radius: 10px;" class="p-3 bg-blue-500 text-lg" onclick="createAddForm()">Thêm</button>
    </div>
    <div id="formContainer"></div>
</div>
<script>
    <?php require_once("./src/Views/js/AdminBrands.js"); ?>
</script>
<?php require_once "./src/Views/layouts/footerAdmin.php"; ?>