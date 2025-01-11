const formContainer = document.getElementById("formContainer");
const loadingContainer = document.getElementById("loadingContainer");
const alertContainer = document.getElementById("alertContainer");

const btnShowEditForm = async (e, brand_id) => {
  e.preventDefault();
  loadingContainer.style.display = "block";
  try {
    const resBrand = await fetch("<?= ROOT ?>/brand/getById?id=" + brand_id);
    const dataBrand = await resBrand.json();
    console.log(dataBrand);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      createEditForm(dataBrand);
    }, 500);
  } catch (error) {
    console.log("There was an error", error);
  }
};

const createEditForm = async (dataBrand) => {
  loadingContainer.style.display = "block";
  try {
    const resCategories = await fetch("<?= ROOT ?>/category/getAllCategory");
    const categories = await resCategories.json();
    setTimeout(() => {
      loadingContainer.style.display = "none";
      const htmlString = `
        <div class="border-4 border-black rounded text-lg space-y-2 p-3 bg-slate-700 text-white fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
              <button class="float-right font-bold text-xl bg-red-600 py-2 px-3" onclick="closeForm()">X</button>
              <div class="text-3xl text-yellow-700 w-full text-center">
                  Sửa nhãn hiệu
              </div>
              <div class="space-y-3">
                  <div class="whitespace-nowrap">
                      <label for="input-brand-id">Mã nhãn hiệu</label>
                      <input class="text-black" type="text" id="input-brand-id" readonly value="${
                        dataBrand.brand_id
                      }">
                  </div>
                  <div class="whitespace-nowrap">
                      <label for="input-brand-slug">Slug</label>
                      <input class="text-black" type="text" id="input-brand-slug" value="${
                        dataBrand.slug
                      }">
                  </div>
                  <div class="whitespace-nowrap">
                      <label for="input-brand-name">Tên nhãn hiệu</label>
                      <input class="text-black" type="text" id="input-brand-name" value="${
                        dataBrand.brand_name
                      }">
                  </div>
                  <div class="whitespace-nowrap">
                      <label for="input-category-id">Danh mục</label>
                      <select class="text-black" id="input-category-id">
                          ${categories
                            .map(
                              (category) => `
                            <option value="${category.category_id}" ${
                                category.category_id === dataBrand.category_id
                                  ? "selected"
                                  : ""
                              }>${category.name}</option>
                          `
                            )
                            .join("")}
                      </select>
                  </div>
                  <div class="whitespace-nowrap">
                      <label for="input-image">Hình ảnh</label>
                      <input class="text-black" type="text" id="input-image" value="${
                        dataBrand.image
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
  const inputId = document.getElementById("input-brand-id");
  const inputSlug = document.getElementById("input-brand-slug");
  const inputName = document.getElementById("input-brand-name");
  const inputCategoryId = document.getElementById("input-category-id");
  const inputImage = document.getElementById("input-image");

  const brandInputData = {
    brand_id: inputId.value,
    slug: inputSlug.value,
    brand_name: inputName.value,
    category_id: inputCategoryId.value,
    image: inputImage.value,
  };

  loadingContainer.style.display = "block";
  try {
    const res = await fetch("<?= ROOT ?>/brand/update?id=" + inputId.value, {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(brandInputData),
    });
    const data = await res.json();
    console.log(data);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      closeForm();
      updateAllRows();
      showAlertSuccess("Cập nhật nhãn hiệu thành công!");
      location.reload();
    }, 500);
  } catch (error) {
    showAlertFailed("Có lỗi xảy ra!");
    console.log("There was an error", error);
  }
};

const handleDelete = async (brand_id) => {
  if (confirm("Xoá nhãn hiệu này?")) {
    loadingContainer.style.display = "block";
    try {
      const res = await fetch("<?= ROOT ?>/brand/delete?id=" + brand_id);
      const data = await res.json();
      console.log(data);
      setTimeout(() => {
        loadingContainer.style.display = "none";
        updateAllRows();
        showAlertSuccess("Xoá nhãn hiệu thành công!");
        location.reload();
      }, 500);
    } catch (error) {
      showAlertFailed("Có lỗi xảy ra!");
      console.log("There was an error", error);
    }
  }
};

const createAddForm = async () => {
  loadingContainer.style.display = "block";
  try {
    const resCategories = await fetch("<?= ROOT ?>/category/getAllCategory");
    const categories = await resCategories.json();
    setTimeout(() => {
      loadingContainer.style.display = "none";
      const htmlString = `
              <div class="border-4 border-black rounded text-lg space-y-2 p-3 bg-slate-700 text-white fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <button class="float-right font-bold text-xl bg-red-600 py-2 px-3" onclick="closeForm()">X</button>
                    <div class="text-3xl text-yellow-700 w-full text-center">
                        Thêm nhãn hiệu
                    </div>
                    <div class="space-y-3">
                        <div class="whitespace-nowrap">
                            <label for="input-brand-slug">Slug</label>
                            <input class="text-black" type="text" id="input-brand-slug" value="">
                        </div>
                        <div class="whitespace-nowrap">
                            <label for="input-brand-name">Tên nhãn hiệu</label>
                            <input class="text-black" type="text" id="input-brand-name" value="">
                        </div>
                        <div class="whitespace-nowrap">
                            <label for="input-category-id">Danh mục</label>
                            <select class="text-black" id="input-category-id">
                              ${categories
                                .map(
                                  (category) => `
                                <option value="${category.category_id}">${category.name}</option>
                              `
                                )
                                .join("")}
                            </select>
                        </div>
                        <div class="whitespace-nowrap">
                            <label for="input-image">Hình ảnh</label>
                            <input class="text-black" type="text" id="input-image" value="">
                        </div>
                    </div>
                    <button class="w-full p-2 text-center bg-green-600 font-medium" onclick="handleAdd()">Thêm</button>
                </div>
          `;
      formContainer.innerHTML = htmlString;
    }, 500);
  } catch (error) {
    showAlertFailed("Có lỗi xảy ra!");
    console.log("There was an error", error);
  }
};

const handleAdd = async () => {
  const inputSlug = document.getElementById("input-brand-slug");
  const inputName = document.getElementById("input-brand-name");
  const inputCategoryId = document.getElementById("input-category-id");
  const inputImage = document.getElementById("input-image");

  const brandInputData = {
    slug: inputSlug.value,
    brand_name: inputName.value,
    category_id: inputCategoryId.value,
    image: inputImage.value,
  };

  loadingContainer.style.display = "block";
  try {
    const res = await fetch("<?= ROOT ?>/brand/add", {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(brandInputData),
    });
    const data = await res.json();
    console.log(data);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      updateAllRows();
      closeForm();
      showAlertSuccess("Thêm nhãn hiệu thành công!");
      location.reload();
    }, 500);
  } catch (error) {
    showAlertFailed("Có lỗi xảy ra!");
    console.log("There was an error", error);
  }
};

const updateAllRows = async () => {
  loadingContainer.style.display = "block";
  try {
    const resBrands = await fetch("<?= ROOT ?>/brand/getAllBrand");
    const dataBrands = await resBrands.json();
    console.log(dataBrands);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      const tableBody = document.querySelector("#brand-table");
      tableBody.innerHTML = "";
      dataBrands.forEach((brand) => {
        addNewRow(brand);
      });
    }, 500);
  } catch (error) {
    console.log("There was an error", error);
  }
};

const addNewRow = (brandData) => {
  const tableBody = document.querySelector("#brand-table");
  const newRow = document.createElement("tr");
  newRow.className = `border-b border-neutral-200 class-row-${brandData.brand_id}`;
  newRow.innerHTML = `
            <td class="whitespace-nowrap px-6 py-4 font-medium">${brandData.brand_id}</td>
            <td class="whitespace-nowrap px-6 py-4">${brandData.slug}</td>
            <td class="whitespace-nowrap px-6 py-4">${brandData.brand_name}</td>
            <td class="whitespace-nowrap px-6 py-4">${brandData.category_name}</td>
            <td class="whitespace-nowrap px-6 py-4">
                <img src="${brandData.image}" alt="Hình ảnh nhãn hiệu" class="w-16 h-16 object-cover">
            </td>
            <td class="whitespace-nowrap px-6 py-4">
                <button style="border: 5px solid black; border-radius: 10px;" onclick="btnShowEditForm(event,'${brandData.brand_id}')" class="p-3 bg-yellow-500">Sửa</button>
                <button style="border: 5px solid black; border-radius: 10px;" class="p-3 bg-red-500" onclick="handleDelete('${brandData.brand_id}')">Xóa</button>
            </td>
        `;
  tableBody.appendChild(newRow);
};

function shortenString(text) {
  return text.length > 100 ? text.slice(0, 97) + "..." : text;
}
