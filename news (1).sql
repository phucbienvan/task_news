-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3307
-- Thời gian đã tạo: Th5 27, 2021 lúc 03:57 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `news`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Thể thao', 'Bóng đá, cầu lông, ...Việt Nam và Thế giới', '2021-05-24 21:55:02', '2021-05-26 20:41:03'),
(2, 'Thế giới, xã hội', 'điểm nóng, quân sự, ..', '2021-05-24 22:01:00', '2021-05-25 10:04:45'),
(3, 'Giải trí', 'phim, ca nhạc, ...', '2021-05-24 23:15:52', '2021-05-24 23:15:52'),
(5, 'Giáo dục', 'Tuyển sinh, hoa học trò', '2021-05-25 00:08:09', '2021-05-25 00:08:09'),
(6, 'Du lịch', 'du lịch Việt Nam, du lịch Thế giới', '2021-05-26 04:21:46', '2021-05-26 11:10:14'),
(7, 'Ẩm thực', 'Ẩm thực 3 miền', '2021-05-26 10:45:37', '2021-05-26 10:45:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `news_id`, `category_id`, `contents`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'rất hay ạ', '2021-05-25 11:24:07', '2021-05-25 11:24:07'),
(7, 2, 4, 1, 'hay', '2021-05-26 04:25:36', NULL),
(8, 2, 1, 1, 'hay', '2021-05-26 11:57:49', NULL),
(9, 10, 4, 1, 'chuc mung viet nam', '2021-05-27 00:53:26', '2021-05-27 00:53:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_05_24_161737_create_category_table', 1),
(4, '2021_05_24_162257_create_news_table', 2),
(5, '2021_05_24_163410_create_comments_table', 3),
(6, '2021_05_24_163820_create_slides_table', 4),
(7, '2021_05_25_013904_create_users_table', 5),
(8, '2021_05_25_182144_create_comments_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `name`, `category_id`, `desc`, `contents`, `image`, `status`, `views`, `created_at`, `updated_at`) VALUES
(1, 'Hazard xin rời Real nhường chỗ cho Mbappe, bất ngờ cầu cạnh Chelsea cứu giúp', 1, 'Hazard biết Mbappe sắp đến Real Madrid nên đã chủ động xin trở lại Chelsea.', 'Hazard là một thất bại chuyển nhượng to đùng cho Real Madrid bởi không những thi đấu không được nhiều, Hazard đã sang tuổi 30 và giờ không còn giá trị bán lại cao. Anh được đánh giá là một ngôi sao kém cỏi khi so sánh với những người đi trước ở sân Bernabeu, những Cristiano Ronaldo, Raul Gonzalez, Emilio Butragueno hay xa hơn là Alfredo Di Stefano đều được coi là những người giàu tham vọng và luôn tiến bộ bản thân trong khi Hazard thả nổi lối sinh hoạt của mình khiến chấn thương liên miên. Trong khi Real chưa biết nên đẩy Hazard đi theo cách nào thì mới đây nhà báo Edu Aguirre đã tiết lộ một thông tin đáng chú ý về cầu thủ người Bỉ. Hazard biết rằng Real Madrid đang tập trung đưa Kylian Mbappe về CLB và nếu vị trí của anh không mất vào tay tiền đạo người Pháp thì Real cũng sẽ dùng một cầu thủ trẻ hơn như Marco Asensio hay Vinicius Jr ở vị trí của Hazard. Hơn nữa anh và gia đình cũng không thực sự ưa cuộc sống tại Madrid, chủ yếu do Hazard đã ở khá lâu tại Anh và giữa hai quốc gia có khác biệt văn hóa quá lớn, lẫn việc thành phố này đang trải qua giai đoạn giãn cách kéo dài. Aguirre cho hay ưu tiên của Hazard chính là trở lại CLB cũ Chelsea, một môi trường quen thuộc nơi anh không bị quản lý khắt khe về mặt sinh hoạt và tập luyện như ở Real. Hazard vẫn có nhà tại London nên việc trở lại và hòa nhập cuộc sống cũ sẽ không phải là quá khó', 'haza.jpg', 0, 0, '2021-05-25 00:38:08', '2021-05-26 22:49:04'),
(3, 'Bệnh mới khiến ngàn người Ấn Độ phải bỏ một mắt có lan ra thế giới?', 2, 'Thống kê do tờ The Times của Anh mới thu thập cho thấy, khoảng 60% bệnh nhân nhiễm bệnh nấm đen, đang được điều trị ở bệnh viện Ấn Độ, phải loại bỏ ít nhất một bên mắt', 'Thống kê do tờ The Times của Anh mới thu thập cho thấy, khoảng 60% bệnh nhân nhiễm bệnh nấm đen, đang được điều trị ở bệnh viện Ấn Độ, phải loại bỏ ít nhất một bên mắt,', 'KzQR_thegioi.jpg', 0, 0, '2021-05-25 02:50:58', '2021-05-26 11:36:33'),
(4, 'ĐT Việt Nam chốt danh sách đá vòng loại World Cup: Bất ngờ bộ đôi sinh năm 2001', 1, 'HLV Park Hang Seo đã chính thức công bố danh sách 29 cầu thủ ĐT Việt Nam tham gia thi đấu 3 trận còn lại trong khuôn khổ bảng G, vòng loại thứ hai World Cup 2022 khu vực châu Á.', 'Trong số 28 cầu thủ được lựa chọn của ĐT Việt Nam, có 2 cái tên sinh năm 2000 là tiền vệ Hai Long (Quảng Ninh) và hậu vệ Thanh Bình (Viettel). Ngoài ra còn có 2 sự góp mặt đáng chú ý của 2 tiền vệ Minh Vương (HAGL) và Lý Công Hoàng Anh (Hà Tĩnh). Những ngôi sao sáng giá nhất như Công Phượng, Quang Hải, Quế Ngọc Hải, Xuân Trường, Tuấn Anh, Văn Toàn, Phan Văn Đức… đều góp mặt.</p>\r\n\r\n<p>Bên cạnh đó, Văn Hậu và Trọng Hoàng - hai cầu thủ&nbsp;được chẩn&nbsp;đoán khó bình phục hoàn toàn trước vòng loại&nbsp;<a class=\"TextlinkBaiviet\" href=\"https://www.24h.com.vn/world-cup-2022-c48e2601.html\" style=\"text-decoration-line: none; line-height: 1.6; color: rgb(0, 0, 255);\" title=\"World Cup\">World Cup</a>, vẫn có tên. Họ đều&nbsp;đã tham gia các trận đấu tập gần đây của đội.</p>\r\n\r\n<p>Có&nbsp;10 cầu thủ bị loại so với danh sách triệu tập ban đầu gồm: Văn Hoàng (SLNA), Văn Phong (Sài Gòn), Xuân Mạnh (SLNA), Văn Kiên (Hà Nội), Thanh Thịnh (Đà Nẵng), Minh Tùng (Thanh Hóa), Văn Triền (Sài Gòn), Văn Vũ (Bình Dương), Văn Long (Đà Nẵng), Anh Đức (Long An).</p>\r\n\r\n<p>Theo thông tin từ VFF, ĐT Việt Nam sẽ lên đường đi UAE vào chiều 26/5, sớm 7 ngày so với lịch hoạt động chính thức của AFC. Chuyến bay của ĐT Việt Nam sẽ cất cánh lúc 16h10 tại sân bay Nội Bài (Hà Nội) và dự kiến sẽ tới Dubai (UAE) vào 19h40 giờ địa phương (22h40 giờ Việt Nam).</p>\r\n\r\n<p>Tại UAE, thầy trò HLV Park Hang Seo sẽ được lưu trú tại một khách sạn 5 sao. Đến ngày 3/6, ĐT Việt Nam sẽ chuyển sang khách sạn do AFC sắp xếp cho các đội tham dự các trận đấu tại vòng loại thứ hai&nbsp;<a class=\"TextlinkBaiviet\" href=\"https://www.24h.com.vn/world-cup-2022-c48e2601.html\" style=\"text-decoration-line: none; line-height: 1.6; color: rgb(0, 0, 255);\" title=\"World Cup 2022\">World Cup 2022</a>&nbsp;khu vực châu Á tại UAE.</p>\r\n\r\n<p>Do ảnh hưởng của dịch Covid-19, AFC đã điều chỉnh quy định về đăng ký danh sách cầu thủ. Theo đó, các đội tuyển sẽ chốt danh sách 23 cầu thủ từ danh sách đăng ký ban đầu với thời hạn cuối là 90 phút trước mỗi trận đấu.', '16Kv_dtvn.jpg', 1, 0, '2021-05-25 10:11:36', '2021-05-26 02:22:53'),
(5, 'Malaysia đối mặt khủng hoảng Covid-19 nặng nề nhất Đông Nam Á', 1, 'Đoạn video quay cảnh 5 nhân viên y tế mặc đồ bảo hộ màu trắng cố gắng hồi sức cho một bệnh nhân Covid-19 đang được điều trị tại trung tâm cách ly bên ngoài thủ đô Kuala Lumpur, Malaysia, nhưng thất bại, đã gây sự chú ý đặc biệt.', 'Cuối tuần trước, giới chức Malaysia đã siết chặt biện pháp phòng dịch nhưng chưa tính đến chuyện phong tỏa vì các ngành công nghiệp vẫn cần hoạt động.', 'malai.jpg', 0, 0, '2021-05-26 04:32:12', NULL),
(6, 'Tại sao cha mẹ càng thúc giục thì con cái càng lì lợm, chán ghét, không nghe lời', 5, 'Có một thực tế cho thấy, không phải bất kỳ những gì cha mẹ muốn tốt cho con mình cũng đều được trẻ đón nhận một cách thoải mải.', 'Trong một chương trình tạp kỹ \"Youth Talk\" ở Trung Quốc, một cậu bé đã lên sân khấu khóc và nói rằng, cậu sẽ không bao giờ muốn ăn táo và trứng trong đời. Bởi vì khi cậu học tiểu học, mẹ cậu đã yêu cầu phải ăn 2 thứ này mỗi ngày. Cậu đã vâng lời mẹ của mình ăn táo trong suốt những năm cấp 1, ước tính 2190 quả táo. Sau khi lên cấp 2, mẹ cậu không yêu cầu ăn táo nữa mà chuyển sang ăn trứng, 1 năm rưỡi cậu đã ăn 547 quả trứng.</p>\r\n\r\n<p>Cuối cùng cậu nói:&nbsp;<em>\"Mẹ ơi, tuy rằng táo và trứng rất bổ dưỡng, nhưng cả đời này con không bao giờ muốn ăn 2 thứ này nữa\".</em></p>\r\n\r\n<p>Đứa trẻ bị ép ăn một quả táo hoặc một quả trứng mỗi ngày. Ăn táo trong 6 năm và trứng trong 1,5 năm, quả là một trải nghiệm kinh khủng.', 'CBJ7_Tai-sao-cha-me-cang-thuc-giuc-thi-con-cai-cang-li-lom-chan-ghet-khong-nghe-loi-2-1621922364-245-width600height450.jpg', 1, 0, '2021-05-26 20:45:55', '2021-05-26 20:45:55'),
(8, 'Thực đơn 4 món “bao ngon”, “bao no”, nấu lần nào cũng được khen xuýt xoa', 7, 'Thực đơn này rất thích hợp cho gia đình 3-4 người, toàn là các món ăn quen thuộc, nhưng lại cực kỳ đưa cơm.', 'Ngâm sườn trong nước lạnh 20 phút và rửa sạch nhiều lần. Cho sườn vào âu lớn, thêm 2 thìa nước tương, 1 thìa&nbsp;dầu hào, 1 thìa rượu nấu ăn, lượng hành lá và gừng thái chỉ, lượng muối thích hợp, hạt nêm, ướp trong 15 phút.&nbsp;Sau đó thêm 2 thìa bột bắp vào đảo đều.</p>\r\n\r\n<p>Cho một lượng dầu thích hợp vào nồi, đun nóng rồi vặn lửa nhỏ, cho sườn vào xào từ từ trong khoảng 5 phút đến khi sườn chín. Đổ phần dứa đã cắt vào nồi, đảo đều vài lần, thêm một bát nước nhỏ, đậy vung đun nhỏ lửa trong 2 phút, cuối cùng rắc thêm chút vừng để trang trí.', 'fzQv_Thuc-don-4-mon-bao-ngon-bao-no-nau-lan-nao-cung-duoc-khen-xuyt-xoa-1-1621908368-776-width800height534.jpg', 1, 0, '2021-05-26 20:49:13', '2021-05-26 20:49:13'),
(9, 'Bà Phương Hằng hỏi Vy Oanh 1 câu về Hoài Linh trên livestream: 1 mũi tên trúng 2 đích', 3, 'Theo bà chủ Đại Nam, Vy Oanh “đánh tráo khái niệm” để che đậy quá khứ.', 'Tối 25.5, livestream trên Facebook của doanh nhân Nguyễn Phương Hằng hút hơn 200 nghìn lượt xem, xô đẩy mọi kỷ lục của các nghệ sĩ. Các tài khoản khác của bà Hằng cũng hút lượt xem “khủng”.</p>\r\n\r\n<p>Ngoài chia sẻ về 14 tỷ từ thiện của Hoài Linh, bà chủ Đại Nam đã lên tiếng tố&nbsp;<a class=\"TextlinkBaiviet\" href=\"https://www.24h.com.vn/vy-oanh-c127e3434.html\" style=\"text-decoration-line: none; line-height: 1.6; color: rgb(0, 0, 255);\" title=\"Vy Oanh\">Vy Oanh</a>&nbsp;\"đánh tráo khái niệm\" để che giấu quá khứ.&nbsp;<em>\"Vy Oanh nói hôm trước dân miền Trung cần tiền ngay sao không vào khuyên Hoài Linh đi, 7 tháng rồi. Sẵn đây tôi nói Vy Oanh luôn, tôi không nói người chồng hiện tại của em. Chị nói người khác mà, đừng có chọc chị, chị không muốn nói. Chị không biết chồng sau của em là ai. Dám chơi dám chịu, đừng có đánh tráo khái niệm em ơi. Mình phải biết mình xuất phát từ đâu. Sẵn đây chị nói luôn, em nghe cho rõ, còn em thắc mắc nữa thì chị gọi tên ra luôn nhé em. Em đừng có lừa người ta mà nói người chồng thứ này, chị nói người trước mà. Chị nói chị chịu trách nhiệm, không nói bậy. Câu chuyện này của em cũng nhiều người biết mà em”,</em>&nbsp;bà Hằng nói mà không đưa ra bất cứ bằng chứng nào.', 'SlXa_25-copy-1621990343-524-width1779height932.jpg', 1, 0, '2021-05-26 20:53:15', '2021-05-26 20:53:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `name`, `image`, `desc`, `link`, `created_at`, `updated_at`) VALUES
(1, 'xã hội', 'q7op_image.png', 'Hải phòng phong tỏa 1', 'https://dantri.com.vn/', '2021-05-25 23:14:11', '2021-05-26 20:10:40'),
(2, 'Bóng đá Futsal Viet Nam', 'O2K4_image.png', 'Video ĐT futsal Việt Nam - Lebanon: Bàn thắng lịch sử, vỡ òa đoạt vé World Cup', 'https://www.24h.com.vn/bong-da/video-dt-futsal-viet-nam-lebanon-doi-cong-ruc-lua-lan-xa-giu-thanh-h1-c48a1255585.html', '2021-05-25 23:44:55', '2021-05-26 20:14:06'),
(5, 'Cau', 'Kzbv_image.png', 'cau', 'https://www.24h.com.vn/bong-da/video-dt-futsal-viet-nam-lebanon-doi-cong-ruc-lua-lan-xa-giu-thanh-h1-c48a1255585.html', '2021-05-26 20:12:27', '2021-05-26 20:14:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'phuc', 'FUcm_ava.jpg', 'phuc@gmail.com', '$2y$10$0YUrluvJxcU9yTv4GF31W.BA/e9d8Fu2b.EICcZV4608HonPs7jRq', 1, NULL, '2021-05-27 01:55:08'),
(2, 'Thao', 'yMhS_wendy-red-velvet-chinh-thuc-co-hoat-dong-tro-lai-sau-chan-thuong-8f28a89f.jpg', 'thao@gmail.com', '123', 0, '2021-05-26 01:08:14', '2021-05-26 23:01:33'),
(5, 'van phuc', 'phuc.jpg', 'vanphuc@gmail.canh', '123', 1, '2021-05-26 04:08:16', NULL),
(8, 'phucdz', 'phuc.jpg', 'phucdz@gmail.com', '$2y$10$FbrSd0yVRYFcj8IPxUKEGumnPHI/565NUp2BYfhm5HACmT5NfWpLu', 1, '2021-05-26 17:39:50', NULL),
(10, 'Bluews', 'oPyX_blackpink-jisoo-fc05.jpg', 'ji@gmail.com', '$2y$10$linDMfWGR.4BdupWRFBUAu4PtuocHabxfqDf/fw9tNo0/x41XHvNa', 1, '2021-05-26 18:02:23', '2021-05-27 01:30:30'),
(11, 'lan', 'tegY_blackpink_pepsi.png', 'lan@gmail.com', '$2y$10$p6MjL60mzkLK..j28DNoIOGKK.0nEft66MdetvBGIo.h0d6BpUycm', 0, '2021-05-27 01:49:36', '2021-05-27 01:49:36');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
