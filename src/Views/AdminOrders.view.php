<?php require_once "./src/Views/layouts/headerAdmin.php"; ?>

<div>
    <table class="w-full text-center text-sm font-light text-surface">
        <thead class="border-b border-neutral-200 font-medium">
            <tr>
                <th scope="col" class="px-6 py-4">Mã Đơn Hàng</th>
                <th scope="col" class="px-6 py-4">Mã Người Dùng</th>
                <th scope="col" class="px-6 py-4">Phương Thức Thanh Toán</th>
                <th scope="col" class="px-6 py-4">Địa Chỉ Giao Hàng</th>
                <th scope="col" class="px-6 py-4">Trạng Thái</th>
                <th scope="col" class="px-6 py-4">Ngày Đặt Hàng</th>
                <th scope="col" class="px-6 py-4">Tổng Chi Phí</th>
                <th scope="col" class="px-6 py-4">Ngày Hoàn Thành</th>
                <th scope="col" class="px-6 py-4">Chức năng</th>
            </tr>
        </thead>
        <tbody id="order-table">
            <?php foreach ($orders as $order) : ?>
                <tr class="border-b border-neutral-200 order-row-<?= $order->order_id ?>">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                        <?= $order->order_id ?>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4"><?= $order->user_id ?></td>
                    <td class="whitespace-nowrap px-6 py-4"><?= $order->payment_method ?></td>
                    <td class="whitespace px-6 py-4"><?= $order->shipping_address ?></td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <?php
                        switch ($order->order_status) {
                            case -1:
                                echo "Đã Hủy";
                                break;
                            case 0:
                                echo "Chờ Xác Nhận";
                                break;
                            case 1:
                                echo "Đang Chuẩn Bị";
                                break;
                            case 2:
                                echo "Đang Giao Hàng";
                                break;
                            case 3:
                                echo "Đang Trên Đường Giao";
                                break;
                            case 4:
                                echo "Đã Giao Hàng";
                                break;
                            default:
                                echo "Không Xác Định";
                        }
                        ?>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4"><?= date('d/m/Y', strtotime($order->order_date)) ?></td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <?= number_format($order->total_cost, 0, '', '.') ?> VND
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <?= $order->finish_date ? date('d/m/Y', strtotime($order->finish_date)) : 'Chưa Hoàn Thành' ?>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                        <button style="border: 5px solid black; border-radius: 10px;" onclick="btnShowEditForm(event,'<?= $order->order_id ?>')" class="p-3 bg-yellow-500">Sửa</button>
                        <button style="border: 5px solid black; border-radius: 10px;" class="p-3 bg-red-500" onclick="handleDelete('<?= $order->order_id ?>')">Xóa</button>
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
    <?php require_once("./src/Views/js/AdminOrders.js"); ?>
</script>

<?php require_once "./src/Views/layouts/footerAdmin.php"; ?>