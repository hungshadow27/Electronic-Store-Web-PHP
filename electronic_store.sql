-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 08:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronic_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(3) NOT NULL,
  `link` varchar(2550) NOT NULL,
  `image` varchar(2550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `link`, `image`) VALUES
(1, 'https://cellphones.com.vn/samsung-galaxy-z-fold-5.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:10/plain/https://dashboard.cellphones.com.vn/storage/right-banner-fold5-th122.png'),
(2, 'https://cellphones.com.vn/ipad-10-2-inch-2021.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:10/plain/https://dashboard.cellphones.com.vn/storage/gen%209.jpg'),
(3, 'https://cellphones.com.vn/uu-dai-sinh-vien-hoc-sinh', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:10/plain/https://dashboard.cellphones.com.vn/storage/right%20sv.png');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(3) NOT NULL,
  `brand_name` varchar(25) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `image` varchar(2550) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `category`, `image`, `slug`) VALUES
(1, 'Apple', 1, 'https://img.hungmobile.vn/hungmobile-vn/2020/08/w150/logo-dm-iphone.jpg', 'apple'),
(2, 'Samsung', 1, 'https://img.hungmobile.vn/hungmobile-vn/2020/08/w150/logo-dm-samsung.jpg', 'samsung'),
(3, 'Xiaomi', 1, 'https://img.hungmobile.vn/hungmobile-vn/2020/08/w150/logo-dm-xiaomi.jpg', 'xiaomi'),
(4, 'Oppo', 1, 'https://img.hungmobile.vn/hungmobile-vn/2020/08/w150/logo-dm-oppo.jpg', 'oppo'),
(5, 'Vivo', 1, 'https://img.hungmobile.vn/hungmobile-vn/2021/06/w150/logo-vivo-1.jpg', 'vivo'),
(6, 'Realme', 1, 'https://img.hungmobile.vn/hungmobile-vn/2020/08/w150/logo-dm-realme.jpg', 'realme'),
(8, 'Macbook', 2, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/macbook.png', 'macbook'),
(9, 'Asus', 2, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/Asus.png', 'asus'),
(10, 'MSI', 2, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/MSI.png', 'msi'),
(11, 'Lenovo', 2, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/Lenovo.png', 'lenovo'),
(12, 'HP', 2, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/HP.png', 'hp'),
(13, 'Acer', 2, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/acer.png', 'acer'),
(14, 'Dell', 2, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/Dell.png', 'dell');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `created_at`) VALUES
(1, 1, '2024-01-07 10:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_item_id` int(3) NOT NULL,
  `cart_id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`cart_item_id`, `cart_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 2),
(2, 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `slug`, `name`) VALUES
(1, 'dien-thoai', 'ĐIỆN THOẠI'),
(2, 'laptop', 'LAPTOP'),
(3, 'am-thanh', 'ÂM THANH'),
(4, 'dong-ho', 'ĐỒNG HỒ'),
(5, 'camera', 'CAMERA'),
(6, 'phu-kien', 'PHỤ KIỆN'),
(7, 'pc', 'PC'),
(8, 'man-hinh', 'MÀN HÌNH'),
(9, 'ti-vi', 'TIVI');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `content` varchar(2550) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(2550) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `price`, `image`, `sale_price`, `stock_quantity`, `category_id`, `brand_id`) VALUES
(1, 'Samsung Galaxy S23 Ultra 256GB', 'Thoả sức chụp ảnh, quay video chuyên nghiệp - Camera đến 200MP, chế độ chụp đêm cải tiến, bộ xử lí ảnh thông minh\r\nChiến game bùng nổ - chip Snapdragon 8 Gen 2 8 nhân tăng tốc độ xử lí, màn hình 120Hz, pin 5.000mAh\r\nNâng cao hiệu suất làm việc với Siêu bút S Pen tích hợp, dễ dàng đánh dấu sự kiện từ hình ảnh hoặc video\r\nThiết kế bền bỉ, thân thiện - Màu sắc lấy cảm hứng từ thiên nhiên, chất liệu kính và lớp phim phủ PET tái chế', 31490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/s/a/samsung-galaxy-s23-ultra.png', 22890000.00, 50, 1, 2),
(2, 'iPhone 15 Pro Max 256GB | Chính hãng VN/A', 'Thiết kế khung viền từ titan chuẩn hàng không vũ trụ - Cực nhẹ, bền cùng viền cạnh mỏng cầm nắm thoải mái\r\nHiệu năng Pro chiến game thả ga - Chip A17 Pro mang lại hiệu năng đồ họa vô cùng sống động và chân thực\r\nThoả sức sáng tạo và quay phim chuyên nghiệp - Cụm 3 camera sau đến 48MP và nhiều chế độ tiên tiến\r\nNút tác vụ mới giúp nhanh chóng kích hoạt tính năng yêu thích của bạn', 34990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-pro-max_3.png', 32990000.00, 100, 1, 1),
(3, 'Xiaomi 13T Pro 5G (12GB - 512GB)', 'Nhiếp ảnh chuyên ngiệp, nắm giữ tuyệt tác trong tầm tay - Cụm camera đến, ống kính Leica với 2 phong cách ảnh\r\nHiệu năng bất chấp mọi tác vụ - Bộ vi xử lý Dimensity 9200+ Ultra mạnh mẽ cùng RAM 12GB cho đa nhiệm mượt mà\r\nNăng lượng bất tận cả ngày - Pin 5000mAh cùng sạc nhanh 120W, sạc đầy chỉ trong 19 phút\r\nMàn hình sáng rực rỡ, cuộn lướt thật mượt mà - Màn hình 144hz cùng công nghệ AMOLED CrystalRes', 16990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi-13-pro-thumb-xanh-la9.jpg', 15490000.00, 30, 1, 3),
(4, 'Xiaomi Redmi 13C 6GB 128GB', 'Chipset Helio G85 cho hiệu năng ổn định - Hoạt động mượt mà cho các tác vụ cơ bản hàng ngày.\r\nHệ thống camera kép mạnh mẽ - Cải thiện độ chi tiết và độ sắc nét cho từng bức ảnh.\r\nDung lượng pin khổng lồ lên đến 5000 mAh - Giúp bạn thoải mái trải nghiệm nhiều giờ sử dụng liên tục.\r\nMàn hình lớn kích thước 6.71 inch - Mang lại trải nghiệm xem ấn tượng.', 3490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi-redmi-13c_21__1.png', 3190000.00, 200, 1, 3),
(5, 'Apple MacBook Air M1 256GB 2020 I Chính hãng Apple Việt Nam', 'Phù hợp cho lập trình viên, thiết kế đồ họa 2D, dân văn phòng\r\nHiệu năng vượt trội - Cân mọi tác vụ từ word, exel đến chỉnh sửa ảnh trên các phần mềm như AI, PTS\r\nĐa nhiệm mượt mà - Ram 8GB cho phép vừa mở trình duyệt để tra cứu thông tin, vừa làm việc trên phần mềm\r\nTrang bị SSD 256GB - Cho thời gian khởi động nhanh chóng, tối ưu hoá thời gian load ứng dụng\r\nChất lượng hình ảnh sắc nét - Màn hình Retina cao cấp cùng công nghệ TrueTone cân bằng màu sắc\r\nThiết kế sang trọng - Nặng chỉ 1.29KG, độ dày 16.1mm. Tiện lợi mang theo mọi nơi', 22990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/a/i/air_m2.png', 19190000.00, 50, 2, 8),
(6, 'Apple Macbook Air M2 2022 8GB 256GB I Chính hãng Apple Việt Nam', 'Thiết kế sang trọng, lịch lãm - siêu mỏng 11.3mm, chỉ 1.24kg\r\nHiệu năng hàng đầu - Chip Apple M2, 8 nhân GPU, hỗ trợ tốt các phần mềm như Word, Axel, Adoble Premier\r\nĐa nhiệm mượt mà - Ram 8GB, SSD 256GB cho phép vừa làm việc, vừa nghe nhạc\r\nMàn hình sắc nét - Độ phân giải 2560 x 1664 cùng độ sáng 500 nits\r\nÂm thanh sống động - 4 loa tramg bị công nghệ Dolby Atmos và âm thanh đa chiều', 32990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/m/a/macbook_air_m22.png', 26490000.00, 50, 2, 8),
(7, 'Laptop Asus TUF GAMING F15 FX506HF-HN014W', 'Thiết kế laptop sang trọng thích hợp giúp bạn bỏ vào balo mang theo bên mình\r\nCPU Intel Core i5-11400H cho phép bạn thỏa thích chiến các tựa game nặng\r\nỔ cứng SSD 512GB giúp bạn lưu trữ nhiều thông tin, dữ liệu mà không cần sao chép quá USB\r\nMàn hình 15.6 inch cùng tính năng chống lóa sẽ bảo vệ mắt của bạn trong quá trình chơi game\r\nTrang bị nhiều cổng kết nối giúp quá trình nhận và chia sẻ dữ liệu trở nên dễ dàng, thuận tiện', 21990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-asus-tuf-gaming-f15-fx506hf-hn014w.png', 16190000.00, 50, 2, 9),
(8, 'Apple Macbook Pro 13 M2 2022 8GB 256GB I Chính hãng Apple Việt Nam', 'Chip M2 mới nhất - hiệu năng hàng đầu, thoải mái sử dụng các phần mềm đồ hoạ hay render video\r\nMàn hình Retina - màu sắc hiển thị sống động tạo ra không gian giải trí đỉnh cao\r\nThiết kế sang trọng - Trọng lượng máy chỉ 1.4kg, độ dày chỉ 15.6mm giúp bạn dễ dàng mang theo\r\nÂm thanh chân thật - Tích hợp loa kép cùng công nghệ Dolby Atmos mang đến chất lượng âm thanh tuyệt vời', 35990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/p/r/pro-m2.jpg', 30190000.00, 50, 2, 8),
(9, 'Laptop Asus VivoBook Go 14 E1404FA-NK177W', 'Sở hữu thiết kế sang trọng, trọng lượng nhẹ, dễ dàng mang theo bên mình\r\nRAM 16GB giúp bạn dễ dàng các tab mà không lo lag máy\r\nỞ cứng SSD 512GB giúp bạn có không gian lưu trữ lớn\r\nSở hữu cảm biến vân tay giúp thao tác mở màn hình thuận tiện hơn', 14490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_-_2023-06-08t005130.908.png', 12790000.00, 50, 2, 9),
(10, 'Laptop MSI Gaming Bravo 15 B7ED-010VN', 'Chip AMD Ryzen 5 - 7535HS xử lý nhanh chóng các tác vụ như văn phòng, đồ hoạ, coding hay chiến game\r\nGPU AMD Radeon RX 6550M 4 GB cho đồ hoạ cao, mượt mà và ổn định ở các pha giao tranh\r\nRAM 16 GB cho phép máy vận hành mượt mà, mở cùng lúc nhiều tác vụ\r\nỔ cứng 512 GB hỗ trợ khởi động laptop, truy xuất dữ liệu nhanh hơn\r\nTần số quét 144 Hz giúp hình ảnh không bị rách hay nhoè mờ khi chơi game', 18490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/m/s/msi_1.png', 15990000.00, 50, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(3) NOT NULL,
  `link` varchar(2550) NOT NULL,
  `image` varchar(2550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `link`, `image`) VALUES
(1, 'https://cellphones.com.vn/mobile/apple/iphone-15.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:80/plain/https://dashboard.cellphones.com.vn/storage/D85D6200-610C-44E0-8932-35C3FE99E741.jpeg'),
(2, 'https://cellphones.com.vn/samsung-galaxy-a15.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:80/plain/https://dashboard.cellphones.com.vn/storage/a15-a25-sliding-k-sim.png'),
(3, 'https://cellphones.com.vn/laptop/mac/macbook-pro/macbook-pro-2023.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:80/plain/https://dashboard.cellphones.com.vn/storage/57D9D76F-09FB-49A5-A847-E7C42B153BA2.jpeg'),
(4, 'https://cellphones.com.vn/mobile/asus.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:80/plain/https://dashboard.cellphones.com.vn/storage/5725_sliding-rogphone11.jpg'),
(5, 'https://cellphones.com.vn/infinix-hot-30.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:80/plain/https://dashboard.cellphones.com.vn/storage/infinix-sliding-th122.jpg'),
(6, 'https://cellphones.com.vn/laptop-asus-vivobook-go-14-e1404fa-nk177w.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:80/plain/https://dashboard.cellphones.com.vn/storage/vivobook%20go%2014.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `image` varchar(20) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` bit(1) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`, `image`, `name`, `date_of_birth`, `gender`, `address`, `phone_number`) VALUES
(1, 'hungngu', '123', '2024-01-07 10:55:38', '', NULL, NULL, b'0', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `FK_category` (`category`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `fk_cart_id` (`cart_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `FK_Brand` (`brand_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `FK_category` FOREIGN KEY (`category`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `fk_cart_id` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
