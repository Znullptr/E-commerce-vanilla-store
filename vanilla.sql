-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2024 at 10:54 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20971531_nouvil`
--
CREATE DATABASE IF NOT EXISTS `id20971531_nouvil` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id20971531_nouvil`;

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `username` varchar(16) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `email` varchar(36) NOT NULL,
  `telephone` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `confirm` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`id`, `name`, `surname`, `username`, `adress`, `email`, `telephone`, `password`, `confirm`) VALUES
(20, '', '', 'tahar01', '', '', '', '', ''),
(31, 'Tahar', 'Jaafer', 'Al_said', '', 'taharjaafer2002@gmail.com', '', 'rayen', 'rayen'),
(32, 'sawsen', 'baffoun', 'sousou', '', 'taharjaafer@gmail.com', '23304484', 'tahar', 'tahar'),
(33, 'rayen', 'jaafer', 'abdallah', '', 'rayenjaafer@gmail.com', '26787498', 'abdallah', 'abdallah');

-- --------------------------------------------------------

--
-- Table structure for table `Commande`
--

CREATE TABLE `Commande` (
  `id` bigint(20) NOT NULL,
  `CodProd` bigint(20) NOT NULL,
  `Username` varchar(16) NOT NULL,
  `QteCde` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `State` varchar(15) NOT NULL DEFAULT 'Suspended'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Commande`
--

INSERT INTO `Commande` (`id`, `CodProd`, `Username`, `QteCde`, `date`, `State`) VALUES
(4259, 11222995027, 'Al_said', 1, '2023-06-28 09:33:41', 'Validated'),
(4391, 27813944665, 'Al_said', 5, '2022-05-09 09:41:13', 'Validated'),
(8182, 36197976932, 'Al_said', 2, '2022-05-09 09:49:41', 'Validated'),
(8834, 11222995027, 'Al_said', 1, '2022-05-09 10:44:48', 'Validated'),
(9132, 36197976932, 'Al_said', 2, '2022-05-09 09:41:38', 'Validated'),
(10953, 30038321893, 'Al_said', 1, '2023-06-28 10:02:33', 'Validated'),
(38697, 30436678212, 'Al_said', 3, '2022-05-09 10:46:47', 'Validated'),
(56042, 37110338878, 'Al_said', 1, '2022-05-09 09:54:01', 'Validated'),
(72919, 11222995027, 'Al_said', 2, '2023-06-28 09:06:55', 'Validated'),
(85793, 13856833003, 'Al_said', 2, '2022-05-09 09:53:10', 'Validated'),
(382215, 30038321893, 'Al_said', 5, '2023-06-28 10:12:34', 'Validated'),
(531766, 11222995027, 'Al_said', 1, '2023-06-28 10:10:49', 'Validated'),
(628207, 31705516047, 'Al_said', 5, '2022-05-09 09:51:39', 'Validated'),
(766468, 23051733014, 'Al_said', 2, '2023-06-28 10:24:00', 'Suspended'),
(809248, 28581735797, 'Al_said', 3, '2022-05-09 01:33:13', 'Validated'),
(999944, 22354414962, 'Al_said', 3, '2023-06-28 10:14:25', 'Validated'),
(2330261, 13856833003, 'Al_said', 2, '2022-05-09 01:32:48', 'Validated'),
(7342158, 11222995027, 'Al_said', 1, '2023-06-28 09:39:13', 'Validated'),
(36354292, 30038321893, 'Al_said', 3, '2022-05-09 10:42:36', 'Validated'),
(56387274, 22354414962, 'Al_said', 1, '2022-05-09 11:48:48', 'Validated'),
(662583560, 11222995027, 'Al_said', 1, '2023-06-28 09:55:17', 'Validated'),
(828179281, 38793217501, 'Al_said', 1, '2023-06-28 09:19:23', 'Validated'),
(1320820429, 13856833003, 'Al_said', 3, '2022-05-09 09:52:59', 'Validated'),
(3479978956, 34836763734, 'Al_said', 2, '2022-05-09 11:49:10', 'Validated'),
(3805565867, 34836763734, 'Al_said', 2, '2023-06-28 10:21:52', 'Validated');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `CodProd` bigint(20) NOT NULL,
  `ProdName` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `ProdColor` varchar(20) NOT NULL,
  `ProdImg` varchar(50) NOT NULL,
  `QteStock` int(11) NOT NULL DEFAULT 1,
  `OrgPrixU` decimal(5,2) NOT NULL,
  `PrixU` decimal(5,2) DEFAULT NULL,
  `NumTemp` int(2) NOT NULL,
  `Rate` int(1) NOT NULL,
  `Discount` decimal(3,2) DEFAULT NULL,
  `Top` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`CodProd`, `ProdName`, `Description`, `ProdColor`, `ProdImg`, `QteStock`, `OrgPrixU`, `PrixU`, `NumTemp`, `Rate`, `Discount`, `Top`) VALUES
(11222995027, 'Hackjay Men\'s Hiphop Dance', '7.8 ounce fleece sweatshirt made with up to 5 percent polyester created from recycled plastic\r\n7.8 ounce fleece sweatshirt made with up to 5 percent polyester created from recycled plastic\r\nDouble-needle cover-seamed neck and armholes stays strong\r\nPill-resistant fabric with high-stitch density for durability\r\nRibbed waistband and cuffs for a comfortable fit\r\n50% Cotton, 50% Polyester with up to 5% polyester created from recycled plastic, Ash 50% Cotton, 50% Polyester, Light Steel 50% Cotton, 50% Polyester, Charcoal Heather 65% Cotton 35% Polyester', 'Black', './img/jacket.jpg', 121, 87.50, 77.00, 2, 5, 0.12, 0),
(21017045631, 'Lavnis Men\'s 2 Pieces Suits', '100% Polyester\r\nImported\r\nZipper closure\r\nHand Wash Only\r\nFabric: 35% cotton + 65% polyester, feel soft and comfortable\r\nSizes: Small, Medium, Large, X-Large, XX-Large; For baggy or tight fitting, please check the \"Lavnis Size Chart\" and product description clearly before purchase it ', 'Black', './img/jacket4.jpg', 177, 150.00, 75.00, 2, 5, 0.50, 0),
(22354414962, 'Monki Lindi shirt in pink', NULL, 'Pink', './img/Pink-Lady-Shirt.jpeg', 55, 55.21, 30.00, 1, 4, NULL, 1),
(23051733014, 'Teva Flatform Universal Mesh', NULL, 'White', './img/white.webp', 115, 39.99, 39.99, 6, 5, NULL, 1),
(30038321893, 'Apple Watch Series 7 [GPS 45mm] Smart Watch', ' Always-on Retina display has nearly 20% more screen area than Series 6, making everything easier to see and use\r\nThe most crack-resistant front crystal yet on an Apple Watch, IP6X dust resistance, and swimproof design\r\nMeasure your blood oxygen with a powerful sensor and app\r\nAppleCare+ for Apple Watch extends your coverage with additional service and support for one year from your AppleCare+ purchase date\r\n24/7 priority access to technical support offers troubleshooting for Apple Watch, watchOS, and Apple-branded Watch apps ', 'White', './img/watch.jpg', 320, 98.28, 57.00, 4, 4, 0.42, 0),
(30436678212, 'Booney Hat, brown commando', 'Size: Casual unisex hat, comfortable and comfortable fit.  Cap size available from 22-24 inches (56cm-62cm).  Adjustable back elastic string design.\r\n Feature: Waterproof Sunscreen.  Wide 3 inch brim, UPF 50+ excellent sun protection.  Shields the sun from your face and neck and provides excellent protection against harmful rays.\r\nClosure: Elastic, Drawstring ', 'Brown', './img/booney.jpg', 1, 15.99, 15.99, 5, 2, NULL, 0),
(34836763734, 'Anne Klein Clip Hoop Earings', ' GOLD-TONE HOOPS: Make a sophisticated statement with the gorgeous high-polished shine of these fabulous wide hoop earrings in silver-tone mixed metal from Anne Klein. Approximate diameter: 1-1/4.\r\nCLIP-ON COMFORT: Our unique E-Z Comfort clip closure is easy on non-pierced ears & comfortable to wear. Clip earrings stay in place & hug the ear without pinching for the ultimate in effortless style.\r\nJEWELRY FOR MODERN WOMEN: Versatility is at the core of our philosophy.Find your inspiration with our line of high-fashion earrings, from gold to silver to pearl, from classic hoops to crystal studs. ', 'Gold', './img/hoopearing1.jpg', 90, 12.00, 12.00, 7, 3, NULL, 0),
(35994559625, 'Shining Diva Oxidised Silver', NULL, 'Silver', './img/anklet.jpg', 351, 28.21, 28.21, 7, 4, NULL, 1),
(38793217501, 'Garmin Venu, GPS Smartwatch with Bright Touchscreen Display ', ' Beautiful, bright amoled display and up to 5 day battery life in smartwatch mode; Up to 6 hours in GPS and music mode\r\nThe broadest range of all-day health monitoring features keeps track of your energy levels, respiration, menstrual cycle, stress, sleep, estimated heart rate and more\r\nEasily download songs to your watch, including playlists from Spotify, Amazon music or Deezer (may require a premium subscription With a third-party music provider), and connect with headphones (sold separately) for phone-free listening\r\nRecord all the ways to move with more than 20 preloaded GPS and indoor sports apps, including yoga, running, pool swimming and more ', 'Black', './img/watch1.jpg', 402, 112.34, 99.99, 4, 5, 0.11, 0),
(41589682755, 'Volita Mens Jogging Suits', 'Polyester\r\n    Elastic, Drawstring closure\r\n    Fabric: Soft durable polyester with slight stretchy. It\'s very breathable but still will keep you warm during cold weather. This sweatsuits inside much more softer and smoother on the skin than the outside.\r\n    Size: Regular fit, so maybe order one size up if you don\'t like it too fitting. This jogging suit is best suited to cool or cold weather.\r\nCare Instructions: It is recommended to machine wash cold with low tumble dry to prevent damaging the artificial leather, so just be a little careful there.', 'Black', './img/jacket1.jpg', 255, 50.00, 50.00, 2, 4, NULL, 0),
(45523532876, 'New Balance 3 Trail Running Shoe', '50% Leather, 50% Mesh\r\nImported\r\nRubber sole\r\nCush+ midsole cushioning delivers ultra-soft, all-day comfort without sacrificing support\r\nLeather and mesh upper\r\nNB Ultra Soft Comfort Insert\r\nAll-terrain rubber outsole', 'Gray', './img/shoes1.jpg', 1, 89.24, 59.79, 6, 4, 0.33, 0),
(49733755634, 'Men\'s Regular-Fit Quick-Dry Golf Polo Shirt', '100% Polyester\r\nImported\r\nButton closure\r\nMachine Wash\r\nA classic cut makes this golf polo a go-to on or off the links\r\nSame fit, new name: We’ve changed the name of this shirt style to “Regular Fit” but the measurements remain the same\r\nLightweight performance quick-dry fabric with UPF 50 sun protection wicks moisture to help keep you dry', 'Green', './img/shirt3.jpg', 355, 18.07, 15.90, 1, 4, 0.12, 0),
(50462544681, 'Flexfit Men\'s Athletic Basebap', ' 63% Polyester, 34% Cotton, 3% Spandex\r\nStretch Fitted closure\r\nWhether it\'s baseball season or a special company event you\'ve got approaching, take your pick from a variety of colors and sizes to find the perfect fit for you and your team.\r\nOur Flexfit blank hats are 6-panel and contain a mid-profile wool-like texture that provides the perfect combination of durability and comfort. With a rounded athletic shape and stretch band to fit all sizes, this Flexfit Wooly Combed Twill cap and other Flexfit blank hats from our store are ideal for all of your team sports needs. ', 'Black', './img/hat.jpg', 740, 11.99, 11.99, 5, 4, NULL, 0),
(57517528298, 'Gildan Men\'s Ultra Cotton T-Shirt', 'Solids: 100% Cotton; Ash Grey: 99% Cotton, 1% Polyester; Sport Grey and Antique Heathers: 90% Cotton, 10% Polyester; Safety Colors and Heathers: 50% Cotton, 50% Polyester\r\nImported\r\nPull On closure\r\nMachine Wash\r\nThick and heavy 6.0 oz. per sq. yd. fabric made from 100% US cotton ', 'Black', './img/shirt1.jpg', 230, 35.53, 15.99, 1, 3, 0.55, 0),
(59197042006, 'Weekday Thick Hoop Earrings', NULL, 'Silver', './img/weekday-thick-hoop-earrings.jpg', 400, 12.00, 12.00, 7, 2, NULL, 1),
(69543486348, 'T-Shirt Garçon Lvb Batwing Tee', NULL, 'White', './img/shirt.jpg', 102, 25.00, 25.00, 1, 3, NULL, 1),
(72532646025, 'Swarovski Lifelong Heart Bangle Bracelet ', ' A glamorous look: This bangle combines the precision and quality of sparkling Swarovski crystals with delightful details like the curved rose-gold tone plated heart, for an elegant design\r\nModern and meaningful: The sleek combination of mixed rose-gold tone and rhodium plating of this bangle combined with sparkling Swarovski stones work together to create a timeless masterpiece\r\nDesigned to last: Swarovski jewelry will maintain its brilliance over time when simple care practices are observed;remove before contact with water, lotions or perfumes to extend your jewelry life', 'Silver', './img/jewelry.jpg', 220, 28.21, 22.00, 7, 3, 0.22, 0),
(73516360850, 'Under Armour Men\'s Shoe', 'Made in USA or Imported\r\nRubber sole\r\nLightweight mesh upper with 3-color digital print delivers complete breathability\r\nDurable leather overlays for stability & that locks in your midfoot\r\nEVA sockliner provides soft, step-in comfort\r\nCharged Cushioning midsole uses compression molded foam for ultimate responsiveness & durability\r\nSolid rubber outsole covers high impact zones for greater durability with less weight', 'Black', './img/shoes1.webp', 1, 70.00, 57.40, 6, 4, 0.18, 1),
(79605560293, 'Betsey Johnson Celestial Moon & Star Drop E', 'Mismatched drop earrings featuring stars and crescent moon embellished with glistening pink tonal colored stone accents and textured details. These celestial earrings are set in rose gold-tone metal and have a post back closure.\r\nGold-tone metal with glass stones\r\nPost Back closure\r\nEarring Drop: 2.4\"-2.5\" x Width:0.9\"-1.1\"', 'Gold', './img/jewelry1.jpg', 520, 22.24, 22.24, 7, 3, NULL, 0),
(79612095998, 'Kingsley Ryan Ring silver', NULL, 'Silver', './img/silver.webp', 320, 27.00, 27.00, 7, 3, NULL, 1),
(80990345329, 'Under Armour Boys\' Little Baseball Pant', '100% Polyester\r\nImported\r\nBelt closure\r\nMachine Wash\r\nUltra durable, performance fabric built for gameday comfort\r\nSeven belt loops, working fly & double front enclosure\r\nDual layer knees deliver added durability', 'White', './img/pants.jpg', 135, 28.68, 19.50, 3, 2, 0.32, 0),
(83366712949, 'Baseball Pant, 2021, Adult, Solid Color ', '100% Polyester\r\nImported\r\nBelt closure\r\nMachine Wash\r\nMODERN KNICKER-FIT DESIGN | with double metal-snap/zipper closure, 7 belt loop system, double back-welt pockets, and elastic cuff\r\nEASTON BRANDED ELASTIC WAISTBAND | allowing your jersey to stay inplace and tucked in\r\n100% POLYESTER KNIT FABRIC | to provide maximum comfort', 'White', './img/pants1.jpg', 99, 69.99, 69.99, 3, 5, NULL, 0),
(91212785450, 'Light Barefoot Shoes', ' Rubber sole\r\nLIGHTWEIGHT FOR ACTIVE LIFESTYLES - The TerraFlex offers Trail-gripping comfort to handle your active lifestyle. A men’s 9 is about 9.6 ounces each so you can enjoy lightweight performance during your next adventure\r\nXERO DROP SOLE FOR PERFECT POSTURE - The Xero Drop sole offers a non-elevated heel and is low-to-the-ground for proper posture, balance, and agility. You’ll love the comfort and traction that comes from a wide toe box and breathable mesh upper\r\nFLEX YOUR FEET, FEEL THE FLOOR - Features patented 5mm FeelTrue sole base with 4mm lugs; optional 2mm insole to adjust the amount of “barefoot feel”; 3mm embedded BareFoam, tire tread-inspired sole, and Tough Tek toe bumper offer extra security ', 'Black', './img/shoes.jpg', 1, 11.11, 10.00, 6, 4, 0.10, 0),
(93476438180, 'Bracelet Jonc Swarovski Infinity', NULL, 'Gold', './img/bracelet.webp', 520, 34.00, 34.00, 7, 3, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Template`
--

CREATE TABLE `Template` (
  `NumTemp` int(2) NOT NULL,
  `LibTemp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Template`
--

INSERT INTO `Template` (`NumTemp`, `LibTemp`) VALUES
(1, 'Shirts'),
(2, 'Jackets'),
(3, 'Pants'),
(4, 'Watch'),
(5, 'Hats'),
(6, 'Shoes'),
(7, 'Jewelry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`Username`),
  ADD KEY `Usename` (`Username`),
  ADD KEY `CodProd` (`CodProd`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`CodProd`),
  ADD KEY `NumCat` (`NumTemp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
