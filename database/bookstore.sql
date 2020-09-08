-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 09:14 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `special` tinyint(1) DEFAULT 0,
  `sale_off` int(3) DEFAULT 0,
  `picture` text DEFAULT NULL,
  `created` date DEFAULT '0000-00-00',
  `created_by` varchar(255) DEFAULT NULL,
  `modified` date DEFAULT '0000-00-00',
  `modified_by` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `ordering` int(11) DEFAULT 10,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `description`, `price`, `special`, `sale_off`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `category_id`) VALUES
(12, 'UnrealScript Game Programming Cookbook', 'Designed for high-level game programming, UnrealScript is used in tandem with the Unreal Engine to provide a scripting language that is ideal for creating your very own unique gameplay experience. By learning how to replicate some of the advanced techniques used in today\'s modern games, you too can take your game to the next level and stand out from the crowd.\r\n\r\nBy providing a series of engaging and practical recipes, this \"UnrealScript Game Programming Cookbook\" will show you how to leverage the advanced functionality within UDK. You\'ll be shown how to implement a wide variety of practical features using the high-level scripting language ranging from designing your own HUD, creating your very own custom tailored weapons, to generating pathfinding solutions, and even meticulously crafting your own AI.', '25000', 0, 20, 'mj5oqp18.jpg', '2013-12-12', 'admin', '2013-12-25', 'admin', 'active', 3, 4),
(13, 'Hướng Dẫn Sử Dụng Máy Tính Khoa Học Casio ', 'Hướng Dẫn Sử Dụng Máy Tính Khoa Học Casio Fx - 580 Vn X Trong Chương Trình Phổ Thông', '120000', 0, 7, 'flve5q9d.jpg', '2020-08-11', 'admin', '2013-12-13', 'admin', 'active', 1, 3),
(14, 'Sách Tài Chính Cá Nhân Cho Người Việt', 'Cuốn sách “Tài chính cá nhân dành cho người Việt Nam” và bộ bài giảng trực tuyến tặng kèm, gồm tất cả những nội dung về tài chính cá nhân, như sau:\r\n\r\nKiếm tiền: Khi còn có thể làm việc, chúng ta cần kiếm tiền, tạo ra thu nhập với \"công suất\" lớn nhất.\r\nTiết kiệm tiền, sử dụng tiền: Chúng ta phải quản lý tiền hiệu quá, sử dụng tiền khôn ngoan. Đặc biệt, chúng ta phải tiết kiệm trước khi sử dụng.\r\nBảo vệ tiền: Chúng ta phải biết bảo vệ tiền, sự mất mát của tiền trước những rủi ro.\r\nĐầu tư tiền: Tiền phải sinh ra tiền. Chúng ta phải đầu tư để tiền tăng trưởng và đạt được mục tiêu tài chính cá nhân.\r\nMục tiêu tài chính cá nhân: An toàn, Đảm bảo, Độc lập, và Tự do tài chính.\r\nTác giả cuốn sách là Doanh nhân, Chuyên gia tài chính Lâm Minh Chánh.', '200000', 0, 0, '562q8ufx.jpg', '2020-08-11', 'admin', '2013-12-12', 'admin', 'active', 2, 2),
(15, 'Giáo Trình Tự Học Autocad 2019', 'Giáo Trình Tự Học AutoCAD 2019 Thực Hành Bằng Hình Minh Họa (Kèm CD Bài Tập) Mục lục: Chương 1: Bắt Đầu Autocad 2019 Chương 2: Các Kỹ Năng Vẽ Cơ Bản Chương 3: Sử Dụng Trình Trợ Giúp Vẽ Chương 4: Chỉnh Sửa Các Thực Thể Chương 5: Định Hình Các Đường Cong Chương 6: Kiểm Soát Các Thuộc Tính Và Diện Mạo Đối Tượng Chương 7: Tổ Chức Các Đối Tượng Chương 8: Hatch Và Gradient Chương 9: Làm Việc Với Các Block Và Xref Chương 10: Tạo Và Chỉnh Sửa Văn Bản Chương 11: Xác Định Kích Thước Chương 12: Duy Trì Kiểm Soát Bằng Các Ràng Buộc Chương 13: Làm Việc Với Các Bố Cục Và Chú Thích Đối Tượng Chương 14: Các Phím Tắt Và Lệnh Tắt', '100000', 0, 5, 't90gnka1.jpg', '2020-08-11', 'admin', '2013-12-13', 'admin', 'active', 3, 3),
(16, 'Tự Học Photoshop CC Toàn Tập', 'Tự Học Photoshop CC (Toàn Tập) là quyển sách sẽ giúp các bạn hiểu rõ các kiến thức cơ bản và nâng cao của photoshop, hiểu rõ từng công cụ, nút lệnh và filter.\r\nQuyển sách đã sưu tầm và cung cấp tài liệu học tập giáo trình Photoshop chuẩn xác và đầy đủ, phù hợp với cả đối tượng người mới bắt đầu học chương trình cơ bản và người cần học photoshop nâng cao để phục vụ cho công việc của mình.', '120000', 1, 25, 'y9fab18x.jpg', '2020-08-11', 'admin', '2013-12-13', 'admin', 'active', 3, 3),
(17, 'Đừng Bao Giờ Đi Ăn Một Mình (Tái Bản)', 'Bạn mong muốn đi tắt đón đầu?\r\n\r\nBạn muốn vững bước đến thành công?\r\n\r\nCông thức để làm được điều này, theo lời bậc thầy về kết nối là Keith Ferrazzi, chính là phải biết làm quen với mọi người. Ferrazzi đã khám phá từ khi còn trẻ rằng điểm khác biệt của những người thành công rực rỡ chính là cách họ vận dụng quyền năng của những mối quan hệ - để mọi người cùng thắng.\r\n\r\nTrong quyển sách Đừng bao giờ đi ăn một mình, Ferrazzi chỉ ra từng bước cách thức - và lý do - mà chính ông đã áp dụng để kết nối với hàng ngàn người là đồng nghiệp, bạn bè có tên trong số danh bạ, những người ông đã giúp đỡ và ngược lại cũng sẵn sàng giúp đỡ ông.\r\n\r\nFerrazzi sinh ra trong một gia đình có cha là công nhân nhà máy thép tỉnh lẻ và mẹ là lao công. Tuy vậy ông đã biết tận dụng khả năng kết nối xuất sắc của mình để dọn đường vào đến Yale, nhận bằng MBA tại Harvard, và giữ những chức vụ lãnh đạo quan trọng. Mặc dù chưa quá 40, Ferrazzi đã tạo được một mạng lưới trải dài từ hành lang ở Washington đến các tên tuổi lớn tại Hollywood. Ông đã được tạp chí Crain bình chọn là một trong số 40 người lãnh đạo kinh doanh dưới 40 tuổi đồng thời là Nhà lãnh đạo tương lai của thế giới tại Diễn đàn Kinh tế Thế giới ở Davos.', '112000', 0, 50, 'd0wb59hk.jpg', '2020-08-11', 'admin', '2013-12-12', 'admin', 'active', 3, 2),
(18, 'Tủ sách Phát triển Kỹ năng Sống vui, sống khỏe (24 cuốn)', 'Tủ sách Phát triển Kỹ năng Sống vui sống khỏe gồm 3 bộ với 24 cuốn tuyệt vời dưới đây có thể góp phần giúp bố mẹ hoàn thành tâm nguyện đó.\r\n\r\nTủ sách Phát triển Kỹ năng Sống vui, sống khỏe có rất nhiều câu chuyện thú vị, gần gũi với trẻ em, giúp trẻ có kiến thức về cơ thể, phát triển tâm sinh lý lành mạnh và cải thiện các kỹ năng xã hội cần thiết.', '450000', 0, 25, '90f4xslh.jpg', '2020-08-11', 'admin', '2013-12-12', 'admin', 'active', 10, 4),
(19, 'Khéo Ăn Nói Sẽ Có Được Thiên Hạ', 'Trong xã hội thông tin hiện đại, sự im lặng không còn là vàng nữa, nếu không biết cách giao tiếp thì dù là vàng cũng sẽ bị chôn vùi. Trong cuộc đời một con người, từ xin việc đến thăng tiến, từ tình yêu đến hôn nhân, từ tiếp thị cho đến đàm phán, từ xã giao đến làm việc... không thể không cần đến kĩ năng và khả năng giao tiếp. Khéo ăn khéo nói thì đi đâu, làm gì cũng gặp thuận lợi. Không khéo ăn nói, bốn bề đều là trở ngại, khó khăn. Trong thời đại thông tin và liên lạc phát triển nhanh chóng, tin tức được cập nhật liên tục, các công cụ thông tin và kĩ thuật truyền thông được ứng dụng rộng rãi như ngày nay thì việc khéo ăn nói đã trở thành “cái tài số một thiên hạ”. Trong khoảng thời gian ngắn nhất, nếu ai có thể nêu bật được khả năng, thực lực của mình cho đối phương biết thì đó sẽ là người chiến thắng. Chính vì vậy mà câu nói “Khéo ăn nói sẽ có được thiên hạ” rất có ý nghĩa. Vậy, như thế nào mới gọi là biết cách ăn nói? Nói năng lưu loát, không ấp úng có được gọi là biết cách nói chuyện không? Nói ngắn gọn, nói ít nhưng ý nghĩa thâm sâu có được gọi là biết cách nói chuyện không? Hay nhất định phải nói nhiều mới là biết nói chuyện?', '110000', 0, 31, '9ipq3ojv.jpg', '2020-08-11', 'admin', '2013-12-12', 'admin', 'active', 3, 2),
(20, 'Kinh Tế Học - Khái Lược Những Tư Tưởng Lớn', 'Điều gì xảy ra trong giai đoạn khủng hoảng kinh tế? Tiền tệ vận hành ra sao? Vì sao chúng ta phải đóng thuế? Kinh tế học ảnh hưởng đến từng khía cạnh của đời sống của chúng ta, từ việc đi làm đến cách tiêu tiền và các ý tưởng kinh tế lớn vẫn đang tiếp tục định hình thế giới ngày nay.\r\n\r\nKinh Tế Học - Khái Lược Những Tư Tưởng Lớn được viết với văn phong đơn giản kèm theo các biểu đồ giải thích ngắn gọn, dễ hiểu các lí thuyết quan trọng. Ngoài ra còn có các câu trích dẫn kinh điển dễ nhớ và các hình minh họa dí dỏm, mang lại niềm hứng thú khi tìm hiểu về kinh tế học.\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Tuy nhiên tuỳ vào từng loại sản phẩm hoặc phương thức, địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, ...', '390000', 0, 35, 'km13vdij.jpg', '2020-08-11', 'admin', '2013-12-12', 'admin', 'active', 3, 2),
(21, 'Economix - Các Nền Kinh Tế Vận Hành', 'Nếu các bạn từng tìm cách hiểu những khái niệm kinh tế qua việc đọc vô số giáo trình kinh tế học, nhưng vẫn thấy thật khó hình dung được bức tranh toàn cảnh về bộ môn này, thì cuốn sách sẽ cung cấp cho các bạnmột mảnh ghép hoàn chỉnh cho những mảnh nho nhỏ mà các bạn đã đọc qua.\r\nChúng ta sẽ hiểu rõ hơn về những khái niệm kinh tế cơ bản cùng những học thuyết kinh tế lớn còn ảnh hưởng tới ngày nay, qua tư tưởng của các nhà kinh tế học lớn như: Adam Smith, John K\r\nCó thể coi đây là một cuốn sử về lịch sử kinh tế thế giới kể từ khi nền kinh tế hàng hóa ra đời. Chúng ta sẽ lướt qua vài thế kỷ với vô số học thuyết về kinh tế học cùng những vụ khủng hoảng kinh tế lớn như thể đang đọc một cuốn truyện tranh, cả bi lẫn hài, căng thẳng mà không kém phần sảng khoái.\r\n“Cuốn sách hóm hỉnh và thú vị này động chạm đến vô số vấn đề phức tạp – kinh tế học, lịch sử và tài chính – và khiến những vấn đề ấy trở nên dễ hiểu với cả những người dốt nhất.”', '150000', 0, 42, 'w6x49fbi.jpg', '2020-08-11', 'admin', '2013-12-12', 'admin', 'active', 3, 2),
(22, 'Học Cách Thiết Kế Slide', 'Dù ở cấp bậc nào trong một tổ chức thì hẳn bạn cũng đã từng có lần thực hiện một bài thuyết trình quan trọng trước đồng nghiệp, cấp trên, khách hàng, hoặc công chúng. Phần mềm thuyết trình là một trong trong những công cụ đòi hỏi người làm công việc chuyên môn phải tư duy bằng hình ảnh trực quan gần như hằng ngày. Nhưng khác với các kỹ năng liên quan đến ngôn ngữ, việc thể hiện hiệu quả bằng hình ảnh không phải là một kỹ năng dễ dàng, bẩm sinh, hoặc được chủ động giảng dạy trong trường học hay trong các chương trình đào tạo về kinh doanh. Học cách thiết kế slide ra đời để lấp vào chỗ trống đó. Tác giả của cuốn sách là Nancy Duarte, Giám đốc Công ty Duarte Design, hãng thiết kế đứng đằng sau bài thuyết trình đã mang lại giải Oscar cho Al Gore trong bộ phim tài liệu Một Sự thật Bất tiện. Kết hợp lối tư duy trừu tượng và lối thiết kế truyền cảm hứng, đan xen vào đó là những nghiên cứu điển hình sắc sảo từ những thương hiệu hàng đầu thế giới, cuốn sách này mang đến những phương pháp tiếp cận đầy thực tế trong việc phát triển nội dung bằng hình ảnh mà bất kỳ ai cũng có thể vận dụng. Với Học cách thiết kế slide, bạn sẽ học được cách: Tạo dựng mối liên hệ với những đối tượng khán giả cụ thể Biến ý tưởng thành những tác phẩm đồ họa hàm chứa nhiều thông tin Sử dụng hiệu quả các kỹ thuật phác họa và lập biểu đồ Sáng tạo nên những hình ảnh đồ họa giúp khán giả dễ dàng xử lý thông tin Phát triển các bài thuyết trình thực sự có sức ảnh hưởng Sử dụng công nghệ thuyết trình để tạo lợi thế cho mình Hàng triệu bài thuyết trình và hàng tỉ slide đã và đang ra đời, nhưng phần lớn trong số đó đều không hoàn thành được sứ mệnh của mình. Học cách thiết kế slide sẽ thách thức phương pháp xây dựng slide truyền thống của bạn thông qua việc hướng dẫn bạn trở thành một người biết tư duy bằng hình ảnh. Cuốn sách còn giúp ích cho bạn trên con đường sự nghiệp bằng cách mang đến cho bạn một đà phát triển mới.', '240000', 0, 31, 'vce3g0ni.jpg', '2020-08-11', 'admin', '2013-12-13', 'admin', 'active', 2, 3),
(23, 'Tự Học Excel Bằng Hình Ảnh', 'in Học Văn Phòng, Tự Học Excel Bằng Hình Ảnh (Phiên Bản 2019-2016-2013)\r\nTự học excel bằng hình ảnh. Là tập 2 trong bộ sách này gồm trên 100 bài tập khám phá những bí mật, hướng dẫn và giải thích các thủ thuật giúp các bạn tiết kiệm thời gian cũng như đạt năng suất hơn khi làm việc với excel phiên bản 2010,2013 cũng như 2016. Với bố cục chặt chẽ, trình bày rõ ràng, dễ dàng sử dụng cho phép bạn thực hành xuyên suốt tất cả các bài tập từ bắt đầu đến kết thúc hoặc chuyển đến bài tập nào tùy ý, sách là tài liệu không thể thiếu cho các học sinh, sinh viên, các nhân viên văn phòng và nhiều hơn nữa khai thác và sử dụng hiệu quả excel trong công việc Sách gồm 10 chương(100 bài tập) và 2 chương hướng dẫn sử dụng excel 2016 .', '134000', 1, 20, '8aexhniw.jpg', '2020-08-11', 'admin', '2020-07-15', 'admin', 'active', 3, 3),
(24, 'Sách kỹ năng sống cho học sinh tiểu học', 'Combo Trọn bộ sách kỹ năng sống cho học sinh tiểu học gồm:\r\n1. Kỹ năng giao tiếp, ứng xử cho học sinh tiểu học\r\n2. Kỹ năng tạo thói quen tốt cho học sinh tiểu học\r\n3. Kỹ năng tự bảo vệ cho học sinh tiểu học\r\n4. Kỹ năng tự lập cho học sinh tiểu học\r\n5. Kỹ năng kiềm chế cảm xúc và làm chủ bản thân cho học sinh tiểu học', '266000', 0, 28, '5mjl6dsv.jpg', '2020-08-11', 'admin', '2020-07-15', 'admin', 'active', 2, 4),
(30, 'Ngôn Từ Phiêu Lưu Ký - Khi Những Điều Lấp Lánh Được Gọi Tên', 'Một hành trình đi qua những điều lấp lánh, qua 30 vùng đất cùng 33 từ lạ lùng và đẹp đẽ.\r\nThế giới có khoảng 7.000 ngôn ngữ, đồng nghĩa với việc có nhiều từ thật đặc biệt tồn tại. Những ý niệm về hạnh phúc đôi khi đơn giản được gói gọn trong những từ như thế…\r\nCó quá nhiều thứ phải làm khiến bạn trở nên quá tải? Hãy thử tận hưởng chút dolce far niente – hay sự ngọt ngào của việc không làm gì, và một ly Prosecco của người Ý.\r\nĐi uống với bạn bè cũng vui đấy, nhưng bạn đã bao giờ thử kalsarikännit như người Phần Lan, nhâm nhi chút rượu ở nhà (và chỉ mặc một bộ đồ lót thật thoải mái).\r\nĐôi khi bạn cảm thấy u sầu với những ký ức xưa, hãy để Saudade của người Brazil giúp bạn tận hưởng hạnh phúc trong chính nỗi buồn đó.\r\nBằng các câu chuyện thú vị và tràn đầy cảm hứng, Ngôn từ phiêu lưu ký dẫn bạn phiêu lưu qua các vùng đất, gọi tên những điều lấp lánh. Và nhận ra ngôn ngữ thật kỳ diệu, khi chỉ một từ thôi mà có thể chứa đựng chừng ấy ký ức, chừng ấy xúc cảm, chừng ấy rung động…', '111200', 0, 20, 'e2ml94rf.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 1, 9),
(31, 'Ichigo Ichie - Nhất Kỳ Nhất Hội', 'Trong một trà thất cổ tại Kyoto, có một tấm biển bằng gỗ treo trên một cột trụ tối màu khắc dòng chữ: 一期一会\r\nIchigo ichie – Nhất kỳ nhất hội, cụm từ mang nghĩa là “một lần, một cuộc gặp gỡ”, hay “vào khoảnh khắc này, một thời cơ”.\r\nTriết lý này gắn liền với nghi lễ trà đạo của Nhật Bản. Một nghi thức mà người chủ nhà cùng những vị khách của mình quý trọng từng chi tiết được chuẩn bị của buổi lễ và tham dự nó bằng cả trái tim mình, với ý thức rằng mỗi khoảnh khắc đều thật đặc biệt và độc nhất.\r\n\r\nTrong cuộc đời bạn sẽ có bao nhiêu cơ hội gặp gỡ? Những người bạn nói chuyện hôm nay liệu còn được hội ngộ lần sau? Bầu trời mà lúc này bạn bỏ qua có còn xanh ngắt vào ngày mai? Những cảm xúc, đam mê trong hiện tại liệu sẽ vẹn nguyên đến mai này?\r\nTừ đó, ichigo ichie luôn là một ý niệm được trân quý, một lời nhắc nhở con người rằng: Hiện tại là một món quà, thứ kho báu tuyệt đẹp sẽ không bao giờ lấy lại được. Nếu ta để nó trôi qua mà không trân trọng, cơ hội sẽ vĩnh viễn biến mất.\r\nVậy nên, hãy sống thật trọn vẹn từng khoảnh khắc vốn chỉ có một lần trong đời.', '99000', 0, 20, '7n9ufemo.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 2, 9),
(32, 'Con Đường Hồi Giáo (Tái Bản 2020)', 'Con Đường Hồi Giáo (Tái Bản 2020)\r\n\"Bởi tôi biết còn có rất nhiều điều thiêng liêng hơn niềm tin tôn giáo, ấy là niềm tin vào sự ràng buộc cội rễ của giống loài; vào sự giống nhau giữa người với người hơn là sự khác biệt về đức tin; vào lòng tốt; vào sự đồng cảm và hướng thiện.\r\nTôi tin là một khi đặt chân đến Trung Đông, với trái tim này mở toang không che giấu, những người Hồi rồi cũng sẽ mở lòng với tôi - một cô gái Việt Nam vô thần.\"\r\n(Nguyễn Phương Mai)', '100000', 0, 35, '1kjsv9wx.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 2, 9),
(33, 'Tư Duy Như Sherlock Holmes', 'CẢI THIỆN NĂNG LỰC QUAN SÁT, GHI NHỚ VÀ SUY LUẬN CỦA BẠN\r\n“ANH NHÌN, NHƯNG ANH KHÔNG QUAN SÁT.”\r\nCuốn sách này sẽ giúp bạn tăng cường năng lực quan sát, ghi nhớ, suy luận và tư duy thông qua những bí quyết và kĩ thuật của vị thám tử nổi tiếng nhất thế giới. Trong sách có các bài phân tích tình huống, câu đố và ví dụ lấy từ nguyên tác.\r\nĐề tài được nói đến gồm: cung điện kí ức, manh mối phi ngôn ngữ, phát hiện nói dối, trực giác, sức tập trung, kĩ năng lắng nghe, cảnh giác, thư giãn, logic, kĩ năng đọc nhanh, quan sát mọi người, sàng lọc thông tin và nhiều đề tài khác.\r\nSau khi đọc sách bạn sẽ có cách nhìn hoàn toàn mới về sự vật, từ chiếc cúc áo, gấu quần cho đến vết xước trên mũi giày!', '55000', 0, 15, 'l7gfab9y.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 3, 9),
(34, 'Who? Chuyện Kể Về Danh Nhân Thế Giới - Alexander Fleming', 'Những câu chuyện về cuộc đời và sự nghiệp vĩ đại của các danh nhân sẽ đem đến cho các em những ước mơ và hoài bão cao đẹp!\r\nHồi nhỏ, Alexander Fleming có thói quen quan sát tỉ mỉ dù chỉ là những thứ nhỏ nhất. Thói quen này vẫn được duy trì ngay cả khi ông đã trở thành bác sĩ và hình thành nên một đức tính vô cùng cẩn trọng khi thực hiện thí nghiệm, kể cả những thí nghiệm thất bại. Nhờ vậy, Alexander Fleming đã phát hiện ra Penicillin, loại thuốc kháng sinh đầu tiên của nhân loại, mở ra kỉ nguyên sử dụng thuốc kháng sinh cứu sống hàng triệu người trên khắp thế giới.\r\n“Thiên nhiên tạo ra Penicillin, tôi chỉ tình cờ phát hiện ra nó mà thôi” - Alexander Fleming.', '55000', 0, 15, 'jq53tyrc.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 4, 9),
(35, 'Thị Dân Tiểu Thuyết', '“Tiểu thuyết là ngôi lời kể lể nhỏ”\r\nThị dân tiểu thuyết là cuốn tiểu thuyết thứ 4 của Nguyễn Việt Hà. Vẫn là không gian phố - ngõ - phố trở đi trở lại trong các tác phẩm của anh, Nguyễn Việt Hà không chỉ đi dọc phố trong không gian đương thời mà còn đi dọc suốt con lộ lịch sử của nó, để tìm ra nguyên ủy hồn phố.\r\nVà để hiện thực hóa một công việc lớn lao viết sử phố.\r\nGương mặt văn chương tiêu biểu – cùng tác giả: Cơ hội của Chúa, Khải huyền muộn, Ba ngôi của người.', '115000', 0, 11, 'ftg4swmr.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 3, 1),
(36, 'Mặt Nạ - Tiểu Thuyết', 'MẶT NẠ NHÂN TÍNH – AI LÀ TÔI? TÔI LÀ AI?\r\nHọ có thực sự hạnh phúc với hình tượng mình gây dựng bao lâu nay trong mắt mọi người? \r\nMỗi buổi sáng thức dậy, đứng trước gương họ thầm nhủ hôm nay mình sẽ diễn vai gì? Một cô gái cá tính hay thục nữ yêu kiều? Một chàng trai phong trần hay quân tử hảo hán? Mọi hỷ - nộ - ái - ố trong lòng, bạn có thực sự muốn chia sẻ với người khác?\r\nNgày ngày họ đeo mặt nạ lên, sắm vai kẻ khác rồi trở nên xa lạ với chính con người thật của mình. Họ - chàng diễn viên hài luôn lẩm bẩm “Biết sai rồi” nhiều lần đến độ u uất, cười nhiều tới mức trầm cảm, đứng trên sân khấu thấy khán giả vui cười mà trong lòng quặn thắt. Họ - nam diễn viên nổi tiếng được xưng tụng “người chồng quốc dân” cứ mỗi lần lên nhận giải thưởng lại giở chiêu trò bày tỏ tình cảm “Vợ ơi anh yêu em”, chẳng biết đang nói với cô vợ danh chính ngôn thuận đương ngồi nhà xem ti vi hay tình nhân phim giả tình thật mỉm cười dịu dàng dưới khán đài. Họ - Nữ diễn viên vốn được mệnh danh có gương mặt trong sáng cao cấp, nhưng để xin thêm cảnh diễn mà bất chấp tất cả, nhắm mắt đưa chân tới tìm nhà sản xuất…\r\nBản thân họ đều mang trong mình một vai diễn, dù vai diễn đó có chuyên nghiêp hay không, họ cứ theo dòng thời gian mà sống như thế, mãi là kẻ mang gương mặt người khác, bản chất con người thật của họ dần trở nên chai sạn rồi ra đi mãi mãi…  Đến ngày kia, họ cần một sự “sụp đổ” để có thể trút gánh nặng hình tượng họ mang vác bấy lâu, tìm lại con người thật đang càng lúc càng xa. \r\n “Mặt nạ” như một chiếc gương phản chiếu đúng nhất con người thật của bạn, bạn có sẵn sàng bỏ lớp trang điểm ra, đứng trước gương nhìn mặt mộc của chính mình?', '98000', 0, 20, 'ln2oqk7v.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 1, 1),
(37, 'Thanh Gươm Công Lý (Tiểu Thuyết)', 'Beyond this place (THANH GƯƠM CÔNG LÝ) kể về hành trình đi tìm công lý của chàng thanh niên Paul Mathry nhằm rửa sạch nỗi oan khuất cho cha mình – Rees Mathry - một người vô tội đã bị kết án chung thân khổ sai tại nhà tù Stoneheath (Ái Nhĩ Lan) vì tội giết người mà ông không hề phạm phải.\r\nTrong THANH GƯƠM CÔNG LÝ cái khiến người ta phải ray rứt đó là liệu có nên đẩy một người vô tội - nhưng chẳng có cống hiến gì đặc biệt - vào tù để thế chỗ cho một con người đang tận tâm hiến mình cho việc săn sóc những người nghèo khổ, bệnh tật, dù chính con người tốt đẹp đó mới là kẻ phạm tội? Ray rứt hơn khi chứng kiến những kẻ là đại diện cho luật pháp lại tìm cách kiếm lợi trên những tội lỗi mà họ được giao trách nhiệm xét xử, và sẵn sàng hất bỏ những ai dám nói ngược, lật ngược lại những phán quyết và hành động được coi là đại diện cho công lý của họ.\r\nCái đẹp nhất trong toàn bộ câu chuyện này chính là niềm tin vào công lý thực sự, lòng can đảm của tuổi trẻ và tình yêu của đứa con với người cha, đã khiến chàng trai trẻ Paul Mathry dấn thân vào công việc tưởng chừng như bất khả thi: tìm lại những nhân chứng, vật chứng của một vụ án đã được xếp lại từ 15 năm trước để cứu cha ra khỏi nhà tù. Thời nào cũng vậy, niềm tin và lòng can đảm luôn có sức mạnh lan tỏa kết nối mọi người để công lý thực sự được hiện diện. Câu chuyện khởi đầu từ thành phố Belfast (Ái Nhĩ Lan) nửa đầu thế kỷ 20 này cũng có một sức mạnh như thế.', '90000', 0, 33, 'r4e8x30o.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 1, 1),
(38, 'Mối Tình Đầu (Tiểu Thuyết)', '\"Đây là quyển sách thích hợp nhất đối với những ai đã trưởng thành, đã trải qua và đã quên đi mối tình đầu của mình.\r\nSau khi đọc xong cuốn tiểu thuyết \"Mối tình đầu\" chỉ muốn thời gian quay lại, tất nhiên là rất khó nhưng không phải là không thể được. Đem sách ra đọc lại lần nữa, sau đó gấp sách, mắt nhắm lại, chúng ta lại chìm vào những hồi ức, dường như tất cả mọi thứ đang một lần nữa hiện ra trước mắt. Có những kí ức rất đẹp nhưng đôi khi lại khiến chúng ta phải phiền não, nhưng một quyển sách có thể đưa bạn trở về những kí ức ngày xưa thì cho dù là hư hay thật cũng không quan trọng nữa, chúng ta đánh lừa bản thân mình để được trở về với kí ức ngày xưa mà vẫn cảm thấy vui vẻ, cũng đáng thôi.\r\nTôi không ngần ngại mà khẳng định rằng \"Mối tình đầu\" là một cuốn tiểu thuyết tuyệt vời, đáng đọc. Nếu bạn đã từng đọc \"Vội vàng\", chắc chắn bạn sẽ muốn đọc \"Mối tình đầu\", nếu trước đây bạn chưa bao giờ thích đọc tiểu thuyết của Cửu Dạ Hồi thì tôi đảm bảo, sau khi bạn đọc xong cuốn tiểu thuyết này, nhất định bạn sẽ thích đọc sách của cô\" (trích Lời tựa)\r\nMời các bạn đón đọc!', '72000', 0, 5, 'f68eldon.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 1, 1),
(39, 'Thánh Địa Tội Ác - Tiểu Thuyết', 'William Faulkner (1897 – 1962) là một tiểu thuyết gia người Mỹ. Đoạt Giải Nobel Văn học năm 1949, và hai giải Pulitzer cho tác phẩm hư cấu vào năm 1955 và 1963, ông là một trong những nhà văn quan trọng nhất của thế kỷ XX.\r\nMục tiêu của mọi người nghệ sĩ là nắm bắt cái động, chính là cuộc đời, bằng những phương thức nhân tạo và giữ nó tĩnh lặng để một trăm năm sau, khi người lạ nhìn vào nó, nó lại chuyển động vì nó là cuộc đời.\r\nWilliam Faulkner\r\nFaulkner đã \"dành thời giờ suy nghĩ những gì mà một con người ở Mississippi tin tưởng là khuynh hướng (đời sống) căn bản hiện nay, cố gắng tìm ra câu trả lời xác đáng nhất, và hư cấu những câu chuyện khủng khiếp nhất mà bản thân tôi có thể tưởng tượng\", tạo ra thứ động lực tinh thần mới trong một đời sống bị đe dọa hủy hoại tới tận cùng mọi biểu hiện. Cũng chính ông là người đưa ra thông điệp: không phải bản thân cái ác, mà nỗi khiếp nhược trước tội ác sẽ làm sụp đổ toàn bộ giá trị mà con người phải trả giá bằng hàng ngàn năm gây dựng, như luật pháp, công lý, nền văn minh.', '160000', 0, 20, 'd0nmot5w.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 1, 1),
(40, 'Bộ sách kỹ năng sống thiết yếu cho trẻ - Quản lý thời gian', '“Bộ sách kỹ năng sống thiết yếu cho trẻ” nằm trong tủ sách kỹ năng sống bán chạy nhất của nhà giáo dục nổi tiếng người Mỹ, JOY BERRY – tác giả của 250 đầu sách viết cho trẻ em, đã bán hơn 85 triệu bản trên toàn thế giới.\r\n\r\nBộ sách không chỉ cung cấp 10 kỹ năng sống quan trọng nhất, căn bản nhất liên quan đến nhiều khía cạnh cuộc đời của trẻ như bản thân, gia đình, bạn bè, học tập, sức khoẻ, thời gian,... mà còn tạo động lực để trẻ sống một cuộc đời có trách nhiệm. Trẻ sẽ học được các kỹ năng cá nhân, kỹ năng xã hội hay kỹ năng ứng biến linh hoạt từ đó hình thành tư duy độc lập, tự chủ, thông minh. Sách phù hợp với trẻ từ 6–12 tuổi.\r\n\r\nTừng trang sách đều có phần đối thoại xoay quanh các tình huống thực tiễn quen thuộc giúp trẻ học được nhiều điều hay với vô vàn niềm vui.\r\n\r\nCuốn Quản lý thời gian: Giúp trẻ làm quen với việc lên kế hoạch và thử nghiệm một số giải pháp quản lý thời gian hiệu quả, cuối cùng là triển khai theo kế hoạch để đạt được các mục tiêu đã đề ra, từ đó làm chủ được cuộc sống của mình.', '45000', 0, 25, 'qsr5vew9.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 1, 4),
(41, 'Kỹ Năng Sống - 101 Câu Chuyện Học Sinh Cần Đọc', 'Kỹ Năng Sống - 101 Câu Chuyện Học Sinh Cần Đọc Giúp Các Em  Tự Tin Và Lạc Quan Trong Cuộc Sống\r\n\r\nBộ sách Kỹ năng sống dành cho học sinh - 101 câu chuyện học sinh cần đọc chọn lọc những câu chuyện ý nghĩa, giúp các em hình thành và bồi dưỡng những phẩm chất đạo đức tốt đẹp: tự tin, lạc quan, nhân ái, kiên trì, biết sống khát vọng... Lời kể ngắn gọn, sinh động, cuối mỗi truyện còn có mục tổng kết \"Bài học lớn sau câu chuyện nhỏ\" để các em thêm thấm nhuần giá trị lớn lao trong từng câu chuyện.\r\n\r\n\"Vào một buổi sáng đầu đông, anh hàng xóm đẩ xe lăn đưa cô bé ra cửa trường mầm non gần nhà. Các bạn nhỏ đang cùng cô giáo hát vui vẻ ở sân trường. Anh nói với cô bé: \"Tiếng hát mới hay làm sao. Chúng ta cùng vỗ tay cổ vũ nhé!\". Cô bé vô cùng nghi hoặc nhìn anh nói: \"Nhưng chúng ta làm sao cổ vũ. Tay của em không thể cử động được, còn anh chỉ có một tay thôi mà!\". Anh hàng xóm cười, sau đó dùng hết sức với đôi bàn tay còn lại vỗ vào ngực mình.\"', '48000', 0, 35, 'mgz6c0jo.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 1, 4),
(42, 'Another - Boxset 4 Tập (Phiên Bản Manga)', 'Các quy tắc cơ bản để đọc Another phiên bản truyện tranh:\r\n\r\n#1: Đừng sốt ruột với khoảng lặng chỉ có tranh.\r\n\r\n#2: Khi nhân vật lặp lại lời thoại, đừng bỏ qua khả năng đó là mấu chốt của vấn đề.\r\n\r\n#3: Trong truyện sẽ xuất hiện vài quy tắc, quy tắc 4 (tứ) là quy tắc chết người (tử).\r\n\r\n#4: Đừng nghĩ phiên bản truyện tranh hoàn toàn giống tiểu thuyết.\r\n\r\nĐây là phiên bản truyện tranh của tiểu thuyết nguyên tác Another, tuy nhiên nội dung với những biến tấu bất ngờ sẽ tạo nên cao trào mới cho tác phẩm. Bên cạnh đó, các khung cảnh từng được mô tả qua ngôn từ giờ sẽ hiện lên trong những khung tranh thực thụ cùng ấn tượng thị giác thể hiện tài tình cả những “khoảng lặng” phía sau con chữ.\r\n\r\nCâu chuyện ba trong một - ma, kinh dị, học đường - về một tập thể lớp hứng chịu tai ương bí ẩn rồi vẫy vùng để cùng nhau vượt qua, lần nữa sẽ lên hình với diện mạo mới, cách thức dẫn dắt trải nghiệm mới không kém phần hấp dẫn phiên bản gốc. Còn với những bạn đọc lần đầu đến với tác phẩm, đây cũng là cánh cửa tuyệt vời, vinh dự đóng vai trò dẫn các bạn đến với câu chuyện lôi cuốn, ma mị, cấu tứ nhiều tầng nhưng ẩn giấu tài tình, chờ đợi khám phá.', '160000', 0, 20, '2si7vkha.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 1, 8),
(43, 'Quán ăn xuyên không', 'Quán Ăn Xuyên Không\r\n\r\nMột ngày tháng 5, gió xuân phơ phất. Quán nhậu mang tên \"Akaneya\" mọc lên giữa thảo nguyên.\r\n\r\nAoi phát hiện cả quán nhậu của mình được \"đóng gói\" chuyển đến một thế giới khác.\r\n\r\nSau hôm ấy, Aoi chính thức trở thành \"người đi lạc\". Ở vương quốc kì bí xa lạ, cô vẫn kiên trì tiếp tục việc kinh doanh quán nhậu của mình. Cô được đón tiếp những vị khách lạ lùng, gặp gỡ những người bạn đặc biệt, tuyển được một anh chàng kỵ sĩ điển trai đến làm công trong quán nhậ\r\n\r\nVà còn khám phá ra năng lực siêu phàm của quán nhậu ấy nữa!', '98000', 0, 19, 'kb7tzo12.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 2, 8),
(44, 'Thám Tử Lừng Danh Conan ', 'Thám Tử Lừng Danh Conan - Những Câu Chuyện Lãng Mạn\r\n\r\nTuyển chọn những câu chuyện lãng mạn từ bộ truyện chính, xoay quanh hai nhân vật chính Conan (Shinichi) và Ran do đích thân tác giả Gosho AOYAMA tuyển chọn.\r\n\r\nChuyện tình giữa Conan và Ran khiến độc giả không sao rời mắt được. Tình cảm giữa họ tiến triển từng bước, như mưa dầm thấm lâu…\r\n\r\nCác bạn hãy theo dõi câu chuyện ngọt ngào (?!) giữa hai người họ nhé!!!\r\n\r\nMỗi cuốn sách đều tặng kèm 1 tấm thiệp Valentine dễ thương.', '45000', 0, 5, 'fd4etaqz.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 1, 8),
(45, 'Thời Gian Tác Chiến', 'Một sinh vật đặc biệt mang hình dáng bạch tuộc tuyên bố sẽ phá hủy Trái Đất, nhưng chẳng hiểu sao lại cho nhân loại một cơ hội. Đó là yêu cầu được dạy một lớp học siêu quậy, và tạo mọi điều kiện cho bọn học trò ám sát mình!?', '22000', 0, 0, '1dq973ob.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 12, 8),
(46, 'Đường Về Nhà (Thiếu Nhi)', 'Cuốn sách này khởi nguồn từ trải nghiệm thời thơ ấu của tác giả. Anh vẽ về thế giới tưởng tượng mở ra trong đầu của đứa trẻ lần đầu đi một mình ra ngõ, trông thấy những cánh cổng, những ô cửa sổ cũ kỹ đầy màu sắc.\r\nDành cho bạn nhỏ 3-6 tuổi', '96000', 0, 45, 'esmof4kz.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 1, 5),
(47, 'Sariya (Văn Học Thiếu Nhi)', '\"Lấp Lánh ước rằng sẽ có một cái tên riêng, một cái tên chỉ dành duy nhất cho mình mà thôi. Nhưng Mẹ Sao nói với cô bé rằng \"Mọi ngôi sao trong dải ngân hà chỉ được gọi cùng cái tên như nhau\"\r\n\r\nLấp Lánh nên làm gì đây? Có thể nào một ngôi sao cũng ao ước trở thành một điều gì đó khác chăng?\"', '40000', 0, 35, 'sq7iapkv.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 1, 5),
(48, 'Truyện Kinh Dị Hay Rùng Mình: Dracula', 'Truyện Kinh Dị Hay Rùng Mình: Dracul\r\n\r\n\"Dành cho những ai biết rằng quái vật là có thật.\"\r\n\r\nDracul được coi là phần trước của Dracula nhưng được viết sau bởi cháu trai của Bram Stoker (tác giả và là người tạo nên nhân vật Dracula) và J.D.Baker (tác giả 4MK), người từng được đề cử giải Bram Stoker dành cho truyện thể loại kinh dị.\r\n\r\nCâu chuyện được viết dựa theo 17 trang tìm được trong 102 trang đã mất của phần bản thảo bị biên tập loại bỏ (vì lý do chính trị) trong cuốn Dracula xuất bản năm 1897 và những ghi chép trong nhật ký của Bram Stoker mà Dacre Stoker có được.\r\n\r\nDracul có bối cảnh những năm 1868, Dracul có nghĩa là Rồng và Dracula là “con của rồng”.\r\n\r\nNhân vật chính trong câu chuyện Dracul chính là Bram Stoker, những chi tiết mô tả về cuộc sống đời thực của ông và gia đình trong truyện là sự thật.\r\n\r\nCâu chuyện bắt đầu với hình ảnh Bram Stoker trong hiện tại, 21 tuổi, tự nhốt mình trong một tòa tháp, bên trong toàn là gương, thánh giá với hoa hồng trắng, có vẻ như đó là những thứ mà anh chuẩn bị để đối phó với một con quái vật hoặc thế lực siêu nhiên nào đó, một thế lực khiến anh vô cùng sợ hãi.', '159000', 0, 12, 'qcys0r1z.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 1, 6),
(49, 'Tự Học 2000 Từ Vựng Tiếng Anh Theo Chủ Đề', 'Tự học 2000 từ vựng tiếng Anh theo chủ đề\r\nMang tiếng học tiếng Anh từ tiểu học nhưng cho đến thời điểm hiện tại bạn vẫn chưa nói được tiếng Anh, chưa hiểu người nước ngoài nói gì và cũng không thể dịch được tài liệu tiếng Anh.\r\nBạn cảm thấy chới với giữa một biển từ vựng mà chẳng biết nên học gì. Bạn hoang mang vì học mãi mà không xong. Bạn băn khoăn nhìn từ vựng nào cũng thấy quen quen nhưng chẳng nhớ nghĩa là gì và cũng chẳng biết là mình đoán đúng hay chưa đúng.\r\nTại sao vậy? Trước giờ mình học tiếng Anh kiểu gì vậy ta???\r\nTừ vựng là nguyên liệu để vận hành cỗ máy ngôn ngữ, nếu không có từ vựng, chúng ta sẽ không thể nào sử dụng được ngôn ngữ ấy. Chính vì vậy, hãy tập trung vào việc trau dồi vốn từ vựng trước khi lo lắng đến việc học những thứ phức tạp hơn như ngữ pháp, luyện viết bài luận tiếng Anh', '65000', 0, 5, 'fnabto97.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 1, 7),
(50, 'Cẩm Nang Cấu Trúc Tiếng Anh', 'Cuốn sách CẨM NANG CẤU TRÚC TIẾNG ANH gồm 25 phần, mỗi phần là một phạm trù kiến thức trong tiếng Anh được trình bày một cách ngắn gọn, đơn giản, cô đọng và hệ thống hoá dưới dạng sơ đồ, bảng biểu nhằm phát triển khả năng tư duy của người học và từ đó giúp người học nhớ kiến thức nhanh hơn và sâu hơn. Sau hầu hết các phần lí thuyết đều có 20-30 câu bài tập áp dụng để kiểm tra cũng như khắc sâu kiến thức cho người học. Tuy dày chưa đến 250 trang nhưng cuốn sách lại có thể bao trọn toàn bộ kiến thức từ đơn giản đến phức tạp cộng với cách tận dụng tối đa và áp dụng triệt để cách học tiếng Anh bằng sơ đồ tư duy.', '98000', 0, 40, '7wdy3icq.jpg', '2020-08-11', NULL, '0000-00-00', NULL, 'active', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `books` text NOT NULL,
  `prices` text NOT NULL,
  `quantities` text NOT NULL,
  `names` text NOT NULL,
  `pictures` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `books`, `prices`, `quantities`, `names`, `pictures`, `status`, `date`) VALUES
('fOiDSQ4', 'admin', '[\"16\"]', '[\"90000\"]', '[\"1\"]', '[\"Tự Học Photoshop CC Toàn Tập\"]', '[\"y9fab18x.jpg\"]', 0, '2020-08-17 19:55:31'),
('hzpYgmu', 'admin', '[\"47\",\"49\"]', '[\"26000\",\"61750\"]', '[\"1\",\"1\"]', '[\"Sariya (Văn Học Thiếu Nhi)\",\"Tự Học 2000 Từ Vựng Tiếng Anh Theo Chủ Đề\"]', '[\"sq7iapkv.jpg\",\"fnabto97.jpg\"]', 0, '2020-08-18 18:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` text DEFAULT NULL,
  `created` date DEFAULT '0000-00-00',
  `created_by` varchar(255) DEFAULT NULL,
  `modified` date DEFAULT '0000-00-00',
  `modified_by` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `ordering` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`) VALUES
(1, 'Tiểu Thuyết', '1knlb6zg.jpg', '2020-08-11', 'admin', '2013-12-09', 'admin', 'active', 10),
(2, 'Kinh Tế', '7nsmirey.jpg', '2020-08-11', 'admin', '2013-12-21', 'admin', 'active', 4),
(3, 'Tin học', 'p79l3ejn.jpg', '2020-08-11', 'admin', '2013-12-09', 'admin', 'active', 10),
(4, ' Kỹ Năng Sống', '3pa50sxy.jpg', '2020-08-11', 'admin', '2013-12-09', 'admin', 'active', 1),
(5, 'Thiếu Nhi', 'ou1d7mwq.jpg', '2020-08-11', 'admin', '2013-12-09', 'admin', 'active', 10),
(6, 'Kinh Dị', 'jvof8d3k.jpg', '2020-08-11', 'admin', '2013-12-09', 'admin', 'active', 2),
(7, 'Ngoại Ngữ - Từ Điển', '7189ck5f.jpg', '2020-08-11', 'admin', '2013-12-09', 'admin', 'active', 5),
(8, 'Truyện Tranh, Manga', 'mta9gheq.jpg', '2020-08-11', 'admin', '2013-12-09', 'admin', 'active', 10),
(9, ' Văn Hoá - Nghệ Thuật', 'gfzp6xt7.jpg', '2020-08-11', 'admin', '2013-12-21', 'admin', 'active', 3);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_acp` tinyint(1) DEFAULT 0,
  `created` date DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT 10,
  `privilege_id` text DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `privilege_id`, `picture`) VALUES
(4, 'admin', 1, '2020-07-09', '1', '2020-07-08', '2', 'active', 10, '1,2,3,4,5,6,7,8,9,10', NULL),
(5, 'member', 0, '2020-07-09', '1', '2020-07-11', 'admin', 'inactive', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `module` varchar(45) NOT NULL,
  `controller` varchar(45) NOT NULL,
  `action` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `name`, `module`, `controller`, `action`) VALUES
(1, 'Hiển thị danh sách người dùng', 'admin', 'user', 'index'),
(2, 'Thay đổi status của người dùng', 'admin', 'user', 'status'),
(3, 'Cập nhật thông tin của người dùng', 'admin', 'user', 'form'),
(4, 'Thay đổi status của người dùng sử dụng Ajax', 'admin', 'user', 'ajaxStatus'),
(5, 'Xóa một hoặc nhiều người dùng', 'admin', 'user', 'trash'),
(6, 'Thay đổi vị trí hiển thị của các người dùng', 'admin', 'user', 'ordering'),
(7, 'Truy cập menu Admin Control Panel', 'admin', 'index', 'index'),
(8, 'Đăng nhập Admin Control Panel', 'admin', 'index', 'login'),
(9, 'Đăng xuất Admin Control Panel', 'admin', 'index', 'logout'),
(10, 'Cập nhật thông tin tài khoản quản trị', 'admin', 'index', 'profile');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created` date DEFAULT '0000-00-00',
  `created_by` varchar(45) DEFAULT NULL,
  `modified` date DEFAULT '0000-00-00',
  `modified_by` varchar(45) DEFAULT NULL,
  `register_date` datetime DEFAULT '0000-00-00 00:00:00',
  `register_ip` varchar(25) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `ordering` int(11) DEFAULT 10,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `fullname`, `password`, `created`, `created_by`, `modified`, `modified_by`, `register_date`, `register_ip`, `status`, `ordering`, `group_id`) VALUES
(1, 'nvan', 'nvan@gmail.com', 'Nguyễn Văn An', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '1', '0000-00-00', NULL, '0000-00-00 00:00:00', NULL, 'active', 4, 1),
(2, 'nvb', 'nvb@gmail.com', 'Nguyễn Văn B', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '1', '0000-00-00', NULL, '0000-00-00 00:00:00', NULL, 'active', 3, 2),
(3, 'nvc', 'nvc@gmail.com', 'Nguyễn Văn C', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '1', '0000-00-00', NULL, '0000-00-00 00:00:00', NULL, 'active', 2, 3),
(4, 'admin', 'admin@gmail.com', 'Admin', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '1', '2020-07-11', 'admin', '0000-00-00 00:00:00', NULL, 'active', 1, 4),
(5, 'nguyenvana1', 'lthlan54@gmail.com', 'Admin 3', '3b269d99b6c31f1467421bbcfdec7908', '0000-00-00', NULL, '0000-00-00', NULL, '2013-11-19 18:11:45', '127.0.0.1', 'active', 10, 0),
(6, 'nguyenvana2', 'lthlan55@gmail.com', 'Admin 3', '3b269d99b6c31f1467421bbcfdec7908', '0000-00-00', NULL, '0000-00-00', NULL, '2013-11-19 18:11:09', '127.0.0.1', 'inactive', 10, 0),
(7, 'nguyenvana4', 'lthlan56@gmail.com', '', '3b269d99b6c31f1467421bbcfdec7908', '0000-00-00', NULL, '0000-00-00', NULL, '2013-11-19 18:11:08', '127.0.0.1', 'inactive', 10, 0),
(8, 'nguyenvana11122', 'lthlan541@gmail.com', 'Admin 3', '3b269d99b6c31f1467421bbcfdec7908', '2020-07-12', NULL, '2013-12-02', '4', '2013-11-19 18:11:06', '127.0.0.1', 'inactive', 12, 4),
(9, 'nguyenvana122', 'lthlan5412@gmail.com', '', '3b269d99b6c31f1467421bbcfdec7908', '2013-12-02', '4', '2013-12-02', '4', '0000-00-00 00:00:00', NULL, 'active', 1, 5),
(10, 'admin01', 'admin01@gmail.com', 'Admin 123', 'e5c0fe73b84c06f43393b87a9c6acaa1', '0000-00-00', NULL, '2013-12-07', 'admin', '2013-12-03 08:12:23', '127.0.0.1', 'inactive', 10, 2),
(12, 'admin', 'admin@gmail.com', 'admin', '123456', '2020-07-03', NULL, '0000-00-00', NULL, '0000-00-00 00:00:00', NULL, 'inactive', 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
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
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
