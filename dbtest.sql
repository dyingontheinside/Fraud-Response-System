CREATE TABLE `Userlist` (
	`Username` VARCHAR(16) NOT NULL AUTO_INCREMENT,
	`Password` VARCHAR(60) NOT NULL AUTO_INCREMENT UNIQUE,
	`Access_Level` INT(1) NOT NULL DEFAULT '0',
	PRIMARY KEY (`Username`)
);

CREATE TABLE `Event` (
	`Event_Number` INT(5) NOT NULL AUTO_INCREMENT,
	`Event_Name` VARCHAR(64) NOT NULL,
	PRIMARY KEY (`Event_Number`)
);

CREATE TABLE `Customer` (
	`Account_Number` INT(16) NOT NULL AUTO_INCREMENT,
	`Full_Name` VARCHAR(48) NOT NULL,
	`First_Name` VARCHAR(16) NOT NULL,
	`Middle_Name` VARCHAR(16),
	`Last_Name` VARCHAR(16) NOT NULL,
	`Suffix` VARCHAR(8),
	`Address_1` VARCHAR(64) NOT NULL,
	`Address_2` VARCHAR(64),
	`Address_3` VARCHAR(64),
	`City` VARCHAR(32) NOT NULL,
	`State` VARCHAR(20) NOT NULL,
	`Zip_Code` INT(5) NOT NULL,
	`Phone_Num_1` VARCHAR(12) NOT NULL,
	`Phone_Num_2` VARCHAR(12),
	`Event` INT(5) NOT NULL,
	`Event_Notes` varchar(256),
	PRIMARY KEY (`Account_Number`)
);

CREATE TABLE `Comment` (
	`Comment_Number` INT(5) NOT NULL AUTO_INCREMENT,
	`Username` VARCHAR(255) NOT NULL,
	`Account_Number` INT(16) NOT NULL,
	`Event` INT(5) NOT NULL,
	`Comment` varchar(256),
	PRIMARY KEY (`Comment_Number`)
);

ALTER TABLE `Customer` ADD CONSTRAINT `Customer_fk0` FOREIGN KEY (`Event`) REFERENCES `Event`(`Event_Number`);

ALTER TABLE `Comment` ADD CONSTRAINT `Comment_fk0` FOREIGN KEY (`Username`) REFERENCES `Userlist`(`Username`);

ALTER TABLE `Comment` ADD CONSTRAINT `Comment_fk1` FOREIGN KEY (`Account_Number`) REFERENCES `Customer`(`Account_Number`);

ALTER TABLE `Comment` ADD CONSTRAINT `Comment_fk2` FOREIGN KEY (`Event`) REFERENCES `Customer`(`Event`);

ALTER TABLE `Comment` ADD CONSTRAINT `Comment_fk3` FOREIGN KEY (`Comment`) REFERENCES `Customer`(`Event_Notes`);

