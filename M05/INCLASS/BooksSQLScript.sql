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

/*create table authors with ID and name and insert 8 rows of dummy data*/

DROP TABLE IF EXISTS authors;

CREATE TABLE authors
(
   ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   Name varchar(60)
);

INSERT INTO authors (Name) VALUES ('Deitel & Deitel');
INSERT INTO authors (Name) VALUES ('Korth & Silberschatz');
INSERT INTO authors (Name) VALUES ('Katz & Lindell');
INSERT INTO authors (Name) VALUES ('Kochan');
INSERT INTO authors (Name) VALUES ('Balagurusamy');
INSERT INTO authors (Name) VALUES ('Schildt');
INSERT INTO authors (Name) VALUES ('Deitel & Deitel');
INSERT INTO authors (Name) VALUES ('Deitel & Deitel');

/*create pivot table to manage many-to-many between authors and books*/

DROP TABLE IF EXISTS books_authors;




CREATE TABLE books_authors
(
   ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   BookID int,
   AuthorID int,
   FOREIGN KEY (BookID) REFERENCES books(ID),
   FOREIGN KEY (AuthorID) REFERENCES authors(ID)
);

INSERT INTO books_authors (BookID, AuthorID) VALUES (1,1);
INSERT INTO books_authors (BookID, AuthorID) VALUES (1,7);
INSERT INTO books_authors (BookID, AuthorID) VALUES (1,8);
INSERT INTO books_authors (BookID, AuthorID) VALUES (2,2);
INSERT INTO books_authors (BookID, AuthorID) VALUES (3,3);
INSERT INTO books_authors (BookID, AuthorID) VALUES (4,4);
INSERT INTO books_authors (BookID, AuthorID) VALUES (5,5);
INSERT INTO books_authors (BookID, AuthorID) VALUES (6,6);
INSERT INTO books_authors (BookID, AuthorID) VALUES (7,1);
INSERT INTO books_authors (BookID, AuthorID) VALUES (7,7);
INSERT INTO books_authors (BookID, AuthorID) VALUES (7,8);
INSERT INTO books_authors (BookID, AuthorID) VALUES (8,1);
INSERT INTO books_authors (BookID, AuthorID) VALUES (8,7);


SELECT * FROM books WHERE ID IN (SELECT BookID FROM books_authors WHERE AuthorID = 1);


SELECT books.Title
FROM books, authors, books_authors
WHERE
    books.ID = books_authors.BookID
    AND authors.ID = books_authors.AuthorID
    AND authors.ID = 1;


