-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2017 at 10:47 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopwebdb`
--
CREATE DATABASE IF NOT EXISTS `shopwebdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shopwebdb`;

-- --------------------------------------------------------

--
-- Table structure for table `addcat`
--

DROP TABLE IF EXISTS `addcat`;
CREATE TABLE IF NOT EXISTS `addcat` (
`catID` int(10) NOT NULL,
  `catname` varchar(200) NOT NULL,
  `catpic` varchar(300) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `addcat`
--

INSERT INTO `addcat` (`catID`, `catname`, `catpic`) VALUES
(2, 'Men''s Wear', '1500494780menswear.jpg'),
(3, 'Women''s Wear', '1500494803womenswear.jpg'),
(4, 'Kid''s Wear', '1500494830kidswear.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `addproduct`
--

DROP TABLE IF EXISTS `addproduct`;
CREATE TABLE IF NOT EXISTS `addproduct` (
`productID` int(10) NOT NULL,
  `catID` int(10) NOT NULL,
  `subcatID` int(10) NOT NULL,
  `prodname` varchar(100) NOT NULL,
  `rate` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `features` varchar(1000) NOT NULL,
  `pic` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1015 ;

--
-- Dumping data for table `addproduct`
--

INSERT INTO `addproduct` (`productID`, `catID`, `subcatID`, `prodname`, `rate`, `discount`, `stock`, `features`, `pic`) VALUES
(1001, 2, 7, 'ARROW Men''s Formal Shirt', 1800, 18, 45, 'White woven formal shirt, has a semi-cutaway collar with contrast binding at the collar tip, long sleeves with button cuffs, brand embroidery on the right cuff, full concealed button placket, yoke on the back, curved hemMaterial & Care:CottonMachine wash cold', '1500501175shirt1.jpg'),
(1002, 2, 9, 'MR BUTTON Teal Blue Slim Fit Blazer', 8999, 40, 20, 'Teal blue blazer, has a shawl collar, single-breasted with a button closure, long sleeves, two welt pockets, two mock flap pockets, double vented back, an attached lining.\r\n\r\nMaterial & Care::\r\nRayon\r\nDry-clean only', '1500502261blazzer1.jpg'),
(1003, 2, 10, 'Roadster Men Black Analogue Watch S5255', 3499, 40, 7, 'Display: Analogue,\r\nMovement: Mechanical,\r\nPower source: Battery,\r\nDial style: Solid round stainless steel dial,\r\nFeatures: Date Aperture, Reset Time,\r\nStrap style: Black regular, metal strap with a butterfly closure, \r\nWater Resistant.', '1500502432roadster.jpg'),
(1004, 3, 11, 'Eavan Women Maroon Cold Shoulder Top', 799, 20, 30, 'Maroon woven top with lace detail, has a boat neck, short cold shoulder sleeves, attached lining, curved hem,\r\n\r\nMaterial & Care::\r\nPolyester \r\nDry-clean', '1500502548top3.jpg'),
(1005, 3, 11, 'Harpa Women Navy Blue Printed Regular Cold Shoulder Top', 999, 60, 50, 'Navy Blue printed woven regular fit top, has a round neck, three-quarter sleeves.\r\n\r\nMaterial & Care::\r\nPolyester \r\nHand-wash', '1500502638top4.jpg'),
(1006, 3, 12, 'Daniel Klein Women Silver-Toned Analogue Watch DK11391-7', 4300, 40, 58, 'Display: Analogue,\r\nMovement: Automatic,\r\nPower source: Battery,\r\nDial style: Solid round stainless steel dial,\r\nFeatures: Reset time,\r\nStrap style: White regular, leather strap with a tang closure,\r\nWater resistance: 30 m,\r\nWarranty: 2 years', '1500502765w1.jpg'),
(1007, 3, 13, 'Zaveri Pearls Off-White & Antique Gold-Toned Jewellery Set', 1870, 65, 100, 'This jewellery set consists of a necklace and a pair of earrings\r\nOff-white and antique gold-toned multistranded necklace with synthetic pearl, cut-out, stone-studded, textured and enamel detail, secured with a drawstring fastening\r\nA pair of matching drop earrings, secured with a post-and-back closure,\r\n\r\nMaterial & Care::\r\nSynthetic pearls, zinc and stones\r\nWipe with a clean, dry cloth when needed', '1500502880j1.jpg'),
(1008, 3, 13, 'Sukkhi Set of 6 Gold-Plated Bangles', 5560, 55, 66, 'Set of six gold-plated intricately designed bangles embellished with white and yellow beads.\r\n\r\nMaterial & Care::\r\nGold-plated metal and artificial beads\r\nWipe with a clean cotton swab when needed', '1500502979j2.jpg'),
(1009, 3, 14, 'Truffle Collection Women Beige Solid Heels Rs. 2699', 4500, 35, 50, 'A pair of open toe beige sandals, has regular styling, ankle loop detail,\r\nSynthetic upper,\r\nCushioned footbed,\r\nTextured and patterned outsole, has a stiletto heel.\r\n\r\nMaterial & Care::\r\nSynthetic ,\r\nWipe with a clean, dry cloth to remove dust', '1500503175f1.jpg'),
(1010, 3, 14, 'Van Heusen Women Navy Blue & Beige Colourblocked Heels', 3400, 40, 100, 'A pair of navy blue and beige pointed toe colourblocked heels, has regular, styling, ankle loop detail,\r\nSynthetic upper,\r\nCushioned footbed,\r\nTextured and patterned outsole, has a slim heel,\r\nWarranty: 6 months.\r\n\r\nMaterial & Care::\r\nSynthetic ,\r\nWipe with a clean, dry cloth to remove dust.', '1500503329f2.jpg'),
(1011, 3, 13, 'FIROZA Oxidised Silver-Toned Textured Jhumka Earrings', 1300, 30, 44, 'A pair of oxidised silver-toned jhumka earrings with textured and cut-out detail,\r\nSecured with a post-and-back closure.\r\n\r\nMaterial & Care::\r\nMetal\r\nWipe with a clean cotton swab when needed', '1500503542j3.jpg'),
(1012, 4, 15, 'next Boys Orange & Blue Striped Polo Collar T-shirt', 799, 20, 55, 'Orange and blue striped polo T-shirt, has a polo collar with a short button, placket, short sleeves.\r\n\r\nMaterial & Care::\r\nCotton \r\nMachine-wash', '1500504282s1.jpg'),
(1013, 4, 16, 'Zoop by Titan Girls Blue Printed Dial Watch NEC3029PP10C', 750, 2, 33, 'Case style: Analogue watch with a circular case, stainless steel back,\r\nDial style: Blue printed dial,\r\nFeatures: A screw to reset the time,\r\nStrap style: Blue printed synthetic strap, secured with a tang clasp,\r\nWater resistant up to 30 m,\r\nComes in a signature Zoop case,\r\nWarranty: 1 year against manufacturing defects.', '1500504388watcgg.jpg'),
(1014, 4, 17, 'Kipling Kids Red Solid Backpack with Key Ring', 3999, 40, 60, 'Red solid backpack with key ring,\r\nNon-padded haul loop,\r\n1 main compartment with zip closure, 1 external zip pocket,\r\nNon-padded back,\r\nPadded shoulder strap: Non-padded, \r\nWater-resistance: Yes,\r\nVolume: up to 23 litres,\r\nWarranty: 6 months,\r\nNote: The inner lining material/colour may vary from what is shown in the image.\r\n\r\nMaterial & Care,\r\n100% polyamide,\r\nWipe with a clean, dry cloth to remove dust.', '1500504511b2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `addsubcat`
--

DROP TABLE IF EXISTS `addsubcat`;
CREATE TABLE IF NOT EXISTS `addsubcat` (
`subcatID` int(10) NOT NULL,
  `subCatName` varchar(25) NOT NULL,
  `catID` int(10) NOT NULL,
  `subCatPic` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `addsubcat`
--

INSERT INTO `addsubcat` (`subcatID`, `subCatName`, `catID`, `subCatPic`) VALUES
(7, 'Shirts', 2, '1500500639shirt3.jpg'),
(8, 'Jeans', 2, '1500500853jeans.jpg'),
(9, 'Blazers', 2, '1500497957blazer.jpg'),
(10, 'Watches', 2, '1500498051watch.jpg'),
(11, 'Tops & Tees', 3, '1500498208tops.jpg'),
(12, 'Watches', 3, '1500498424watchw.jpg'),
(13, 'Jewellery', 3, '1500498505jewel.jpg'),
(14, 'Footwear', 3, '1500498311footwear.jpg'),
(15, 'T-shirts', 4, '1500500531kidswas.jpg'),
(16, 'Watches', 4, '1500500240kidswa.jpg'),
(17, 'Bags and Bagpacks', 4, '1500500340bag.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `carttable`
--

DROP TABLE IF EXISTS `carttable`;
CREATE TABLE IF NOT EXISTS `carttable` (
`srno` int(10) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Rate` float NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Tcost` float NOT NULL,
  `Picture` varchar(250) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `prodID` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `carttable`
--

INSERT INTO `carttable` (`srno`, `ProductName`, `Rate`, `Quantity`, `Tcost`, `Picture`, `Username`, `prodID`) VALUES
(3, 'Sukkhi Set of 6 Gold-Plated Bangles', 2502, 1, 2502, '1500502979j2.jpg', 'disha14@gmail.com', 1008);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
`cid` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `KnowUs` varchar(50) NOT NULL,
  `compare` varchar(50) NOT NULL,
  `find` varchar(50) NOT NULL,
  `shopagain` varchar(10) NOT NULL,
  `suggestion` varchar(1000) NOT NULL,
`feedbackID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Name`, `Phone`, `Email`, `service`, `KnowUs`, `compare`, `find`, `shopagain`, `suggestion`, `feedbackID`) VALUES
('Vinay', '234112900', 'vinay07@yahoo.com', 'Average', 'Online Website', 'Better', 'Yes', 'Yes', 'More Variety can be added. Rest everything is fantastic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
`srno` int(10) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Rate` float NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Tcost` float NOT NULL,
  `Picture` varchar(250) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `prodID` int(10) NOT NULL,
  `orderno` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`srno`, `ProductName`, `Rate`, `Quantity`, `Tcost`, `Picture`, `Username`, `prodID`, `orderno`) VALUES
(21, 'Louis Phellep checked shirt', 1170.4, 3, 3511.2, '1499019160zayn-malik-complex-magazine-aprilmay-pic4035.jpg', 'disha14@gmail.com', 1000, 6),
(22, 'Kipling Kids Red Solid Backpack with Key Ring', 2399.4, 3, 7198.2, '1500504511b2.jpg', 'disha14@gmail.com', 1014, 1),
(23, 'Daniel Klein Women Silver-Toned Analogue Watch DK11391-7', 2580, 2, 5160, '1500502765w1.jpg', 'disha14@gmail.com', 1006, 2),
(24, 'Kipling Kids Red Solid Backpack with Key Ring', 2399.4, 2, 4798.8, '1500504511b2.jpg', 'disha14@gmail.com', 1014, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

DROP TABLE IF EXISTS `ordertable`;
CREATE TABLE IF NOT EXISTS `ordertable` (
`orderno` int(10) NOT NULL,
  `Billamt` int(10) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Mode` varchar(50) NOT NULL,
  `Cardno` varchar(50) NOT NULL,
  `Holder` varchar(50) NOT NULL,
  `Exp` varchar(50) NOT NULL,
  `cvv` varchar(50) NOT NULL,
  `Odate` date NOT NULL,
  `Status` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`orderno`, `Billamt`, `Address`, `Mode`, `Cardno`, `Holder`, `Exp`, `cvv`, `Odate`, `Status`, `username`) VALUES
(1, 7198, '21,model town jalandhar', 'debit card/credit card', '3654823756345873', 'Disha', '2/2033', '234', '2017-07-20', 'Payment Received,Processing', 'disha14@gmail.com'),
(2, 9959, 'abc', 'Cash on delivery', '', '', '/', '', '2017-07-20', 'Payment Received,Processing', 'disha14@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `regisid`
--

DROP TABLE IF EXISTS `regisid`;
CREATE TABLE IF NOT EXISTS `regisid` (
  `id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regisid`
--

INSERT INTO `regisid` (`id`) VALUES
('501');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`Name`, `Phone`, `Gender`, `Country`, `Username`, `Password`, `UserType`) VALUES
('Baldev Parkash', '9876788538', 'Male', 'Dubai', 'baldevparkash30@gmail.com', 'baldev30', 'normal'),
('Disha', '7696157008', 'Female', 'USA', 'disha14@gmail.com', 'disha14', 'normal'),
('Kanu Priya', '7087223258', 'Female', 'India', 'kanu28kanu@gmail.com', 'kanu28', 'admin'),
('Sonali', '8657648928', 'Female', 'Canada', 'sonali12@yahoo.com', '12345', 'admin'),
('Zayn Malik', '9833845869', 'Male', 'USA', 'zaynm@gmail.com', 'zaynm', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcat`
--
ALTER TABLE `addcat`
 ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `addproduct`
--
ALTER TABLE `addproduct`
 ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `addsubcat`
--
ALTER TABLE `addsubcat`
 ADD PRIMARY KEY (`subcatID`);

--
-- Indexes for table `carttable`
--
ALTER TABLE `carttable`
 ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
 ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
 ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
 ADD PRIMARY KEY (`orderno`);

--
-- Indexes for table `regisid`
--
ALTER TABLE `regisid`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
 ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcat`
--
ALTER TABLE `addcat`
MODIFY `catID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `addproduct`
--
ALTER TABLE `addproduct`
MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1015;
--
-- AUTO_INCREMENT for table `addsubcat`
--
ALTER TABLE `addsubcat`
MODIFY `subcatID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `carttable`
--
ALTER TABLE `carttable`
MODIFY `srno` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
MODIFY `srno` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
MODIFY `orderno` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
