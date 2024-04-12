-- create_database.sql

CREATE DATABASE IF NOT EXISTS real_estate_ads;

USE real_estate_ads;

CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS real_estate_ads (
    ad_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    area ENUM('Αθήνα', 'Θεσσαλονίκη', 'Πάτρα', 'Ηράκλειο') NOT NULL,
    price INT NOT NULL,
    availability ENUM('ενοικίαση', 'πώληση') NOT NULL,
    area_size INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
