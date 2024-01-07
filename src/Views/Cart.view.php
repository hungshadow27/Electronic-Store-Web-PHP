<?php require_once "./src/Views/layouts/header.php";
?>
<div class="position-relative">
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
        <?php foreach ($products as $product) : ?>
            <div class="row mt-3 shadow border rounded py-2 align-items-center">
                <div class="col-4">
                    <div class="d-flex">
                        <input type="checkbox" class="me-2 checkbox" />
                        <img class="w-25" src="<?= $product->getImage() ?>" alt="" />
                        <span class="fs-5 fw-medium"><?= $product->getName() ?></span>
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
    </div>
    <div class="position-sticky container bottom-0 my-3">
        <div class="d-flex shadow border p-3 justify-content-between bg-white">
            <div>
                Tổng thanh toán (1 sản phẩm):
                <span class="col-2 text-danger fs-4 fw-bold" id="total-price">0 ₫</span>
            </div>
            <a href="<?= ROOT ?>/checkout" class="btn btn-danger">Mua hàng</a>
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
    <!-- Toast noti -->
    <div class="toast-container position-fixed p-3" style="top: 10%; right:0;">
        <div id="liveToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex justify-content-between align-items-center">
                <div class="p-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg></div>

                <div class="toast-body fs-5">
                    Thông báo
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <hr class="m-0">
            <div class="fs-6 p-2">Bạn đã xoá sản phẩm khỏi giỏ hàng thành công!</div>
        </div>
    </div>
</div>

<script>
    const checkboxAll = document.getElementById("checkbox-all");
    const checkboxes = document.getElementsByClassName("checkbox");
    const totalPrice = document.getElementById("total-price");
    const price = document.getElementsByClassName("price");
    let btnDelete = document.getElementsByClassName("btnDelete");
    let itemDelete = '';
    const acceptDelete = document.getElementById("acceptDelete");

    //Delete cart product
    for (let i = 0; i < btnDelete.length; i++) {
        btnDelete[i].addEventListener("click", () => {
            itemDelete = i;
            console.log(itemDelete);
        })
    }
    acceptDelete.addEventListener("click", () => {
        console.log(btnDelete[itemDelete].parentElement.parentElement);
        btnDelete[itemDelete].parentElement.parentElement.remove();
        btnDelete = document.getElementsByClassName("btnDelete");
        for (let i = 0; i < btnDelete.length; i++) {
            btnDelete[i].addEventListener("click", () => {
                itemDelete = i;
                console.log(itemDelete);
            })
        }
        const toastLiveExample = document.getElementById('liveToast')
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        toastBootstrap.show()
    })

    // Function to update the total based on the checked checkboxes
    function updateTotal() {
        let total = 0;
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                const quantity = parseInt(
                    checkboxes[i].parentElement.parentElement.parentElement.getElementsByClassName("quantity")[0].value
                );
                const price = parseFloat(
                    checkboxes[i].parentElement.parentElement.parentElement.getElementsByClassName("price")[0].innerHTML
                );
                console.log(price);
                total += quantity * price;
            }
        }
        totalPrice.innerText = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(total);
    }

    // Event listener for the "Select All" checkbox
    checkboxAll.addEventListener("click", () => {
        for (let i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = checkboxAll.checked;
        }
        updateTotal();
    });

    // Event listeners for individual checkboxes
    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener("click", () => {
            updateTotal();
        });
    }

    // Event listeners for quantity input fields
    const quantityInputs = document.querySelectorAll('.quantity');
    for (let i = 0; i < quantityInputs.length; i++) {
        quantityInputs[i].addEventListener("change", () => {
            updateTotal();
        });
    }
</script>
<?php require_once "./src/Views/layouts/footer.php"; ?>