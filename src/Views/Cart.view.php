<?php require_once "./src/Views/layouts/header.php";
?>
<div class="container py-4" style="min-height: 500px;">
    <div class="row border p-2">
        <div class="col-4">
            <input type="checkbox" class="me-2" id="checkbox-all" />Sản phẩm
        </div>
        <div class="col-2">Đơn giá</div>
        <div class="col-2">Số lượng</div>
        <div class="col-2">Số tiền</div>
        <div class="col-2">Thao tác</div>
    </div>
    <?php if (!empty($products)) : ?>
        <?php foreach ($products as $product) : ?>
            <div class="row mt-3 shadow border rounded py-2 align-items-center product" data-id=<?= $product->getId() ?>>
                <div class="col-4">
                    <div class="d-flex">
                        <input type="checkbox" class="me-2 checkbox" />
                        <img class="w-25 " src="<?= $product->getImage() ?>" alt="" />
                        <a href="<?= ROOT ?>/productdetail/<?= $product->getId() ?>" class="fs-5 fw-medium text-decoration-none text-black px-3"><?= $product->getName() ?></a>
                    </div>
                </div>
                <div class="col-2"><?= number_format($product->getSale_price()) ?> ₫</div>
                <div class="col-2">
                    <input class="w-50 p-1 quantity" type="number" id="points" name="points" step="1" value="<?= $product->getQuantity() ?>" min="1" />
                </div>
                <div class="col-2 text-danger price"><?= $product->getSale_price() ?> ₫</div>
                <div class="col-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-danger btnDelete" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Xoá
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="text-center p-5">
            <span class="text-primary fs-5">Bạn chưa có sản phẩm nào trong giỏ hàng!</span>
        </div>
    <?php endif; ?>
</div>
<div class="position-sticky container bottom-0 my-3">
    <div class="d-flex shadow border p-3 justify-content-between bg-white">
        <div>
            Tổng thanh toán (<span id="productChecked">0</span> sản phẩm):
            <span class="col-2 text-danger fs-4 fw-bold" id="total-price">0 ₫</span>
        </div>
        <a onclick="checkout(event)" class="btn btn-danger">Mua hàng</a>
    </div>
</div>


<!-- Modal Accept Delete -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Xoá sản phẩm khỏi giỏ hàng</h1>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc muốn xoá sản phẩm này!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" id="acceptDelete" class="btn btn-danger" data-bs-dismiss="modal">Xoá</button>
            </div>
        </div>
    </div>
</div>

<script>
    let checkboxAll = document.getElementById("checkbox-all");
    let checkboxes = document.getElementsByClassName("checkbox");
    let totalPrice = document.getElementById("total-price");
    let price = document.getElementsByClassName("price");
    let btnDelete = document.getElementsByClassName("btnDelete");
    let itemDelete = '';
    let acceptDelete = document.getElementById("acceptDelete");

    //Delete cart product
    for (let i = 0; i < btnDelete.length; i++) {
        btnDelete[i].addEventListener("click", () => {
            itemDelete = i;
            console.log(itemDelete);
        })
    }
    acceptDelete.addEventListener("click", (e) => {
        console.log(btnDelete[itemDelete].parentElement.parentElement);
        deleteCartItem(e);
        btnDelete[itemDelete].parentElement.parentElement.remove();
        btnDelete = document.getElementsByClassName("btnDelete");
        for (let i = 0; i < btnDelete.length; i++) {
            btnDelete[i].addEventListener("click", () => {
                itemDelete = i;
                console.log(itemDelete);
            })
        }
        updateProducts();
    })

    let productForCheckout;
    // Function to update the total based on the checked checkboxes
    function updateTotal() {
        productForCheckout = [];
        let total = 0;
        let Checked = 0;
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                const quantity = parseInt(
                    checkboxes[i].parentElement.parentElement.parentElement.getElementsByClassName("quantity")[0].value
                );
                const price = parseFloat(
                    checkboxes[i].parentElement.parentElement.parentElement.getElementsByClassName("price")[0].innerHTML
                );
                const id = checkboxes[i].parentElement.parentElement.parentElement.getAttribute("data-id")
                console.log(price);
                productForCheckout.push({
                    id: id,
                    quantity: quantity
                });

                total += quantity * price;
                Checked++;
            }
        }
        console.log(productForCheckout);
        totalPrice.innerText = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(total);
        let productChecked = document.getElementById('productChecked').innerText = Checked;
    }
    const updateProducts = () => {
        checkboxAll = document.getElementById("checkbox-all");
        checkboxes = document.getElementsByClassName("checkbox");
        totalPrice = document.getElementById("total-price");
        price = document.getElementsByClassName("price");
        btnDelete = document.getElementsByClassName("btnDelete");
        itemDelete = '';
        acceptDelete = document.getElementById("acceptDelete");
        // Event listeners for quantity input fields
        const quantityInputs = document.querySelectorAll('.quantity');
        for (let i = 0; i < quantityInputs.length; i++) {
            quantityInputs[i].addEventListener("change", (e) => {
                console.log(i);
                updateTotal();
                updateQuantityCartItem(e, i);
            });
        }
        // Event listeners for individual checkboxes
        for (let i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener("click", () => {
                updateTotal();
            });
        }
        // Event listener for the "Select All" checkbox
        checkboxAll.addEventListener("click", () => {
            for (let i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = checkboxAll.checked;
            }
            updateTotal();
        });
    }
    updateProducts();
    //Ajax here
    const deleteCartItem = (e) => {
        e.preventDefault();
        var id = $(".product")[itemDelete].dataset.id;
        //var quantity = $(".product .quantity")[itemDelete].value;
        //console.log(quantity);
        $.ajax({
            url: '<?= ROOT ?>/cart/delete',
            type: 'POST',
            data: {
                id: id,
                //quantity: quantity
            },
            success: function(response) {
                // Handle the success response, if needed
                console.log('Success:', response);
                updateCartItemsNumber(response);
                showToast('liveToast', 'toast-data', "Bạn đã xoá sản phẩm khỏi giỏ hàng thành công!")
            },
            error: function(error) {
                // Handle the error, if any
                console.error('Error:', error);
                showToast('liveToast', 'toast-data', "Có lỗi xảy ra!")
            }
        });
    }
    const updateQuantityCartItem = (e, index) => {
        e.preventDefault();
        var id = $(".product")[index].dataset.id;
        var quantity = $(".product .quantity")[index].value;
        console.log(quantity);
        $.ajax({
            url: '<?= ROOT ?>/cart/updateQuantity',
            type: 'POST',
            data: {
                id: id,
                quantity: quantity
            },
            success: function(response) {
                // Handle the success response, if needed
                console.log('Success:', response);
                showToast('liveToast', 'toast-data', "Bạn đã cập nhật số lượng sản phẩm thành công!")
            },
            error: function(error) {
                // Handle the error, if any
                console.error('Error:', error);
                showToast('liveToast', 'toast-data', "Có lỗi xảy ra!")
            }
        });
    }
    const checkout = (e) => {
        e.preventDefault();
        $.ajax({
            url: '<?= ROOT ?>/checkout',
            type: 'POST',
            data: {
                productForCheckout,
            },
            success: function(response) {
                // Handle the success response, if needed
                console.log('Success:', response);
                if (response == '0') {
                    showToast('liveToast', 'toast-data', "Chưa có sản phẩm nào được chọn!")
                } else {
                    window.location.replace("<?= ROOT ?>/checkout/order");
                }
            },
            error: function(error) {
                // Handle the error, if any
                console.error('Error:', error);
                //showToast('liveToast', 'toast-data', "Có lỗi xảy ra!")
            }
        });
    }
</script>
<?php require_once "./src/Views/layouts/footer.php"; ?>