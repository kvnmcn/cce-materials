-- Start XAMPP then START "Apache" and "MySQL"
-- #mysql -h localhost -u root
-- mariadb > SHOW DATABASES;
-- mariadb > CREATE DATABASE mydb;
-- mariadb > use mydb;

-- MariaDB[mydb] >


CREATE TABLE Students (
    idNumber INT(5) NOT NULL UNIQUE,
    LastName VARCHAR(20) NOT NULL,
    FirstName VARCHAR(20) NOT NULL,
    MiddleName VARCHAR(20) NOT NULL,
    Address VARCHAR(20) NOT NULL,
    Age INT(3),
    ContactNumber VARCHAR(13)
);

DESCRIBE Students;

ALTER TABLE Students 
ADD email VARCHAR(30);    

ALTER TABLE Students
ADD course VARCHAR(30) NOT NULL;

ALTER TABLE Students
MODIFY ContactNumber VARCHAR(13) NOT NULL;

ALTER TABLE Students
MODIFY Address VARCHAR(50) NOT NULL;

ALTER TABLE Students
MODIFY ContactNumber VARCHAR(50) NOT NULL;

ALTER TABLE Students
CHANGE COLUMN idNumber StudentNumber INT(5) NOT NULL UNIQUE;

ALTER TABLE Students
CHANGE COLUMN email EmailAdd VARCHAR(30) NOT NULL;

ALTER TABLE Students
DROP COLUMN EmailAdd;

ALTER TABLE STUDENTS
RENAME TO CCESTUDENTS;

ALTER TABLE CCESTUDENTS
DROP COLUMN course;

DESCRIBE CCESTUDENTS;
