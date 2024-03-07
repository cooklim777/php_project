CREATE DATABASE library;

USE library

CREATE TABLE books (
    BookID INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(100),
    Author VARCHAR(50),
    YearPublished INT
);

INSERT INTO books (Title, Author,YearPublished) VALUES ('MySQL Essentials', 'John' , 2022);
INSERT INTO books (Title, Author,YearPublished) VALUES ('MySQL Essentials I', 'John' , 2023);
INSERT INTO books (Title, Author,YearPublished) VALUES ('MySQL Essentials II', 'John' , 2024);
INSERT INTO books (Title, Author,YearPublished) VALUES ('RPA', 'Gordon' , 2022);
INSERT INTO books (Title, Author,YearPublished) VALUES ('RPA I', 'Gordon' , 2023);
INSERT INTO books (Title, Author,YearPublished) VALUES ('RPA II', 'Gordon' , 2024);

select * from books;

UPDATE books
SET YearPublished = 2021
WHERE Title = 'MySQL Essentials';

DELETE FROM books WHERE Title = 'MySQL Essentials';

select * from books WHERE Author="John";



-- 這樣會比較快嗎？
CREATE TABLE authors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50)
);

ALTER TABLE books ADD COLUMN author_id INT;

CREATE TABLE authors_books (
    author_id INT,
    book_id INT,
    FOREIGN KEY (author_id) REFERENCES authors(id),
    FOREIGN KEY (book_id) REFERENCES books(id)
);

