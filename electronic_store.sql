-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2024 at 02:10 PM
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
(2, 'https://cellphones.com.vn/ipad-10-2-inch-2021.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:10/plain/https://dashboard.cellphones.com.vn/storage/ipad-gen9-right-th1.jpg'),
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
(14, 'Dell', 2, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/Dell.png', 'dell'),
(15, 'Dell', 8, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/Dell.png', 'man-hinh-dell'),
(16, 'Xiaomi', 8, 'https://img.hungmobile.vn/hungmobile-vn/2020/08/w150/logo-dm-xiaomi.jpg', 'man-hinh-xiaomi'),
(17, 'MSI', 8, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/MSI.png', 'man-hinh-msi'),
(18, 'Asus', 8, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/Asus.png', 'man-hinh-asus'),
(19, 'LG', 8, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:50/q:30/plain/https://cellphones.com.vn/media/wysiwyg/Icon/brand_logo/Asus.png', 'man-hinh-lg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7);

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
(76, 2, 7, 1),
(77, 2, 6, 3),
(81, 4, 5, 8),
(85, 5, 3, 1);

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
  `comment_id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `comment_parent` int(3) NOT NULL DEFAULT -1,
  `content` varchar(2550) NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `product_id`, `user_id`, `comment_parent`, `content`, `comment_date`) VALUES
(1, 1, 1, -1, 'Xin chao moi nguoi', '2024-01-14 10:37:06'),
(2, 11, 1, 1, 'hay', '2024-01-14 17:17:35'),
(3, 11, 1, 0, 'hay', '2024-01-14 17:17:49'),
(4, 11, 1, -1, 'du ma dảk', '2024-01-14 12:22:08'),
(5, 11, 1, 4, 'hi hi', '2024-01-14 12:22:59'),
(6, 11, 3, 4, 'qua don dau', '2024-01-14 12:46:23'),
(7, 11, 5, -1, 'Aoz', '2024-01-14 12:46:54'),
(8, 11, 4, -1, 'Ác', '2024-01-14 12:49:17'),
(10, 11, 1, 4, 'haha', '2024-01-14 20:18:41'),
(11, 11, 1, -1, 'alo', '2024-01-14 20:18:53'),
(12, 1, 1, -1, 'mua di', '2024-01-14 20:46:31'),
(13, 1, 1, 1, 'gg', '2024-01-14 20:46:39'),
(14, 2, 1, -1, 'muc di', '2024-01-14 20:46:53'),
(15, 2, 1, 14, 'gg', '2024-01-14 20:46:59'),
(16, 11, 3, -1, 'Sản phẩm tốt , tôi đánh giá 10/10 , nên mua và trải nghiệm', '2024-01-14 22:40:59'),
(17, 1, 3, -1, 'tôi có 30tr điểm sức mạnh trong ride of kingdom', '2024-01-14 22:42:13'),
(18, 2, 5, -1, 'đ!t me ao that day , tu be den gio lan dau mua cai iphone the nay ', '2024-01-14 22:43:13'),
(19, 1, 1, 17, 'ác', '2024-01-14 22:44:29'),
(20, 1, 7, 17, 'Chao Dung Bui', '2024-01-14 22:47:53'),
(21, 1, 1, 17, 'ai day', '2024-01-14 22:49:12'),
(22, 1, 3, -1, '', '2024-01-14 22:53:14'),
(23, 1, 3, 22, 'thèm pịa quá\r\n', '2024-01-14 22:53:35'),
(24, 1, 3, 22, 'tôi đề xuất thêm voucher giảm giá', '2024-01-14 22:54:46'),
(26, 1, 5, 17, 'chao sonmatlon', '2024-01-14 22:57:30'),
(27, 2, 1, 18, 'chao bui van dung, ban can giup gi', '2024-01-14 22:58:11'),
(28, 11, 1, 16, 'nice', '2024-01-14 22:59:32'),
(29, 1, 1, 22, 'mai web sap roi giam gia chi', '2024-01-14 23:00:36'),
(30, 15, 1, -1, 'Xin chao', '2024-01-14 23:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `payment_method` int(3) NOT NULL,
  `shipping_address` varchar(2550) NOT NULL,
  `order_status` int(3) NOT NULL,
  `order_date` datetime NOT NULL,
  `total_cost` decimal(13,2) NOT NULL,
  `finish_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `payment_method`, `shipping_address`, `order_status`, `order_date`, `total_cost`, `finish_date`) VALUES
(28, 1, 0, 'Xuan Chieng', 1, '2024-01-12 09:57:39', 22920000.00, NULL),
(29, 1, 0, 'Xuan Chieng', 2, '2024-01-12 10:14:41', 3220000.00, NULL),
(30, 1, 0, 'Xuan Chieng', 3, '2024-01-12 10:31:39', 15520000.00, NULL),
(31, 2, 0, '', 0, '2024-01-12 10:41:04', 99000000.00, NULL),
(32, 1, 0, 'Xuan Chieng', 4, '2024-01-12 15:16:51', 26110000.00, NULL),
(33, 1, 0, 'Xuan Chieng', -1, '2024-01-12 15:25:07', 22920000.00, NULL),
(34, 3, 0, '', 0, '2024-01-12 23:08:27', 33020000.00, NULL),
(35, 4, 0, '', 0, '2024-01-12 23:10:49', 19220000.00, NULL),
(36, 4, 0, '', 0, '2024-01-12 23:11:11', 153550000.00, NULL),
(37, 1, 0, 'Khu 2 - Hoàng Cương - Thanh Ba - Phú Thọ', 0, '2024-01-13 22:45:11', 26520000.00, NULL),
(38, 1, 0, 'Khu 2 - Hoàng Cương - Thanh Ba - Phú Thọ', 0, '2024-01-14 22:13:23', 22920000.00, NULL),
(39, 4, 0, 'Hải Phòng', 4, '2024-01-14 22:42:01', 22920000.00, NULL),
(40, 5, 0, 'ngân cầu-quyết tiến-tiên lãng- hải phòng', 4, '2024-01-14 22:42:09', 33020000.00, NULL),
(41, 5, 0, 'ngân cầu-quyết tiến-tiên lãng- hải phòng', 4, '2024-01-14 22:44:03', 15520000.00, NULL),
(42, 5, 0, 'ngân cầu-quyết tiến-tiên lãng- hải phòng', 4, '2024-01-14 22:55:18', 15520000.00, NULL),
(43, 1, 0, 'Khu 2 - Hoàng Cương - Thanh Ba - Phú Thọ', 0, '2024-01-14 23:39:36', 22920000.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(3) NOT NULL,
  `order_id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `quantity` int(3) NOT NULL,
  `price_at_purchase` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price_at_purchase`) VALUES
(27, 28, 1, 1, 22890000.00),
(28, 29, 4, 1, 3190000.00),
(29, 30, 3, 1, 15490000.00),
(30, 31, 2, 3, 32990000.00),
(31, 32, 1, 1, 22890000.00),
(32, 32, 4, 1, 3190000.00),
(33, 33, 1, 1, 22890000.00),
(34, 34, 2, 1, 32990000.00),
(35, 35, 5, 1, 19190000.00),
(36, 36, 5, 8, 19190000.00),
(37, 37, 6, 1, 26490000.00),
(38, 38, 1, 1, 22890000.00),
(39, 39, 1, 1, 22890000.00),
(40, 40, 2, 1, 32990000.00),
(41, 41, 3, 1, 15490000.00),
(42, 42, 3, 1, 15490000.00),
(43, 43, 1, 1, 22890000.00);

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
(10, 'Laptop MSI Gaming Bravo 15 B7ED-010VN', 'Chip AMD Ryzen 5 - 7535HS xử lý nhanh chóng các tác vụ như văn phòng, đồ hoạ, coding hay chiến game\r\nGPU AMD Radeon RX 6550M 4 GB cho đồ hoạ cao, mượt mà và ổn định ở các pha giao tranh\r\nRAM 16 GB cho phép máy vận hành mượt mà, mở cùng lúc nhiều tác vụ\r\nỔ cứng 512 GB hỗ trợ khởi động laptop, truy xuất dữ liệu nhanh hơn\r\nTần số quét 144 Hz giúp hình ảnh không bị rách hay nhoè mờ khi chơi game', 18490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/m/s/msi_1.png', 15990000.00, 50, 2, 10),
(11, 'Man hinh vi tinh dell 17inh xài ok', NULL, 300000.00, 'https://cdn.chotot.com/8AcqMiKhxDx1tGR3oubv13kU92EzvUqHMFPnqEDCWZc/preset:view/plain/b6552ebd5eb9d27fb7a806a56d0f8994-2859769504614131802.jpg', 200000.00, 50, 8, 15),
(12, 'Màn hình cong Ultrawide Xiaomi Curved Gaming 34 inch', 'Màn hình 34 inch tỷ lệ 21:9\r\nĐộ phân giải 3440x1440\r\nTần số quét 144Hz\r\nĐộ phủ màu 121% sRGB\r\nCông nghệ AMD FreeSync\r\nThiết kế màn hình cong siêu rộng', 12990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/2/_/2_65_1.png', 6690000.00, 50, 8, 16),
(13, 'Màn hình MSI Pro MP223 22 inch', 'Kích thước màn hình 22 inch FHD 1920 x 1080 phục vụ tốt nhu cầu cơ bản\r\nTốc độ phản hồi 1ms, giúp bạn phản xạ nhanh trước đối thủ khi chơi game\r\nTrang bị tần số quét 100Hz, hình ảnh được tối ưu và chuyển động liền mạch\r\nĐộ phủ màu lên đến 99% sRGB cho khả năng tái hiện màu sắc chính xác', 2090000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/m/a/man-hinh-msi-pro-mp223-22-inch.png', 1790000.00, 50, 8, 17),
(14, 'Màn hình mở rộng ASUS MB166C 16 inch', 'Màn hình IPS 15.6 inch 1920 x 1080 với thiết kế siêu mỏng\r\nĐầu nối USB-C thuận tiện kết nối với màn hình khác, laptop\r\nTrang bị công nghệ chống nhấp nháy, giảm ánh sáng xanh\r\nCông nghệ DisplayWidget giúp tự động chuyển ngang dọc', 4990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/m/a/man-hinh-mo-rong-asus-mb166c-16-inch.png', 3890000.00, 50, 8, 18),
(15, 'Màn hình LG UltraWide 29WQ600 29 inch', 'Màn hình UltraWide với kích thước 29 inch, trang bị độ phân giải 2560 x 1080\r\nCông nghệ HDR10 cho giúp bạn thưởng thức nội dung với màu sắc ấn tượng\r\nTấm nên IPS và sRGB 99% hiển thị chính xác màu sắc và cho góc nhìn rộng\r\nMàn hình hỗ trợ cổng ÚBB-C với chế độ thấy thế được cho cổng Display Port\r\nHỗ trợ công nghệ AMD FreeSync giảm thiểu xé hình, chuyển động liền mạch', 6490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/g/r/group_258_5.png', 5090000.00, 50, 8, 19);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(3) NOT NULL,
  `order_id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `star` int(3) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `order_id`, `product_id`, `user_id`, `star`, `create_date`) VALUES
(14, 32, 1, 1, 5, '2024-01-14 23:40:53'),
(15, 32, 4, 1, 5, '2024-01-14 23:40:53');

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
(1, 'https://cellphones.com.vn/iphone-15-pro-max.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:80/plain/https://dashboard.cellphones.com.vn/storage/sliding-home-iphone15.jpg'),
(2, 'https://cellphones.com.vn/samsung-galaxy-a15.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:80/plain/https://dashboard.cellphones.com.vn/storage/sliding-a15a25-new-t1.png'),
(3, 'https://cellphones.com.vn/laptop/mac/macbook-pro/macbook-pro-2023.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:80/plain/https://dashboard.cellphones.com.vn/storage/57D9D76F-09FB-49A5-A847-E7C42B153BA2.jpeg'),
(4, 'https://cellphones.com.vn/tai-nghe-khong-day-sony-inzone-buds.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:80/plain/https://dashboard.cellphones.com.vn/storage/tai-nghe-khong-day-sony-inzone-buds-01-2024.png'),
(5, 'https://cellphones.com.vn/samsung-galaxy-s24-ultra.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:80/plain/https://dashboard.cellphones.com.vn/storage/sliding-dkinhantin-1.png'),
(6, 'https://cellphones.com.vn/xiaomi-redmi-note-13.html', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:80/plain/https://dashboard.cellphones.com.vn/storage/sliding-note13-dattruoc-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(1) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`, `image`, `name`, `date_of_birth`, `gender`, `address`, `phone_number`) VALUES
(1, 'hungngu', '123', '2024-01-07 10:55:38', 'z5064701836265_550073b009efdc134edb8ca05b168e59.jpg', 'Hung Shadow GG', '2003-02-13', '0', 'Khu 2 - Hoàng Cương - Thanh Ba - Phú Thọ', '098765432'),
(2, 'hungngu1', '123', '2024-01-08 19:41:16', '', NULL, NULL, '0', '', ''),
(3, 'hongdanghpv123', 'dang2003', '2024-01-12 23:07:58', 'cu-thi-tra-khoe-nhan-sac-va-dien-xuat-ngay-cang-thang-hang-3a217ebc.jpg', 'Đăng', '0000-00-00', '0', 'hai phong', '0372893924'),
(4, 'phamducviet', '123', '2024-01-12 23:09:54', '', 'Phạm Đức Việt ', '2002-03-04', '0', 'Hải Phòng', '0869282369'),
(5, 'dungbui', '123456', '2024-01-12 23:13:42', 'Panda Milk Tea (2).png', 'bùi văn dũng', '2003-12-06', '0', 'ngân cầu-quyết tiến-tiên lãng- hải phòng', '0123456789'),
(6, 'test', '123', '2024-01-14 20:44:36', '', NULL, NULL, '', '', ''),
(7, 'Sonle', '11', '2024-01-14 22:46:56', '', 'Le Dac _Son', '2024-01-15', '0', 'J', '09827272');

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
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `fk_order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `FK_Brand` (`brand_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

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
  MODIFY `brand_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

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
