const formContainer = document.getElementById("formContainer");
const loadingContainer = document.getElementById("loadingContainer");
const alertContainer = document.getElementById("alertContainer");

const btnShowEditForm = async (e, order_id) => {
  e.preventDefault();
  loadingContainer.style.display = "block";
  try {
    const resOrder = await fetch("<?= ROOT ?>/order/getById?id=" + order_id);
    const dataOrder = await resOrder.json();
    console.log(dataOrder);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      createEditForm(dataOrder);
    }, 500);
  } catch (error) {
    console.log("There was an error", error);
  }
};

const createEditForm = async (dataOrder) => {
  loadingContainer.style.display = "block";
  try {
    const dataOrderStatuses = [
      { status_id: -1, status_name: "Đã huỷ" },
      { status_id: 0, status_name: "Chờ xác nhận" },
      { status_id: 1, status_name: "Đang Chuẩn bị" },
      { status_id: 2, status_name: "Đang giao hàng" },
      { status_id: 3, status_name: "Đang trên đường giao đến bạn" },
      { status_id: 4, status_name: "Đã giao hàng" },
    ];

    setTimeout(() => {
      loadingContainer.style.display = "none";
      const htmlString = `
          <div class="border-4 border-black rounded text-lg space-y-2 p-3 bg-slate-700 text-white fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <button class="float-right font-bold text-xl bg-red-600 py-2 px-3" onclick="closeForm()">X</button>
            <div class="text-3xl text-yellow-700 w-full text-center">
                Sửa đơn hàng
            </div>
            <div class="space-y-3">
                <div class="whitespace-nowrap">
                    <label for="input-order-id">Mã đơn hàng</label>
                    <input class="text-black" type="text" id="input-order-id" readonly value="${
                      dataOrder.order_id
                    }">
                </div>
                <div class="whitespace-nowrap">
                    <label for="input-user-id">Mã người dùng</label>
                    <input class="text-black" type="text" id="input-user-id" value="${
                      dataOrder.user_id
                    }">
                </div>
                <div class="whitespace-nowrap">
                    <label for="input-payment-method">Phương thức thanh toán</label>
                    <input class="text-black" type="text" id="input-payment-method" value="${
                      dataOrder.payment_method
                    }">
                </div>
                <div class="whitespace-nowrap">
                    <label for="input-shipping-address">Địa chỉ giao hàng</label>
                    <textarea class="text-black" rows="4" cols="50" id="input-shipping-address">${
                      dataOrder.shipping_address
                    }</textarea>
                </div>
                <div class="whitespace-nowrap">
                    <label for="input-order-status">Trạng thái đơn hàng</label>
                    <select id="input-order-status" class="text-black">
                        ${dataOrderStatuses
                          .map((status) => {
                            return `<option value="${status.status_id}" ${
                              status.status_id == dataOrder.order_status
                                ? "selected"
                                : ""
                            }>${status.status_name}</option>`;
                          })
                          .join("")}
                    </select>
                </div>
                <div class="whitespace-nowrap">
                    <label for="input-order-date">Ngày đặt hàng</label>
                    <input class="text-black" type="text" id="input-order-date" readonly value="${dateFormat(
                      dataOrder.order_date
                    )}">
                </div>
                <div class="whitespace-nowrap">
                    <label for="input-total-cost">Tổng chi phí</label>
                    <input class="text-black" type="text" id="input-total-cost" readonly value="${numberFormat(
                      dataOrder.total_cost
                    )}">
                </div>
                <div class="whitespace-nowrap">
                    <label for="input-finish-date">Ngày hoàn thành</label>
                    <input class="text-black" type="date" id="input-finish-date" value="${
                      dataOrder.finish_date
                        ? dateFormat(dataOrder.finish_date)
                        : ""
                    }">
                </div>
            </div>
            <button class="w-full p-2 text-center bg-green-600 font-medium" onclick="handleUpdate()">Cập nhật</button>
          </div>
        `;
      formContainer.innerHTML = htmlString;
    }, 500);
  } catch (error) {
    console.log("There was an error", error);
  }
};

// Helper functions for formatting dates and numbers
const dateFormat = (date) => {
  return date ? new Date(date).toLocaleDateString("vi-VN") : "";
};

const numberFormat = (number) => {
  return number ? number.toLocaleString() : "";
};

const closeForm = () => {
  formContainer.innerHTML = "";
};

const handleUpdate = async () => {
  const inputOrderId = document.getElementById("input-order-id");
  const inputUserId = document.getElementById("input-user-id");
  const inputPaymentMethod = document.getElementById("input-payment-method");
  const inputShippingAddress = document.getElementById(
    "input-shipping-address"
  );
  const inputOrderStatus = document.getElementById("input-order-status");
  const inputOrderDate = document.getElementById("input-order-date");
  const inputTotalCost = document.getElementById("input-total-cost");
  const inputFinishDate = document.getElementById("input-finish-date");

  const orderInputData = {
    order_id: inputOrderId.value,
    user_id: inputUserId.value,
    payment_method: inputPaymentMethod.value,
    shipping_address: inputShippingAddress.value,
    order_status: inputOrderStatus.value,
    total_cost: inputTotalCost.value,
    finish_date: inputFinishDate.value || null,
  };

  loadingContainer.style.display = "block";
  try {
    const res = await fetch(
      "<?= ROOT ?>/order/update?id=" + inputOrderId.value,
      {
        method: "POST",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
        body: JSON.stringify(orderInputData),
      }
    );
    const data = await res.json();
    console.log(data);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      closeForm();
      updateAllRows();
      showAlertSuccess("Cập nhật đơn hàng thành công!");
      location.reload();
    }, 500);
  } catch (error) {
    showAlertFailed("Có lỗi xảy ra!");
    console.log("There was an error", error);
  }
};

const handleDelete = async (order_id) => {
  if (confirm("Xoá sản phẩm này?")) {
    loadingContainer.style.display = "block";
    try {
      const res = await fetch("<?= ROOT ?>/order/delete?id=" + order_id);
      const data = await res.json();
      console.log(data);
      setTimeout(() => {
        loadingContainer.style.display = "none";
        updateAllRows();
        showAlertSuccess("Xoá sản phẩm thành công!");
        location.reload();
      }, 500);
    } catch (error) {
      showAlertFailed("Có lỗi xảy ra!");
      console.log("There was an error", error);
    }
  }
};

const updateAllRows = async () => {
  loadingContainer.style.display = "block";
  try {
    const resOrders = await fetch("<?= ROOT ?>/order/getAllProduct");
    const dataOrders = await resOrders.json();
    console.log(dataOrders);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      const tableBody = document.querySelector("#product-table");
      tableBody.innerHTML = "";
      dataOrders.forEach((product) => {
        addNewRow(product);
      });
    }, 500);
  } catch (error) {
    console.log("There was an error", error);
  }
};

const addNewRow = (productData) => {
  const tableBody = document.querySelector("#product-table");
  const newRow = document.createElement("tr");
  newRow.className = `border-b border-neutral-200 product-row-${productData.order_id}`;
  newRow.innerHTML = `
    <td class="whitespace-nowrap px-6 py-4 font-medium">
      ${productData.order_id}
    </td>
    <td class="whitespace-nowrap px-6 py-4">${productData.name}</td>
    <td class="whitespace-nowrap px-6 py-4">${shortenString(
      productData.description
    )}</td>
    <td class="whitespace-nowrap px-6 py-4">${toVND(productData.price)}</td>
    <td class="whitespace-nowrap px-6 py-4">${toVND(
      productData.sale_price
    )}</td>
    <td class="whitespace-nowrap px-6 py-4">${productData.stock_quantity}</td>
    <td class="whitespace-nowrap px-6 py-4">
      <img src="${productData.image}" alt="Image of ${
    productData.name
  }" class="h-16 w-16 object-cover">
    </td>
    <td class="whitespace-nowrap px-6 py-4">${productData.category_name}</td>
    <td class="whitespace-nowrap px-6 py-4">${productData.brand_name}</td>
    <td class="whitespace-nowrap px-6 py-4">
      <button style="border: 5px solid black; border-radius: 10px;" onclick="btnShowEditForm(event,'${
        productData.order_id
      }')" class="p-3 bg-yellow-500">Sửa</button>
      <button style="border: 5px solid black; border-radius: 10px;" class="p-3 bg-red-500" onclick="handleDelete('${
        productData.order_id
      }')">Xóa</button>
    </td>
  `;
  tableBody.appendChild(newRow);
};

function shortenString(text) {
  return text.length > 100 ? text.slice(0, 97) + "..." : text;
}

const toVND = (value) => {
  value = value.toString().replace(/\./g, "");
  const formatted = new Intl.NumberFormat("it-IT", {
    style: "currency",
    currency: "VND",
  })
    .format(value)
    .replace("₫", "")
    .trim();

  return formatted;
};
