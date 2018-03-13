ALTER TABLE Comments Drop Foreign Key Comment_fk0;
ALTER TABLE Comments Drop Foreign Key Comment_fk1;
ALTER TABLE Comments Drop Foreign Key Comment_fk2;
ALTER TABLE Customer_Events Drop Foreign Key Customer_Events_fk0;
ALTER TABLE Customer_Events Drop Foreign Key Customer_Events_fk1;

Drop Table if exists Userlist;
Drop Table if exists Event;
Drop Table if exists Customer;
Drop Table if exists Comments;
Drop Table if exists Customer_Events;

CREATE TABLE Userlist (
	Username VARCHAR(16) NOT NULL,
	Password VARCHAR(60) NOT NULL,
	Access_Level INT NOT NULL,
	PRIMARY KEY (Username)
);

CREATE TABLE Event (
	Event_Number INT NOT NULL AUTO_INCREMENT,
	Event_Name VARCHAR(64),
	PRIMARY KEY (Event_Number)
);

CREATE TABLE Customer (
	Account_Number INT NOT NULL AUTO_INCREMENT,
	Full_Name VARCHAR(48) NOT NULL,
	First_Name VARCHAR(16),
	Middle_Name VARCHAR(16),
	Last_Name VARCHAR(16),
	Suffix VARCHAR(8),
	Address_1 VARCHAR(64) NOT NULL,
	Address_2 VARCHAR(64),
	Address_3 VARCHAR(64),
	City VARCHAR(32) NOT NULL,
	`State` VARCHAR(20) NOT NULL,
	Zip_Code INT NOT NULL,
	Phone_Number1 varchar(16) NOT NULL,
	Phone_Number2 varchar(16),
	PRIMARY KEY (Account_Number)
);

CREATE TABLE Comments (
	Comment_Number INT NOT NULL AUTO_INCREMENT,
	Username VARCHAR(16) NOT NULL,
	Account_Number INT NOT NULL,
	Event_Number INT NOT NULL,
	Comments varchar(256),
	PRIMARY KEY (Comment_Number)
);

CREATE TABLE Customer_Events (
	Account_Number INT(16) NOT NULL AUTO_INCREMENT,
	Event_Number INT(5) NOT NULL,
	PRIMARY KEY (Account_Number)
);

ALTER TABLE Comments ADD CONSTRAINT Comment_fk0 FOREIGN KEY (Username) REFERENCES Userlist(Username);

ALTER TABLE Comments ADD CONSTRAINT Comment_fk1 FOREIGN KEY (Account_Number) REFERENCES Customer(Account_Number);

ALTER TABLE Comments ADD CONSTRAINT Comment_fk2 FOREIGN KEY (Event_Number) REFERENCES Event(Event_Number);

ALTER TABLE Customer_Events ADD CONSTRAINT Customer_Events_fk0 FOREIGN KEY (Account_Number) REFERENCES Customer(Account_Number);

ALTER TABLE Customer_Events ADD CONSTRAINT Customer_Events_fk1 FOREIGN KEY (Event_Number) REFERENCES Event(Event_Number);

