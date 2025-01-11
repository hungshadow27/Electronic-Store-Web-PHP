const formContainer = document.getElementById("formContainer");
const loadingContainer = document.getElementById("loadingContainer");
const alertContainer = document.getElementById("alertContainer");

const btnShowEditForm = async (e, category_id) => {
  e.preventDefault();
  loadingContainer.style.display = "block";
  try {
    const resCategory = await fetch(
      "<?= ROOT ?>/category/getById?id=" + category_id
    );
    const dataCategory = await resCategory.json();
    console.log(dataCategory);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      createEditForm(dataCategory);
    }, 500);
  } catch (error) {
    console.log("There was an error", error);
  }
};
const createEditForm = async (dataCategory) => {
  loadingContainer.style.display = "block";
  try {
    setTimeout(() => {
      loadingContainer.style.display = "none";
      const htmlString = `
        <div class="border-4 border-black rounded text-lg space-y-2 p-3 bg-slate-700 text-white fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
              <button class="float-right font-bold text-xl bg-red-600 py-2 px-3" onclick="closeForm()">X</button>
              <div class="text-3xl text-yellow-700 w-full text-center">
                  Sửa danh mục
              </div>
              <div class="space-y-3">
                  <div class="whitespace-nowrap">
                      <label for="input-category-id">Mã danh mục</label>
                      <input class="text-black" type="text" id="input-category-id" readonly value="${dataCategory.category_id}">
                  </div>
                  <div class="whitespace-nowrap">
                      <label for="input-category-slug">Slug</label>
                      <input class="text-black" type="text" id="input-category-slug" value="${dataCategory.slug}">
                  </div>
                  <div class="whitespace-nowrap">
                      <label for="input-category-name">Tên danh mục</label>
                      <input class="text-black" type="text" id="input-category-name" value="${dataCategory.name}">
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
  const inputId = document.getElementById("input-category-id");
  const inputSlug = document.getElementById("input-category-slug");
  const inputName = document.getElementById("input-category-name");

  const categoryInputData = {
    category_id: inputId.value,
    slug: inputSlug.value,
    name: inputName.value,
  };

  loadingContainer.style.display = "block";
  try {
    const res = await fetch("<?= ROOT ?>/category/update?id=" + inputId.value, {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(categoryInputData),
    });
    const data = await res.json();
    console.log(data);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      closeForm();
      updateAllRows();
      showAlertSuccess("Cập nhật danh mục thành công!");
    }, 500);
  } catch (error) {
    showAlertFailed("Có lỗi xảy ra!");
    console.log("There was an error", error);
  }
};
const handleDelete = async (category_id) => {
  if (confirm("Xoá danh mục này?")) {
    loadingContainer.style.display = "block";
    try {
      const res = await fetch("<?= ROOT ?>/category/delete?id=" + category_id);
      const data = await res.json();
      console.log(data);
      setTimeout(() => {
        loadingContainer.style.display = "none";
        updateAllRows();
        showAlertSuccess("Xoá danh mục thành công!");
      }, 500);
    } catch (error) {
      showAlertFailed("Có lỗi xảy ra!");
      console.log("There was an error", error);
    }
  }
};
const createAddForm = async () => {
  loadingContainer.style.display = "block";
  setTimeout(() => {
    loadingContainer.style.display = "none";
    const htmlString = `
          <div class="border-4 border-black rounded text-lg space-y-2 p-3 bg-slate-700 text-white fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <button class="float-right font-bold text-xl bg-red-600 py-2 px-3" onclick="closeForm()">X</button>
                <div class="text-3xl text-yellow-700 w-full text-center">
                    Thêm danh mục
                </div>
                <div class="space-y-3">
                    <div class="whitespace-nowrap">
                        <label for="input-category-slug">Slug</label>
                        <input class="text-black" type="text" id="input-category-slug" value="">
                    </div>
                    <div class="whitespace-nowrap">
                        <label for="input-category-name">Tên danh mục</label>
                        <input class="text-black" type="text" id="input-category-name" value="">
                    </div>
                </div>
                <button class="w-full p-2 text-center bg-green-600 font-medium" onclick="handleAdd()">Thêm</button>
            </div>
      `;
    formContainer.innerHTML = htmlString;
  }, 500);
};
const handleAdd = async () => {
  const inputSlug = document.getElementById("input-category-slug");
  const inputName = document.getElementById("input-category-name");

  const categoryInputData = {
    slug: inputSlug.value,
    name: inputName.value,
  };

  loadingContainer.style.display = "block";
  try {
    const res = await fetch("<?= ROOT ?>/category/add", {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(categoryInputData),
    });
    const data = await res.json();
    console.log(data);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      updateAllRows();
      closeForm();
      showAlertSuccess("Thêm danh mục thành công!");
    }, 500);
  } catch (error) {
    showAlertFailed("Có lỗi xảy ra!");
    console.log("There was an error", error);
  }
};
const updateAllRows = async () => {
  loadingContainer.style.display = "block";
  try {
    const resCategories = await fetch("<?= ROOT ?>/category/getAllCategory");
    const dataCategories = await resCategories.json();
    console.log(dataCategories);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      const tableBody = document.querySelector("#category-table");
      tableBody.innerHTML = "";
      dataCategories.forEach((category) => {
        addNewRow(category);
      });
    }, 500);
  } catch (error) {
    console.log("There was an error", error);
  }
};
const addNewRow = (categoryData) => {
  const tableBody = document.querySelector("#category-table");
  const newRow = document.createElement("tr");
  newRow.className = `border-b border-neutral-200 class-row-${categoryData.category_id}`;
  newRow.innerHTML = `
            <td class="whitespace-nowrap px-6 py-4 font-medium">${categoryData.category_id}</td>
            <td class="whitespace-nowrap px-6 py-4">${categoryData.slug}</td>
            <td class="whitespace-nowrap px-6 py-4">${categoryData.name}</td>
            <td class="whitespace-nowrap px-6 py-4">
                <button style="border: 5px solid black; border-radius: 10px;" onclick="btnShowEditForm(event,'${categoryData.category_id}')" class="p-3 bg-yellow-500">Sửa</button>
                <button style="border: 5px solid black; border-radius: 10px;" class="p-3 bg-red-500" onclick="handleDelete('${categoryData.category_id}')">Xóa</button>
            </td>
        `;

  tableBody.appendChild(newRow);
};
function shortenString(text) {
  return text.length > 100 ? text.slice(0, 97) + "..." : text;
}
