-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 02:30 PM
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
-- Database: `art_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `artwork_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`artwork_ID`, `name`, `image_url`, `description`, `price`, `category`) VALUES
(1, 'Deep Impression', 'https://www.deepimpressions.co.uk/wp-content/uploads/2021/07/Bretonside-whales-sunswirl-.jpg', 'Transform your space into a work of art.', 3500.00, 'ABSTRACT'),
(3, 'Tree Moon', 'https://thegallerist.art/wp-content/uploads/2020/03/Megan-Duncanson_thegallerist.art_-4.jpg', 'Bring a touch of elegance to your walls.', 3000.00, 'ABSTRACT'),
(4, 'Modren Abstract', 'https://cdn.kreezalid.com/kreezalid/556408/catalog/8092/27/1000x1000_dscn1238_q7do8_178208285.jpg', 'Veiw comes after the hardest climb.', 5000.00, 'ABSTRACT'),
(5, 'Memories', 'https://gallery6islamabad.com/wp-content/uploads/2020/12/Screenshot_20200910-034952_Gallery-1.jpg', 'Transform your space into a work of art.', 3500.00, 'LANDSCAPE'),
(6, 'Morning Macaw', 'https://www.toperfect.com/pic/Oil%20Painting%20Styles%20on%20Canvas/Animals/bird/5-parrot-in-forest-beauful-birds.jpg', 'Bring a touch of elegance to your walls.', 3000.00, 'LANDSCAPE'),
(7, 'Untitled', 'https://gallery6islamabad.com/wp-content/uploads/2021/08/IMG_20210801_001934-4-scaled.jpg', 'Veiw comes after the hardest climb.', 5000.00, 'LANDSCAPE'),
(8, 'Arabic Art', 'https://artciti.com/image/cache/data/artist/Pakistani-Artist/Bin%20Qalander/Bin%20Qalander,%2024%20x%2024%20Inch,%20Oil%20on%20Canvas,%20Calligraphy%20Painting,%20AC-BIQ-096-300x300.jpg', 'Transform your space into a work of art.', 10000.00, 'Calligraphy'),
(9, 'Sweet Calligraphy', 'https://media.fuzia.com/assets/uploads/images/co_brand_1/article/2021/inbound3912046105665901081-1619313291.jpg', 'Bring a touch of elegance to your walls.', 5000.00, 'Calligraphy'),
(10, 'ABSTRACT', 'https://3.bp.blogspot.com/-xm75QW5SOko/W_kxBeEzdGI/AAAAAAAABfU/TKjfCcYDYFsyAdYs4m11yAs6zm_hAdS8ACLcBGAs/s400/image2.jpeg', 'Veiw comes after the hardest climb.', 7000.00, 'Calligraphy'),
(11, 'Jardin Secret', 'https://www.singulart.com/images-sh/eyJidWNrZXQiOiJzaW5ndWxhcnQtd2Vic2l0ZS1wcm9kIiwia2V5IjoiYXJ0d29ya3NcL3YyXC9jcm9wcGVkXC8yMjkyMVwvbWFpblwvem9vbVwvOTAxNzQ5X2QwMWNhNjU3ODUxNDY0MzdiYmI2Mzk5ZWJkZTZiZDZmLnBuZyIsImVkaXRzIjp7InJlc2l6ZSI6eyJ3aWR0aCI6MTg1NCwiaGVpZ2h0IjoxNDMzLjE1NzU3Njk4OTcwNDIsImZpdCI6Imluc2lkZSIsImJhY2tncm91bmQiOm51bGx9LCJ0b0Zvcm1hdCI6IndlYnAifX0=?signature=cd4bdc8a094a998f2504bc9a34e1b8dad00adadc172cf1f1ee845329e59f08ff', 'Transform your space into a work of art.', 2500.00, 'Drawing'),
(12, 'Winter or Spring', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRhaUSYSGw_iyqFcexc8yOEkPpPFOMFrZZRZDR8s9sc2p6AsINO', 'Bring a touch of elegance to your walls.', 3700.00, 'Drawing'),
(13, 'FLORAL PAINTING', 'https://artciti.com/image/cache/data/artist/Pakistani-Artist/Aurangzib%20Hanjra/Aurangzib%20Hanjra,%2020%20x%2030%20Inch,%20Acrylic%20on%20Canvas,%20Floral%20Painting,%20AC-AZH-007-300x300.jpg', 'Veiw comes after the hardest climb.', 2000.00, 'Drawing'),
(14, 'Unknown', 'https://theinnovator.news/wp-content/uploads/2020/07/Natureopportunity-1536x1024.jpg', 'Transform your space into a work of art.', 5000.00, 'Nature Photography'),
(15, 'A place to remember', 'https://pinebusharealibrarydotorg.files.wordpress.com/2022/12/nature-photography-tips.jpg', 'Bring a touch of elegance to your walls.', 4000.00, 'Nature Photography'),
(16, 'Butterfly', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbqeIPecnQOPmReRmW-M79KO-aZhGecEz41vx4wbfmHibjAQQo', 'Veiw comes after the hardest climb.', 5500.00, 'Nature Photography'),
(17, 'Honey', 'https://i.etsystatic.com/27431999/r/il/fe20af/2831182876/il_1588xN.2831182876_1zhx.jpg', 'Transform your space into a work of art.', 5000.00, 'CERAMIC'),
(18, 'Artistic Pottery', 'https://upload.wikimedia.org/wikipedia/commons/f/fc/Wave_bowl_MET_LC-2001_549-001.jpg', 'Bring a touch of elegance to your walls.', 7000.00, 'CERAMIC'),
(19, 'MANNA', 'https://i.etsystatic.com/8219057/r/il/dc6a9d/4215755908/il_1588xN.4215755908_kerd.jpg', 'Veiw comes after the hardest climb.', 9000.00, 'CERAMIC'),
(20, 'Mix Fruit', 'https://i.etsystatic.com/40704512/r/il/1eb061/4623214494/il_1588xN.4623214494_8qoh.jpg', 'Transform your space into a work of art.', 5000.00, 'Still Life'),
(21, 'Lamp Book', 'https://d3rf6j5nx5r04a.cloudfront.net/vz75SX-MC9SNChza7fIOlsz6oa8=/1120x0/product/9/3/af89815f1d534562a1970cf3c8324da9.jpg', 'Bring a touch of elegance to your walls.', 7000.00, 'Still Life'),
(22, 'Still Alive', 'https://upload.wikimedia.org/wikipedia/commons/d/d2/Pieter_Claeszoon_-_Still_Life_with_a_Skull_and_a_Writing_Quill.JPG', 'Veiw comes after the hardest climb.', 9000.00, 'Still Life'),
(23, 'Riding Horse', 'https://img.pikbest.com/origin/09/35/03/82dpIkbEsTieY.jpg!w700wp', 'A riding horse.', 6000.00, 'LANDSCAPE'),
(25, 'Geometric-Rhythms', 'https://www.sallytrace.com/cdn/shop/files/Geometric-Rhythms-Abstract-Art-sally-trace_bcbae704-3176-4821-b550-45ae3b794e07.jpg?v=1710359414&width=823', 'An abstract art of geometric patterns.', 6500.00, 'ABSTRACT');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `user_ID` int(11) NOT NULL,
  `FName` text NOT NULL,
  `LName` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(8) NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`user_ID`, `FName`, `LName`, `email`, `password`, `user_type`) VALUES
(1, 'Asfa', 'Chandni', 'asfa@gmail.com', '12345678', 'Customer'),
(3, 'Hira', 'Ghulam Nabi', 'hiraghulam@gmail.com', '21251100', 'Supplier'),
(5, 'Laila', 'Akbar', 'lailaakbar@yahoo.com', 'project1', 'Artist'),
(6, 'James', 'Henry', 'james@gmail.com', '22222222', 'Customer'),
(7, 'Mualla', 'Mubeen', 'muallamubeen@gmail.com', '12345678', 'Admin'),
(8, 'Marry', 'Henry', 'marry@gmail.com', '33333333', 'Artist'),
(9, 'Leo', 'Dickens', 'leo@gmail.com', '55555555', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `artwork_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`artwork_ID`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `artwork_id` (`artwork_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `artwork_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
