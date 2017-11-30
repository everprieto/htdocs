CREATE DATABASE IF NOT EXISTS blog_samples;
 
USE blog_samples;

--
-- Table structure for table `customers`
--



CREATE TABLE IF NOT EXISTS `tbl_mobile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
 
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `customers`
--

INSERT INTO `tbl_mobile` (`id`, `name`, `model`, `color`) VALUES
(1  , 'Atelier graphique', 'Nantes@gmail.com', '54, rue Royale'),
(2, 'Signal Gift Stores', 'LasVegas@gmail.com', '8489 Strong St.'),
(3, 'American Souvenirs Inc', 'NewHaven@gmail.com', '149 Spinnaker Dr.');