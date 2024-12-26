
DROP TABLE client_booking_master;
CREATE TABLE `client_booking_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_phone` varchar(20) DEFAULT NULL,
  `booking_status` varchar(20) DEFAULT NULL,
  `booking_date` varchar(20) DEFAULT NULL,
  `start_time` varchar(20) DEFAULT NULL,
  `end_time` varchar(20) DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=UTF8MB4_GENERAL_CI;


INSERT INTO `client_booking_master` (`client_phone`, `booking_status`, `booking_date`, `start_time`, `end_time`, `total_price`, `created_at`, `updated_at`) VALUES
( '+12345', 'Pending', '2024-01-28', '9:00 AM', '10:00 AM', 210, '2024-12-26 08:51:02', '2024-12-26 08:51:02');


UPDATE `salon_master` SET `working_hours_from` = '12:00 AM', `working_hours_till` = '12:00 AM' WHERE `salon_master`.`id` = 39;
UPDATE `service_category` SET `icon` = 'Makeup.JPG' WHERE `service_category`.`id` = 20;
UPDATE `service_category` SET `icon` = 'Eyelashesicon.JPG' WHERE `service_category`.`id` = 19;
UPDATE `service_category` SET `icon` = 'MoroccanBath.JPG' WHERE `service_category`.`id` = 18;
UPDATE `service_category` SET `icon` = 'Facial.JPG' WHERE `service_category`.`id` = 17;
UPDATE `service_category` SET `icon` = 'SelfCare.JPG' WHERE `service_category`.`id` = 16;
UPDATE `service_category` SET `icon` = 'ManicurePedicure.JPG' WHERE `service_category`.`id` = 14;
UPDATE `service_category` SET `icon` = 'Nailpolish.JPG' WHERE `service_category`.`id` = 13;
UPDATE `service_category` SET `icon` = 'Gelnailsextension.JPG' WHERE `service_category`.`id` = 12;
UPDATE `service_category` SET `icon` = 'fakenails.JPG' WHERE `service_category`.`id` = 11;
UPDATE `service_category` SET `icon` = 'Paraffine.JPG' WHERE `service_category`.`id` = 10;
UPDATE `service_category` SET `icon` = 'Hairdyeing.JPG' WHERE `service_category`.`id` = 9;
UPDATE `service_category` SET `icon` = 'coldhairtreatment.JPG' WHERE `service_category`.`id` = 7;
UPDATE `service_category` SET `icon` = 'hothairtreatment.JPG' WHERE `service_category`.`id` = 8;
UPDATE `service_category` SET `icon` = 'haircut.JPG' WHERE `service_category`.`id` = 6;
UPDATE `service_category` SET `icon` = 'Hairdryer.JPG' WHERE `service_category`.`id` = 5;
UPDATE `service_category` SET `icon` = 'HairExtension.JPG' WHERE `service_category`.`id` = 4;
UPDATE `service_category` SET `icon` = 'Hair.JPG' WHERE `service_category`.`id` = 3;
UPDATE `service_category` SET `icon` = 'massage.JPG' WHERE `service_category`.`id` = 15;

ALTER TABLE client_booking ADD client_booking int;

