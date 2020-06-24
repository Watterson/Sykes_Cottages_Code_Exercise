Sykes Cottages coding exercise

Using the included database, set up a search that allows users to search the properties by location, feature and date.  
This is not a test of your design ability, however it should be responsive to work across mobile, tablet and desktop.  
You may use frameworks if you wish for any elements of the front or back end.


CREATE DATABASE  IF NOT EXISTS `sykes_interview` DEFAULT CHARACTER SET utf8 ;
​
USE `sykes_interview`;
​
/*Table structure for table `bookings` */
DROP TABLE IF EXISTS `bookings`;
​
CREATE TABLE `bookings` (
  `__pk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `_fk_property` int(10) unsigned DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`__pk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
​
​
/*Data for the table `bookings` */
insert  into `bookings`(`__pk`,`_fk_property`,`start_date`,`end_date`) values
	(1,1,'2020-08-26','2020-09-02'),
	(2,1,'2020-12-06','2020-12-13'),
	(3,3,'2021-05-26','2021-06-02'),
	(4,2,'2019-12-06','2019-12-13'),
	(5,5,'2019-10-01','2019-10-08'),
	(6,4,'2021-01-13','2021-01-20'),
	(7,3,'2020-11-26','2020-11-02'),
	(8,5,'2020-12-06','2020-12-13'),
	(9,2,'2021-08-26','2021-09-02'),
	(10,4,'2020-10-06','2020-10-13');
​
​
/*Table structure for table `locations` */
DROP TABLE IF EXISTS `locations`;
​
CREATE TABLE `locations` (
  `__pk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`__pk`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
​
/*Data for the table `locations` */
​
insert  into `locations`(`__pk`,`location_name`) values
	(1,'Cornwall'),
	(2,'Lake District'),
	(3,'Yorkshire'),
	(4,'Wales'),
	(5,'Scotland');
​
/*Table structure for table `properties` */
DROP TABLE IF EXISTS `properties`;
​
CREATE TABLE `properties` (
  `__pk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `_fk_location` int(10) unsigned DEFAULT NULL,
  `property_name` varchar(255) DEFAULT NULL,
  `near_beach` tinyint(1) unsigned DEFAULT NULL,
  `accepts_pets` tinyint(1) unsigned DEFAULT NULL,
  `sleeps` tinyint(3) unsigned DEFAULT NULL,
  `beds` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`__pk`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
​
​
/*Data for the table `properties` */
insert  into `properties`(`__pk`,`_fk_location`,`property_name`,`near_beach`,`accepts_pets`,`sleeps`,`beds`) values
	(1,1,'Sea View',1,1,4,2),
	(2,3,'Cosey',0,0,6,4),
	(3,5,'The Retreat',1,0,2,1),
	(4,5,'Coach House',0,1,5,3),
	(5,4,'Beach Cottage',1,1,8,6);
