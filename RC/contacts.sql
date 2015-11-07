CREATE DATABASE IF NOT EXISTS CM;

USE CM;

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `address`,`password`) VALUES
(default, 'Masud', '01722817654', 'masud.eden@gmail.com', 'Dhaka, Bangladesh','kushan'),
(default, 'Fuad', '0172345687', 'fuad@gmail.com', 'BNP, Bangladesh','kushan'),
(default, 'Zarif', '0123456789', 'zarif@gmail.com', 'Khulna, Bangladesh','kushan'),
(default, 'Abir', '018765432', 'abir@gmail.com', 'Dhaka,Bangladesh','kushan'),
(default, 'Tanvir', '01577876543', 'tanvir@bibsun.com', 'Dhaka, Bangladesh','kushan'),
(default, 'MAK JOY', '0111111111111', 'mak@joy.com', 'Dhaka, Bangladesh','kushan'),
(default, 'Kushan Sen', '9702957221', 'kushansen92@gmail.com', 'Mumbai, India','kushan');
