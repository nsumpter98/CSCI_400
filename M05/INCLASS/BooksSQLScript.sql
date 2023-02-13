USE BooksDB; /*BooksDB is the name of the database*/

DROP TABLE IF EXISTS books;

CREATE TABLE books
(
   ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   Title varchar(60),
   Category varchar(32),
   ISBN varchar(20),
   Price decimal(5,2) 
);
INSERT INTO books (Title,Category,ISBN, Price) VALUES ('PHP with MySQL Programming','Programming','0132575677', 198.89);
INSERT INTO books (Title,Category,ISBN, Price) VALUES ('Database Design','Database','0132152134', 124);
INSERT INTO books (Title,Category,ISBN, Price) VALUES ('Visual C#','Programming','0132151421', 107.80);
INSERT INTO books (Title,Category,ISBN, Price) VALUES ('Java Programming','Programming','0132575663', 123);
INSERT INTO books (Title,Category,ISBN) VALUES ('C++ How to Program','Programming','0132662361');
INSERT INTO books (Title,Category,ISBN) VALUES ('C How to Program','Programming','0136123562');
INSERT INTO books (Title,Category,ISBN) VALUES ('Internet & World Wide Web How to Program','Programming','0132151006');
INSERT INTO books (Title,Category,ISBN, Price) VALUES ('Operating Systems','Operating Systems','0131828274', 80.50);

