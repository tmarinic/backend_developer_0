DROP DATABASE IF EXISTS library;

CREATE DATABASE IF NOT EXISTS library DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE library;

CREATE TABLE IF NOT EXISTS genres (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    genre_name VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS books (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(20) NOT NULL,
    isbn VARCHAR(13) NOT NULL UNIQUE,
    genre_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (genre_id) REFERENCES genres(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS members (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(100),
    phone VARCHAR(12),
    email VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS bookcopies (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    book_id INT UNSIGNED NOT NULL,
    amount INT UNSIGNED NOT NULL,
    FOREIGN KEY (book_id) REFERENCES books(id)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS borrow (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    borrow_date DATE NOT NULL,
    return_date DATE NOT NULL,
    member_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (member_id) REFERENCES members(id),
    copy_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (copy_id) REFERENCES bookcopies(id)
) ENGINE=InnoDB;