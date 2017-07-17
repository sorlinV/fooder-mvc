DROP DATABASE IF EXISTS `fooder_bd`;
CREATE DATABASE `fooder_bd`;

USE `fooder_bd`;

CREATE TABLE `events` (
    `id`        INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    type VARCHAR(32) NOT NULL,
    adresse VARCHAR(512) NOT NULL,
    creator VARCHAR(32) NOT NULL,
    img VARCHAR(64)
);

CREATE TABLE `tags` (
    id    INT AUTO_INCREMENT PRIMARY KEY,
    text VARCHAR(32)
);

CREATE TABLE events_tags (
    id_events INT NOT NULL,
    id_tags INT NOT NULL,
    FOREIGN KEY (id_events) REFERENCES events(id),
    FOREIGN KEY (id_tags) REFERENCES tags(id),
    CONSTRAINT PK_events_tags PRIMARY KEY (id_follower, id_followed)
)

CREATE TABLE `users` (
    id    INT AUTO_INCREMENT PRIMARY KEY,
    name  VARCHAR(32) NOT NULL,
    password VARCHAR (64) NOT NULL,
    salt VARCHAR(64) NOT NULL,
    adresse VARCHAR(512) NOT NULL,
    firstname VARCHAR(64) NOT NULL,
    lastname VARCHAR(64) NOT NULL,
    img VARCHAR(64)
);

CREATE TABLE follow (
    id_follower INT NOT NULL,
    id_followed INT NOT NULL,
    FOREIGN KEY (id_follower) REFERENCES users(id),
    FOREIGN KEY (id_followed) REFERENCES users(id),
    CONSTRAINT PK_follow PRIMARY KEY (id_follower, id_followed)
)