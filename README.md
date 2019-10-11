# phpcrud
A simple php project to help out friends doing university assignment. Original source is here: https://www.tutorialrepublic.com/php-tutorial/php-mysql-crud-application.php. This project is using Oracle database instead.

Setup you need to do:
1. Install Oracle database server, JDK 7 and Oracle SQL Developer tool.
2. Create a user at Oracle DB using SQLPlus:

--begin
--create user
create user uitmstudent identified by uitmstudent default tablespace system temporary tablespace temp;

--grant connection and create table roles
grant connect, resource to uitmstudent;
--end

3. Change SQL queries from https://www.tutorialrepublic.com/php-tutorial/php-mysql-crud-application.php to cater for Oracle. "Run as script" using SQL Developer tool:


--begin
CREATE TABLE employees (
    id INT NOT NULL, name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    salary number
);


--To replace MySQL AUTO_INCREMENT feature
create sequence employees_sequence;


CREATE OR REPLACE TRIGGER employees_on_insert
  BEFORE INSERT ON employees 
  FOR EACH ROW
BEGIN
  SELECT employees_sequence.nextval
  INTO :new.id
  FROM dual;
END;
--end


4. Setup WAMP or XAMPP. Please note for WAMP, make sure you install all the Visual C++ runtimes required.
5. Enable php_oci extension, setup hostfile and virtual host
6. Clone the source code in this repository.
7. Pray for my well being if I helped you in any way.
