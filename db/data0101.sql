-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 01, 2019 at 10:59 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_topica`
--

-- --------------------------------------------------------

--
-- Table structure for table `crm_c3`
--

CREATE TABLE `crm_c3` (
  `c3_id` int(11) NOT NULL,
  `c3_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c3_tel` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `c3_email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `c3_nganhdangky` varchar(50) CHARACTER SET utf8 NOT NULL,
  `c3_bangcapcaonhat` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `c3_diachinoio` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `c3_nguon` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `c3_datereg` datetime DEFAULT NULL,
  `ghi_chu` varchar(200) DEFAULT NULL,
  `c3_user_id` int(11) DEFAULT NULL,
  `tuyensinh_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crm_c3`
--

INSERT INTO `crm_c3` (`c3_id`, `c3_name`, `c3_tel`, `c3_email`, `c3_nganhdangky`, `c3_bangcapcaonhat`, `c3_diachinoio`, `c3_nguon`, `c3_datereg`, `ghi_chu`, `c3_user_id`, `tuyensinh_id`) VALUES
(85586, 'Nguyễn Thụy Tố Quyên', '0903741787', 'quyen27958@gmail.com', 'Quản trị kinh doanh ( chuyên ngành quản lý doanh n', '', '', 'VB2.ENEUHCM.FBA.HVT.M.LEAD100.HCM', '2018-12-24 21:07:29', '', 0, NULL),
(85587, 'Nguyễn Thế Bính', '0338765678', 'thebinh86@gmail.com', 'Luật (Chuyên ngành Luật Kinh doanh, Luật hành chín', '', '', 'LT.ENEUHCM.GAS.HVT.M.017.HCM', '2018-12-24 21:43:08', '', 0, NULL),
(85588, 'ĐẶNG HOÀNG TUẤN', '0358807891', 'tuanhoangdang91@gmail.com', 'Công nghệ kỹ thuật công trình xây dựng', NULL, NULL, 'LT.HCMUTE.FBA.HVT.D.LEAD1.HCM&utm_source=facebook&utm_medium=cpc&utm_content=huongvt&fbclid=IwAR1jXq', '2018-12-24 21:55:54', '', 0, NULL),
(85589, 'Do hong quan', '0903616407', 'hongquan1012@gmail.com', 'Công nghệ chế tạo máy', NULL, NULL, 'LT.HCMUTE.GAS.HVT.D.19.HCM&gclid=EAIaIQobChMIp8_hvN243wIVjaqWCh09bweOEAAYASAAEgIZpfD_BwE', '2018-12-24 22:02:42', '', 0, NULL),
(85590, 'trương bá hoàng hiệp', '0945956526', 'hoanghiephn3009@gmail.com', 'Luật Kinh tế', NULL, NULL, 'LT.HOU.GAS.HVT.D.05.HN/&gclid=Cj0KCQiApILhBRD1ARIsAOXWTzuC7g9DMGPJybxy20nf5cDmKOgboJE9ZbaEN285JISxZ1', '2018-12-24 22:15:05', '', 0, NULL),
(85591, 'Sầm Thị Hồng Huyền', '0366223339', 'sthhuyen@gmail.com', 'Ngôn ngữ Anh', NULL, NULL, 'LT.HOU.GAS.HVT.D.19.HN/&gclid=Cj0KCQiApILhBRD1ARIsAOXWTzuomlvr4JpV0xBO1J7C14CHOZlkLhau1xyIXJE_RoeRJn', '2018-12-24 22:18:18', '', 0, NULL),
(85592, 'Thiên Bình', '969798559', 'tieudong.vt201@gmail.com', 'ngôn_ngữ_anh', NULL, NULL, 'LT.HOU.FBA.SNN.D.00.HN', '2018-12-25 00:18:01', '', 0, NULL),
(85593, 'Nguyễn Viết Ân', '985497908', 'Nguyenvietan992@gmail.com', 'quản_trị_kinh_doanh', NULL, NULL, 'VB2.ENEU.FBA.SNN.D.00.HCM', '2018-12-25 00:18:01', '', 0, NULL),
(85594, 'Nguyễn Thanh Nhân', '975389077', 'cau_be_co_d0n01@yahoo.com', 'công_nghệ_kỹ_thuật_điện-điện_tử', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-25 00:18:01', '', 0, NULL),
(85595, 'Đặng Hoàng Tuấn', '358807891', 'tuanhoangdang91@gmail.com.vn', 'công_nghệ_kỹ_thuật_công_trình_xây_dựng', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-25 00:18:01', '', 0, NULL),
(85596, 'Lê Văn Thuần', '396319571', 'thuanlv28@gmail.com', 'công_nghệ_chế_tạo_máy', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-25 00:18:01', '', 0, NULL),
(85597, 'Tín Nguyễn Trung', '968687575', 'nguyentrungtin.vn@gmail.com', 'công_nghệ_kỹ_thuật_công_trình_xây_dựng', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-25 00:18:01', '', 0, NULL),
(85598, 'Dung Nguyen', '933601760', 'nguyen.dung24@yahoo.com.vn', 'kế_toán', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-25 00:18:01', '', 0, NULL),
(85599, 'Nguyễn Đức Thành', '985043939', 'ducthanhgt2@gmail.com', 'công_nghệ_kỹ_thuật_công_trình_xây_dựng', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-25 00:18:01', '', 0, NULL),
(85600, 'nguyễn thị ly', '0948364913', 'nguyenthily160188@gmail.com', 'Ngôn ngữ Anh', NULL, NULL, 'LT.HOU.GAS.HVT.D.05.HN/&gclid=Cj0KCQiApILhBRD1ARIsAOXWTzszVqLGguKhiZaudDDSednc7SAXmmiHYO1Ik9i8-Jk2gl', '2018-12-25 03:39:40', '', 0, NULL),
(85601, 'tạ ngọc trâm', '0967428160', 'tangoctram.25595@gmail.com', 'Luật kinh tế', '', '', 'LT.EHOU.GAS.HVT.D.12.HCM', '2018-12-25 09:13:59', '', 0, NULL),
(85602, 'Lê Lâm Thanh Phú', '0397245166', 'lelamthanhphu@gmail.com', 'Ngành khác', NULL, NULL, 'LT.HCMUTE.GAS.HVT.D.15.HCM&gclid=Cj0KCQiApILhBRD1ARIsAOXWTzuL7CTNP25y3NRpwh2JD0qjk7KBDJ765BazEVwFtoV', '2018-12-25 09:18:44', '', 0, NULL),
(85603, 'Lê Hoài Vân Thương', '0399886379', 'lehoaivanthuong15@gmail.com', 'Kế toán', '', '', 'LT.EHOU.GAS.HVT.D.19.HCM', '2018-12-25 09:23:53', '', 0, NULL),
(85604, 'Le Thanh Nguyen', '0329678371', 'katanakatana23081997@gmail.com', 'Công nghệ kỹ thuật ô tô', NULL, NULL, 'LT_HCMUTE_CC_HVT_D_12_HCM=&fbclid=IwAR2Q8ohEjS3aKHT7Xwh0AV56SXzJjdYCBQkYfrpB9Y0crLqTV-LfjQKk3pg&utm_', '2018-12-25 09:32:42', '', 0, NULL),
(85605, 'PHAN THI HOAI MI', '0908972203', 'phanthihoaimi@gmail.com', 'Kế toán', NULL, NULL, 'LT.HCMUTE.GAS.HVT.D.19.HCM&gclid=Cj0KCQiApILhBRD1ARIsAOXWTzvAvszpkzDv_jhI3EibQIqg3S2x-4YGQJqx9hoqfLj', '2018-12-25 12:09:17', '', 0, NULL),
(85606, 'PHAN THI HOAI MI', '0908972203', 'phanthihoaimi@gmail.com', 'Ngành khác', NULL, NULL, 'LT.HCMUTE.GAS.HVT.D.19.HCM&gclid=Cj0KCQiApILhBRD1ARIsAOXWTzvAvszpkzDv_jhI3EibQIqg3S2x-4YGQJqx9hoqfLj', '2018-12-25 12:10:52', '', 0, NULL),
(85607, 'VŨ THANH PHI', '0326039447', 'phivt31dc32@st.buh.edu.vn', 'Ngành khác', NULL, NULL, 'LT.HCMUTE.GAS.HVT.D.19.HCM&gclid=EAIaIQobChMIztaS8Zq63wIV0zUrCh3xHw2nEAAYASAAEgLg__D_BwE', '2018-12-25 12:11:25', '', 0, NULL),
(85608, 'Hồng Thảo Nguyên', '0988935266', 'hongthaonguyen1988@gmail.com', 'Ngôn ngữ Anh', '', '', 'LT.EHOU.FBA.HVT.M.LEAD01.HCM', '2018-12-25 12:15:58', '', 0, NULL),
(85609, 'Lữ Tấn Tài', '0911195709', '1500085@hcmut.edu.vn', 'Công nghệ chế tạo máy', NULL, NULL, 'LT.HCMUTE.FBA.HVT.D.LEAD1.HCM=&utm_source=facebook&utm_medium=cpc&utm_content=huongvt', '2018-12-25 13:06:14', '', 0, NULL),
(85610, 'Cao Tuyet', '0919259788', 'caotuyet154@gmail.com', 'Ngôn ngữ Anh', '', '', 'LT.EHOU.GAS.HVT.D.19.HCM', '2018-12-25 14:02:38', '', 0, NULL),
(85611, 'trần ngọc hương', '0914143038', 'ngotran@vn.pepperl-fuchs.com', 'Công nghệ thông tin', NULL, NULL, 'LT.HCMUTE.GAS.HVT.D.15.HCM&gclid=Cj0KCQiApILhBRD1ARIsAOXWTzvbfyMr7xFJ1TeCnMBwT5dl9O6158oQK3dk8UBVG8Y', '2018-12-25 14:29:10', '', 0, NULL),
(85612, 'Nguyễn Hoàng Ân', '0356181874', 'hoangan1009@gmail.com', 'Công nghệ kỹ thuật điện, điện tử', NULL, NULL, 'LT.HCMUTE.GAS.HVT.D.15.HCM&gclid=Cj0KCQiApILhBRD1ARIsAOXWTzvbfyMr7xFJ1TeCnMBwT5dl9O6158oQK3dk8UBVG8Y', '2018-12-25 14:30:28', '', 0, NULL),
(85613, 'Anh Đức', '0906272979', 'bsduc304@gmail.com', 'Ngôn ngữ Anh', '', '', 'VB2.EHOU.GAS.HVT.M.49.HCM', '2018-12-25 14:37:41', '', 0, NULL),
(85614, 'Lê Ngọc mai Loan', '0906348060', 'lengocmailoan.94@gmail.com', 'Công nghệ thông tin', '', '', 'LT.EHOU.GAS.HVT.M.12.HCM', '2018-12-25 15:07:38', '', 0, NULL),
(85615, 'Vũ Ngọc ', '0941250029', 'ngocvu710@gmail.com', 'Kế toán', NULL, NULL, 'LT.HCMUTE.GAS.HVT.D.LK2.HCM&gclid=CjwKCAiAx4fhBRB6EiwA3cV4KsVfSAaRxQ7Aw7xJMeOQHQ9cbqnZJfpdsVcw6tHFnl', '2018-12-25 15:27:43', '', 0, NULL),
(85616, 'lê Phong', '947323332', NULL, '', NULL, NULL, 'TX.HOU.SUP.PNT.D.00.HN', '2018-12-25 17:17:51', '', 0, NULL),
(85617, 'Nguyễn Thị Mát', NULL, 'Nguyenmat111186@gmail.com', '', NULL, NULL, 'TX.HOU.SUP.PNT.D.00.HN', '2018-12-25 17:17:51', '', 0, NULL),
(85618, 'Minh Vương', '964507242', NULL, 'E học cao đẳng nghề h muốn liên thông đại học VLVH', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85619, 'Huỳnh Thắng', '937426200', NULL, '', NULL, NULL, 'TX.ENEU.SUP.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85620, 'Tung Nguyen', NULL, 'Tungemqt1c10@gmail.com', 'Mình học cao đẳng nghề quản trị mạng máy tính. Bây', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85621, 'Nhã Thanh', '349764100', NULL, '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85622, 'Long', '586138731', NULL, '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85623, 'Man Nguyen', NULL, 'nguyenman2510@gmail.com', 'co bang trung cap quan ly ks bay gio muon hoc len ', NULL, NULL, 'TX.EHOU.SUP.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85624, 'Minh Phuc Dang', '933269447', NULL, '', NULL, NULL, 'TX.ENEU.SUP.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85625, 'My Hoàng', '968901119', NULL, 'Mình tốt nghiệp Cd Nghề Qtkd bay gio muốn lien thố', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85626, 'Trần đình phước bảo', NULL, 'trandinhphuocbao@gmail.com', 'CloseConvert to ticket', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85627, 'Nguyễn thanh bình', NULL, 'binhnguyen3989@gmail.com', 'Tôi muốn được tư vấn về chương trình đài tạo liên ', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85628, 'son', NULL, 'son07tc@gmail.com', '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85629, 'Ma thi bằng', '975612639', 'bang860@gmail.com', 'Cho mình hỏi học liên thông cntt khi nào co lớp ạ', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85630, 'Hải', '978615957', 'hainguyen098711@gmail.com', 'Ngành điện công nghiệp', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85631, 'Thảo Thảo', '985325064', 'thaokppzipper@gmail.com', '', NULL, NULL, 'TX.HOU.SUP.PNT.D.00.HN', '2018-12-25 17:17:51', '', 0, NULL),
(85632, 'Ẩn danh', '3654471682', 'kimtinh22112001@gmail.com', 'Cho e hỏi là học công nghệ máy móc thì đầu vào là ', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85633, 'Thuận', '914175976', 'thuanbs@gmail.com', 'đã TN ĐH, đang làm bác sỹ,học Văn bằng 2 ngôn ngữ ', NULL, NULL, 'TX.EHOU.HOT.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85634, 'Tuấn', '988642410', 'tuandoan2505@gmail.com', 'trung cấp kế toán,liên thông quản trị kinh doanh, ', NULL, NULL, 'VB2.ENEU.HOT.PNT.D.00.HCM', '2018-12-25 17:17:51', '', 0, NULL),
(85635, 'Cục đất', '937061277', 'ngunhuheo469@gmail.com', 'mình tốt nghiệp trung cấp nghề cơ khí. ngành công ', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:24:51', '', 0, NULL),
(85636, 'Trinh Nao', '384099035', 'naotrinh0809@gmail.com', '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:24:51', '', 0, NULL),
(85637, 'Chí Tâm', '912942459', NULL, '', NULL, NULL, 'TX.ENEU.SUP.PNT.D.00.HCM', '2018-12-25 17:24:51', '', 0, NULL),
(85638, 'Hoàng Minh', '932768017', NULL, 'Ngành tin học ứng dụng ạ', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:24:51', '', 0, NULL),
(85639, 'Huỳnh Hạnh Đức', '774488997', NULL, '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:24:51', '', 0, NULL),
(85640, 'Huỳnh Chí Cường', '932223237', 'huynhchicuong0511@gmail.com', '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:24:51', '', 0, NULL),
(85641, 'Huy', NULL, 'Yuwanghuy@gmail.com', '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:24:51', '', 0, NULL),
(85642, 'Hồng Thảo Nguyên', NULL, 'hongthaonguyen1988@gmail.com', 'minh ở lớp thuờg xuyen k nghe dt đc nen ben trương', NULL, NULL, 'TX.EHOU.SUP.PNT.D.00.HCM', '2018-12-25 17:24:51', '', 0, NULL),
(85643, 'Nguyễn Duy Thanh', NULL, 'ndthanh.itc@gmail.com', 'Tôi muốn biết trong năm 2019 khi nào trường sẽ mở ', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:24:51', '', 0, NULL),
(85644, 'Khoa', '909133442', NULL, '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:24:51', '', 0, NULL),
(85645, 'Huỳnh Thúc Bảo', '937375263', 'ksthucbao2603@gmail.com', 'Kinh tế Xây Dựng', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:24:51', '', 0, NULL),
(85646, 'Đinh Trần Anh Duy', '937765600', 'dinhtrananhduy@gmail.com', 'Muốn đăng kí ngành học Quản lí đất đai liên thông ', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:24:51', '', 0, NULL),
(85647, 'Tần Công Thọ', '362346006', 'thotran6006@gmail.com', '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-25 17:24:51', '', 0, NULL),
(85648, 'Đức', '906272979', 'văn bằng 2 ngôn ngữ anh', '', NULL, NULL, 'VB2.EHOU.HOT.PNT.D.00.HCM', '2018-12-25 17:24:51', '', 0, NULL),
(85649, 'Nguyễn Duy Thanh', NULL, 'ndthanh.itc@gmail.com', 'Tôi muốn biết trong năm 2019 khi nào trường sẽ mở ', NULL, NULL, 'HCMUTE', '2018-12-25 17:24:51', '', 0, NULL),
(85650, 'Khoa', '909133442', NULL, '', NULL, NULL, 'HCMUTE', '2018-12-25 17:24:51', '', 0, NULL),
(85651, 'Huỳnh Thúc Bảo', '937375263', 'ksthucbao2603@gmail.com', 'Kinh tế Xây Dựng', NULL, NULL, 'HCMUTE', '2018-12-25 17:24:51', '', 0, NULL),
(85652, 'Đinh Trần Anh Duy', '937765600', 'dinhtrananhduy@gmail.com', 'Muốn đăng kí ngành học Quản lí đất đai liên thông ', NULL, NULL, 'HCMUTE', '2018-12-25 17:24:51', '', 0, NULL),
(85653, 'Tần Công Thọ', '362346006', 'thotran6006@gmail.com', '', NULL, NULL, 'HCMUTE', '2018-12-25 17:24:51', '', 0, NULL),
(85654, 'Trương Đình Hải Dương', '0985905298', 'haiduong31082001@gmail.com', 'Công nghệ thông tin', NULL, NULL, 'LT.HCMUTE.GAS.HVT.D.19.HCM&gclid=CjwKCAiAx4fhBRB6EiwA3cV4KmbYs3nQXmrC79I-On1Xbh7LEQyA3xuWaPcOFNtL2WD', '2018-12-25 19:11:40', '', 0, NULL),
(85655, 'Huỳnh phúc thiện', '0772811581', 'huynhphucthien18121994@gmail.com', 'Công nghệ kỹ thuật công trình xây dựng', NULL, NULL, 'LT.HCMUTE.GAS.HVT.D.19.HCM&gclid=EAIaIQobChMIofz5i4G73wIV06qWCh0COAZ4EAAYASAAEgJfD_D_BwE', '2018-12-25 19:46:48', '', 0, NULL),
(85656, 'Lieu Truong Quang', '0374575626', 'anhchangmet9@gmail.com', 'Công nghệ thông tin', '', '', 'LT.EHOU.CC.HVT.D.56.HCM', '2018-12-25 20:43:37', '', 0, NULL),
(85657, 'Trần Thị Diệu Hiền', '0965438489', 'huyenly2987@gmail.com', 'Kế toán', NULL, NULL, 'LT.HCMUTE.GAS.HVT.D.15.HCM&gclid=CjwKCAiAx4fhBRB6EiwA3cV4KnPoy1iTfGZ0I1i8cZID_VAWrZjz5DVEQTPI6IfJb7c', '2018-12-25 20:52:43', '', 0, NULL),
(85658, 'Dương Văn Tâm', '0358631071', 'duongvantam1991@gmail.com', 'Công nghệ chế tạo máy', NULL, NULL, 'LT.HCMUTE.FBA.HVT.D.LEAD1.HCM=&utm_source=facebook&utm_medium=cpc&utm_content=huongvt', '2018-12-25 21:42:13', '', 0, NULL),
(85659, 'Lê thanh Ngân', '0919199884', 'lethanhngan.180582@gmail.com', 'Công nghệ kỹ thuật điện, điện tử', NULL, NULL, 'LT.HCMUTE.FBA.HVT.D.LEAD1.HCM=&utm_source=facebook&utm_medium=cpc&utm_content=huongvt', '2018-12-25 21:46:29', '', 0, NULL),
(85660, 'Nguyễn Duy Huân', '0905019304', 'huan2931@gmail.com', 'Công nghệ kỹ thuật điện, điện tử', NULL, NULL, 'LT.HCMUTE.GAS.HVT.D.19.HCM&gclid=EAIaIQobChMI0_e56KC73wIVWLaWCh07Yg5EEAAYASAAEgKyv_D_BwE', '2018-12-25 22:07:30', '', 0, NULL),
(85661, 'Nguyễn thị lý', '0937859781', 'thienlytk@gmail.com', 'Công nghệ thông tin', '', '', 'LT.EHOU.GAS.HVT.M.19.HCM', '2018-12-25 22:13:36', '', 0, NULL),
(85662, 'Nguyễn Lê Nhật Bảo', '0908064064', 'nguyenlenhatbao@gmail.com', 'Ngành khác', NULL, NULL, 'LT.HCMUTE.GAS.HVT.D.15.HCM&gclid=CjwKCAiAx4fhBRB6EiwA3cV4KnzVKjDKDQGg3CR3_mVBPGUpGJ-qadqnr3v2ljaJKCv', '2018-12-25 22:37:52', '', 0, NULL),
(85663, 'Nguyễn minh chanh ', '0967269780', 'chanhnguyen203@gmail.com', 'Công nghệ kỹ thuật điện, điện tử', NULL, NULL, 'LT.HCMUTE.FBA.HVT.D.LEAD1.HCM=&utm_source=facebook&utm_medium=cpc&utm_content=huongvt', '2018-12-25 22:38:45', '', 0, NULL),
(85664, 'Nguyễn Lê Nhật Bảo', '0908064064', 'nguyenlenhatbao@gmail.com', 'Quản trị kinh doanh', '', '', 'LT.EHOU.GAS.HVT.M.12.HCM', '2018-12-25 22:40:33', '', 0, NULL),
(85665, 'Nguyễn Đức Huy', '0976025061', 'huyitgm@gmail.com', 'Công nghệ thông tin', NULL, NULL, 'LT.HCMUTE.FBA.HVT.D.LEAD1.HCM=&utm_source=facebook&utm_medium=cpc&utm_content=huongvt', '2018-12-25 22:44:29', '', 0, NULL),
(85666, 'Trần Đăng Khoa', '0936984018', 'khoatran1406@gmail.com', 'Công nghệ thông tin', NULL, NULL, 'LT.HCMUTE.FBA.HVT.D.LEAD1.HCM=&utm_source=facebook&utm_medium=cpc&utm_content=huongvt', '2018-12-26 00:03:20', '', 0, NULL),
(85667, 'Long To Mong', '964849166', 'long.tomong@gmail.com', 'quản_trị_kinh_doanh', NULL, NULL, 'LT.EHOU.FBA.SNN.D.00.HCM', '2018-12-26 00:35:01', '', 0, NULL),
(85668, 'Vân', '932040055', 'nguyen1989@gmail.com', 'kế_toán', NULL, NULL, 'LT.EHOU.FBA.SNN.D.00.HCM', '2018-12-26 00:35:01', '', 0, NULL),
(85669, 'Giang Truong Nguyen', '909971905', 'vnreal.leasing@gmail.com', 'luật', NULL, NULL, 'VB2.ENEU.FBA.SNN.D.00.HCM', '2018-12-26 00:35:01', '', 0, NULL),
(85670, 'Đinh Văn Bùi', '969182598', 'dinhvanbui91@gmail.com', 'quản_trị_kinh_doanh', NULL, NULL, 'VB2.ENEU.FBA.SNN.D.00.HCM', '2018-12-26 00:35:01', '', 0, NULL),
(85671, 'Thien Dao', '963101914', 'daochithiensmc@gmail.com', 'công_nghệ_kỹ_thuật_ô_tô', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-26 00:35:01', '', 0, NULL),
(85672, 'Hữu Dự Cao', '971632432', 'caohuudu58@yahoo.com', 'kế_toán', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-26 00:35:01', '', 0, NULL),
(85673, 'Minh Nguyendang', '1626111735', 'minhnguyendang688@gmail.com', 'công_nghệ_chế_tạo_máy', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-26 00:35:01', '', 0, NULL),
(85674, 'Trung Võ', '933039640', 'trungvth2487@yahoo.com', 'công_nghệ_kỹ_thuật_ô_tô', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-26 00:35:01', '', 0, NULL),
(85675, 'Tiến Nguyễn Thanh', '938263630', 'ttien.pkdta@gmail.com', 'công_nghệ_kỹ_thuật_điện-điện_tử', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-26 00:35:01', '', 0, NULL),
(85676, 'Quyet Le Van', '966788670', 'zauharantwsk@gmail.com', 'công_nghệ_kỹ_thuật_ô_tô', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-26 00:35:01', '', 0, NULL),
(85677, 'hoàng văn hải', '986872157', 'haihoanghai88@gmail.com', 'công_nghệ_chế_tạo_máy', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-26 00:35:01', '', 0, NULL),
(85678, 'Thai Quang', '934032190', 'tranthai.10051990@gmail.com', 'công_nghệ_thông_tin', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-26 00:35:01', '', 0, NULL),
(85679, 'Trần Thắng', '901734568', 'minh_thang41@yahoo.com', 'công_nghệ_thông_tin', NULL, NULL, 'LT.HCMUTE.FBA.SNN.D.00.HCM', '2018-12-26 00:35:01', '', 0, NULL),
(85680, 'Nguyễn Hoàng Thái', '0914456712', 'nguyenthai.niapp@gmail.com ', 'Ngôn ngữ Anh', NULL, NULL, 'VB2.HOU.GAS.HVT.D.49.HN/&gclid=EAIaIQobChMIw7fQhcO73wIVi6uWCh177A0tEAAYAiAAEgJeKfD_BwE', '2018-12-26 00:49:00', '', 0, NULL),
(85681, 'Hoàng thu thủy', '0977225998', 'hoangthuy.aimo@gmail.com', 'Ngôn ngữ Anh', NULL, NULL, 'VB2.HOU.GAS.HVT.D.49.HN/&gclid=CjwKCAiAx4fhBRB6EiwA3cV4KiKp7ai6oAXGOLhN3J2_RQemxOazK8rFDf6XroifF5nGl', '2018-12-26 02:20:06', '', 0, NULL),
(85682, 'Chau van dien', '0939464526', '', 'Công nghệ kỹ thuật điện, điện tử', NULL, NULL, 'LT.HCMUTE.GAS.HVT.D.LK3.HCM&gclid=CjwKCAiAx4fhBRB6EiwA3cV4KnAeiplT6qM4k9ksQYAM4p7XPvqeDAYywS-FVnZI_v', '2018-12-26 06:56:00', '', 0, NULL),
(85683, 'Đinh Văn Hào', '0943156239', 'songhao1387@gmail.com', 'Công nghệ kỹ thuật điện, điện tử', NULL, NULL, 'LT.HCMUTE.FBA.HVT.D.LEAD1.HCM=&utm_source=facebook&utm_medium=cpc&utm_content=huongvt', '2018-12-26 08:35:04', '', 0, NULL),
(85684, 'Nguyễn Quốc Minh', '0986987061', 'angmaybuon@yahoo.com', 'Quản trị Kinh Doanh', NULL, NULL, 'LT.HOU.GAS.HVT.D.16.HN/&gclid=CjwKCAiAx4fhBRB6EiwA3cV4KjkvRTMB-0KZThLUxp8Jod2rQRe-nyGOS3STSahU3DD5tu', '2018-12-26 09:33:14', '', 0, NULL),
(85685, 'Nguyễn Tiến Dũng', '0983704756', 'tiendung17393@gmail.com', 'Công nghệ chế tạo máy', NULL, NULL, 'LT.HCMUTE.FBA.HVT.D.LEAD1.HCM=&utm_source=facebook&utm_medium=cpc&utm_content=huongvt', '2018-12-26 10:58:45', '', 0, NULL),
(85686, 'Huong', '0902392564', 'majhuong@gmail.com', 'Ngôn ngữ Anh', '', '', 'VB2.EHOU.GAS.HVT.M.49.HCM', '2018-12-26 11:24:20', '', 0, NULL),
(85687, 'Bùi Hoàng Anh', '0778917677', 'hoanganhbui@live.com', 'Quản trị kinh doanh', '', '', 'LT.EHOU.FBA.HVT.M.LEAD01.HCM', '2018-12-26 14:03:07', '', 0, NULL),
(85688, 'Trần nữ trà my', '0908631093', 'tntmy.1208@gmail.com', 'Tài chính ngân hàng (Chuyên ngành ngân hàng)', '', '', 'VB2.ENEUHCM.FBA.HVT.M.LEAD100.HCM', '2018-12-26 17:30:54', '', 0, NULL),
(85689, 'Hung Nguyen', '969432739', 'Nguyenducnguyenduchung@gmail.com', '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:32:45', '', 0, NULL),
(85690, 'Linh Xuan', '974815545', NULL, '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:32:45', '', 0, NULL),
(85691, 'Dau Ngoc Trung', '908262959', NULL, '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:32:45', '', 0, NULL),
(85692, 'Thùy Vân', '975611376', NULL, 'Trung cấp ktoan, học kế toán', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:32:45', '', 0, NULL),
(85693, 'Le Thảo', '966927509', NULL, '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:32:45', '', 0, NULL),
(85694, 'Vinh', '968111178', NULL, 'Công nghệ ô tô', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:32:45', '', 0, NULL),
(85695, 'Nguyễn xuânlinh', NULL, 'xuanlinh1402vn@gmail.com', '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:32:45', '', 0, NULL),
(85696, 'Lê văn Thảo', '966927509', 'vanthaoht95@gmail.com', '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:32:45', '', 0, NULL),
(85697, 'A', '917317325', 'lien311089@gmail.com', '', NULL, NULL, 'TX.EHOU.SUP.PNT.D.00.HCM', '2018-12-26 17:32:45', '', 0, NULL),
(85698, 'xuân', '977369079', 'nguyenxuan1192@gmail.com', 'ho e hỏi học vp 2 quản trị kinh doanh thời gian mấ', NULL, NULL, 'TX.HOU.SUP.PNT.D.00.HN', '2018-12-26 17:32:45', '', 0, NULL),
(85699, 'Trịnh ngọc thanh', '904578264', 'ngocthanh4686@gmail.com', 'Cơ khí chế tạo máy', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:32:45', '', 0, NULL),
(85700, 'Hung Nguyen', '969432739', 'Nguyenducnguyenduchung@gmail.com', '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:33:02', '', 0, NULL),
(85701, 'Linh Xuan', '974815545', NULL, '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:33:02', '', 0, NULL),
(85702, 'Dau Ngoc Trung', '908262959', NULL, '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:33:02', '', 0, NULL),
(85703, 'Thùy Vân', '975611376', NULL, 'Trung cấp ktoan, học kế toán', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:33:02', '', 0, NULL),
(85704, 'Le Thảo', '966927509', NULL, '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:33:02', '', 0, NULL),
(85705, 'Vinh', '968111178', NULL, 'Công nghệ ô tô', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:33:02', '', 0, NULL),
(85706, 'Nguyễn xuânlinh', NULL, 'xuanlinh1402vn@gmail.com', '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:33:02', '', 0, NULL),
(85707, 'Lê văn Thảo', '966927509', 'vanthaoht95@gmail.com', '', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:33:02', '', 0, NULL),
(85708, 'A', '917317325', 'lien311089@gmail.com', '', NULL, NULL, 'TX.EHOU.SUP.PNT.D.00.HCM', '2018-12-26 17:33:02', '', 0, NULL),
(85709, 'xuân', '977369079', 'nguyenxuan1192@gmail.com', 'ho e hỏi học vp 2 quản trị kinh doanh thời gian mấ', NULL, NULL, 'TX.HOU.SUP.PNT.D.00.HN', '2018-12-26 17:33:02', '', 0, NULL),
(85710, 'Trịnh ngọc thanh', '904578264', 'ngocthanh4686@gmail.com', 'Cơ khí chế tạo máy', NULL, NULL, 'LT.HCMUTE.SUP.PNT.D.00.HCM', '2018-12-26 17:33:02', '', 0, NULL),
(85711, 'Dương Thị Thu Lan', '0392537345', 'thulan21194@gmail.com', 'Kế toán', NULL, NULL, 'VB2.HOU.GAS.HVT.D.28.HN/&gclid=EAIaIQobChMIopyy7q293wIVGqyWCh1F0gxrEAAYAiAAEgJMIvD_BwE', '2018-12-26 18:11:30', '', 0, NULL),
(85712, 'Lê Thị Phương Liên', '0969872355', 'nguyenvandung29121990@gmail.com', 'Quản trị Kinh Doanh', NULL, NULL, 'LT.HOU.CC.HVT.D.56.HN&fbclid=IwAR1g_SqkRC6GnnFAxLeKr2ZpBLVymoQiOeDZ3KKrA5_Oh3B5yDHcGbCdip0&utm_sourc', '2018-12-26 18:42:03', '', 0, NULL),
(85713, 'Nguyễn Thị Mai', '0982260492', 'nguyenmai181194@gmail.com', 'Công nghệ thông tin', NULL, NULL, 'LT.HOU.GAS.HVT.D.44.HN/&gclid=Cj0KCQiA6ozhBRC8ARIsAIh_VC1EF_lNd0w3oUJzk-9uVKFunFX4_T3RiYWdRk4P4DFG4b', '2018-12-26 20:14:51', '', 0, NULL),
(85714, 'Lê thu hà', '0833210168', 'Hangoc7983@gmail.com', 'Quản trị Kinh Doanh', NULL, NULL, 'LT.HOU.FBA.HVT.D.LEAD01.HN%2F', '2018-12-26 20:18:27', '', 0, NULL),
(85715, 'Trương Anh Bình', '0933954407', 'mattroi20102002@gmail.com', 'Công nghệ kỹ thuật điện, điện tử', NULL, NULL, 'LT.HCMUTE.FBA.HVT.D.LEAD1.HCM=&utm_source=facebook&utm_medium=cpc&utm_content=huongvt', '2018-12-26 20:54:07', '', 0, NULL),
(85716, 'phamducthinh', '0932783779', 'ducthinh89@gmail.com', 'Tài chính Ngân hàng', NULL, NULL, 'LT.ENEUHCM.GAS.HVT.D.03.HCM/dai-hoc-truc-tuyen&gclid=EAIaIQobChMIwOOkod293wIV0quWCh2umgU1EAMYASAAEgL', '2018-12-26 22:19:18', '', 0, NULL),
(85717, 'sdgsdg', '36347457', 'dsgsdg@sdgs.sg', '3346346', 'sdgsdg', 'dsg', 'dsgsdg', '2019-01-01 03:45:03', 'sdgdsg', 12, NULL),
(85718, 'Son Tran', '353475474', 'test@gail.com', 'CNTT', 'TLU', 'Tu Son - Bac Nih', 'HH.KK.GSG', '2019-01-01 00:00:00', 'Ghi chu', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `crm_c4`
--

CREATE TABLE `crm_c4` (
  `c4_id` int(11) NOT NULL,
  `c3_id` int(11) NOT NULL,
  `c3_datereg` datetime DEFAULT NULL,
  `c3_name` varchar(100) DEFAULT NULL,
  `c3_tel` varchar(20) DEFAULT NULL,
  `c3_email` varchar(100) DEFAULT NULL,
  `c3_nganhdangky` varchar(50) DEFAULT NULL,
  `c3_bangcapcaonhat` varchar(100) DEFAULT NULL,
  `c3_diachinoio` varchar(250) DEFAULT NULL,
  `truong` varchar(250) DEFAULT NULL,
  `SP` varchar(250) DEFAULT NULL,
  `khuvuc` varchar(250) DEFAULT NULL,
  `CMND_CCCD` char(12) DEFAULT NULL,
  `NoiCap` varchar(250) DEFAULT NULL,
  `NgayCap` date DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` int(11) NOT NULL DEFAULT '1',
  `NguyenQuan` varchar(250) DEFAULT NULL,
  `HKTT` varchar(250) DEFAULT NULL,
  `Dia_Chi_Noi_O` varchar(250) DEFAULT NULL,
  `TrinhDo` varchar(250) DEFAULT NULL,
  `NamTotNghiep` varchar(250) DEFAULT NULL,
  `NganhTotNghiep` varchar(250) DEFAULT NULL,
  `DonViCapBang` varchar(250) DEFAULT NULL,
  `LoaiTotNghiep` varchar(250) DEFAULT NULL,
  `HeDaoTao` varchar(250) NOT NULL,
  `TruongChamSoc` varchar(25) DEFAULT NULL,
  `NganhMuonHoc` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `last_c3_datereg` datetime DEFAULT NULL,
  `last_calllog` varchar(100) DEFAULT NULL,
  `last_calllog_dtevisit` varchar(50) DEFAULT NULL,
  `dte_datevisit` datetime DEFAULT NULL,
  `level_id` int(11) DEFAULT '0',
  `status_id` int(11) DEFAULT '0',
  `dteNextDate` datetime DEFAULT NULL,
  `ghi_chu` varchar(250) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crm_c4`
--

INSERT INTO `crm_c4` (`c4_id`, `c3_id`, `c3_datereg`, `c3_name`, `c3_tel`, `c3_email`, `c3_nganhdangky`, `c3_bangcapcaonhat`, `c3_diachinoio`, `truong`, `SP`, `khuvuc`, `CMND_CCCD`, `NoiCap`, `NgayCap`, `NgaySinh`, `GioiTinh`, `NguyenQuan`, `HKTT`, `Dia_Chi_Noi_O`, `TrinhDo`, `NamTotNghiep`, `NganhTotNghiep`, `DonViCapBang`, `LoaiTotNghiep`, `HeDaoTao`, `TruongChamSoc`, `NganhMuonHoc`, `user_id`, `last_c3_datereg`, `last_calllog`, `last_calllog_dtevisit`, `dte_datevisit`, `level_id`, `status_id`, `dteNextDate`, `ghi_chu`, `created_by`) VALUES
(9555, 85623, '2018-12-25 17:17:51', 'Man Nguyen', NULL, 'nguyenman2510@gmail.com', 'co bang trung cap quan ly ks bay gio muon hoc len ', NULL, NULL, 'EHOU', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9556, 85656, '2018-12-25 20:43:37', 'Lieu Truong Quang', '374575626', 'anhchangmet9@gmail.com', 'Công nghệ thông tin', '', '', 'EHOU', 'CC', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9557, 85603, '2018-12-25 09:23:53', 'Lê Hoài Vân Thương', '399886379', 'lehoaivanthuong15@gmail.com', 'Kế toán', '', '', 'EHOU', 'GAS', 'HCM', '', '', '0000-00-00', '0000-00-00', 1, '', '', '', 'Trung học phổ thông', '', '', '', '', 'Đại học vừa học vừa làm', '', '', 12, '2019-01-01 00:43:33', '', NULL, '2019-01-01 15:52:55', 18, 2, '9999-12-31 00:00:00', '', ''),
(9558, 85687, '2018-12-26 14:03:07', 'Bùi Hoàng Anh', '778917677', 'hoanganhbui@live.com', 'Quản trị kinh doanh', '', '', 'EHOU', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9559, 85686, '2018-12-26 11:24:20', 'Huong', '902392564', 'majhuong@gmail.com', 'Ngôn ngữ Anh', '', '', 'EHOU', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9560, 85613, '2018-12-25 14:37:41', 'Anh Đức', '906272979', 'bsduc304@gmail.com', 'Ngôn ngữ Anh', '', '', 'EHOU', 'GAS', 'HCM', '', '', '0000-00-00', '0000-00-00', 1, '', '', '', 'Trung học phổ thông', '', '', '', '', 'Đại học vừa học vừa làm', '', '', 0, '2019-01-01 00:43:33', '', NULL, '2019-01-01 15:59:10', 2, 1, '9999-12-31 00:00:00', '', 'status-1-12'),
(9561, 85614, '2018-12-25 15:07:38', 'Lê Ngọc mai Loan', '906348060', 'lengocmailoan.94@gmail.com', 'Công nghệ thông tin', '', '', 'EHOU', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9562, 85664, '2018-12-25 22:40:33', 'Nguyễn Lê Nhật Bảo', '908064064', 'nguyenlenhatbao@gmail.com', 'Quản trị kinh doanh', '', '', 'EHOU', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9563, 85633, '2018-12-25 17:17:51', 'Thuận', '914175976', 'thuanbs@gmail.com', 'đã TN ĐH, đang làm bác sỹ,học Văn bằng 2 ngôn ngữ ', NULL, NULL, 'EHOU', 'HOT', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9564, 85697, '2018-12-26 17:32:45', 'A', '917317325', 'lien311089@gmail.com', '', NULL, NULL, 'EHOU', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9565, 85610, '2018-12-25 14:02:38', 'Cao Tuyet', '919259788', 'caotuyet154@gmail.com', 'Ngôn ngữ Anh', '', '', 'EHOU', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9566, 85668, '2018-12-26 00:35:01', 'Vân', '932040055', 'nguyen1989@gmail.com', 'kế_toán', NULL, NULL, 'EHOU', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9567, 85661, '2018-12-25 22:13:36', 'Nguyễn thị lý', '937859781', 'thienlytk@gmail.com', 'Công nghệ thông tin', '', '', 'EHOU', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9568, 85667, '2018-12-26 00:35:01', 'Long To Mong', '964849166', 'long.tomong@gmail.com', 'quản_trị_kinh_doanh', NULL, NULL, 'EHOU', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9569, 85601, '2018-12-25 09:13:59', 'tạ ngọc trâm', '967428160', 'tangoctram.25595@gmail.com', 'Luật kinh tế', '', '', 'EHOU', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9570, 85608, '2018-12-25 12:15:58', 'Hồng Thảo Nguyên', '988935266', 'hongthaonguyen1988@gmail.com', 'Ngôn ngữ Anh', '', '', 'EHOU', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9571, 85620, '2018-12-25 17:17:51', 'Tung Nguyen', NULL, 'Tungemqt1c10@gmail.com', 'Mình học cao đẳng nghề quản trị mạng máy tính. Bây', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9572, 85673, '2018-12-26 00:35:01', 'Minh Nguyendang', '1626111735', 'minhnguyendang688@gmail.com', 'công_nghệ_chế_tạo_máy', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9573, 85607, '2018-12-25 12:11:25', 'VŨ THANH PHI', '326039447', 'phivt31dc32@st.buh.edu.vn', 'Ngành khác', NULL, NULL, 'HCMUTE', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9574, 85621, '2018-12-25 17:17:51', 'Nhã Thanh', '349764100', NULL, '', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9575, 85612, '2018-12-25 14:30:28', 'Nguyễn Hoàng Ân', '356181874', 'hoangan1009@gmail.com', 'Công nghệ kỹ thuật điện, điện tử', NULL, NULL, 'HCMUTE', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9576, 85658, '2018-12-25 21:42:13', 'Dương Văn Tâm', '358631071', 'duongvantam1991@gmail.com', 'Công nghệ chế tạo máy', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9577, 85588, '2018-12-24 21:55:54', 'ĐẶNG HOÀNG TUẤN', '358807891', 'tuanhoangdang91@gmail.com', 'Công nghệ kỹ thuật công trình xây dựng', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9578, 85647, '2018-12-25 17:24:51', 'Tần Công Thọ', '362346006', 'thotran6006@gmail.com', '', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9579, 85632, '2018-12-25 17:17:51', 'Ẩn danh', '3654471682', 'kimtinh22112001@gmail.com', 'Cho e hỏi là học công nghệ máy móc thì đầu vào là ', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9580, 85636, '2018-12-25 17:24:51', 'Trinh Nao', '384099035', 'naotrinh0809@gmail.com', '', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9581, 85596, '2018-12-25 00:18:01', 'Lê Văn Thuần', '396319571', 'thuanlv28@gmail.com', 'công_nghệ_chế_tạo_máy', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9582, 85602, '2018-12-25 09:18:44', 'Lê Lâm Thanh Phú', '397245166', 'lelamthanhphu@gmail.com', 'Ngành khác', NULL, NULL, 'HCMUTE', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9583, 85622, '2018-12-25 17:17:51', 'Long', '586138731', NULL, '', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9584, 85655, '2018-12-25 19:46:48', 'Huỳnh phúc thiện', '772811581', 'huynhphucthien18121994@gmail.com', 'Công nghệ kỹ thuật công trình xây dựng', NULL, NULL, 'HCMUTE', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9585, 85639, '2018-12-25 17:24:51', 'Huỳnh Hạnh Đức', '774488997', NULL, '', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9586, 85679, '2018-12-26 00:35:01', 'Trần Thắng', '901734568', 'minh_thang41@yahoo.com', 'công_nghệ_thông_tin', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9587, 85589, '2018-12-24 22:02:42', 'Do hong quan', '903616407', 'hongquan1012@gmail.com', 'Công nghệ chế tạo máy', NULL, NULL, 'HCMUTE', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9588, 85699, '2018-12-26 17:32:45', 'Trịnh ngọc thanh', '904578264', 'ngocthanh4686@gmail.com', 'Cơ khí chế tạo máy', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9589, 85660, '2018-12-25 22:07:30', 'Nguyễn Duy Huân', '905019304', 'huan2931@gmail.com', 'Công nghệ kỹ thuật điện, điện tử', NULL, NULL, 'HCMUTE', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9590, 85662, '2018-12-25 22:37:52', 'Nguyễn Lê Nhật Bảo', '908064064', 'nguyenlenhatbao@gmail.com', 'Ngành khác', NULL, NULL, 'HCMUTE', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9591, 85691, '2018-12-26 17:32:45', 'Dau Ngoc Trung', '908262959', NULL, '', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9592, 85605, '2018-12-25 12:09:17', 'PHAN THI HOAI MI', '908972203', 'phanthihoaimi@gmail.com', 'Kế toán', NULL, NULL, 'HCMUTE', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9593, 85644, '2018-12-25 17:24:51', 'Khoa', '909133442', NULL, '', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9594, 85609, '2018-12-25 13:06:14', 'Lữ Tấn Tài', '911195709', '1500085@hcmut.edu.vn', 'Công nghệ chế tạo máy', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9595, 85611, '2018-12-25 14:29:10', 'trần ngọc hương', '914143038', 'ngotran@vn.pepperl-fuchs.com', 'Công nghệ thông tin', NULL, NULL, 'HCMUTE', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9596, 85659, '2018-12-25 21:46:29', 'Lê thanh Ngân', '919199884', 'lethanhngan.180582@gmail.com', 'Công nghệ kỹ thuật điện, điện tử', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9597, 85640, '2018-12-25 17:24:51', 'Huỳnh Chí Cường', '932223237', 'huynhchicuong0511@gmail.com', '', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9598, 85638, '2018-12-25 17:24:51', 'Hoàng Minh', '932768017', NULL, 'Ngành tin học ứng dụng ạ', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9599, 85674, '2018-12-26 00:35:01', 'Trung Võ', '933039640', 'trungvth2487@yahoo.com', 'công_nghệ_kỹ_thuật_ô_tô', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9600, 85598, '2018-12-25 00:18:01', 'Dung Nguyen', '933601760', 'nguyen.dung24@yahoo.com.vn', 'kế_toán', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9601, 85715, '2018-12-26 20:54:07', 'Trương Anh Bình', '933954407', 'mattroi20102002@gmail.com', 'Công nghệ kỹ thuật điện, điện tử', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9602, 85678, '2018-12-26 00:35:01', 'Thai Quang', '934032190', 'tranthai.10051990@gmail.com', 'công_nghệ_thông_tin', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9603, 85666, '2018-12-26 00:03:20', 'Trần Đăng Khoa', '936984018', 'khoatran1406@gmail.com', 'Công nghệ thông tin', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9604, 85635, '2018-12-25 17:24:51', 'Cục đất', '937061277', 'ngunhuheo469@gmail.com', 'mình tốt nghiệp trung cấp nghề cơ khí. ngành công ', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9605, 85645, '2018-12-25 17:24:51', 'Huỳnh Thúc Bảo', '937375263', 'ksthucbao2603@gmail.com', 'Kinh tế Xây Dựng', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9606, 85646, '2018-12-25 17:24:51', 'Đinh Trần Anh Duy', '937765600', 'dinhtrananhduy@gmail.com', 'Muốn đăng kí ngành học Quản lí đất đai liên thông ', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9607, 85675, '2018-12-26 00:35:01', 'Tiến Nguyễn Thanh', '938263630', 'ttien.pkdta@gmail.com', 'công_nghệ_kỹ_thuật_điện-điện_tử', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9608, 85682, '2018-12-26 06:56:00', 'Chau van dien', '939464526', '', 'Công nghệ kỹ thuật điện, điện tử', NULL, NULL, 'HCMUTE', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9609, 85615, '2018-12-25 15:27:43', 'Vũ Ngọc ', '941250029', 'ngocvu710@gmail.com', 'Kế toán', NULL, NULL, 'HCMUTE', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9610, 85683, '2018-12-26 08:35:04', 'Đinh Văn Hào', '943156239', 'songhao1387@gmail.com', 'Công nghệ kỹ thuật điện, điện tử', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9611, 85671, '2018-12-26 00:35:01', 'Thien Dao', '963101914', 'daochithiensmc@gmail.com', 'công_nghệ_kỹ_thuật_ô_tô', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9612, 85618, '2018-12-25 17:17:51', 'Minh Vương', '964507242', NULL, 'E học cao đẳng nghề h muốn liên thông đại học VLVH', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9613, 85657, '2018-12-25 20:52:43', 'Trần Thị Diệu Hiền', '965438489', 'huyenly2987@gmail.com', 'Kế toán', NULL, NULL, 'HCMUTE', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9614, 85676, '2018-12-26 00:35:01', 'Quyet Le Van', '966788670', 'zauharantwsk@gmail.com', 'công_nghệ_kỹ_thuật_ô_tô', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9615, 85693, '2018-12-26 17:32:45', 'Le Thảo', '966927509', NULL, '', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9616, 85663, '2018-12-25 22:38:45', 'Nguyễn minh chanh ', '967269780', 'chanhnguyen203@gmail.com', 'Công nghệ kỹ thuật điện, điện tử', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9617, 85694, '2018-12-26 17:32:45', 'Vinh', '968111178', NULL, 'Công nghệ ô tô', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9618, 85597, '2018-12-25 00:18:01', 'Tín Nguyễn Trung', '968687575', 'nguyentrungtin.vn@gmail.com', 'công_nghệ_kỹ_thuật_công_trình_xây_dựng', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9619, 85625, '2018-12-25 17:17:51', 'My Hoàng', '968901119', NULL, 'Mình tốt nghiệp Cd Nghề Qtkd bay gio muốn lien thố', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9620, 85689, '2018-12-26 17:32:45', 'Hung Nguyen', '969432739', 'Nguyenducnguyenduchung@gmail.com', '', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9621, 85672, '2018-12-26 00:35:01', 'Hữu Dự Cao', '971632432', 'caohuudu58@yahoo.com', 'kế_toán', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9622, 85690, '2018-12-26 17:32:45', 'Linh Xuan', '974815545', NULL, '', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9623, 85594, '2018-12-25 00:18:01', 'Nguyễn Thanh Nhân', '975389077', 'cau_be_co_d0n01@yahoo.com', 'công_nghệ_kỹ_thuật_điện-điện_tử', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9624, 85692, '2018-12-26 17:32:45', 'Thùy Vân', '975611376', NULL, 'Trung cấp ktoan, học kế toán', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9625, 85629, '2018-12-25 17:17:51', 'Ma thi bằng', '975612639', 'bang860@gmail.com', 'Cho mình hỏi học liên thông cntt khi nào co lớp ạ', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9626, 85665, '2018-12-25 22:44:29', 'Nguyễn Đức Huy', '976025061', 'huyitgm@gmail.com', 'Công nghệ thông tin', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9627, 85630, '2018-12-25 17:17:51', 'Hải', '978615957', 'hainguyen098711@gmail.com', 'Ngành điện công nghiệp', NULL, NULL, 'HCMUTE', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9628, 85685, '2018-12-26 10:58:45', 'Nguyễn Tiến Dũng', '983704756', 'tiendung17393@gmail.com', 'Công nghệ chế tạo máy', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9629, 85599, '2018-12-25 00:18:01', 'Nguyễn Đức Thành', '985043939', 'ducthanhgt2@gmail.com', 'công_nghệ_kỹ_thuật_công_trình_xây_dựng', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9630, 85654, '2018-12-25 19:11:40', 'Trương Đình Hải Dương', '985905298', 'haiduong31082001@gmail.com', 'Công nghệ thông tin', NULL, NULL, 'HCMUTE', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9631, 85677, '2018-12-26 00:35:01', 'hoàng văn hải', '986872157', 'haihoanghai88@gmail.com', 'công_nghệ_chế_tạo_máy', NULL, NULL, 'HCMUTE', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9632, 85617, '2018-12-25 17:17:51', 'Nguyễn Thị Mát', NULL, 'Nguyenmat111186@gmail.com', '', NULL, NULL, 'HOU', 'SUP', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9633, 85591, '2018-12-24 22:18:18', 'Sầm Thị Hồng Huyền', '366223339', 'sthhuyen@gmail.com', 'Ngôn ngữ Anh', NULL, NULL, 'HOU', 'GAS', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9634, 85711, '2018-12-26 18:11:30', 'Dương Thị Thu Lan', '392537345', 'thulan21194@gmail.com', 'Kế toán', NULL, NULL, 'HOU', 'GAS', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9635, 85714, '2018-12-26 20:18:27', 'Lê thu hà', '833210168', 'Hangoc7983@gmail.com', 'Quản trị Kinh Doanh', NULL, NULL, 'HOU', 'FBA', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9636, 85680, '2018-12-26 00:49:00', 'Nguyễn Hoàng Thái', '914456712', 'nguyenthai.niapp@gmail.com ', 'Ngôn ngữ Anh', NULL, NULL, 'HOU', 'GAS', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9637, 85590, '2018-12-24 22:15:05', 'trương bá hoàng hiệp', '945956526', 'hoanghiephn3009@gmail.com', 'Luật Kinh tế', NULL, NULL, 'HOU', 'GAS', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9638, 85616, '2018-12-25 17:17:51', 'lê Phong', '947323332', NULL, '', NULL, NULL, 'HOU', 'SUP', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9639, 85600, '2018-12-25 03:39:40', 'nguyễn thị ly', '948364913', 'nguyenthily160188@gmail.com', 'Ngôn ngữ Anh', NULL, NULL, 'HOU', 'GAS', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9640, 85592, '2018-12-25 00:18:01', 'Thiên Bình', '969798559', 'tieudong.vt201@gmail.com', 'ngôn_ngữ_anh', NULL, NULL, 'HOU', 'FBA', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9641, 85712, '2018-12-26 18:42:03', 'Lê Thị Phương Liên', '969872355', 'nguyenvandung29121990@gmail.com', 'Quản trị Kinh Doanh', NULL, NULL, 'HOU', 'CC', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9642, 85681, '2018-12-26 02:20:06', 'Hoàng thu thủy', '977225998', 'hoangthuy.aimo@gmail.com', 'Ngôn ngữ Anh', NULL, NULL, 'HOU', 'GAS', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9643, 85698, '2018-12-26 17:32:45', 'xuân', '977369079', 'nguyenxuan1192@gmail.com', 'ho e hỏi học vp 2 quản trị kinh doanh thời gian mấ', NULL, NULL, 'HOU', 'SUP', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9644, 85713, '2018-12-26 20:14:51', 'Nguyễn Thị Mai', '982260492', 'nguyenmai181194@gmail.com', 'Công nghệ thông tin', NULL, NULL, 'HOU', 'GAS', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9645, 85631, '2018-12-25 17:17:51', 'Thảo Thảo', '985325064', 'thaokppzipper@gmail.com', '', NULL, NULL, 'HOU', 'SUP', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9646, 85684, '2018-12-26 09:33:14', 'Nguyễn Quốc Minh', '986987061', 'angmaybuon@yahoo.com', 'Quản trị Kinh Doanh', NULL, NULL, 'HOU', 'GAS', 'HN', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9647, 85587, '2018-12-24 21:43:08', 'Nguyễn Thế Bính', '338765678', 'thebinh86@gmail.com', 'Luật (Chuyên ngành Luật Kinh doanh, Luật hành chín', '', '', 'ENEUHCM', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9648, 85586, '2018-12-24 21:07:29', 'Nguyễn Thụy Tố Quyên', '903741787', 'quyen27958@gmail.com', 'Quản trị kinh doanh ( chuyên ngành quản lý doanh n', '', '', 'ENEUHCM', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9649, 85688, '2018-12-26 17:30:54', 'Trần nữ trà my', '908631093', 'tntmy.1208@gmail.com', 'Tài chính ngân hàng (Chuyên ngành ngân hàng)', '', '', 'ENEUHCM', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9650, 85716, '2018-12-26 22:19:18', 'phamducthinh', '932783779', 'ducthinh89@gmail.com', 'Tài chính Ngân hàng', NULL, NULL, 'ENEUHCM', 'GAS', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 4, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9651, 85669, '2018-12-26 00:35:01', 'Giang Truong Nguyen', '909971905', 'vnreal.leasing@gmail.com', 'luật', NULL, NULL, 'ENEU', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9652, 85637, '2018-12-25 17:24:51', 'Chí Tâm', '912942459', NULL, '', NULL, NULL, 'ENEU', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9653, 85624, '2018-12-25 17:17:51', 'Minh Phuc Dang', '933269447', NULL, '', NULL, NULL, 'ENEU', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9654, 85619, '2018-12-25 17:17:51', 'Huỳnh Thắng', '937426200', NULL, '', NULL, NULL, 'ENEU', 'SUP', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9655, 85670, '2018-12-26 00:35:01', 'Đinh Văn Bùi', '969182598', 'dinhvanbui91@gmail.com', 'quản_trị_kinh_doanh', NULL, NULL, 'ENEU', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9656, 85593, '2018-12-25 00:18:01', 'Nguyễn Viết Ân', '985497908', 'Nguyenvietan992@gmail.com', 'quản_trị_kinh_doanh', NULL, NULL, 'ENEU', 'FBA', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9657, 85634, '2018-12-25 17:17:51', 'Tuấn', '988642410', 'tuandoan2505@gmail.com', 'trung cấp kế toán,liên thông quản trị kinh doanh, ', NULL, NULL, 'ENEU', 'HOT', 'HCM', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3, '2019-01-01 00:43:33', NULL, NULL, NULL, 0, 0, NULL, '', ''),
(9659, 85717, '2019-01-01 03:45:03', 'sdgsdg', '36347457', 'dsgsdg@sdgs.sg', '3346346', 'sdgsdg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'dsg', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 12, '2019-01-01 16:30:26', NULL, NULL, NULL, 0, 0, NULL, 'sdgdsg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crm_calllog`
--

CREATE TABLE `crm_calllog` (
  `calllog_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `calllog` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `dte_checkin` datetime DEFAULT NULL,
  `dte_datevisit` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  `c4_id` int(11) NOT NULL,
  `dteNextDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crm_calllog`
--

INSERT INTO `crm_calllog` (`calllog_id`, `level_id`, `calllog`, `user_id`, `dte_checkin`, `dte_datevisit`, `status_id`, `c4_id`, `dteNextDate`) VALUES
(1, 15, NULL, 1, NULL, '2018-12-17 00:00:00', 1, 1, '0000-00-00 00:00:00'),
(2, 20, NULL, 1, NULL, '2018-12-17 00:00:00', 1, 1, '0000-00-00 00:00:00'),
(3, 20, NULL, 1, NULL, '2018-12-17 00:00:00', 1, 1, '0000-00-00 00:00:00'),
(4, 20, NULL, 1, NULL, '2018-12-17 00:00:00', 1, 0, '0000-00-00 00:00:00'),
(5, 20, NULL, 1, NULL, '2018-12-17 00:00:00', 1, 1, '2018-12-17 00:00:00'),
(6, 20, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-17 00:00:00'),
(7, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-16 00:00:00'),
(8, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-16 00:00:00'),
(9, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-16 00:00:00'),
(10, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(11, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(12, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(13, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(14, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(15, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(16, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(17, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(18, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(19, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(20, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(21, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(22, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(23, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(24, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(25, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(26, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(27, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(28, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(29, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(30, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(31, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(32, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(33, 13, NULL, 1, NULL, '2028-12-16 00:00:00', 1, 1, '2018-12-20 00:00:00'),
(34, 13, NULL, 1, NULL, '2018-11-16 00:00:00', 1, 1, '2018-11-20 00:00:00'),
(35, 13, NULL, 1, NULL, '2018-12-16 00:00:00', 1, 1, '2018-11-20 00:00:00'),
(38, 12, NULL, 1, NULL, '2018-12-22 22:58:00', 0, 1, '2018-12-20 00:00:00'),
(39, 12, NULL, 1, NULL, '2018-12-22 22:58:00', 0, 1, '2018-12-20 00:00:00'),
(40, 12, NULL, 1, NULL, '2018-12-22 22:58:00', 0, 1, '2018-11-20 00:00:00'),
(41, 13, NULL, 1, NULL, '2018-12-16 11:04:20', 0, 1, '2018-11-20 00:00:00'),
(42, 13, NULL, 1, NULL, '2018-12-16 11:04:20', 0, 1, '2018-11-20 00:00:00'),
(43, 13, '123123', 3, NULL, '2018-12-24 14:15:52', 0, 6, '2018-11-20 00:00:00'),
(44, 11, NULL, 3, NULL, '2018-11-16 11:04:20', 0, 6, '2018-11-20 00:00:00'),
(45, 13, '123123', 3, NULL, '2018-12-24 15:17:36', 1, 6, '9999-12-31 00:00:00'),
(46, 13, '123123', 3, NULL, '2018-12-26 17:18:57', 1, 6, '9999-12-31 00:00:00'),
(47, 21, '123123', 12, NULL, '2018-12-26 18:54:01', 4, 6, '9999-12-31 00:00:00'),
(48, 13, '1231233', 12, NULL, '2018-12-26 18:56:29', 1, 6, '9999-12-31 00:00:00'),
(49, 13, '123123', 12, NULL, '2018-12-28 10:53:26', 1, 6, '9999-11-03 00:00:00'),
(50, 13, '123123', 12, NULL, '2018-12-28 11:19:44', 1, 6, '9999-12-31 00:00:00'),
(51, 13, '123123', 12, NULL, '2018-12-28 11:19:55', 1, 6, '9999-12-31 00:00:00'),
(52, 13, '123123', 12, NULL, '2018-12-28 11:20:37', 1, 6, '9999-12-31 00:00:00'),
(53, 13, '123123', 12, NULL, '2018-12-28 11:27:13', 1, 6, '9999-12-31 00:00:00'),
(54, 13, '123123346346346346346', 12, NULL, '2018-12-28 11:27:35', 1, 6, '9999-10-31 00:00:00'),
(55, 13, '123123', 12, NULL, '2018-12-28 11:29:01', 1, 6, '9999-12-31 00:00:00'),
(56, 13, '123123', 12, NULL, '2018-12-28 23:16:59', 1, 6, '9999-12-31 00:00:00'),
(57, 13, '123123', 12, NULL, '2018-12-28 23:18:50', 1, 6, '9999-12-31 00:00:00'),
(58, 13, '123123', 12, NULL, '2018-12-29 15:45:03', 1, 6, '2018-12-31 00:00:00'),
(59, 13, 'Xin chào', 12, NULL, '2018-12-29 21:36:53', 1, 6, '9999-12-31 00:00:00'),
(60, 13, '', 12, NULL, '2018-12-29 21:40:34', 1, 6, '9999-12-31 00:00:00'),
(61, 13, 'Test', 12, NULL, '2018-12-29 21:41:23', 1, 6, '9999-12-31 00:00:00'),
(62, 13, '', 12, NULL, '2018-12-29 21:56:16', 2, 6, '9999-12-31 00:00:00'),
(63, 13, '', 12, NULL, '2018-12-29 22:04:12', 2, 6, '9999-12-31 00:00:00'),
(64, 13, '', 12, NULL, '2018-12-29 22:11:36', 2, 6, '2018-12-29 00:00:00'),
(65, 1, '', 12, NULL, '2018-12-30 15:16:47', 1, 9170, '9999-12-31 00:00:00'),
(66, 1, '', 12, NULL, '2018-12-30 15:17:15', 1, 9170, '9999-12-31 00:00:00'),
(67, 1, '', 12, NULL, '2018-12-30 15:20:36', 1, 9170, '9999-12-31 00:00:00'),
(68, 1, '', 12, NULL, '2018-12-30 15:20:48', 1, 9170, '9999-12-31 00:00:00'),
(69, 1, 'Testingn...', 12, NULL, '2018-12-30 15:43:56', 1, 9170, '9999-12-31 00:00:00'),
(70, 13, '', 12, NULL, '2018-12-30 15:56:01', 1, 9170, '9999-12-31 00:00:00'),
(71, 13, '', 12, NULL, '2018-12-30 16:05:31', 1, 9170, '2019-01-04 00:00:00'),
(72, 13, '', 12, NULL, '2018-12-30 16:33:14', 1, 9170, '2019-01-04 00:00:00'),
(73, 13, '', 12, NULL, '2018-12-30 16:39:01', 1, 9170, '2019-01-04 00:00:00'),
(74, 13, '', 12, '2018-12-30 16:40:20', '2018-12-30 16:40:34', 1, 9170, '2019-01-04 00:00:00'),
(75, 13, '', 12, '2018-12-30 17:06:08', '2018-12-30 17:06:15', 1, 9170, '2019-01-04 00:00:00'),
(76, 7, 'testing...', 4, '2019-01-01 00:38:25', '2019-01-01 00:38:43', 1, 9473, '9999-12-31 00:00:00'),
(77, 13, '', 12, '2019-01-01 15:52:29', '2019-01-01 15:52:34', 2, 9557, '9999-12-31 00:00:00'),
(78, 14, '', 12, '2019-01-01 15:52:37', '2019-01-01 15:52:46', 3, 9557, '9999-12-31 00:00:00'),
(79, 18, '', 12, '2019-01-01 15:52:49', '2019-01-01 15:52:55', 2, 9557, '9999-12-31 00:00:00'),
(80, 2, '', 12, '2019-01-01 15:56:57', '2019-01-01 15:57:08', 1, 9560, '9999-12-31 00:00:00'),
(81, 2, '', 12, '2019-01-01 15:56:57', '2019-01-01 15:59:10', 1, 9560, '9999-12-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `crm_group`
--

CREATE TABLE `crm_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crm_group`
--

INSERT INTO `crm_group` (`group_id`, `group_name`) VALUES
(1, 'EHOU.HCMUTE.ENEU'),
(2, 'HOU.EHOU'),
(3, 'HOU.EHOU.ENEUHCM.HCMUTE');

-- --------------------------------------------------------

--
-- Table structure for table `crm_level`
--

CREATE TABLE `crm_level` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(3) NOT NULL,
  `level_diengiai_id` int(11) DEFAULT NULL,
  `level_diengiai` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crm_level`
--

INSERT INTO `crm_level` (`level_id`, `level_name`, `level_diengiai_id`, `level_diengiai`) VALUES
(1, 'L1', 1, 'Trùng SP khác'),
(2, 'L1', 2, 'Trùng cùng SP'),
(3, 'L1', 3, 'Trùng chính TVTS khác SP'),
(4, 'L1', 4, 'Trùng chính TVTS cùng SP'),
(5, 'L1', 5, 'Sai số'),
(6, 'L1', 6, 'Không có sđt'),
(7, 'L1', 7, 'KNM/KLLĐ'),
(8, 'L1', 8, 'Sai vùng'),
(10, 'L1', 9, 'Sai đối tượng'),
(11, 'L1', 10, 'KNC, từ chối tư vấn'),
(12, 'L1', 11, 'Bận gọi lại sau'),
(13, 'L2', 12, 'Đúng đối tượng, chưa có nhu cầu học tập'),
(14, 'L3', 13, 'Quan tâm học, gửi email'),
(15, 'L4', 14, 'Đã đến VP, nhưng không mua hồ sơ'),
(16, 'L5B', 16, 'Chỉ mua hồ sơ để về nhà làm'),
(17, 'L5A', 15, 'Nộp lệ phí xét tuyển hoặc thi tuyển nhưng thiết hồ sơ công chứng'),
(18, 'L5C', 17, 'Đủ lệ phí xét tuyển hoặc thi tuyển - ôn thi và đủ hồ sơ công chứng'),
(19, 'L5+', 18, 'Đã nộp học phí tạm thu HKI nhưng chưa đủ'),
(20, 'L6', 19, ' Xét tuyển: Gửi hồ sơ qua trường xét tuyển'),
(21, 'L7', 20, ' Có tên trong danh sách trúng tuyển của nhà trường'),
(22, 'L8', 21, ' Đã nộp đủ học phí'),
(23, 'L9', 22, 'Đã nhập học');

-- --------------------------------------------------------

--
-- Table structure for table `crm_role`
--

CREATE TABLE `crm_role` (
  `role_id` int(11) NOT NULL,
  `role_key` varchar(50) DEFAULT NULL,
  `rolename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crm_role`
--

INSERT INTO `crm_role` (`role_id`, `role_key`, `rolename`) VALUES
(1, 'admin', 'Administrator'),
(2, 'manager', 'Manager'),
(3, 'marketer', 'Marketer'),
(4, 'staff', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `crm_status`
--

CREATE TABLE `crm_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `crm_status`
--

INSERT INTO `crm_status` (`status_id`, `status_name`) VALUES
(1, 'Không nên gọi nữa'),
(2, 'Chưa xác định'),
(3, 'Chăm sóc sau 1 thời gian'),
(4, 'Không nên gọi nữa'),
(5, 'Kết thúc');

-- --------------------------------------------------------

--
-- Table structure for table `crm_user`
--

CREATE TABLE `crm_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_fullname` varchar(150) NOT NULL,
  `role_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_active` tinyint(4) NOT NULL DEFAULT '1',
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crm_user`
--

INSERT INTO `crm_user` (`user_id`, `username`, `email`, `password`, `user_fullname`, `role_id`, `group_id`, `user_active`, `parent_id`) VALUES
(1, 'sontv', 'longthse04935@fpt.edu.vn', '53483c7e924c04bf029854ecf920803e', 'Son Tran', 1, 1, 1, 10),
(2, 'longth ', 'sontv4@gmail.com.vn', '53483c7e924c04bf029854ecf920803e', 'Trần Văn B', 2, 1, 1, 1),
(3, 'longth2', 'sontv3@gmail.com.vn', '53483c7e924c04bf029854ecf920803e', 'Trần Văn C', 4, 1, 1, 2),
(4, 'test', 'sontv2@gmail.com.vn', '53483c7e924c04bf029854ecf920803e', 'Mr BON', 4, 3, 1, 5),
(5, 'longth2', 'sontv4@gmail.com.vn', '53483c7e924c04bf029854ecf920803e', 'Trần Văn A', 2, 1, 1, 1),
(6, 'sontv456', 'longthse04935@fpt.edu.vn', '123123', 'Trần Hoàng Long 666', 1, 0, 1, 0),
(7, 'sontv666', 'longthse04935@fpt.edu.vn', '53483c7e924c04bf029854ecf920803e', 'Trần Hoàng Long 666', 1, 2, 1, 0),
(8, 'sont123', 'longthse04935@fpt.edu.vn', '53483c7e924c04bf029854ecf920803e', 'Trần Hoàng Long123', 1, 1, 1, 0),
(9, 'admin', 'longthse04935@fpt.edu.vn', '53483c7e924c04bf029854ecf920803e', 'Admin', 1, 1, 1, 2),
(10, 'manager', 'longthse04935@fpt.edu.vn', '53483c7e924c04bf029854ecf920803e', 'Manager', 2, 1, 1, 2),
(11, 'marketer', 'longthse04935@fpt.edu.vn', '53483c7e924c04bf029854ecf920803e', 'Marketer', 3, 1, 1, 0),
(12, 'staff', 'longthse04935@fpt.edu.vn', '53483c7e924c04bf029854ecf920803e', 'Staff', 4, 1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tuyensinh`
--

CREATE TABLE `tuyensinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `namsinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dienthoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `truongtotnghiep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nganhhoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_chuyen` char(1) COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'N: chua chuyen, Y: da chuyen',
  `reg_date` timestamp NULL DEFAULT NULL,
  `cmnd` varchar(20) COLLATE utf8_unicode_ci DEFAULT '0',
  `dia_chi_giay_bao` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `khu_vuc` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'HN' COMMENT 'HN, HCM',
  `form_code` varchar(255) CHARACTER SET utf8 DEFAULT '000' COMMENT 'ID CUA FORM',
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `for_count` tinyint(4) DEFAULT '1',
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'UNVERIFIED'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tuyensinh`
--

INSERT INTO `tuyensinh` (`id`, `hoten`, `namsinh`, `diachi`, `email`, `dienthoai`, `truongtotnghiep`, `nganhhoc`, `nguon`, `ip`, `is_chuyen`, `reg_date`, `cmnd`, `dia_chi_giay_bao`, `khu_vuc`, `form_code`, `ghi_chu`, `for_count`, `trang_thai`) VALUES
(1, 'Son Tran', '1985', 'Tu Son - Bac Nih', 'test@gail.com', '353475474', 'TLU', 'CNTT', 'HH.KK.GSG', NULL, 'N', '2018-12-31 17:00:00', '0', '', 'HN', '000', 'Ghi chu', 1, 'UNVERIFIED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crm_c3`
--
ALTER TABLE `crm_c3`
  ADD PRIMARY KEY (`c3_id`);

--
-- Indexes for table `crm_c4`
--
ALTER TABLE `crm_c4`
  ADD PRIMARY KEY (`c4_id`);

--
-- Indexes for table `crm_calllog`
--
ALTER TABLE `crm_calllog`
  ADD PRIMARY KEY (`calllog_id`);

--
-- Indexes for table `crm_group`
--
ALTER TABLE `crm_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `crm_level`
--
ALTER TABLE `crm_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `crm_role`
--
ALTER TABLE `crm_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `crm_status`
--
ALTER TABLE `crm_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `crm_user`
--
ALTER TABLE `crm_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tuyensinh`
--
ALTER TABLE `tuyensinh`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crm_c3`
--
ALTER TABLE `crm_c3`
  MODIFY `c3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85719;

--
-- AUTO_INCREMENT for table `crm_c4`
--
ALTER TABLE `crm_c4`
  MODIFY `c4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9660;

--
-- AUTO_INCREMENT for table `crm_calllog`
--
ALTER TABLE `crm_calllog`
  MODIFY `calllog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `crm_group`
--
ALTER TABLE `crm_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crm_level`
--
ALTER TABLE `crm_level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `crm_role`
--
ALTER TABLE `crm_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `crm_status`
--
ALTER TABLE `crm_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `crm_user`
--
ALTER TABLE `crm_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tuyensinh`
--
ALTER TABLE `tuyensinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
crm_topica