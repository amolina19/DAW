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


INSERT INTO Users(usuario,password,email,type) VALUES('usuario','usuario','test@mail.com','user');
INSERT INTO Users(usuario,password,email,type) VALUES('admin','admin','admin@mail.com','admin');


