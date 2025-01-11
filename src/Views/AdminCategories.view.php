<?php require_once "./src/Views/layouts/headerAdmin.php"; ?>
<div>
    <table class="w-full text-center text-sm font-light text-surface">
        <thead class="border-b border-neutral-200 font-medium">
            <tr>
                <th scope="col" class="px-6 py-4">ID/Danh mục</th>
                <th scope="col" class="px-6 py-4">Slug</th>
                <th scope="col" class="px-6 py-4">Tên danh mục</th>
                <th scope="col" class="px-6 py-4">Chức năng</th>
            </tr>
        </thead>
        <tbody id="category-table">
            <?php foreach ($categories as $category) : ?>
                <tr class="border-b border-neutral-200 category-row-<?= $category->category_id ?>">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                        <?= $category->category_id ?>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4"><?= $category->slug ?></td>
                    <td class="whitespace-nowrap px-6 py-4"><?= $category->name ?></td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <button style="border: 5px solid black; border-radius: 10px;" onclick="btnShowEditForm(event,'<?= $category->category_id ?>')" class="p-3 bg-yellow-500">Sửa</button>
                        <button style="border: 5px solid black; border-radius: 10px;" class="p-3 bg-red-500" onclick="handleDelete('<?= $category->category_id ?>')">Xóa</button>
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
    <?php require_once("./src/Views/js/AdminCategories.js"); ?>
</script>
<?php require_once "./src/Views/layouts/footerAdmin.php"; ?>