<?php require_once "./src/Views/layouts/headerAdmin.php";

?>
<div>
    <table class="w-full text-center text-sm font-light text-surface">
        <thead class="border-b border-neutral-200 font-medium">
            <tr>
                <th scope="col" class="px-6 py-4">ID/Sản phẩm</th>
                <th scope="col" class="px-6 py-4">Tên sản phẩm</th>
                <th scope="col" class="px-6 py-4">Giá</th>
                <th scope="col" class="px-6 py-4">Giá khuyến mãi</th>
                <th scope="col" class="px-6 py-4">Hình ảnh</th>
                <th scope="col" class="px-6 py-4">Danh mục</th>
                <th scope="col" class="px-6 py-4">Thương hiệu</th>
                <th scope="col" class="px-6 py-4">Chức năng</th>
            </tr>
        </thead>
        <tbody id="product-table">
            <?php foreach ($products as $product) : ?>
                <tr class="border-b border-neutral-200 product-row-<?= $product->product_id ?>">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                        <?= $product->product_id ?>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4"><?= $product->name ?></td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <?= number_format($product->price, 0, '', '.') ?> VND
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <?= number_format($product->sale_price, 0, '', '.') ?> VND
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <img src="<?= $product->image ?>" alt="Image of <?= $product->name ?>" class="h-16 w-16 object-cover">
                    </td>
                    <td class="whitespace-nowrap px-6 py-4"> <?php
                                                                $category = array_filter($categories, function ($cat) use ($product) {
                                                                    return $cat->category_id == $product->category_id; // Kiểm tra điều kiện
                                                                });
                                                                $category = reset($category); // Lấy phần tử đầu tiên trong mảng lọc được
                                                                echo $category ? $category->name : 'Unknown'; // In ra tên danh mục
                                                                ?></td>
                    <td class="whitespace-nowrap px-6 py-4"> <?php
                                                                $brand = array_filter($brands, function ($brand) use ($product) {
                                                                    return $brand->brand_id == $product->brand_id; // Kiểm tra điều kiện
                                                                });
                                                                $brand = reset($brand); // Lấy phần tử đầu tiên trong mảng lọc được
                                                                echo $brand ? $brand->brand_name : 'Unknown'; // In ra tên danh mục
                                                                ?></td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <button style="border: 5px solid black; border-radius: 10px;" onclick="btnShowEditForm(event,'<?= $product->product_id ?>')" class="p-3 bg-yellow-500">Sửa</button>
                        <button style="border: 5px solid black; border-radius: 10px;" class="p-3 bg-red-500" onclick="handleDelete('<?= $product->product_id ?>')">Xóa</button>
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
    <?php require_once("./src/Views/js/AdminProducts.js"); ?>
</script>
<?php require_once "./src/Views/layouts/footerAdmin.php"; ?>