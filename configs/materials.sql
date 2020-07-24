-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 24, 2020 lúc 12:18 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(22, 34, 'Nguyễn Đức Anh', 14, 'teamlead', '', '16/12/2001', 'ducanhmada@gmail.com', 'Minh Khai, hà Nội'),
(23, 35, 'Vũ Văn Trọng', 15, 'teamlead', '', '', '', ''),
(24, 36, 'Vũ Văn Khánh', 2, 'teamlead', '', '', '', ''),
(25, 37, 'Nguyễn Ngọc Nương', 9, 'member', '', '', '', ''),
(26, 38, 'Vũ Văn Tâm', 9, 'member', '', '', '', ''),
(27, 39, 'Cao Thị Mỹ Hạnh', 15, 'member', '', '', '', ''),
(28, 40, 'Ngô Văn Kiên', 9, 'member', '', '', '', ''),
(29, 41, 'Đặng Anh Thư', 14, 'member', '', '', '', ''),
(30, 42, 'Nguyễn Đức Tùng', 15, 'teamlead', '', '', '', ''),
(31, 43, 'Nguyễn Cao Vân Anh', 15, 'member', '', '', '', ''),
(32, 44, 'Lưu Thiện Tùng', 9, 'member', '', '', '', ''),
(33, 45, 'Ngô Ngọc Thanh Vân', 2, 'member', '', '', '', ''),
(34, 46, 'Phùng A Kiên', 9, 'member', '', '', '', '');

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
(34, 'anhnd2', '123123', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(35, 'trongvv2', '123123', 'inactive', '24-07-2020', 'Nguyễn Đức Tùng'),
(36, 'khanhvv2', '123123', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(37, 'nuongnn3', '123123', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(38, 'tamvv2', '123123', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(39, 'hanhcttm4', '123123', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(40, 'kiennv34', '123123', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(41, 'thuda3', '123123', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(42, 'administrator', '123123', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(43, 'anhncv3', '123123', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(44, 'tunglt32', '123123', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(45, 'vannt34', '1234123', 'active', '24-07-2020', 'Nguyễn Đức Tùng'),
(46, 'kienap32', '123123', 'active', '24-07-2020', 'Nguyễn Đức Tùng');

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `depts`
--
ALTER TABLE `depts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
