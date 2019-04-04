--- Drop all existing tables ---
---			CREATE DATABASE IF NOT EXISTS NERDLUV;
---			CREATE USER 'USER1'@'localhost' IDENTIFIED BY 'USER1PASSWORD';
---			GRANT ALL PRIVILEGES ON NERDLUV.* TO 'USER1'@'localhost';    

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS personalities;
DROP TABLE IF EXISTS fav_os;
DROP TABLE IF EXISTS seeking_age;

CREATE TABLE users (
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) DEFAULT NULL,
    gender varchar(1) DEFAULT NULL,
    age int(11) UNSIGNED DEFAULT 0,
    created_at datetime DEFAULT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE personalities (
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(4) NOT NULL,
    user_id int(11) NOT NULL,
    PRIMARY KEY (id),
    KEY user_id (user_id)
);









