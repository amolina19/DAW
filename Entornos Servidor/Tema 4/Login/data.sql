CREATE DATABASE IF NOT EXISTS login;
USE login;


CREATE TABLE IF NOT EXISTS user (
    id          int NOT NULL AUTO_INCREMENT,
    user      varchar(63) NOT NULL, 
    password    varchar(64) NOT NULL,
    PRIMARY KEY (id)
)DEFAULT CHARSET=utf8;

CREATE USER 'login'@'localhost' IDENTIFIED BY 'login';
GRANT ALL PRIVILEGES ON login.* TO 'login'@'localhost';

INSERT INTO user VALUES ("sergio","$2y$12$AhQ5jno9BOSLATJaDvl8IuhvC8Li8eRMbP.e.nCmdju0CQEyJTqtu");