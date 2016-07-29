DROP SCHEMA IF EXISTS inventory;
CREATE SCHEMA inventory;
USE inventory;
CREATE TABLE inventory.student(
	student_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	username varchar(16),
	email varchar(255),
	name_first varchar(30),
	name_last varchar(45)
)ENGINE = INNODB;

CREATE TABLE inventory.employee_permissions(
	permission_id integer PRIMARY KEY NOT NULL,
	name varchar(250)	
)ENGINE = INNODB;

CREATE TABLE inventory.employee(
	emp_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	username varchar(16),
	hashed_password varchar(16),
	salt varchar(20),
	email varchar(255),
	name_first varchar(30),
	name_last varchar(45),
	permission integer,
	FOREIGN KEY(permission) REFERENCES employee_permissions(permission_id)  
)ENGINE = INNODB;

CREATE TABLE inventory.location(
	location_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name varchar(250)	
)ENGINE = INNODB;

CREATE TABLE inventory.item(
	item_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,	
	name varchar(250),
	is_checked_out integer DEFAULT 0
)ENGINE = INNODB;

CREATE TABLE inventory.item_category(
	category_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name varchar(250)
)ENGINE = INNODB;

CREATE TABLE inventory.item_has_category(
	item_id integer REFERENCES item,
	category_id integer REFERENCES item_category,
	PRIMARY KEY(item_id,category_id)
)ENGINE = INNODB;

CREATE TABLE inventory.item_condition(
	condition_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT, 
	name varchar(250)
)ENGINE = INNODB;

CREATE TABLE inventory.item_condition_update( 
	item_id integer REFERENCES item,
	condition_id integer REFERENCES item_condition,
	tstamp timestamp,
	PRIMARY KEY(item_id,condition_id)	
)ENGINE = INNODB;

CREATE TABLE inventory.waiver(
	waiver_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name varchar(250)	
)ENGINE = INNODB;

CREATE TABLE inventory.student_has_waiver(	
	student_id integer REFERENCES student,
	waiver_id integer REFERENCES waiver,
	tstamp timestamp,
	PRIMARY KEY(student_id,waiver_id)	
)ENGINE = INNODB;

CREATE TABLE inventory.student_item_transaction(
	transaction_id integer PRIMARY KEY AUTO_INCREMENT,
	transaction_type varchar(16), 
	student_id integer REFERENCES student,
	location_id integer REFERENCES location,
	emp_id integer REFERENCES employee,
	item_id integer REFERENCES item,
	condition_id integer REFERENCES item_condition,
	tstamp timestamp	
)ENGINE = INNODB;

INSERT INTO inventory.student(username, email, name_first, name_last) VALUES("student1", "student1@mail.com", "Joe", "Dirt");
INSERT INTO inventory.student(username, email, name_first, name_last) VALUES("student2", "student2@mail.com", "Billy", "Mays");
INSERT INTO inventory.student(username, email, name_first, name_last) VALUES("student3", "student3@mail.com", "Marky", "Mark");
INSERT INTO inventory.student(username, email, name_first, name_last) VALUES("student4", "student4@mail.com", "Ash", "Ketchum");
INSERT INTO inventory.student(username, email, name_first, name_last) VALUES("student5", "student5@mail.com", "Donald", "Trump");

INSERT INTO inventory.waiver(name) VALUES("Bike");
INSERT INTO inventory.waiver(name) VALUES("Laptop");

INSERT INTO inventory.location(name) VALUES("SC");
INSERT INTO inventory.location(name) VALUES("MU");

INSERT INTO inventory.item_condition(name) VALUES("good");
INSERT INTO inventory.item_condition(name) VALUES("poor");
INSERT INTO inventory.item_condition(name) VALUES("broken");

INSERT INTO inventory.employee_permissions(permission_id, name) VALUES(0, "Default");
INSERT INTO inventory.employee_permissions(permission_id, name) VALUES(1, "Admin");

