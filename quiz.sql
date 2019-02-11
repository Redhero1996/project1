-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 10:34 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `content`, `question_id`, `created_at`, `updated_at`) VALUES
(9, 'feed', 3, '2018-09-28 01:18:43', '2018-09-28 01:18:43'),
(10, 'feedling', 3, '2018-09-28 01:18:43', '2018-09-28 01:18:43'),
(11, 'fed', 3, '2018-09-28 01:18:43', '2018-09-28 01:18:43'),
(12, 'feeds', 3, '2018-09-28 01:18:44', '2018-09-28 01:18:44'),
(15, 'near to', 4, '2018-09-28 01:29:45', '2018-09-28 01:29:45'),
(16, 'near of', 4, '2018-09-28 01:29:45', '2018-09-28 01:29:45'),
(17, 'next to', 4, '2018-09-28 01:29:45', '2018-09-28 01:29:45'),
(18, 'nearly', 4, '2018-09-28 01:29:45', '2018-09-28 01:29:45'),
(20, 'but two years experience', 5, '2018-09-28 01:32:33', '2018-09-28 01:32:33'),
(21, 'also two years experience', 5, '2018-09-28 01:32:33', '2018-09-28 01:32:33'),
(22, 'but also two-year experience', 5, '2018-09-28 01:32:33', '2018-09-28 01:32:33'),
(23, 'but more two years experience', 5, '2018-09-28 01:32:33', '2018-09-28 01:32:33'),
(25, 'what said the other person', 6, '2018-09-28 01:41:19', '2018-09-28 01:41:19'),
(26, 'what the other person said', 6, '2018-09-28 01:41:19', '2018-09-28 01:41:19'),
(27, 'what did the other person say', 6, '2018-09-28 01:41:19', '2018-09-28 01:41:19'),
(28, 'what was the other person saying', 6, '2018-09-28 01:41:19', '2018-09-28 01:41:19'),
(29, 'in comparison with the salary of a teacher', 7, '2018-09-28 01:42:07', '2018-09-28 01:42:07'),
(30, 'than a teacher', 7, '2018-09-28 01:42:07', '2018-09-28 01:42:07'),
(31, 'than that of a teacher', 7, '2018-09-28 01:42:07', '2018-09-28 01:42:07'),
(32, 'to compare as a teacher', 7, '2018-09-28 01:42:08', '2018-09-28 01:42:08'),
(33, 'you to call them', 8, '2018-09-28 01:42:53', '2018-09-28 01:42:53'),
(34, 'that you would call them', 8, '2018-09-28 01:42:54', '2018-09-28 01:42:54'),
(35, 'your calling them', 8, '2018-09-28 01:42:54', '2018-09-28 01:42:54'),
(36, 'that you are calling them', 8, '2018-09-28 01:42:54', '2018-09-28 01:42:54'),
(37, 'where there are', 9, '2018-09-28 01:43:54', '2018-09-28 01:43:54'),
(38, 'there are', 9, '2018-09-28 01:43:54', '2018-09-28 01:43:54'),
(39, 'where are there', 9, '2018-09-28 01:43:54', '2018-09-28 01:43:54'),
(40, 'there are where', 9, '2018-09-28 01:43:54', '2018-09-28 01:43:54'),
(41, 'painting', 10, '2018-09-28 01:44:40', '2018-09-28 01:44:40'),
(42, 'painted', 10, '2018-09-28 01:44:40', '2018-09-28 01:44:40'),
(43, 'for painting', 10, '2018-09-28 01:44:40', '2018-09-28 01:44:40'),
(44, 'to paint', 10, '2018-09-28 01:44:40', '2018-09-28 01:44:40'),
(45, 'them', 11, '2018-09-28 01:45:35', '2018-09-28 01:45:35'),
(46, 'him', 11, '2018-09-28 01:45:35', '2018-09-28 01:45:35'),
(47, 'its', 11, '2018-09-28 01:45:35', '2018-09-28 01:45:35'),
(48, 'it', 11, '2018-09-28 01:45:35', '2018-09-28 01:45:35'),
(49, 'Such was', 12, '2018-09-28 01:46:56', '2018-09-28 01:46:56'),
(50, 'Due to', 12, '2018-09-28 01:46:56', '2018-09-28 01:46:56'),
(51, 'Because from', 12, '2018-09-28 01:46:56', '2018-09-28 01:46:56'),
(52, 'That', 12, '2018-09-28 01:46:56', '2018-09-28 01:46:56'),
(53, 'Hyper Text Markup Language', 13, '2018-09-28 01:50:57', '2018-09-28 01:50:57'),
(54, 'High Tech Markup Language', 13, '2018-09-28 01:50:57', '2018-09-28 01:50:57'),
(55, 'Handle To My Life', 13, '2018-09-28 01:50:57', '2018-09-28 01:50:57'),
(56, 'Hirectice Type Magic Lance', 13, '2018-09-28 01:50:57', '2018-09-28 01:50:57'),
(57, 'Sẽ làm cho chuỗi ký tự QuanTriMang trở nên đậm', 14, '2018-09-28 02:00:10', '2018-09-28 02:00:10'),
(58, 'Sẽ đánh dấu chuỗi ký tự QuanTriMang là đậm', 14, '2018-09-28 02:00:10', '2018-09-28 02:00:10'),
(59, 'Sẽ in ra chuỗi ký tự QuanTriMang với font đậm', 14, '2018-09-28 02:00:10', '2018-09-28 02:00:10'),
(60, 'Sẽ in ra chữ QuanTriMang', 14, '2018-09-28 02:00:10', '2018-09-28 02:00:10'),
(61, 'IE 6', 15, '2018-09-28 02:01:25', '2018-09-28 02:01:25'),
(62, 'IE 7', 15, '2018-09-28 02:01:25', '2018-09-28 02:01:25'),
(63, 'IE 9', 15, '2018-09-28 02:01:25', '2018-09-28 02:01:25'),
(64, 'IE 11', 15, '2018-09-28 02:01:25', '2018-09-28 02:01:25'),
(65, 'Thực thi Onclick của thẻ <input type=\"checkbox\"> trên label', 16, '2018-09-28 02:03:04', '2018-09-28 02:03:04'),
(66, 'Thực thi Onclick của thẻ <input type=\"text\"> trên label', 16, '2018-09-28 02:03:04', '2018-09-28 02:03:04'),
(67, 'Thực thi Onclick của thẻ <input> trên label', 16, '2018-09-28 02:03:05', '2018-09-28 02:03:05'),
(68, 'Thực thi Onclick của 1 thẻ bất kỳ trên label', 16, '2018-09-28 02:03:05', '2018-09-28 02:03:05'),
(69, 'Đều là dạng dropdownlist nhưng datalist cho phép nhập thêm dữ liệu', 17, '2018-09-28 02:05:04', '2018-09-28 02:05:04'),
(70, 'Đều là dạng dropbox nhưng datalist cho phép nhập thêm dữ liệu', 17, '2018-09-28 02:05:04', '2018-09-28 02:05:04'),
(71, 'Hai thẻ hoàn toàn khác nhau', 17, '2018-09-28 02:05:04', '2018-09-28 02:05:04'),
(72, 'Đều là dạng dropdownlist nhưng datalist là thẻ dữ liệu hỡ trợ cho <input type=\"text\"> để sổ danh sách', 17, '2018-09-28 02:05:04', '2018-09-28 02:05:04'),
(73, 'Dùng để định nghĩa các phần đầu đề trong HTML', 18, '2018-09-28 02:07:46', '2018-09-28 02:07:46'),
(74, 'Dùng để chọn độ lớn của kích thước chữ trong HTML cho thiết kế', 18, '2018-09-28 02:07:46', '2018-09-28 02:07:46'),
(75, 'Dùng để định nghĩa kích thước tiêu chuẩn của chữ trong HTML', 18, '2018-09-28 02:07:46', '2018-09-28 02:07:46'),
(76, 'Tùy trường hợp mà dùng', 18, '2018-09-28 02:07:46', '2018-09-28 02:07:46'),
(77, 'Tạo một ô text để nhập dữ liệu', 19, '2018-09-28 02:10:02', '2018-09-28 02:10:02'),
(78, 'Tạo một nút lệnh dùng để gửi tin trong form đi', 19, '2018-09-28 02:10:02', '2018-09-28 02:10:02'),
(79, 'Tạo một nút lệnh dùng để xóa thông tin trong form', 19, '2018-09-28 02:10:02', '2018-09-28 02:10:02'),
(80, 'Tất cả các ý trên', 19, '2018-09-28 02:10:02', '2018-09-28 02:10:02'),
(81, 'Những sáng tác tập thể', 20, '2018-09-28 02:19:32', '2018-09-28 02:19:32'),
(82, 'Truyền miệng', 20, '2018-09-28 02:19:32', '2018-09-28 02:19:32'),
(83, 'Mang tính sáng tạo của cá nhân cao', 20, '2018-09-28 02:19:33', '2018-09-28 02:19:33'),
(84, 'Lưu truyền trong nhân dân', 20, '2018-09-28 02:19:33', '2018-09-28 02:19:33'),
(85, 'Tất cả các đáp án đều đúng', 20, '2018-09-28 02:19:33', '2018-09-28 02:19:33'),
(86, 'Lao động', 21, '2018-09-28 02:21:48', '2018-09-28 02:21:48'),
(87, 'Trí tuệ', 21, '2018-09-28 02:21:48', '2018-09-28 02:21:48'),
(88, 'Tư tưởng', 21, '2018-09-28 02:21:48', '2018-09-28 02:21:48'),
(89, 'Kinh nghiệm', 21, '2018-09-28 02:21:48', '2018-09-28 02:21:48'),
(90, 'Tình cảm', 21, '2018-09-28 02:21:48', '2018-09-28 02:21:48'),
(91, 'Bộ tiểu thuyết về cuộc sống', 22, '2018-09-28 02:24:00', '2018-09-28 02:24:00'),
(92, 'Kho tàng triết lí về cuộc sống', 22, '2018-09-28 02:24:00', '2018-09-28 02:24:00'),
(93, 'Sách giáo khoa về cuộc sống', 22, '2018-09-28 02:24:00', '2018-09-28 02:24:00'),
(94, 'Pho kinh nghiệm về cuộc sống', 22, '2018-09-28 02:24:00', '2018-09-28 02:24:00'),
(95, 'Nền tảng tri thức', 22, '2018-09-28 02:24:00', '2018-09-28 02:24:00'),
(96, 'Truyện người con gái Nam Xương', 23, '2018-09-28 02:26:43', '2018-09-28 02:26:43'),
(97, 'Đẻ đất đẻ nước', 23, '2018-09-28 02:26:43', '2018-09-28 02:26:43'),
(98, 'Cây tre trăm đốt', 23, '2018-09-28 02:26:43', '2018-09-28 02:26:43'),
(99, 'Chưa đỗ ông Nghè đã đe hàng tổng', 23, '2018-09-28 02:26:44', '2018-09-28 02:26:44'),
(100, 'Truyện Kiều', 23, '2018-09-28 02:26:44', '2018-09-28 02:26:44'),
(101, 'Tác phẩm văn học dân gian thường có nhiều dị bản', 24, '2018-09-28 02:30:09', '2018-09-28 02:30:09'),
(102, 'Văn học dân gian có cách phản ánh hiện thực một cách kì ảo', 24, '2018-09-28 02:30:09', '2018-09-28 02:30:09'),
(103, 'Văn học dân gian thường có nhiều cốt truyện, tình tiết, sự kiện…được lặp đi, lặp lại', 24, '2018-09-28 02:30:09', '2018-09-28 02:30:09'),
(104, 'Văn học dân gian là tiếng nói chung của một cộng đồng', 24, '2018-09-28 02:30:09', '2018-09-28 02:30:09'),
(105, 'Văn học dân gian có cách phản ánh hiện thực một cách kì ảo', 25, '2018-09-28 02:31:18', '2018-09-28 02:31:18'),
(106, 'Tác phẩm văn học dân gian thường có nhiều dị bản', 25, '2018-09-28 02:31:18', '2018-09-28 02:31:18'),
(107, 'Văn học dân gian là tiếng nói chung của một cộng đồng', 25, '2018-09-28 02:31:19', '2018-09-28 02:31:19'),
(108, 'Văn học dân gian thường có nhiều cốt truyện, tình tiết, sự kiện…được lặp đi, lặp lại', 25, '2018-09-28 02:31:19', '2018-09-28 02:31:19'),
(109, 'Chấm dứt sự chia rẽ giữa các tổ chức cộng sản', 45, '2018-10-17 08:37:51', '2018-10-17 08:37:51'),
(110, 'Yêu cầu bức thiết của cách mạng Việt Nam lúc đó', 45, '2018-10-17 08:37:51', '2018-10-17 08:37:51'),
(111, 'Yêu cầu của Quốc tế Cộng sản.', 45, '2018-10-17 08:37:51', '2018-10-17 08:37:51'),
(112, 'Để thay thế vai trò của Hội Việt Nam cách mạng thanh niên.', 45, '2018-10-17 08:37:51', '2018-10-17 08:37:51'),
(113, 'Quảng Châu', 46, '2018-10-17 08:38:47', '2018-10-17 08:38:47'),
(114, 'Hà Nội', 46, '2018-10-17 08:38:47', '2018-10-17 08:38:47'),
(115, 'Hồng Kông', 46, '2018-10-17 08:38:48', '2018-10-17 08:38:48'),
(116, 'Yên Bái', 46, '2018-10-17 08:38:48', '2018-10-17 08:38:48'),
(117, 'Đông Dương Cộng sản Đảng', 47, '2018-10-17 08:41:17', '2018-10-17 08:41:17'),
(118, 'Đông Dương Cộng sản liên đoàn', 47, '2018-10-17 08:41:18', '2018-10-17 08:41:18'),
(119, 'An Nam Cộng sản đảng', 47, '2018-10-17 08:41:18', '2018-10-17 08:41:18'),
(120, 'An Nam Cộng sản Đảng, Đông Dương Cộng sản liên đoàn.', 47, '2018-10-17 08:41:18', '2018-10-17 08:41:18'),
(121, 'Đông Dương Cộng sản Đảng, An Nam Cộng sản đảng, Đông Dương Cộng sản liên đoàn.', 47, '2018-10-17 08:41:18', '2018-10-17 08:41:18'),
(122, 'Truyền bá chủ nghĩa Mác-Lê nin vào Việt Nam', 48, '2018-10-17 08:42:34', '2018-10-17 08:42:34'),
(123, 'Thống nhất các tổ chức cộng sản để thành lập một Đảng duy nhất lấy tên là Đảng Cộng sản Việt Nam', 48, '2018-10-17 08:42:34', '2018-10-17 08:42:34'),
(124, 'Soạn thảo Cương lĩnh chính trị đầu tiên đê hội nghị thông qua', 48, '2018-10-17 08:42:34', '2018-10-17 08:42:34'),
(125, 'Câu a và b đúng', 48, '2018-10-17 08:42:34', '2018-10-17 08:42:34'),
(126, 'Thực hiện cuộc cách mạng ruộng đất cho triệt để', 49, '2018-10-17 08:44:15', '2018-10-17 08:44:15'),
(127, 'Tịch thu hết sản nghiệp của bọn đế quốc', 49, '2018-10-17 08:44:15', '2018-10-17 08:44:15'),
(128, 'Đánh đổ địa chủ phong kiến, làm cách mạng thổ địa sau đó làm cách mạng làm cách mạng dân tộc.', 49, '2018-10-17 08:44:15', '2018-10-17 08:44:15'),
(129, 'Làm cách mạng tư sản dân quyền', 49, '2018-10-17 08:44:15', '2018-10-17 08:44:15'),
(130, 'Cách mạng ruộng đất để tiến lên chủ nghĩa cộng sản', 49, '2018-10-17 08:44:15', '2018-10-17 08:44:15'),
(131, 'Công nhân, nông dân', 50, '2018-10-17 08:46:16', '2018-10-17 08:46:16'),
(132, 'Các tầng lớp tư sản', 50, '2018-10-17 08:46:16', '2018-10-17 08:46:16'),
(133, 'Các tầng lớp địa chủ phong kiến', 50, '2018-10-17 08:46:16', '2018-10-17 08:46:16'),
(134, 'Các tầng lớp trí thức, trung nông', 50, '2018-10-17 08:46:16', '2018-10-17 08:46:16'),
(135, 'Các tầng lớp tiểu tư sản', 50, '2018-10-17 08:46:17', '2018-10-17 08:46:17'),
(136, 'Thông qua Chính cương', 51, '2018-10-17 08:47:25', '2018-10-17 08:47:25'),
(137, 'Sách lược vắn tắt', 51, '2018-10-17 08:47:25', '2018-10-17 08:47:25'),
(138, 'Điều lệ tóm tắt của Đảng và chỉ định Ban Chấp hành Trung ương Lâm thời', 51, '2018-10-17 08:47:26', '2018-10-17 08:47:26'),
(139, 'Bầu Ban Chấp hành Trung ương lâm thời', 51, '2018-10-17 08:47:26', '2018-10-17 08:47:26'),
(140, 'Quyết định lấy tên Đảng là Đảng Cộng sản Đông Dương', 51, '2018-10-17 08:47:26', '2018-10-17 08:47:26'),
(141, 'Đông Dương Cộng sản Đảng.', 52, '2018-10-17 08:48:40', '2018-10-17 08:48:40'),
(142, 'An Nam Cộng sản đảng', 52, '2018-10-17 08:48:40', '2018-10-17 08:48:40'),
(143, 'Đông Dương Cộng sản Liên đoàn.', 52, '2018-10-17 08:48:40', '2018-10-17 08:48:40'),
(144, 'Hội Việt Nam cách mạng thanh niên', 52, '2018-10-17 08:48:40', '2018-10-17 08:48:40'),
(145, 'phong trào dân chủ.', 53, '2018-10-17 08:51:57', '2018-10-17 08:51:57'),
(146, 'phong trào yêu nước,', 53, '2018-10-17 08:51:57', '2018-10-17 08:51:57'),
(147, 'phong trào công nhân', 53, '2018-10-17 08:51:57', '2018-10-17 08:51:57'),
(148, 'phong trào nông dân.', 53, '2018-10-17 08:51:57', '2018-10-17 08:51:57'),
(149, 'phong trào dân tộc', 53, '2018-10-17 08:51:57', '2018-10-17 08:51:57'),
(150, 'Sự phát triển của phong trào yêu nước Việt Nam', 54, '2018-10-17 08:53:37', '2018-10-17 08:53:37'),
(151, 'Sự thất bại của Việt Nam Quốc dân đảng.', 54, '2018-10-17 08:53:37', '2018-10-17 08:53:37'),
(152, 'Sự phổ biến chủ nghĩa Mác-Lê nin vào Việt Nam.', 54, '2018-10-17 08:53:37', '2018-10-17 08:53:37'),
(153, 'Sự phát triển tự giác phong trào công nhân Việt Nam.', 54, '2018-10-17 08:53:37', '2018-10-17 08:53:37'),
(154, 'Cách mạng Việt Nam trở thành một bộ phận của cách mạng thế giới.', 55, '2018-10-17 09:10:12', '2018-10-17 09:10:12'),
(155, 'Cách mạng Việt Nam phải trải qua hai giai đoạn: Cách mạng tư sản dân quyền và cách mạng XHCN', 55, '2018-10-17 09:10:12', '2018-10-17 09:10:12'),
(156, 'Làm cách mạng giải phóng dân tộc sau đó tiến lên chủ nghĩa xã hội.', 55, '2018-10-17 09:10:12', '2018-10-17 09:10:12'),
(157, 'a và b đúng', 55, '2018-10-17 09:10:12', '2018-10-17 09:10:12'),
(158, 'Nêu cao vấn đề dân tộc lên hàng đầu.', 56, '2018-10-17 09:11:37', '2018-10-17 09:11:37'),
(159, 'Chiến đấu hết mình vì dân tộc', 56, '2018-10-17 09:11:38', '2018-10-17 09:11:38'),
(160, 'Đánh giá đúng khả năng cách mạng của các giai cấp trong xã hội Việt Nam.', 56, '2018-10-17 09:11:38', '2018-10-17 09:11:38'),
(161, 'Thấy được khả năng liên minh có điều kiện với giai cấp tư sản dân tộc, khả năng phân hóa, lôi kéo một bộ phận giai cấp địa chủ trong cách mạng giải phóng dân tộc.', 56, '2018-10-17 09:11:38', '2018-10-17 09:11:38'),
(162, 'Cương lĩnh chính trị đầu tiên của Đảng do đồng chí Nguyễn Ái Quốc khởi thảo.', 57, '2018-10-17 09:13:19', '2018-10-17 09:13:19'),
(163, 'Điều lệ của Đảng do đồng chí Nguyễn Ái Quốc dự thảo.', 57, '2018-10-17 09:13:19', '2018-10-17 09:13:19'),
(164, 'Chính cương vắn tắt do Nguyễn Ái Quốc khởi thảo', 57, '2018-10-17 09:13:19', '2018-10-17 09:13:19'),
(165, 'Luận cương Chính trị 1930 do Trần Phú khởi thảo', 57, '2018-10-17 09:13:19', '2018-10-17 09:13:19'),
(166, 'Đánh đổ phong kiến địa chủ giành đất cho dân cày.', 58, '2018-10-17 09:15:17', '2018-10-17 09:15:17'),
(167, 'Đánh đổ giai cấp tư sản', 58, '2018-10-17 09:15:17', '2018-10-17 09:15:17'),
(168, 'Đánh đổ địa chủ phong kiến.', 58, '2018-10-17 09:15:17', '2018-10-17 09:15:17'),
(169, 'Đánh đổ đế quốc Pháp, phong kiến và tư sản phản cách mạng', 58, '2018-10-17 09:15:18', '2018-10-17 09:15:18'),
(170, 'Làm cho Việt nam độc lập, thành lập chính phủ công nông binh.', 58, '2018-10-17 09:15:18', '2018-10-17 09:15:18'),
(171, 'Chưa nhận thức được tầm quan trọng của nhiệm vụ chống đế quốc giành độc lập dân tộc.', 59, '2018-10-17 09:17:48', '2018-10-17 09:17:48'),
(172, 'Nặng về đấu tranh giai cấp.', 59, '2018-10-17 09:17:48', '2018-10-17 09:17:48'),
(173, 'Chưa thấy rõ được khả năng cách mạng của các tầng lớp khác ngoài công nông.', 59, '2018-10-17 09:17:48', '2018-10-20 18:36:58'),
(174, 'Cả ba ý trên đều sai', 59, '2018-10-17 09:17:48', '2018-10-17 09:17:48'),
(175, 'z', 60, '2018-11-05 01:29:02', '2018-11-05 01:29:02'),
(176, 'dg', 61, '2018-11-06 07:04:33', '2018-11-06 07:04:33'),
(177, 'dgs', 62, '2018-11-07 15:34:12', '2018-11-07 15:34:12'),
(178, 'gsdgs', 62, '2018-11-07 15:34:12', '2018-11-07 15:34:12'),
(179, 'sdgs', 62, '2018-11-07 15:34:12', '2018-11-07 15:34:12'),
(180, 'gsdg', 62, '2018-11-07 15:34:12', '2018-11-07 15:34:12'),
(181, 'cx', 64, '2018-11-07 17:02:49', '2018-11-07 17:02:49'),
(182, 'bcxb', 64, '2018-11-07 17:02:49', '2018-11-07 17:02:49'),
(183, 'xcbx', 64, '2018-11-07 17:02:49', '2018-11-07 17:02:49'),
(184, 'bxcbx', 64, '2018-11-07 17:02:49', '2018-11-07 17:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tiếng anh', 'tieng-anh', '2018-09-26 14:33:43', '2018-09-26 14:33:43'),
(2, 'Vật lý', 'vat-ly', '2018-09-26 14:33:43', '2018-09-26 14:33:43'),
(3, 'Toán', 'toan', '2018-09-26 14:33:43', '2018-09-26 14:33:43'),
(4, 'Ngữ văn', 'ngu-van', '2018-09-26 14:33:43', '2018-09-28 02:15:35'),
(5, 'Lịch sử', 'lich-su', '2018-09-26 14:33:43', '2018-09-26 14:33:43'),
(6, 'Lập trình', 'lap-trinh', '2018-09-26 14:33:43', '2018-10-30 03:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `topic_id`, `status`, `created_at`, `updated_at`) VALUES
(28, 4, 18, 1, '2018-11-04 10:02:44', '2018-11-04 13:24:45'),
(31, 6, 18, 0, '2018-11-04 13:23:59', '2018-11-04 13:44:35'),
(47, 7, 2, 1, '2018-11-04 14:36:05', '2018-11-04 14:36:05'),
(48, 11, 2, 1, '2018-11-05 01:10:03', '2018-11-05 01:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2018_09_25_074242_create_categories_table', 2),
(5, '2018_09_25_075947_create_topics_table', 2),
(6, '2018_09_25_080830_create_questions_table', 2),
(7, '2018_09_25_082439_create_answers_table', 2),
(8, '2018_09_25_083645_create_question_topic_table', 2),
(10, '2018_09_26_204603_create_comments_table', 2),
(11, '2018_09_27_102625_add_mutil_row_to_users_table', 3),
(12, '2018_09_21_043318_create_roles_table', 4),
(13, '2018_09_25_084752_create_topic_user_table', 4),
(14, '2018_09_27_103754_add_role_id_row_to_users_table', 5),
(15, '2018_09_28_151041_edit_type_correct_ans_to_questions_table', 6),
(23, '2018_10_06_231700_rename_col_score_from_topic_user_table', 7),
(24, '2018_10_09_135312_add_answered_col_to_topic_user_table', 8),
(25, '2018_10_19_104532_add_provider_col_to_users_table', 9),
(26, '2018_10_20_202716_add_status_col_to_topics_table', 10),
(27, '2018_10_27_142700_add_col_user_id_to_topics_table', 11),
(31, '2018_11_03_164542_create_likes_table', 12),
(34, '2018_11_06_144309_add_view_count_col_to_topics_table', 13),
(35, '2018_11_13_151444_create_jobs_table', 14),
(36, '2018_11_13_151529_create_failed_jobs_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_ans` text COLLATE utf8mb4_unicode_ci,
  `explain` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `content`, `correct_ans`, `explain`, `created_at`, `updated_at`) VALUES
(3, '<p><span style=\"font-size:13pt;font-family:\'Times New Roman\', serif;\">The mausoleum is ................. by Thien Thu mountain, two towering columns and a vast expanse of water.</span></p>\r\n', '[11]', '', '2018-09-28 01:18:43', '2018-09-28 01:18:44'),
(4, '<p><span style=\"font-size:13pt;font-family:\'Times New Roman\', serif;\">Put plants ............... a window so that they will get enough light.</span></p>', '[17]', '', '2018-09-28 01:29:45', '2018-09-28 01:29:45'),
(5, '<p><span style=\"font-size:13pt;font-family:\'Times New Roman\', serif;\">Employers often require that candidates have not only a degree .............</span></p>', '[22]', '', '2018-09-28 01:32:32', '2018-09-28 01:32:33'),
(6, '<p><span style=\"font-size:13pt;font-family:\'Times New Roman\', serif;\">If one of the participants in a conversation wonders ............... no real communication has taken place.</span></p>', '[26]', '', '2018-09-28 01:41:18', '2018-09-28 01:41:19'),
(7, '<p><span style=\"font-size:13pt;font-family:\'Times New Roman\', serif;\">The salary of a bus driver is much higher ................ </span></p>', '[31]', '', '2018-09-28 01:42:07', '2018-09-28 01:42:07'),
(8, '<p><span style=\"font-size:13pt;font-family:\'Times New Roman\', serif;\">Professional people expect ............... when it is necessary to cancel an appointment</span></p>', '[33]', '', '2018-09-28 01:42:53', '2018-09-28 01:42:53'),
(9, '<p><span style=\"font-size:13pt;font-family:\'Times New Roman\', serif;\">Sedimentary rocks are formed below the surface of the earth ............... very high temperatures and pressures.</span></p>', '[37]', '', '2018-09-28 01:43:54', '2018-09-28 01:43:54'),
(10, '<p><span style=\"font-size:13pt;font-family:\'Times New Roman\', serif;\">Earl was one of the first American artists …………………. landscapes</span></p>', '[44]', '', '2018-09-28 01:44:39', '2018-09-28 01:44:40'),
(11, '<p><span style=\"font-size:13pt;font-family:\'Times New Roman\', serif;\">The crime rate has continued to rise in American cities despite efforts on the part of both government and private citizens to curb ................</span></p>', '[48]', '', '2018-09-28 01:45:34', '2018-09-28 01:45:35'),
(12, '<p><span style=\"font-size:13pt;font-family:\'Times New Roman\', serif;\">............... his highly individual conceptions of music and chaos, John Cage became a leading figure in avant-garde music</span></p>', '[50]', '', '2018-09-28 01:46:56', '2018-09-28 01:46:56'),
(13, '<p><span style=\"color:rgba(0,0,0,.87);font-family:Arial, sans-serif;font-size:15px;font-weight:bold;\">HTML là viết tắt của từ gì ?</span></p>', '[53]', '', '2018-09-28 01:50:56', '2018-09-28 01:50:57'),
(14, '<p><span style=\"color:rgba(0,0,0,.87);font-family:Arial, sans-serif;font-size:16px;\">Biên dịch cú pháp sau: &lt;strong&gt;Quantrimang&lt;/strong&gt;</span></p>', '[59]', '', '2018-09-28 02:00:10', '2018-09-28 02:00:10'),
(15, '<p><span style=\"color:rgba(0,0,0,.87);font-family:Arial, sans-serif;font-size:15px;font-weight:bold;\">Thẻ &lt;article&gt; có mặt từ phiên bản IE nào trở lên</span></p>', '[63]', '', '2018-09-28 02:01:25', '2018-09-28 02:01:25'),
(16, '<p><span style=\"color:rgba(0,0,0,.87);font-family:Arial, sans-serif;font-size:15px;\">Thuộc tính <strong>FOR</strong> trong thẻ  được dùng để</span></p>', '[67]', '', '2018-09-28 02:03:04', '2018-09-28 02:10:33'),
(17, '<p><span style=\"color:rgba(0,0,0,.87);font-family:Arial, sans-serif;font-size:15px;\">Thẻ <strong>&lt;datalist&gt;</strong> và <strong>&lt;select&gt;</strong> giống và khác nhau ở đâu?</span></p>', '[72]', '', '2018-09-28 02:05:04', '2018-09-28 02:05:04'),
(18, '<p><span style=\"color:rgba(0,0,0,.87);font-family:Arial, sans-serif;font-size:15px;font-weight:bold;\"> Các thẻ từ &lt;h1&gt; đến &lt;h6&gt; dùng để làm gì?</span></p>', '[73]', '', '2018-09-28 02:07:46', '2018-09-28 02:07:46'),
(19, '<p>Thẻ <em>&lt;input type=”Submit”</em>  dùng để làm gì?</p>', '[78]', '', '2018-09-28 02:10:02', '2018-09-28 02:12:01'),
(20, '<p>Trong những câu sau câu nào nêu khái niệm về văn học dân gian?</p>', '[81,82,84]', '<p>Văn học dân gian là những sáng tác tập thể, được truyền miệng, lưu truyền trong nhân dân</p>', '2018-09-28 02:19:32', '2018-11-02 15:58:34'),
(21, '<p>Điền khuyết: “Văn học dân gian gắn bó với đời sống và……… của quần chúng lao động đông đảo trong xã hội.”</p>', '[88,89]', '<p><i>Văn học dân gian gắn bó với đời sống và </i><strong>tư tưởng, kinh nghiệm</strong> <i>của quần chúng lao động đông đảo trong xã hội.</i></p>', '2018-09-28 02:21:48', '2018-11-02 15:58:34'),
(22, '<p>Văn học dân gian được đánh giá như:</p>', '[93]', '<p> </p>', '2018-09-28 02:24:00', '2018-10-31 08:00:15'),
(23, '<p>Những tác phẩm sau, tác phẩm nào là tác phẩm văn học dân gian?</p>', '[97,98,99]', '<p> </p>', '2018-09-28 02:26:43', '2018-10-31 08:00:15'),
(24, '<p>Điền khuyết: “Về phương diện nội dung…………”</p>', '[104]', '<p> </p>', '2018-09-28 02:30:08', '2018-10-31 08:00:15'),
(25, '<p>Điền khuyết: “Về phương diện hình thức…………”</p>', '[106]', '<p> </p>', '2018-09-28 02:31:18', '2018-10-31 08:00:15'),
(45, '<p>Hội nghị thành lập Đảng Cộng sản Việt Nam được triệu tập (3/2/1930) tại Hương Cảng vì nhiều lí do. Lí do nào sau đây không đúng?</p>', '[112]', '', '2018-10-17 08:37:51', '2018-10-17 08:37:51'),
(46, '<p>Hội nghị thành lập Đảng Cộng sản Việt Nam (3/2/1930) họp tại đâu?</p>', '[115]', '', '2018-10-17 08:38:47', '2018-10-17 08:38:48'),
(47, 'Tại hội nghị hợp nhất ba tổ chức cộng sản, có sự tham gia của các tổ chức cộng sản nào?', '[117,119]', '', '2018-10-17 08:41:17', '2018-10-17 08:41:18'),
(48, 'Vai trò của Nguyễn Ái Quốc trong hội nghị hợp nhất ba tổ chức cộng sản (3/2/1930) được thể hiện như thế nào?', '[123,124]', '', '2018-10-17 08:42:34', '2018-10-17 08:42:34'),
(49, 'Con đường cách mạng Việt Nam được xác định trong Cương lĩnh chính trị đầu tiên do Nguyễn Ái Quốc khởi thảo là gì?', '[129,129]', '', '2018-10-17 08:44:15', '2018-10-17 08:44:15'),
(50, 'Lực lượng cách mạng để đánh đổ đế quốc và phong kiến được nêu trong Cương lĩnh chính trị đầu tiên của Đảng do Nguyễn Ái Quốc khởi thảo là gì?', '[131,134,134]', '', '2018-10-17 08:46:16', '2018-10-17 08:46:17'),
(51, 'Nội dung của Hội nghị thành lập Đảng:', '[136,137,138]', '', '2018-10-17 08:47:25', '2018-10-17 08:47:26'),
(52, 'Có tổ chức nào không tham gia Hội nghị thành lập Đảng?', '[143]', '', '2018-10-17 08:48:40', '2018-10-17 08:48:40'),
(53, 'Đảng Cộng sản Việt Nam ra đời là sản phẩm của sự kết hợp của chủ nghĩa Mác-Lê nin với:', '[146,147]', '', '2018-10-17 08:51:57', '2018-10-17 08:51:57'),
(54, 'Đảng Cộng sản ra đời do tác động của nhiều yếu tố, yếu tố nào sau đây không đúng?', '[151]', '', '2018-10-17 08:53:37', '2018-10-17 08:53:37'),
(55, 'Nội dung chủ yếu của cương lĩnh Chính trị đầu tiên của Đảng do Nguyễn Ái Quốc khởi thảo là gì?', '[155]', '', '2018-10-17 09:10:12', '2018-10-17 09:10:12'),
(56, 'Điều gì chứng tỏ Cương lĩnh chính trị đầu tiên của Đảng do Nguyễn Ái Quốc khởi thảo là đúng đắn, sáng tạo, thắm đượm tính dân tộc và nhân văn?', '[158,160,161]', '', '2018-10-17 09:11:37', '2018-10-17 09:11:38'),
(57, 'Tính chất của cách mạng Đông Dương lúc đầu là một cuộc cách mạng tư sản dân quyền, sau khi cách mạng tư sản dân quyền thắng lợi sẽ tiếp tục phát triển, bỏ qua thời kỳ tư bản mà tiến thẳng lên chủ nghĩa xã hội. Đó là nội dung của:', '[165]', '', '2018-10-17 09:13:19', '2018-10-17 09:13:19'),
(58, 'Nhiệm vụ cốt yếu của cách mạng tư sản dân quyền ở Việt Nam là gì?', '[169,170]', '', '2018-10-17 09:15:17', '2018-10-17 09:16:28'),
(59, 'Những điểm hạn chế cơ bản của Luận cương chính trị 1930?', '[171,172,173]', '<p>Những điểm hạn chế cơ bản của Luận cương chính trị 1930 là:</p>\r\n\r\n<p> - Chưa nhận thức được tầm quan trọng của nhiệm vụ chống đế quốc giành độc lập dân tộc. </p>\r\n\r\n<p>- Nặng về đấu tranh giai cấp. </p>\r\n\r\n<p>- Chưa thấy rõ được khả năng cách mạng của các tầng lớp khác ngoài công nông.</p>', '2018-10-17 09:17:47', '2018-10-20 18:49:40'),
(60, '<p>rewga</p>', NULL, '', '2018-11-05 01:29:02', '2018-11-05 01:29:02'),
(61, '<p>hddf</p>', NULL, '', '2018-11-06 07:04:33', '2018-11-06 07:04:33'),
(62, '<p>dsgsg</p>', '[178,179]', '', '2018-11-07 15:34:12', '2018-11-07 15:34:12'),
(63, '<p>gsdgs</p>', NULL, '<p>dgs</p>', '2018-11-07 15:34:12', '2018-11-07 15:34:12'),
(64, '<p>cbxb</p>', '[182]', '<p>bcx</p>', '2018-11-07 17:02:49', '2018-11-07 17:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `question_topic`
--

CREATE TABLE `question_topic` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_topic`
--

INSERT INTO `question_topic` (`id`, `question_id`, `topic_id`, `created_at`, `updated_at`) VALUES
(3, 3, 2, NULL, NULL),
(4, 4, 2, NULL, NULL),
(5, 5, 2, NULL, NULL),
(6, 6, 2, NULL, NULL),
(7, 7, 2, NULL, NULL),
(8, 8, 2, NULL, NULL),
(9, 9, 2, NULL, NULL),
(10, 10, 2, NULL, NULL),
(11, 11, 2, NULL, NULL),
(12, 12, 2, NULL, NULL),
(13, 13, 14, NULL, NULL),
(14, 14, 14, NULL, NULL),
(15, 15, 14, NULL, NULL),
(16, 16, 14, NULL, NULL),
(17, 17, 14, NULL, NULL),
(18, 18, 14, NULL, NULL),
(19, 19, 14, NULL, NULL),
(20, 20, 18, NULL, NULL),
(21, 21, 18, NULL, NULL),
(22, 22, 18, NULL, NULL),
(23, 23, 18, NULL, NULL),
(24, 24, 18, NULL, NULL),
(25, 25, 18, NULL, NULL),
(26, 45, 12, NULL, NULL),
(27, 46, 12, NULL, NULL),
(28, 47, 12, NULL, NULL),
(29, 48, 12, NULL, NULL),
(30, 49, 12, NULL, NULL),
(31, 50, 12, NULL, NULL),
(32, 51, 12, NULL, NULL),
(33, 52, 12, NULL, NULL),
(34, 53, 12, NULL, NULL),
(35, 54, 12, NULL, NULL),
(36, 55, 12, NULL, NULL),
(37, 56, 12, NULL, NULL),
(38, 57, 12, NULL, NULL),
(39, 58, 12, NULL, NULL),
(40, 59, 12, NULL, NULL),
(41, 62, 41, NULL, NULL),
(42, 63, 41, NULL, NULL),
(43, 64, 42, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-09-28 17:00:00', '2018-09-28 17:00:00'),
(2, 'user', '2018-09-28 17:00:00', '2018-09-28 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `view_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `slug`, `category_id`, `user_id`, `status`, `view_count`, `created_at`, `updated_at`) VALUES
(1, 'Luyện tập phần từ vừng', 'luyen-tap-phan-tu-vung', 1, 4, 1, 0, '2018-09-26 14:55:55', '2018-09-26 14:55:55'),
(2, 'Luyện tập ngữ pháp', 'luyen-tap-ngu-phap', 1, 4, 1, 0, '2018-09-26 14:55:55', '2018-09-26 14:55:55'),
(3, 'Câu bị động', 'cau-bi-dong', 1, 4, 1, 0, '2018-09-26 14:55:55', '2018-09-26 14:55:55'),
(4, 'Câu điều kiện', 'cau-dieu-kien', 1, 6, 1, 0, '2018-09-26 14:55:55', '2018-09-26 14:55:55'),
(6, 'Các định luật bảo toàn', 'cac-dinh-luat-bao-toan', 2, 6, 2, 0, '2018-09-26 14:55:55', '2018-10-31 16:33:14'),
(7, 'Phương trình bậc nhất', 'phuong-trinh-bac-nhat', 3, 4, 3, 0, '2018-09-26 14:55:55', '2018-10-31 16:10:30'),
(8, 'Giải phương trình bậc hai', 'giai-phuong-trinh-bac-hai', 3, 6, 0, 0, '2018-09-26 14:55:55', '2018-10-30 07:38:50'),
(9, 'Hệ phương trình bậc nhất', 'he-phuong-trinh-bac-nhat', 3, 6, 1, 0, '2018-09-26 14:55:55', '2018-09-26 14:55:55'),
(10, 'Tập làm văn', 'tap-lam-van', 4, 4, 0, 0, '2018-09-26 14:55:55', '2018-11-02 15:58:12'),
(11, 'Thơ văn', 'tho-van', 4, 4, 1, 0, '2018-09-26 14:55:55', '2018-09-26 14:55:55'),
(12, 'Đảng cộng sản Việt Nam ra đời', 'dang-cong-san-viet-nam-ra-doi', 5, 5, 1, 0, '2018-09-26 14:55:55', '2018-09-26 14:55:56'),
(13, 'Trận chiến sông Bạch Đằng', 'tran-chien-song-bach-dang', 5, 7, 3, 0, '2018-09-26 14:55:56', '2018-10-31 17:39:28'),
(14, 'HTML', 'html', 6, 4, 1, 0, '2018-09-26 14:55:56', '2018-09-26 14:55:56'),
(15, 'PHP', 'php', 6, 6, 1, 0, '2018-09-26 14:55:56', '2018-09-26 14:55:56'),
(16, 'CSS', 'csc', 6, 8, 1, 0, '2018-09-26 14:55:56', '2018-09-26 14:55:56'),
(17, 'Javascript', 'javascript', 6, 10, 1, 0, '2018-09-26 14:55:56', '2018-09-26 14:55:56'),
(18, 'Văn học dân gian', 'van-hoc-dan-gian', 4, 7, 1, 0, '2018-09-28 02:16:00', '2018-11-02 15:58:34'),
(40, 'Động lực học chất điểm', 'dong-luc-hoc-chat-diem', 2, 4, 1, 0, '2018-11-01 14:09:44', '2018-11-01 14:09:44'),
(41, 'Block', 'block', 1, 7, 0, 0, '2018-11-07 15:34:12', '2018-11-07 15:34:12'),
(42, 'Block', 'block', 1, 7, 0, 0, '2018-11-07 17:02:49', '2018-11-07 17:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `topic_user`
--

CREATE TABLE `topic_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `answered` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_user`
--

INSERT INTO `topic_user` (`id`, `topic_id`, `user_id`, `total`, `answered`, `created_at`, `updated_at`) VALUES
(43, 2, 5, 20, '[[10],[17],[22],[26],[31],[35],[39],[43]]', '2018-10-09 09:14:26', '2018-10-09 09:14:26'),
(45, 14, 4, 10, '{\"0\":[53],\"1\":[60],\"2\":[64],\"3\":[67],\"5\":[74]}', '2018-10-11 02:55:14', '2018-10-11 02:55:14'),
(46, 2, 4, 15, '[[10],[17],[23],[27],[30],[34],[37],[42],[48],[49]]', '2018-10-15 04:14:48', '2018-10-15 04:14:48'),
(56, 18, 4, 25, '[[81,82,84],[88,90],[93],[97,98,99],[104],[106]]', '2018-10-15 14:20:05', '2018-10-15 14:20:05'),
(59, 18, 4, 25, '{\"0\":[81,82,84],\"2\":[93],\"3\":[97,98,99],\"4\":[104],\"5\":[106]}', '2018-10-15 16:40:09', '2018-10-15 16:40:09'),
(60, 2, 4, 0, '[]', '2018-10-16 01:47:25', '2018-10-16 01:47:25'),
(61, 14, 5, 25, '[[53],[58],[63],[67],[72],[74],[78]]', '2018-10-16 09:26:17', '2018-10-16 09:26:17'),
(62, 2, 6, 25, '[[11],[17],[23],[26],[30],[34],[39],[43],[48],[50]]', '2018-10-16 09:29:27', '2018-10-16 09:29:27'),
(63, 14, 6, 15, '[[53],[59],[63]]', '2018-10-16 09:32:25', '2018-10-16 09:32:25'),
(65, 12, 4, 0, '{\"0\":[110],\"1\":[114],\"2\":[117,120],\"3\":[122,123,124],\"4\":[127,130],\"6\":[137,139]}', '2018-10-18 08:51:02', '2018-10-18 08:51:02'),
(66, 18, 7, 15, '[[82,83],[87,88],[93],[97,98,99],[103],[106]]', '2018-10-18 15:43:26', '2018-10-18 15:43:26'),
(67, 2, 11, 25, '[[11],[17],[22],[27],[30],[36],[37],[41],[47],[50]]', '2018-11-05 01:12:17', '2018-11-05 01:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `avatar`, `phone_number`, `address`, `email`, `provider`, `provider_id`, `access_token`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Hero Gustin', 'Hero', 'Gustin', '1539843929.jpg', NULL, 'New York', 'herogustin@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$l6/UnAkFE1hbvs.mzg1t8eAlrnTt6rqKHBPcm9914JhHWVr2BabMS', 1, 'LLDcsBuZpRtO8XcyFgHqTrACWKyjrncllxQN75kgeNx1xheN2PaccUuHjPHI', '2018-10-09 06:15:56', '2018-10-23 01:44:46'),
(5, 'RedHero', NULL, NULL, '1539481851.jpg', NULL, NULL, 'redhero@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$1aqt1DAweey00Y05PTMO/uE1CQzGGbeVV7rpALFtVVUKhCkMEaKda', 2, 'c8DXhvwHjYLodW1G58OsZgV0NTlWRR7GeRpxM2tDXbM5Wj2RMsrEjbvf2d8T', '2018-10-09 07:23:58', '2018-10-14 01:50:52'),
(6, 'Emma', 'Emma', 'Watson', '1541564923.jpg', NULL, 'London, England', 'emma@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$/VMssU.mqL2mniwlTLmzAOoDw4TiKIPKR0XY1snvNL.cYdxTE6FLS', 1, 'vtfuUyDHk5DuXNX23pDI71LJp9ecCYC4nx6VJHg8LRRfQtSd0eyU87BliUm6', '2018-10-14 01:54:10', '2018-11-07 04:28:43'),
(7, 'Taylor', NULL, NULL, '1539843744.jpg', NULL, NULL, 'frog.dbsk.cass@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$LaEZbqTE48KyLSabe0MGf.Sv76.GyVxyJWZzoPIQzmc8O/fPAF.lS', 2, 'U2RMqlu1pnmiMG3cNC80mcDYvzo7VaujkuMr7ibzOf4gEpDDHttJW5yvGyNw', '2018-10-18 04:37:23', '2018-11-03 01:56:45'),
(8, 'Red', NULL, NULL, NULL, NULL, NULL, 'redhero1996@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$zbTIZl9s3XJLSCw0CaZ4Te2ipmV.qNHrEYrbmmuj2djShU6PcsnyS', 2, '7FOxD6E8lKXCxNgOquJF7LNe9vilXRPn9DPmjCWXdDoOQD1rTkONPejd9cYj', '2018-10-18 16:08:18', '2018-10-18 16:08:18'),
(10, 'Hero Gustin', NULL, NULL, '', NULL, NULL, 'herogustin1986@gmail.com', 'facebook', '197856630991177', 'EAASEY7vs0qMBANar8xaNL6KwRl0J6oY69hyzm4iY4HEEqZBO21UZAuB8yBKSbiHJdscZCRB2Weg0FL8238xtSuqhx4s4WEzpXNCZAZCvTu4yF5E9JwL4K1w49Ckpmj1OwYO076fSh26wgs4xT4klW2PIfMzFFNNNGZAPrsz1FF7wZDZD', NULL, '', 2, 'XZ3xEy61yNchYarM04uqX2lZTlVzRPbqt35ABE6v62M1mNR01BQ1Mp6zzf2Y', '2018-10-19 04:53:40', '2018-10-19 04:53:40'),
(11, 'Chi Nguyen', NULL, NULL, '1541344722.jpg', NULL, 'Bắc Ninh', 'chinguyen270296@gmail.com', 'google', '103433988440606455875', 'ya29.GltKBiI7K7wCBfJaa51V7lzne1HAdzYgEjLeSVLha7IacseBEWEIR9enJMjhQC1VuWlSOdD5zjBeP3G5OgZu888xm3aikWXuVR2FhCYEQ4uTHEiGpyaPteNzf6uL', NULL, '$2y$10$9D5EawF1lygYHGYhRve0s.7aqMX/HSZsdVVOcsu.2YBWid3o8lknW', 2, '5xtwnQrmGobL2IFxUQWVZZCmcIeUSCGYwI3vjqam9STtfZmN8bIflDZmsw3K', '2018-11-04 14:45:52', '2018-11-04 15:18:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_question_id_foreign` (`question_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_topic`
--
ALTER TABLE `question_topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_topic_topic_id_foreign` (`topic_id`),
  ADD KEY `question_topic_question_id_foreign` (`question_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topics_category_id_foreign` (`category_id`);

--
-- Indexes for table `topic_user`
--
ALTER TABLE `topic_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_user_topic_id_foreign` (`topic_id`),
  ADD KEY `topic_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `question_topic`
--
ALTER TABLE `question_topic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `topic_user`
--
ALTER TABLE `topic_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_topic`
--
ALTER TABLE `question_topic`
  ADD CONSTRAINT `question_topic_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `question_topic_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topic_user`
--
ALTER TABLE `topic_user`
  ADD CONSTRAINT `topic_user_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `topic_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
