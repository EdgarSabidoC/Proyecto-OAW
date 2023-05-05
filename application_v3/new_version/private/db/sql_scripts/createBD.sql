-- CREAR LAS TABLAS SQL:
		-- Se crea la Base de Datos:
CREATE DATABASE IF NOT EXISTS rssFeed; USE
		rssFeed;
		-- Se crea la tabla:
DROP TABLE IF EXISTS
		rssFeed.feed;
CREATE TABLE IF NOT EXISTS rssFeed.feed(
		id INT NOT NULL AUTO_INCREMENT,
		title VARCHAR(250) NOT NULL,
		date DATE NOT NULL,
		description VARCHAR(250) NOT NULL,
		permalink VARCHAR(250) NOT NULL,
		categories TEXT NOT NULL,
		image TEXT NOT NULL,
		PRIMARY KEY(id)
);
ALTER TABLE `rssfeed`.`feed` ADD INDEX `title` (`title`) USING BTREE,
ADD INDEX `date` (`date`) USING BTREE,
ADD INDEX `description` (`description`) USING BTREE,
ADD INDEX `permalink` (`permalink`) USING BTREE,
ADD INDEX `categories` (`categories`) USING BTREE,
ADD INDEX `image` (`image`) USING BTREE;
