CREATE DATABASE IF NOT EXISTS autoslocos;
USE autoslocos;
CREATE USER 'autoslocos'@'localhost' IDENTIFIED BY 'autoslocos';
GRANT ALL PRIVILEGES ON autoslocos.* TO 'autoslocos'@'localhost';
FLUSH PRIVILEGES;

CREATE TABLE IF NOT EXISTS Users(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    usuario varchar(64) NOT NULL,
    password varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    type varchar(64) NOT NULL
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Vehicles(
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservado TINYINT NOT NULL,
    usuario_reserva INT,
    dia_reservado DATETIME,
    precio DOUBLE,
    imagen BLOB,
    color varchar(64),
    marca varchar(64),
    modelo varchar(64),
    year varchar(64),
    contacto_tlf varchar(64),
    contacto_email varchar(64),
    CONSTRAINT FK_UsuarioReserva FOREIGN KEY (usuario_reserva) REFERENCES Users(id)
)ENGINE = InnoDB;


INSERT INTO `Users` VALUES (1,'user','$2y$10$ig/IF2hBipNpCH5NcYnYhe24BPx4BtpaRK8r33D2rU4QwmuNB2D3C','user@gmail.com','user')(2,'admin','$2y$10$uA6z7bsKGK02sTCPaBB80uqLpwZ4CSenEtnTsq8.HYBtnzHD1mLEO','admin@gmail.com','admin');



