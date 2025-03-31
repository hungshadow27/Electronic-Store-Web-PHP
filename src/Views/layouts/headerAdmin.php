<?php
require_once "./src/Models/UserEntity.php";
if (isset($_SESSION['USER'])) {
    $user = new UserEntity();
    $user = unserialize($_SESSION['USER']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
      .content-auto {
                content-visibility: auto;
            }
            @layer base {
        html {
            font-family: "Poppins", system-ui, sans-serif;
        }
        }
    }
  </style>
    <script>
        const showAlertSuccess = (text) => {
            const htmlString = `<div class="w-[20%] absolute top-1/4 right-[10px] bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                                    <div class="flex">
                                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                            </svg></div>
                                        <div>
                                            <p class="font-bold">Thông báo</p>
                                            <p class="text-sm">${text}</p>
                                        </div>
                                    </div>
                                </div>`;
            alertContainer.innerHTML = htmlString;
            setTimeout(() => {
                alertContainer.innerHTML = '';
            }, 2000);
        }
        const showAlertFailed = (text) => {
            const htmlString = `<div role="alert" class="w-[20%] absolute top-1/4 right-[10px]">
                                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                        Thông báo
                                    </div>
                                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                        <p>${text}</p>
                                    </div>
                                    </div>`;
            alertContainer.innerHTML = htmlString;
            setTimeout(() => {
                alertContainer.innerHTML = '';
            }, 2000);
        }
    </script>
    <title>QLCH</title>

</head>

<body>
    <div id="alertContainer"></div>
    <div id="loadingContainer" class="z-50 space-y-2 hidden p-3 bg-slate-700 text-white fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-success motion-reduce:animate-[spin_1.5s_linear_infinite]" role="status">
            <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
        </div>
    </div>
    <div class="flex overflow-hidden">
        <nav style="border: 5px solid black; border-radius: 10px;" class="w-[15%] bg-slate-900">
            <div class="bg-sky-700 font-bold text-3xl text-white py-2 text-center">QLCH</div>
            <ul class="flex flex-col bg-slate-900 text-white text-lg h-screen">
                <a href="<?= ROOT ?>/admin" class="w-full hover:bg-slate-600 py-3 ps-5">Trang chủ</a>
                <a href="<?= ROOT ?>/admin/categories" class="w-full hover:bg-slate-600 py-3 ps-5">Danh mục</a>
                <a href="<?= ROOT ?>/admin/brands" class="w-full hover:bg-slate-600 py-3 ps-5">Nhãn hiệu</a>
                <a href="<?= ROOT ?>/admin/products" class="w-full hover:bg-slate-600 py-3 ps-5">Sản phẩm</a>
                <a href="<?= ROOT ?>/admin/orders" class="w-full hover:bg-slate-600 py-3 ps-5">Đơn hàng</a>
                <a href="<?= ROOT ?>/admin/" class="w-full hover:bg-slate-600 py-3 ps-5">Bình luận</a>
                <a href="<?= ROOT ?>/admin/" class="w-full hover:bg-slate-600 py-3 ps-5">Người dùng</a>
            </ul>
        </nav>
        <main class="flex-1">
            <header style="border: 5px solid black; border-radius: 10px;" class="w-full bg-sky-600 py-3 px-5">
                <div class="text-end text-lg">
                    <div class="relative inline-block text-left z-30">
                        <div class="group">
                            <button style="border: 5px solid black; border-radius: 10px;" type="button" class="inline-flex justify-center items-center w-full px-4 text-sm font-medium text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                <?= $user->getUsername() ?>
                                <!-- Dropdown arrow -->
                                <svg class="w-4 h-4 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 12l-5-5h10l-5 5z" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div class="absolute -left-[50px] w-40 origin-top-left bg-white divide-y divide-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300">
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Thông tin tài khoản</a>
                                    <a href="<?= ROOT ?>/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đăng xuất</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>