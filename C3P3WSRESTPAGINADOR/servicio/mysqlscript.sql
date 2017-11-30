CREATE DATABASE IF NOT EXISTS blog_samples;
 
USE blog_samples;

--
-- Table structure for table `customers`
--



CREATE TABLE IF NOT EXISTS `tblciudades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `tblciudades`
--

INSERT INTO `tblciudades` (`id`, `name`) VALUES
(1  , 'Bogota'),
(2, 'Cali'),
(3, 'Cartagena');