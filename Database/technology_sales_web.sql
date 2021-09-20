-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 24, 2021 lúc 10:30 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `technology_sales_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `Id` int(11) NOT NULL,
  `BrandName` varchar(50) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`Id`, `BrandName`, `Description`) VALUES
(1, 'MSI', ''),
(2, 'DELL', ''),
(3, 'ASUS', ''),
(4, 'INTEL', ''),
(5, 'ACER', ''),
(6, 'LENOVO', ''),
(7, 'HP', ''),
(8, 'GIGABYTE', ''),
(9, 'HCK', ''),
(10, 'LG', ''),
(11, 'SAMSUNG', ''),
(12, 'COOLER MASTER', ''),
(13, 'RAIZER', ''),
(14, 'TP-LINK', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`Id`, `Name`, `Description`) VALUES
(1, 'Máy Tính Xách Tay', ''),
(8, 'PC, AIO, Server', ''),
(9, 'Màn hình máy tính', ''),
(10, 'Linh kiện máy tính', ''),
(11, 'Chuột', ''),
(12, 'Bàn phím', ''),
(13, 'Thiết bị mạng', ''),
(14, 'Loa, Tai nghe, Audio', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `Id` int(11) NOT NULL,
  `CustomerName` varchar(100) NOT NULL,
  `PhoneNumber` varchar(50) DEFAULT NULL,
  `Address` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`Id`, `CustomerName`, `PhoneNumber`, `Address`, `Email`, `Description`) VALUES
(23, 'nguyen huu tai', '0914414013', 'Đà Nẵng', 'huutai@gmail.com', ''),
(24, 'Trần Nguyên Thảo', '0868289336', 'Quảng Bình', 'thaobae@gmail.com', ''),
(25, 'Nguyễn Hữu Danh', '0984566483', 'Quảng Ngãi', 'huuhuudanhnguyen@gmail.com', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `Id` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`Id`, `OrderId`, `ProductId`, `Quantity`) VALUES
(12, 11, 15, '2.00'),
(13, 12, 21, '2.00'),
(14, 13, 15, '3.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `StatusOrder` varchar(50) NOT NULL,
  `ShippingAddress` text NOT NULL,
  `ShippingCity` varchar(50) NOT NULL,
  `PaymentType` varchar(20) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `ShippingType` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`Id`, `CreatedDate`, `StatusOrder`, `ShippingAddress`, `ShippingCity`, `PaymentType`, `CustomerId`, `UserId`, `ShippingType`) VALUES
(11, '2021-08-09 00:00:00', 'Đang xử lý', 'Hà Huy Tập', '2', 'Tiền mặt', 23, NULL, 'Giao hàng tận nơi'),
(12, '2021-08-09 00:00:00', 'Đang xử lý', 'Hà Huy Tập', '3', 'Tiền mặt', 24, NULL, 'Giao hàng tận nơi'),
(13, '2021-08-09 00:00:00', 'Đang xử lý', 'tran cao van', '2', 'Tiền mặt', 25, NULL, 'Giao hàng tận nơi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Price` decimal(18,2) NOT NULL,
  `Dicount` decimal(18,2) NOT NULL,
  `ProductImage` varchar(255) NOT NULL,
  `BrandId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`Id`, `ProductName`, `Price`, `Dicount`, `ProductImage`, `BrandId`, `CategoryId`, `Description`) VALUES
(14, 'LAPTOP DELL XPS 13 9310', '59000000.00', '0.00', '../Assets/img/laptop2.jpg', 2, 1, '- CPU: Intel Core i7-1165G7 <br> - RAM: 16GB LPDDR4/4267MHz <br> - Ổ cứng: 512GB M.2 PCIe NVMe'),
(15, 'Laptop MSI Summit E13 Flip Evo', '39990000.00', '0.00', '../Assets/img/laptop3.jpg', 1, 1, '- CPU: Intel Core i7 1185G7 <br> - RAM: 16GB <br> - VGA: Onboard'),
(16, 'LAPTOP MSI PULSE GL66 11UDK 255VN', '33450000.00', '0.00', '../Assets/img/laptop4.jpg', 1, 1, '- CPU: Intel Core i7-11800H <br> - Ram: 16GB (8GB x 2) DDR4 3200MHz <br> - Ổ cứng: 512GB NVMe PCIe Gen3x4 SSD'),
(17, 'LAPTOP LENOVO IDEAPAD SLIM 3 14ALC6', '14090000.00', '0.00', '../Assets/img/laptop6.jpg', 6, 1, '- CPU: Ryzen 5-5500U <br> - RAM: 16GB LPDDR4/4267MHz <br> - Ổ cứng: 512GB M.2 PCIe NVMe'),
(18, 'Dell LAPTOP DELL GAMING G5 5500', '28990000.00', '0.00', '../Assets/img/laptop5.png', 2, 1, '- CPU: Intel Core i7-10750H <br> - RAM: 8GB DDR4/2933MHz <br> - Ổ cứng: 512GB SSD M.2 PCIe'),
(19, 'PC DELL OPTIPLEX 3080SFF ', '9250000.00', '0.00', '../Assets/img/pc1.jpg', 2, 8, '- CPU Intel Core i3-10100 <br> - Ram 8GB DDR4 <br> - HDD 1TB SATA 3 7200 RPM'),
(20, 'MÀN HÌNH GAMING 2K 27', '11490000.00', '0.00', '../Assets/img/manhinh6.jpg', 10, 9, '- Kích thước: 27 inch <br> - Tấm nền: Nano IPS <br> - Độ phân giải: QHD (2560 x 1440)'),
(21, 'BO MẠCH CHỦ ASUS PRIME Z490-A, LGA 1200, AURA SYNC', '6890000.00', '0.00', '../Assets/img/bomach1.jpg', 3, 10, '- Hỗ trợ CPU Intel thế hệ thứ 10 <br> - Chipset Intel Z490 <br> - 4 khe DDR4 (tối đa 128GB)'),
(23, 'LAPTOP ASUS ROG STRIX G15 G513QE-HN010T', '30990000.00', '0.00', '../Assets/img/laptop7.jpg', 3, 1, '- CPU: AMD Ryzen 7-5800H <br> - Ram: 16GB DDR4 3200MHz <br> - Lưu trữ: 512GB M.2 NVMe PCIe 3.0 SSD'),
(25, 'PC HP PRO 280SFF G5', '12590000.00', '0.00', '../Assets/img/PC_HP3.png', 7, 8, '- Intel Core i5 10400 <br> - DDR4 8GB Bus 3200 <br>(2 slot, Max 32GB)'),
(26, 'PC HP PRO 280SFF G5', '9190000.00', '0.00', '../Assets/img/pchp3.png', 7, 8, '- Intel Core i3-10100 <br> - (3.6GHz Upto 4.30GHz, 4C/8T, 6MB) <br> - DDR4 4GB (2 slot, Max 32GB)'),
(27, 'PC DELL OPTIPLEX 3080SFF', '12190000.00', '0.00', '../Assets/img/pc1.jpg', 2, 8, '- Intel Core i5-10500 <br> - RAM 4GB 2666Mhz <br> - HDD 1TB 7200rpm'),
(28, 'PC DELL OPTIPLEX 3080MT', '9450000.00', '0.00', '../Assets/img/pc8.jpg', 2, 8, '- Intel Core i3-10100 <br> - RAM 4GB 2666Mhz <br> - SSD 256GB Nvme'),
(29, 'PC HP PAVILION TP01-1113D', '12590000.00', '0.00', '../Assets/img/PC_HP2.png', 7, 8, '- Intel Core i5 10400 <br> - (2.9Ghz/4.3Ghz, 6C/12T, 12MB cache) <br> - RAM 8GB DDR4-2666Mhz '),
(30, 'MÀN HÌNH DELL S2421HN 23.8 INCH, FULL HD, IPS, 75HZ, 4MS', '3990000.00', '0.00', '../Assets/img/manhinh1.jpg', 2, 9, '- Kích thước: 23.8 inch <br> - Độ phân giải: Full HD <br> - Tấm nền: IPS, 75Hz.'),
(31, 'MÀN HÌNH 23.8 DELL S2421H, TẤM NỀN IPS, FULL HD, 75HZ, 1MS', '4090000.00', '0.00', '../Assets/img/manhinhdell1.jpg', 2, 9, '- Kích thước: 23.8 \" <br> - Độ phân giải: Full HD <br> - Tấm nền: IPS. Tốc độ làm mới: 75Hz'),
(32, 'MÀN HÌNH 4K LG 27\" 27UP850-W UHD,IPS,60HZ,5MS,HDMI,DP,USBC', '12590000.00', '0.00', '../Assets/img/manhinh7.jpg', 10, 9, '- Màn hình 27 inch UHD 4K IPS <br> - DCI-P3 95% (Thông thường) <br> - VESA DisplayHDR™ 400'),
(33, 'MÀN HÌNH CONG GAMING 240HZ SAMSUNG LC27RG50FQE 27', '5920000.00', '0.00', '../Assets/img/manhinh5.jpg', 11, 9, '- Tầm nền VA, Độ cong 1500R cho đôi mắt thoải mái <br> -  Độ phân giải 1,920 x 1,080'),
(34, 'MÀN HÌNH 4K 28 INCH SAMSUNG LU28R550QE, TẤM NỀN IPS, UHD', '9290000.00', '0.00', '../Assets/img/manhinh4.png', 11, 9, '- Kích thước 28 inhc  <br> - Tấm nền IPS <br> - Độ phân giải UHD'),
(35, 'CARD MÀN HÌNH ASUS (DUAL-RTX2060-6G-EVO) 6GB, GDR6', '14200000.00', '0.00', '../Assets/img/vga1.jpg', 3, 10, '- Nhân GPU: RTX 2060 <br> - Số nhân Cuda: 1920 <br> - Xung nhịp tối đa: GPU Boost Clock'),
(36, 'CARD MÀN HÌNH ASUS (PH-GTX1660-O6G) GTX1660, 6GB, OC', '11500000.00', '0.00', '../Assets/img/vga1.jpg', 3, 10, '- Dung lượng bộ nhớ: 6GB GDDR5 <br> - OC Mode: GPU Boost Clock: 1815 MHz <br> GPU Base Clock: 1560 MHz'),
(37, 'TẢN NHIỆT CPU AIR COOLING COOLER MASTER HYPER 212', '850000.00', '0.00', '../Assets/img/tannhiet1.jpg', 12, 10, '- Fan Size: 120mm <br> - RPM: 650 - 2,000RPM (PWM) ± 10% <br> - Air Flow: 59 CFM (Max)'),
(38, 'BO MẠCH CHỦ ASUS PRIME Z490M-PLUS, LGA 1200, 4 KHE', '3750000.00', '0.00', '../Assets/img/vga3.jpg', 3, 10, '- Hỗ trợ cpu intel thế hệ 10 <br> - Chipset intel z490 <br> - 4 khe DDR4, tối đa 128GB'),
(39, 'VỎ CASE MÁY TÍNH MSI MAG VAMPIRIC 010M MID TOWER', '1550000.00', '0.00', '../Assets/img/case1.jpg', 1, 10, '- 1 mặt kính cường lực hông <br> - Có sẵn Led Strip Led RGB trước <br> - Có săn 1 Fan 12cm Led RGB sau'),
(40, 'CHUỘT GAMING SIÊU NHẸ RAZER VIPER MINI ', '950000.00', '0.00', '../Assets/img/mouse2.jpg', 13, 11, '- Mắt cảm biến Optical sensor <br> - Độ phân giải 8500 DPI <br> - Switch bấm quang học của Razer độ bền'),
(41, 'TAY CẦM CHƠI GAME KHÔNG DÂY MSI FORCE GC30', '980000.00', '0.00', '../Assets/img/ps42.png', 1, 11, '- Kết nối không dây  <br> - Hỗ trợ PC, Androil và các máy chơi game thông dụng <br>khác'),
(42, 'CHUỘT GAMING CÓ DÂY ASUS ROG STRIX IMPACT II RGB', '990000.00', '0.00', '../Assets/img/mouse1.jpg', 3, 11, '- Kết cấu nhẹ giúp Game thủ thoải mái khi sử dụng. <br> - Nút bấm siêu nhanh <br> - Thiết kế nhỏ gọn, hiện đại vừa vặn'),
(43, 'CHUỘT GAMING RAZER VIPER AMBIDEXTROUS', '2190000.00', '0.00', '../Assets/img/mouse2.jpg', 13, 11, '- Chuột chơi game Razer Viper Gaming <br> - Mắt cảm biến 5G Advanced Optical <br> Sensor hiệu năng cao cấp <br> - Nút bấm siêu nhanh'),
(44, 'CHUỘT KHÔNG DÂY TARGUS AMW600AP-52 WIRELESS', '190000.00', '0.00', '../Assets/img/mouse1.jpg', 2, 11, '- Độ phân giải: 1600 DPI <br> - Giao tiếp: Wireless <br> - Pin: 1 pin kiềm AA Energizer MAX'),
(46, 'BÀN PHÍM CÓ DÂY VĂN PHÒNG CHUYÊN NGHIỆP NEWMEN E400', '190000.00', '0.00', '../Assets/img/banphim1.png', 3, 12, '- Thiết kế Fullsize tiêu chuẩn, nút cao <br> Phấm bấm cao su với độ bền lên đến 20 <br>triệu lần nhấn'),
(47, 'BÀN PHÍM CƠ ASUS ROG STRIX FLARE RGB CHERRY RED SWITCH', '3750000.00', '0.00', '../Assets/img/banphim2A.jpg', 3, 12, '- Các switch phím cơ Cherry MX RGB <br> - Biểu tượng tùy chỉnh được chiếu sáng <br> - Các bàn phím đa phương tiện chuyên'),
(48, 'BÀN PHÍM CƠ ASUS ROG STRIX FLARE RGB CHERRY BLUE', '3750000.00', '0.00', '../Assets/img/banphim3.jpg', 3, 12, '- Các switch phím cơ Cherry MX RGB <br> - Biểu tượng tùy chỉnh được chiếu sáng <br> - Các bàn phím đa phương tiện chuyên'),
(49, 'BỘ PHÁT WIFI ASUS RT-AX86U GUNDAM EDITION AX5700', '6990000.00', '0.00', '../Assets/img/router2.jpg', 3, 13, '- WiFi 6 thế hệ mới <br> - Tốc độ có dây và không dây thực 2 Gbps <br> - Kết nối mạng 2 Gbps tổng hợp, cổng 2,5'),
(50, 'BỘ MESH WIFI ASUS XT8 WIFI 6 (CHUẨN AX6600, 3 BĂNG TẦN', '11890000.00', '0.00', '../Assets/img/router3.jpg', 3, 13, '- Hệ thống WiFi băng tần ba băng tần với vị <br> trí ăng-ten độc đáo mang WiFi mạnh đến <br> mọi ngóc ngách trong nhà bạn, cung cấp'),
(51, 'BỘ PHÁT WIFI KHÔNG DÂY TP-LINK BĂNG TẦN KÉP AC1350', '1490000.00', '0.00', '../Assets/img/router4.png', 3, 13, 'Quyền kiểm soát của phụ huynh: quản lý <br> thời gian và phương thức các thiết bị được <br> kết nối có thể truy cập vào mạng internet'),
(52, 'ROUTER WIFI ASUS RT-AX56U AX1800', '2990000.00', '0.00', '../Assets/img/router5.jpg', 3, 13, '- ASUS RT-AX56U Wifi AX1800 2 băng tần, <br> Wifi 6 (802.11ax), AiMesh 360 WIFI Mesh, <br> AiProtection, USB 3.1 2 băng tần chuẩn'),
(53, 'LOA DI ĐỘNG CREATIVE METALLIX PLUS, 20W, KẾT NỐI', '770000.00', '0.00', '../Assets/img/loa3.jpg', 1, 14, '- Loa Bluetooth di động nhỏ gọn, mạnh mẽ <br> - Thời lượng pin siêu khủng lên đến 24 giờ <br> - Kết nối: Bluetooth + AUX 3.5mm, kàm cáp'),
(54, 'LOA THANH BOSE SMART SOUNDBAR 300', '12290000.00', '0.00', '../Assets/img/loa1.jpg', 3, 14, '- Âm thanh đầy đặn, hôi thoại rõ ràng, sâu trầm. <br> - Kết nối Wifi, Bluetooth, Apple Airplay 2 và <br> truyền phát không dây cũng như chất lượng âm thanh'),
(55, 'JBL PARTYBOX 310 CHÍNH HÃNG - LOA DI ĐỘNG VỚI HIỆU ỨNG ĐÈN', '13990000.00', '0.00', '../Assets/img/loa2.jpg', 1, 14, '- Thiết kế thể thao chắc chắn: Thoải mái di <br>  chuyển nhờ thiết kế móc cố định. <br> - Công nghệ chống ồn thích ứng và kiểm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Address` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Birthday` varchar(50) DEFAULT NULL,
  `RoleName` varchar(30) NOT NULL,
  `UserImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`Id`, `UserName`, `Password`, `FullName`, `Phone`, `Address`, `Email`, `Birthday`, `RoleName`, `UserImage`) VALUES
(9, 'admin', '123123', 'Nguyễn Hữu Danh', '0984566483', 'Quảng Ngãi', 'huuhuudanhnguyen@gmail.com', '11/11/1998', 'Admin', '../../assets/avartar/admin.jpg'),
(11, 'thaobae', '123123', 'Trần Nguyên Thảo', '0868289336', 'Quảng Bình', 'thaobae@gmail.com', '13/09/1998', 'Sales', '../../assets/avartar/admin.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `OrderId` (`OrderId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CustomerId` (`CustomerId`),
  ADD KEY `UserId` (`UserId`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `BrandId` (`BrandId`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderId`) REFERENCES `orders` (`Id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `products` (`Id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `customers` (`Id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`BrandId`) REFERENCES `brands` (`Id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
