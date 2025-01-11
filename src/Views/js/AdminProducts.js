const formContainer = document.getElementById("formContainer");
const loadingContainer = document.getElementById("loadingContainer");
const alertContainer = document.getElementById("alertContainer");

const btnShowEditForm = async (e, product_id) => {
  e.preventDefault();
  loadingContainer.style.display = "block";
  try {
    const resProduct = await fetch(
      "<?= ROOT ?>/productdetail/getById?id=" + product_id
    );
    const dataProduct = await resProduct.json();
    console.log(dataProduct);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      createEditForm(dataProduct);
    }, 500);
  } catch (error) {
    console.log("There was an error", error);
  }
};

const createEditForm = async (dataProduct) => {
  loadingContainer.style.display = "block";
  try {
    const resCategories = await fetch("<?= ROOT ?>/category/getAllCategory");
    const dataCategories = await resCategories.json();

    const resBrands = await fetch("<?= ROOT ?>/brand/getAllBrand");
    const dataBrands = await resBrands.json();

    setTimeout(() => {
      loadingContainer.style.display = "none";
      const htmlString = `
        <div class="border-4 border-black rounded text-lg space-y-2 p-3 bg-slate-700 text-white fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
          <button class="float-right font-bold text-xl bg-red-600 py-2 px-3" onclick="closeForm()">X</button>
          <div class="text-3xl text-yellow-700 w-full text-center">
              Sửa sản phẩm
          </div>
          <div class="space-y-3">
              <div class="whitespace-nowrap">
                  <label for="input-product-id">Mã sản phẩm</label>
                  <input class="text-black" type="text" id="input-product-id" readonly value="${
                    dataProduct.product_id
                  }">
              </div>
              <div class="whitespace-nowrap">
                  <label for="input-product-name">Tên sản phẩm</label>
                  <input class="text-black" type="text" id="input-product-name" value="${
                    dataProduct.name
                  }">
              </div>
              <div class="whitespace-nowrap">
                  <label for="input-product-description">Mô tả</label>
                  <textarea class="text-black" rows="4" cols="50" id="input-product-description">${
                    dataProduct.description
                  }</textarea>
              </div>
              <div class="whitespace-nowrap">
                  <label for="input-product-price">Giá</label>
                  <input class="text-black" type="text" id="input-product-price" value="${
                    dataProduct.price
                  }">
              </div>
              <div class="whitespace-nowrap">
                  <label for="input-product-sale-price">Giá khuyến mãi</label>
                  <input class="text-black" type="text" id="input-product-sale-price" value="${
                    dataProduct.sale_price
                  }">
              </div>
              <div class="whitespace-nowrap">
                  <label for="input-product-stock">Số lượng</label>
                  <input class="text-black" type="number" id="input-product-stock" value="${
                    dataProduct.stock_quantity
                  }">
              </div>
              <div class="whitespace-nowrap">
                  <label for="input-product-category">Danh mục</label>
                  <select id="input-product-category" class="text-black">
                      ${dataCategories
                        .map((cat) => {
                          return `<option value="${cat.category_id}" ${
                            cat.category_id == dataProduct.category_id
                              ? "selected"
                              : ""
                          }>${cat.name}</option>`;
                        })
                        .join("")}
                  </select>
              </div>
              <div class="whitespace-nowrap">
                  <label for="input-product-brand">Thương hiệu</label>
                  <select id="input-product-brand" class="text-black">
                      ${dataBrands
                        .map((brand) => {
                          return `<option value="${brand.brand_id}" ${
                            brand.brand_id == dataProduct.brand_id
                              ? "selected"
                              : ""
                          }>${brand.brand_name}</option>`;
                        })
                        .join("")}
                  </select>
              </div>
               <div class="whitespace-nowrap">
                    <label for="input-product-image">Hình ảnh (URL)</label>
                    <input class="text-black" type="text" id="input-product-image" value="${
                      dataProduct.image
                    }">
                </div>
          </div>
          <button class="w-full p-2 text-center bg-green-600 font-medium" onclick="handleUpdate()">Sửa</button>
        </div>
      `;
      formContainer.innerHTML = htmlString;
    }, 500);
  } catch (error) {
    console.log("There was an error", error);
  }
};

const closeForm = () => {
  formContainer.innerHTML = "";
};

const handleUpdate = async () => {
  const inputId = document.getElementById("input-product-id");
  const inputName = document.getElementById("input-product-name");
  const inputDescription = document.getElementById("input-product-description");
  const inputPrice = document.getElementById("input-product-price");
  const inputSalePrice = document.getElementById("input-product-sale-price");
  const inputStock = document.getElementById("input-product-stock");
  const inputCategory = document.getElementById("input-product-category");
  const inputBrand = document.getElementById("input-product-brand");
  const inputImage = document.getElementById("input-product-image");

  const productInputData = {
    product_id: inputId.value,
    name: inputName.value,
    description: inputDescription.value,
    price: inputPrice.value,
    sale_price: inputSalePrice.value,
    stock_quantity: inputStock.value,
    category_id: inputCategory.value,
    brand_id: inputBrand.value,
    image: inputImage.value,
  };

  loadingContainer.style.display = "block";
  try {
    const res = await fetch(
      "<?= ROOT ?>/productdetail/update?id=" + inputId.value,
      {
        method: "POST",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
        body: JSON.stringify(productInputData),
      }
    );
    const data = await res.json();
    console.log(data);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      closeForm();
      updateAllRows();
      showAlertSuccess("Cập nhật sản phẩm thành công!");
      location.reload();
    }, 500);
  } catch (error) {
    showAlertFailed("Có lỗi xảy ra!");
    console.log("There was an error", error);
  }
};
const createAddForm = async () => {
  loadingContainer.style.display = "block";
  try {
    const resCategories = await fetch("<?= ROOT ?>/category/getAllCategory");
    const resBrands = await fetch("<?= ROOT ?>/brand/getAllBrand");

    const dataCategories = await resCategories.json();
    const dataBrands = await resBrands.json();

    setTimeout(() => {
      loadingContainer.style.display = "none";
      const htmlString = `
          <div class="border-4 border-black rounded text-lg space-y-2 p-3 bg-slate-700 text-white fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <button class="float-right font-bold text-xl bg-red-600 py-2 px-3" onclick="closeForm()">X</button>
            <div class="text-3xl text-yellow-700 w-full text-center">
                Thêm sản phẩm
            </div>
            <div class="space-y-3">
                <div class="whitespace-nowrap">
                    <label for="input-product-id">Mã sản phẩm</label>
                    <input class="text-black" type="text" id="input-product-id">
                </div>
                <div class="whitespace-nowrap">
                    <label for="input-product-name">Tên sản phẩm</label>
                    <input class="text-black" type="text" id="input-product-name">
                </div>
                <div class="whitespace-nowrap flex items-start gap-1">
                    <label for="input-product-description">Mô tả</label>
                    <textarea class="text-black" rows="4" cols="50" id="input-product-description"></textarea>
                </div>
                <div class="whitespace-nowrap">
                    <label for="input-product-category">Danh mục</label>
                    <select id="input-product-category" class="text-black">
                        ${dataCategories
                          .map(
                            (category) =>
                              `<option value="${category.category_id}">${category.name}</option>`
                          )
                          .join("")}
                    </select>
                </div>
                <div class="whitespace-nowrap">
                    <label for="input-product-brand">Thương hiệu</label>
                    <select id="input-product-brand" class="text-black">
                        ${dataBrands
                          .map(
                            (brand) =>
                              `<option value="${brand.brand_id}">${brand.brand_name}</option>`
                          )
                          .join("")}
                    </select>
                </div>
                <div class="whitespace-nowrap">
                    <label for="input-product-price">Giá</label>
                    <input class="text-black" type="text" id="input-product-price">
                </div>
                <div class="whitespace-nowrap">
                    <label for="input-product-sale-price">Giá khuyến mãi</label>
                    <input class="text-black" type="text" id="input-product-sale-price">
                </div>
                <div class="whitespace-nowrap">
                    <label for="input-product-stock">Số lượng</label>
                    <input class="text-black" type="number" id="input-product-stock">
                </div>
                <div class="whitespace-nowrap">
                    <label for="input-product-image">Hình ảnh (URL)</label>
                    <input class="text-black" type="text" id="input-product-image">
                </div>
            </div>
            <button class="w-full p-2 text-center bg-green-600 font-medium" onclick="handleAdd()">Thêm</button>
          </div>
        `;
      formContainer.innerHTML = htmlString;
    }, 500);
  } catch (error) {
    console.log("There was an error", error);
  }
};

const handleAdd = async () => {
  const inputId = document.getElementById("input-product-id");
  const inputName = document.getElementById("input-product-name");
  const inputDescription = document.getElementById("input-product-description");
  const inputCategory = document.getElementById("input-product-category");
  const inputBrand = document.getElementById("input-product-brand");
  const inputPrice = document.getElementById("input-product-price");
  const inputSalePrice = document.getElementById("input-product-sale-price");
  const inputStock = document.getElementById("input-product-stock");
  const inputImage = document.getElementById("input-product-image");

  const productInputData = {
    product_id: inputId.value,
    name: inputName.value,
    description: inputDescription.value,
    category_id: inputCategory.value,
    brand_id: inputBrand.value,
    price: inputPrice.value,
    sale_price: inputSalePrice.value,
    stock_quantity: inputStock.value,
    image: inputImage.value,
  };

  loadingContainer.style.display = "block";

  try {
    const res = await fetch("<?= ROOT ?>/productdetail/add", {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(productInputData),
    });

    const data = await res.json();
    console.log(data);

    setTimeout(() => {
      loadingContainer.style.display = "none";
      updateAllRows();
      closeForm();
      showAlertSuccess("Thêm sản phẩm thành công!");
      location.reload();
    }, 500);
  } catch (error) {
    showAlertFailed("Có lỗi xảy ra khi thêm sản phẩm!");
    console.log("There was an error", error);
  }
};

const handleDelete = async (product_id) => {
  if (confirm("Xoá sản phẩm này?")) {
    loadingContainer.style.display = "block";
    try {
      const res = await fetch(
        "<?= ROOT ?>/productdetail/delete?id=" + product_id
      );
      const data = await res.json();
      console.log(data);
      setTimeout(() => {
        loadingContainer.style.display = "none";
        updateAllRows();
        showAlertSuccess("Xoá sản phẩm thành công!");
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
    const resProducts = await fetch("<?= ROOT ?>/productdetail/getAllProduct");
    const dataProducts = await resProducts.json();
    console.log(dataProducts);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      const tableBody = document.querySelector("#product-table");
      tableBody.innerHTML = "";
      dataProducts.forEach((product) => {
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
  newRow.className = `border-b border-neutral-200 product-row-${productData.product_id}`;
  newRow.innerHTML = `
    <td class="whitespace-nowrap px-6 py-4 font-medium">
      ${productData.product_id}
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
        productData.product_id
      }')" class="p-3 bg-yellow-500">Sửa</button>
      <button style="border: 5px solid black; border-radius: 10px;" class="p-3 bg-red-500" onclick="handleDelete('${
        productData.product_id
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
