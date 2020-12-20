CREATE DATABASE IF NOT EXISTS mystoryz DEFAULT CHARACTER SET utf8;
GRANT ALL ON mystoryz.* TO 'fliplikesuraj'@'localhost' IDENTIFIED BY 'Abdulbaki0818';
GRANT ALL ON mystoryz.* TO 'fliplikesuraj'@'127.0.0.1' IDENTIFIED BY 'Abdulbaki0818';
USE mystoryz;

SET SQL_MODE='ALLOW_INVALID_DATES';

CREATE TABLE IF NOT EXISTS users(
id INT(11) NOT NULL AUTO_INCREMENT,
first_name VARCHAR(128) NOT NULL DEFAULT 'n/a',
last_name VARCHAR(128) NOT NULL DEFAULT 'n/a',
username VARCHAR(128) NOT NULL,
email VARCHAR(128) NOT NULL,
image VARCHAR(128) NOT NULL DEFAULT 'defaultprofile.png',
role ENUM('admin', 'author', 'basic') DEFAULT 'basic',
password VARCHAR(128) NOT NULL,
created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (id),
INDEX (username, email),
UNIQUE (username, email)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS story(
id INT(11) NOT NULL AUTO_INCREMENT,
content TEXT NOT NULL,
slug VARCHAR(128) NOT NULL,
title VARCHAR(128) NOT NULL,
image VARCHAR(128) NOT NULL DEFAULT 'defaultstory.jpg',
published TINYINT(1) NOT NULL DEFAULT 0,
author_id INT(11) NOT NULL,
created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (id),
FOREIGN KEY (author_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE NO ACTION,
INDEX (slug),
UNIQUE (slug)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS comment(
id INT(11) NOT NULL AUTO_INCREMENT,
content VARCHAR(1024) NOT NULL,
reply_id INT(11) DEFAULT NULL,
story_id INT(11) NOT NULL,
user_id INT(11) NOT NULL,
created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (id),
FOREIGN KEY (story_id) REFERENCES story(id) ON UPDATE CASCADE ON DELETE NO ACTION,
FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE NO ACTION
) ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO users (username, email, role, password) VALUES ('fliplikesuraj', 'surajabdulbaki19@gmail.com', 'admin', 'dca4b397327451e277d5d61f5e45a6dc');
INSERT INTO users (username, email, role, password) VALUES ('fliplikeauthor', 'fliplikeauthor@gmail.com', 'author', 'dca4b397327451e277d5d61f5e45a6dc');
INSERT INTO users (username, email, role, password) VALUES ('fliplikebasic', 'fliplikebasic@gmail.com', 'basic', 'dca4b397327451e277d5d61f5e45a6dc');

INSERT INTO story (content, slug, title, author_id) VALUES ('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'first-post-on-my-storyz', 'First post on MyStoryz', '1');
INSERT INTO comment (content, story_id, user_id) VALUES ('First comment on mystoryz', '1', '1');
INSERT INTO comment (content, story_id, user_id) VALUES ('Second comment on mystoryz', '1', '2');
INSERT INTO comment (content, story_id, user_id) VALUES ('Third comment on mystoryz', '1', '3');
INSERT INTO comment (content, story_id, user_id) VALUES ('First comment on mystoryz', '2', '1');
INSERT INTO comment (content, story_id, user_id) VALUES ('Second comment on mystoryz', '2', '2');
INSERT INTO comment (content, story_id, user_id) VALUES ('Third comment on mystoryz', '2', '3');