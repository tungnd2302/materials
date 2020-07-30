-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 30, 2020 lúc 07:42 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `materials`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `enable` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `createdby` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `enable`, `created`, `createdby`) VALUES
(1, 'Nước ngọt loại sang', 'active', '25-07-2020', 'Nguyễn Đức Tùng'),
(2, 'Nước ngọt', 'active', '25-07-2020', 'Nguyễn Đức Tùng'),
(4, 'Nước tăng lực', 'active', '25-07-2020', 'Nguyễn Đức Tùng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `purchase` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `depts`
--

CREATE TABLE `depts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `enable` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `depts`
--

INSERT INTO `depts` (`id`, `name`, `created`, `createdby`, `enable`) VALUES
(2, 'Quản lý nhân sự', '23-07-2020', 'Nguyễn Đức Tùng', 'active'),
(9, 'Hành chính', '23-07-2020', 'Nguyễn Đức Tùng', 'active'),
(14, 'Nhân sự', '23-07-2020', 'Nguyễn Đức Tùng', 'active'),
(15, 'Quản trị nhân lực', '23-07-2020', 'Nguyễn Đức Tùng', 'active');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `deptid` int(11) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `birthday` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`id`, `userid`, `fullname`, `deptid`, `role`, `thumb`, `birthday`, `email`, `address`) VALUES
(22, 34, 'Nguyễn Đức Anh', 9, 'teamlead', ' 	1595646779download.jpg ', '16/12/2001', 'ducanhmada@gmail.com', 'Minh Khai, hà Nội'),
(23, 35, 'Vũ Văn Trọng', 15, 'teamlead', '1595647020minion wallpapers.jpg', '', '', ''),
(24, 36, 'Vũ Văn Khánh', 2, 'teamlead', '1595647033mrtelasm-109-dong-vat-bien-wallpapers-001.jpg', '', '', ''),
(25, 37, 'Nguyễn Ngọc Nương', 9, 'member', '', '', '', ''),
(26, 38, 'Vũ Văn Tâm', 9, 'member', '', '', '', ''),
(27, 39, 'Cao Thị Mỹ Hạnh', 15, 'member', '', '', '', ''),
(28, 40, 'Ngô Văn Kiên', 9, 'member', '', '', '', ''),
(29, 41, 'Đặng Anh Thư', 14, 'member', '', '', '', ''),
(30, 42, 'Nguyễn Đức Tùng', 15, 'teamlead', '', '', '', ''),
(31, 43, 'Nguyễn Cao Vân Anh', 15, 'member', '', '', '', ''),
(32, 44, 'Lưu Thiện Tùng', 9, 'member', '', '', '', ''),
(33, 45, 'Ngô Ngọc Thanh Vân', 2, 'member', '', '', '', ''),
(34, 46, 'Phùng A Kiên', 9, 'member', '', '', '', ''),
(35, 47, 'Tô Minh Diệp', 9, 'member', '', '', '', ''),
(36, 48, 'Cao Văn Kiên', 15, 'member', '', '', '', ''),
(37, 49, 'Nguyễn Hữu Văn Anh', 2, 'teamlead', '', '', '', ''),
(38, 50, 'Nguyễn Hồng Quân', 2, 'teamlead', 'Array', '', 'admin@gmail.com', 'Hà Nội'),
(39, 51, 'Phạm Thế Anh', 2, 'member', '1595647578minion wallpapers.jpg', '04/06/1995', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exports`
--

CREATE TABLE `exports` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `createdby` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `exports`
--

INSERT INTO `exports` (`id`, `fullname`, `address`, `phone`, `price`, `status`, `created`, `createdby`) VALUES
(13, 'Nguyễn Đức Tùng', 'ABC', '232', '170000', 0, '29-07-2020', 'Nguyễn Đức Tùng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `export_details`
--

CREATE TABLE `export_details` (
  `id` int(11) NOT NULL,
  `exportid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `export_details`
--

INSERT INTO `export_details` (`id`, `exportid`, `productid`, `quantity`) VALUES
(3, 13, 4, 12),
(4, 13, 1, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `categoryid` int(11) NOT NULL,
  `suplier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quanlity` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `thumb` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enable` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `createdby` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`name`, `type`, `categoryid`, `suplier`, `quanlity`, `price`, `thumb`, `enable`, `created`, `createdby`, `id`) VALUES
('Ống nước', 'cái', 1, 'CTy a', '123123', 10000, '1595995846Screenshot (23).png', 'active', '29-07-2020', 'Nguyễn Đức Tùng', 10),
('Gạch', 'cái', 1, 'CTy a', '12', 20000, '1595996534Screenshot (12).png', 'inactive', '29-07-2020', 'Nguyễn Đức Tùng', 11),
('Đèn tuýt', 'Chiếc', 4, '123123', '321321', 40000, '', 'active', '29-07-2020', 'Nguyễn Đức Tùng', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `enable` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL,
  `createdby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `enable`, `created`, `createdby`) VALUES
(34, 'anhnd2', '4297f44b13955235245b2497399d7a93', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(35, 'trongvv2', '4297f44b13955235245b2497399d7a93', 'inactive', '24-07-2020', 'Nguyễn Đức Tùng'),
(36, 'khanhvv2', '4297f44b13955235245b2497399d7a93', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(37, 'nuongnn3', '4297f44b13955235245b2497399d7a93', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(38, 'tamvv2', '4297f44b13955235245b2497399d7a93', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(39, 'hanhcttm4', '4297f44b13955235245b2497399d7a93', 'inactive', '24-07-2020', 'Nguyễn Đức Tùng'),
(40, 'kiennv34', '4297f44b13955235245b2497399d7a93', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(41, 'thuda3', '4297f44b13955235245b2497399d7a93', 'inactive', '24-07-2020', 'Nguyễn Đức Tùng'),
(42, 'administrator', '4297f44b13955235245b2497399d7a93', 'inactive', '24-07-2020', 'Nguyễn Đức Tùng'),
(43, 'anhncv3', '4297f44b13955235245b2497399d7a93', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(44, 'tunglt32', '4297f44b13955235245b2497399d7a93', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(45, 'vannt34', '4297f44b13955235245b2497399d7a93', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(46, 'kienap32', '4297f44b13955235245b2497399d7a93', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(47, 'dieptm4', '4297f44b13955235245b2497399d7a93', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(48, 'kiencv4', '4297f44b13955235245b2497399d7a93', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(49, 'anhnhv41', '4297f44b13955235245b2497399d7a93', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(50, 'quannh44', '4297f44b13955235245b2497399d7a93', 'active', '25-07-2020', 'Nguyễn Đức Tùng'),
(51, 'anhpt04', '4297f44b13955235245b2497399d7a93', 'active', '25-07-2020', 'Nguyễn Đức Tùng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `depts`
--
ALTER TABLE `depts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `exports`
--
ALTER TABLE `exports`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `export_details`
--
ALTER TABLE `export_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `depts`
--
ALTER TABLE `depts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `exports`
--
ALTER TABLE `exports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `export_details`
--
ALTER TABLE `export_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
