DROP TABLE IF EXISTS `Message`;

CREATE TABLE `Message` (
  `msg_id` int(10) NOT NULL AUTO_INCREMENT,
  `sender_id` varchar(255) DEFAULT NULL,
  `receiver_id` varchar(255) DEFAULT NULL,
  `hostel_id` int(10) DEFAULT NULL,
  `subject_h` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `msg_date` varchar(255) DEFAULT NULL,
  `msg_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`msg_id`),
  KEY `hostel_id` (`hostel_id`),
  CONSTRAINT `Message_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `Hostel` (`Hostel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;