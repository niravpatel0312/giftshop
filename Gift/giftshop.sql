-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2026 at 11:06 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giftshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

DROP TABLE IF EXISTS `admin_detail`;
CREATE TABLE IF NOT EXISTS `admin_detail` (
  `adimn_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`adimn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`adimn_id`, `admin_name`, `email_id`, `password`) VALUES
(1, 'admin', 'admin@giftshop.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

DROP TABLE IF EXISTS `cart_detail`;
CREATE TABLE IF NOT EXISTS `cart_detail` (
  `cart_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`cart_id`, `product_id`, `qty`, `price`) VALUES
(1, 37, 2, 200),
(2, 24, 2, 400),
(4, 16, 1, 1500),
(4, 11, 1, 1000),
(4, 35, 3, 250),
(5, 1, 6, 800),
(6, 35, 1, 250),
(6, 16, 1, 1500),
(6, 12, 2, 1500),
(7, 33, 1, 500),
(7, 2, 1, 2000),
(7, 39, 2, 200),
(8, 11, 1, 950),
(9, 1, 1, 800),
(9, 19, 2, 1300),
(10, 15, 1, 1200),
(10, 4, 2, 500),
(11, 11, 2, 950),
(11, 39, 2, 200),
(12, 1, 2, 800),
(13, 9, 2, 550),
(13, 23, 2, 500),
(13, 35, 1, 250),
(13, 40, 2, 210),
(14, 11, 1, 950),
(14, 34, 1, 300),
(14, 19, 1, 1300),
(14, 41, 2, 250),
(15, 1, 2, 800),
(16, 16, 1, 1000),
(16, 10, 1, 990);

-- --------------------------------------------------------

--
-- Table structure for table `cart_master`
--

DROP TABLE IF EXISTS `cart_master`;
CREATE TABLE IF NOT EXISTS `cart_master` (
  `cart_id` int(10) NOT NULL,
  `cart_date` date NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_master`
--

INSERT INTO `cart_master` (`cart_id`, `cart_date`) VALUES
(1, '2025-10-15'),
(2, '2025-10-15'),
(3, '2025-10-19'),
(4, '2025-10-20'),
(5, '2025-10-20'),
(6, '2025-10-29'),
(7, '2025-11-09'),
(8, '2025-11-11'),
(9, '2025-11-11'),
(10, '2025-11-25'),
(11, '2025-12-02'),
(12, '2025-12-02'),
(13, '2025-12-02'),
(14, '2025-12-02'),
(15, '2025-12-02'),
(16, '2026-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration`
--

DROP TABLE IF EXISTS `customer_registration`;
CREATE TABLE IF NOT EXISTS `customer_registration` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(10) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_registration`
--

INSERT INTO `customer_registration` (`customer_id`, `customer_name`, `address`, `city`, `mobile_no`, `email_id`, `password`) VALUES
(1, 'Diya ', 'Chipwad', 'Valsad', '9876543210', 'diya@email.com', '123456'),
(2, 'Heer', 'Abrama', 'Valsad', '8569320147', 'heer@email.com', '123456'),
(3, 'Kashish', 'Mota Bajar', 'Valsad', '6549873210', 'kashish@email.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `cart_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `delivery_address` varchar(200) NOT NULL,
  `delivery_mno` varchar(10) NOT NULL,
  `total_amount` int(10) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `order_date`, `cart_id`, `customer_id`, `delivery_address`, `delivery_mno`, `total_amount`) VALUES
(1, '2025-10-29', 6, 1, 'Abrama, Valsad-396001', '9865741203', 4750),
(2, '2025-11-09', 7, 3, 'Mota Bajar, Valsad-396001', '9876534201', 2900),
(3, '2025-11-11', 9, 3, 'chipwad valsad', '9876543210', 3400),
(4, '2025-11-25', 10, 1, 'Abrama', '9852324540', 2200),
(5, '2025-12-02', 11, 1, 'chipwad', '9876534201', 2300),
(6, '2025-12-02', 12, 3, 'Mota Bajar, Valsad', '9865741203', 1600),
(7, '2025-12-02', 13, 2, 'Amrut Tara, Chipwad, Valsad', '9865741203', 2770),
(8, '2025-12-02', 14, 1, 'chipwad', '9845623756', 3050),
(9, '2025-12-02', 15, 2, 'Amrut Tara, Chipwad', '9865741203', 1600);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `category_id` int(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category`) VALUES
(1, 'Fashion'),
(2, 'Accessories'),
(3, 'Books');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

DROP TABLE IF EXISTS `product_detail`;
CREATE TABLE IF NOT EXISTS `product_detail` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category_id` int(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`product_id`, `product_name`, `description`, `category_id`, `price`, `product_image`, `supplier_id`) VALUES
(1, 'Men-Sunglasses', 'Stylish sunglasses with octagon-shaped dark lenses, a thin metallic frame, and black glossy arms.\r\n', 1, '800', 'products_img/1757777460.png', 1),
(2, 'RayBen Men Sunglasses', 'Black Ray-Ban sunglasses with gold accents and dark lenses', 1, '1000', 'products_img/1757777859.png', 1),
(3, 'Shein Men Sunglasses', 'Gold-framed sunglasses with black square lenses.\r\n', 1, '900', 'products_img/1757778072.png', 1),
(4, 'Sunglasses', 'Three pairs of black sunglasses in different shapes: rectangular, cat-eye, and oval.', 1, '500', 'products_img/1757778176.png', 1),
(5, 'Urban 22 Eyewear Sunglasses Collection', 'Three pairs of stylish sunglasses with gold frames and black lenses in square, oval, and rectangular shapes.', 1, '550', 'products_img/1757778317.png', 1),
(6, 'Two Rectangular Sunglasses', 'A pair of black and white rectangular sunglasses.\r\n', 1, '400', 'products_img/1757778895.png', 1),
(7, 'Black Leather Wallet', 'A black leather wallet with white stitching and the brand name \"DEABOLAR\" embossed on the front is shown on a dark, textured.', 1, '500', 'products_img/1757779054.png', 1),
(8, 'Brown Leather Wallet', 'A brown, textured leather wallet with white stitching and a silver accent bar.', 1, '590', 'products_img/1757779388.png', 1),
(9, 'Grey Suede Wallet', 'A dark grey or black suede wallet with brown contrast stitching and a silver metal accent is displayed on a dark surface.', 1, '550', 'products_img/1757779558.png', 1),
(10, 'Two-Tone Handbag', 'A black and beige two-tone handbag is displayed against a solid grey background, featuring a tan handle, a long shoulder strap, and a prominent gold circular clasp onÂ theÂ frontÂ flap.', 1, '990', 'products_img/1757779851.png', 1),
(11, 'Brown Shoulder Bag', ' A brown leather shoulder bag with a curved, asymmetrical flap and an adjustable strap.', 1, '950', 'products_img/1757779953.png', 1),
(12, 'White Hobo Bag', 'It is a crescent-shaped bag with a single shoulder strap, often made of soft, flexible material. Its slouchy and relaxed form makes it perfect forÂ everydayÂ wear.', 1, '950', 'products_img/1757780102.png', 1),
(13, 'Embroidered Canvas Tote Bag', 'It is a small, rectangular tote bag made from a light-colored canvas material, featuring a detailed embroidery of white daisies with yellow centers. It has two brown leather handles and a detachableÂ shoulderÂ strap.', 1, '750', 'products_img/1757780361.png', 1),
(14, 'Crochet Tote Bag', 'A beige, hand-woven crochet tote bag with a textured open-knit pattern and sturdy shoulder straps, perfect for casual outings or carrying daily essentials.', 1, '500', 'products_img/1764149496.png', 1),
(15, 'Textured Gold Band Ring', 'This ring shows a shiny, metallic gold ring with a diamond-shaped lattice pattern engraved on its surface. ', 2, '1200', 'products_img/1757836661.png', 2),
(16, 'Interwoven Platinum Ring', 'This ring features a minimalist, polished platinum or white gold ring. ', 2, '1000', 'products_img/1757839646.png', 2),
(20, 'Adjustable Gold Ring', 'The ring features a twisted, intertwined design embellished with small, sparkling clear stones. ', 2, '999', 'products_img/1757844628.png', 2),
(19, 'Gold Diamond Ring', 'The ring features a twisted band accented with small stones.', 2, '1300', 'products_img/1757844548.png', 2),
(17, 'Matte and Polished Black Ring', 'This ring shows a wide, black ring with a striking design. ', 2, '1000', 'products_img/1757839859.png', 2),
(18, 'Pave Diamond Crisscross Ring', 'This ringshows a delicate rose gold or copper ring with a unique crisscross design. ', 2, '990', 'products_img/1757840818.png', 2),
(21, ' Pair of Matching Silver Rings', 'One is a solid band with a braided or intertwined design, while the other is a solitaire-style ring featuring a large central clear stone and smaller side stones, all set in a similar intertwined pattern.', 2, '1000', 'products_img/1757844817.png', 2),
(22, 'Pair of Matching Gold Rings', ' One is a slender, delicate band resembling a vine with small leaves and three tiny stones, while the other is a wider, solid band with a similar engraved leaf or branch pattern.', 2, '1350', 'products_img/1757845105.png', 2),
(23, ' Heart-Shaped Chain', 'Delicate gold chain necklace with a heart-shaped clear stone or diamond pendant.', 2, '500', 'products_img/1757845285.png', 2),
(24, 'Star Shapes Chain', 'The chain is adorned with small, evenly spaced pendants, alternating between tiny star shapes and single round gemstones.', 2, '400', 'products_img/1757845398.png', 2),
(25, 'Thin Rosegold Chain ', 'The chain has a smooth, sleek design and rests against a white collared shirt.', 2, '350', 'products_img/1757845534.png', 2),
(26, 'Men Gold Chain', 'Gold chain necklace with a wheat link or foxtail design. The chain is thick and intricate.', 2, '300', 'products_img/1757845971.png', 2),
(27, 'Men Cuban Link Chain', 'Cuban link chain necklace. The chain has a classic, flat curb link design', 2, '450', 'products_img/1757846130.png', 2),
(28, 'Men Gold Chain with Pendant', 'Gold rope chain necklace with a square-shaped black pendant. The chain is thin', 2, '550', 'products_img/1757846326.png', 2),
(29, 'Oxidized Silver Earriongs', 'The earrings feature a floral design with pink stones, heart-shaped motifs, and dangling white pearl beads.', 2, '100', 'products_img/1757846517.png', 2),
(30, 'Kashmiri Jhumka', 'The earring has a floral stud with a pink stone and a dangling bell-shaped jhumka adorned with large and small pearls.', 2, '150', 'products_img/1757846901.png', 2),
(31, 'Gold Toned Jhumka ', ' The earrings have a half-moon or semi-circular design filled with intricate filigree, clear and pink stones, and a cluster of dangling white pearls.', 2, '100', 'products_img/1757847053.png', 2),
(32, 'It Ends With Us and It Starts With Us', 'Two books by Colleen Hoover, \"It Ends with Us\" and \"It Starts with Us\".', 3, '450', 'products_img/1757847308.png', 3),
(33, 'Twisted Series', 'Four books from the \"Twisted\" series by Ana Huang. The titles are \"Twisted Love,\" \"Twisted Games,\" \"Twisted Hate,\" and \"Twisted Lies,\"', 3, '500', 'products_img/1757847486.png', 3),
(34, 'The Palace of Illusion', 'The book \"The Palace of Illusions\" by Chitra Banerjee Divakaruni.', 3, '300', 'products_img/1757847831.png', 3),
(35, 'All Your Perfects', 'The book \"All Your Perfects\" by Colleen Hoover.', 3, '250', 'products_img/1757848053.png', 3),
(36, 'Good Vibes, Good Life', 'The book \"Good Vibes, Good Life\" by Vex King.', 3, '220', 'products_img/1757848198.png', 3),
(37, 'Secret', ' the book \"The Secret\" by Rhonda Byrne.', 3, '200', 'products_img/1757848306.png', 3),
(38, 'The Sun and Her Flower, Milk and Honey', 'Two books by Rupi Kaur, \"the sun and her flowers\" and \"milk and honey\".', 3, '350', 'products_img/1757848515.png', 3),
(39, 'Temple Design Jhumka', 'Antique-style gold-toned jhumkas featuring a top stud with a goddess/temple design and a fringeÂ ofÂ pearls.', 2, '200', 'products_img/1762679390.png', 2),
(40, 'Traditional Gold Toned Jhumka', 'Classic, intricate gold-toned bell-shaped jhumka earrings adorned with red/ruby-colored stones and small gold beads.', 2, '210', 'products_img/1762679567.png', 2),
(41, 'Gold Toned Peacock Jhumka', 'Large, intricate gold-toned hoop earrings featuring peacock motifs and dangling pearls.', 2, '250', 'products_img/1762679622.png', 2),
(42, 'Ikigai', 'afsfs', 3, '200', 'products_img/1762681942.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_registration`
--

DROP TABLE IF EXISTS `supplier_registration`;
CREATE TABLE IF NOT EXISTS `supplier_registration` (
  `supplier_id` int(10) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(10) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_registration`
--

INSERT INTO `supplier_registration` (`supplier_id`, `supplier_name`, `address`, `city`, `mobile_no`, `email_id`, `password`) VALUES
(1, 'Abhay', 'Abrama', 'Valsad', '9876523410', 'abhay@gmail.com', '123456'),
(2, 'Payal', 'Mograwadi', 'Valsad', '8956237410', 'payal@gmail.com', '123456'),
(3, 'Satyam', 'Mograwadi', 'Valsad', '9875203614', 'satyam@gmail.com', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
