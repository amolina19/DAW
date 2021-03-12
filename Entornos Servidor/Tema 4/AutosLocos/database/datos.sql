CREATE DATABASE IF NOT EXISTS autoslocos;
USE autoslocos;

/*CREATE USER 'autoslocos'@'localhost' IDENTIFIED BY 'autoslocos';
GRANT ALL PRIVILEGES ON autoslocos.* TO 'autoslocos'@'localhost';
FLUSH PRIVILEGES;*/
-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: autoslocos
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'user','$2y$10$lOLP7bzDrvrTisOx.0Wu7.QZLjXDd4F7aLMJw6nQD5UPnLIxBRvqm','user@gmail.com','user'),(2,'admin','$2y$10$uA6z7bsKGK02sTCPaBB80uqLpwZ4CSenEtnTsq8.HYBtnzHD1mLEO','admin@gmail.com','admin'),(3,'paco','$2y$10$bGMJj4hlNGuI/a4fwD0aU.1BYf/c5pwQAlM9l32mjY4i0YeSREGOG','paco@gmail.com','admin'),(4,'paco2','$2y$10$uVXFx4vJap2WL1lO83Yn..l0tgicgHAWeJklT5T1MtKPrvHnVYOAi','paco2@gmail.com','user');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Vehicles`
--

DROP TABLE IF EXISTS `Vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Vehicles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reservado` tinyint NOT NULL,
  `usuario_reserva` int DEFAULT NULL,
  `dia_reservado` datetime DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `imagen` longblob,
  `km` varchar(64) DEFAULT NULL,
  `caracteristicas` varchar(10000) DEFAULT NULL,
  `color` varchar(64) DEFAULT NULL,
  `marca` varchar(64) DEFAULT NULL,
  `modelo` varchar(64) DEFAULT NULL,
  `anno` varchar(64) DEFAULT NULL,
  `contacto_tlf` varchar(64) DEFAULT NULL,
  `contacto_email` varchar(64) DEFAULT NULL,
  `imagen_url` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_UsuarioReserva` (`usuario_reserva`),
  CONSTRAINT `FK_UsuarioReserva` FOREIGN KEY (`usuario_reserva`) REFERENCES `Users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vehicles`
--

LOCK TABLES `Vehicles` WRITE;
/*!40000 ALTER TABLE `Vehicles` DISABLE KEYS */;
INSERT INTO `Vehicles` VALUES (1,0,NULL,NULL,1250000,'','127324','En perfecto estado.','Rojo','Bugatti','Veryon','2012','622747482','alejandro.molina.dam@gmail.com','https://www.forsuperrich.com/wp-content/uploads/2019/02/fullsizeoutput_4ff.jpeg'),(2,0,NULL,NULL,1759000,'','20075','En desuso.','Azul','Bugatti','Veyron','2008','7263483222','jose@gmail.com','https://img.motor16.com/articulos/15000/15207_p8qJsY0iRNHm4-p1.jpg'),(3,0,NULL,NULL,1840000,'','217000','De muy alta gama y nuevo.','Rojo','Ferrari','Enzo','2014','62983483','enzo@ferrari.com','https://megaricos.com/wp-content/uploads/2017/01/venta-ferrari-enzo-2.jpg'),(4,0,NULL,NULL,200000,'','10000','La estrella de la marca, el más lujoso y costoso. Con características únicas que lo convierten en el hijo predilecto. Hablamos del lujoso Tesla Model S. Este viene en dos presentaciones: el Long Range 4WD, que se consigue desde 95 mil dólares y el Performance, disponible desde 113 mil en adelante. La primera, su capacidad para alcanzar una velocidad máxima superior a 400 km/h. La segunda, su aceleración de 0 a 100 km/h en solo 2,1 segundos. Aún hay más cifras interesantes, como que de 0 a 160 km/h solo tarde 4,2 segundos y que practique el cuarto de milla en 8,8 segundos.','Rojo','Tesla','Roadster 2020','2020','2632634763','contact@tesla.com','https://soymotor.com/sites/default/files/imagenes/noticia/tesla_roadster_2022.jpg'),(5,0,NULL,NULL,70000,'','55000','Pedales de Aluminio\r\nEspejo Retrovisor con Atenuación Automática\r\nLuces automáticas (faros delanteros con encendido/apagado automático) y Activación de Limpiaparabrisas\r\nConsola Central con Apoyabrazos Completo\r\nLuces del Techo de Montaje Elevado en el Centro\r\nPortavasos (2)\r\nApoyo para Pie del Conductor\r\nTapetes Alfombrados Premium con Costuras Decorativas\r\nAcceso Inteligente con Botón de Encendido\r\nApertura Interior de la Cajuela\r\nManija del Freno de Mano Forrada en Cuero\r\nMyKey®  \r\nVentanas Eléctricas: Delanteras de un toque para subir/bajar con Apertura Global\r\nTomacorrientes: 2 voltios\r\nCámara de Marcha Atrás','Amarillo','Ford','Mustang GT 500','2020','68284742','contact@ford.com','https://periodismodelmotor.com/wp-content/uploads/2019/12/prueba-ford-mustang-shelby-gt500-2020.jpg'),(6,1,1,'2021-03-11 23:30:00',3000000,'','35000','El Bugatti Chiron es un hiperdeportivo de Bugatti, que reemplazó al Bugatti Veyron en 2016. El Bugatti Chiron se caracteriza por ser el vehículo más rápido del mundo, siendo capaz de sobrepasar los 490 kilómetros por hora. Es un vehículo revolucionario, más avanzado en todos sus aspectos que su antecesor, pero sin emplear tecnologías híbridas o una construcción rompedora. Cuenta con un impresionante motor W16 de 8 litros en posición central, con 1500 CV, que le permite hacer el 0-100 km/h en 2,5 segundos. El precio del Bugatti Chiron es de 2,4 millones de euros y se fábrica en la factoría de Molsheim, Francia, de forma prácticamente artesanal.','Azul','Bugatti','Chiron','2021','6238934934','contact@bugatti.com','https://soymotor.com/sites/default/files/imagenes/noticia/bugatti_chiron_pur_sport_1.jpg'),(7,0,NULL,NULL,250000,'','76000','El Audi R8 Coupé V10 quattro es puro Audi, al máximo nivel. Próximo al automovilismo de competición. Comprometido con el rendimiento. Y con un diseño sin concesiones. Ningún otro vehículo representa los genes de Audi con tanta firmeza como el Audi R8. Una fusión perfecta de carácter, competitividad y exclusividad. El Audi R8 Coupé V10 quattro es la quintaesencia de Audi.','Azul','Audi','R8 Turbo','2017','6484944421','contact@audi.com','https://www.tuningblog.eu/wp-content/uploads/2018/05/Dallas-Performance-LLC-Audi-R8-Bi-Turbo-Tuning-6.jpg'),(8,0,NULL,NULL,16800,'','150000','Uno de los coches japoneses más deseados por los entusiastas del mundo del motor es el Nissan Skyline GT-R ya sea en una generación más moderna o en otra más antigua. Con respecto a las últimas, el R34 ha ganado mucha fama debido a su presencia en el mundo del cine, véase la segunda y cuarta entrega de Fast & Furious, por lo que es el gran favorito de aquellos que rastrean el mercado de segunda mano en busca de un ejemplar en perfectas condiciones.','Gris','Nissan','GTR Skyline','2002','48484874333','contact@nissan.com','https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/nissan-skyline-sale-1602601476.jpg?crop=1.00xw:0.753xh;0,0.0660xh&resize=1200:*'),(9,0,NULL,NULL,1800,NULL,'260000','','Naranja','Peugot','203','2002','3535353121321','contact@peugot.com','https://motorgiga.com/cargadatos/fotos2/peugeot/208-(urbano)-(historia)-2014/800/207-exterior1.jpg'),(12,0,NULL,NULL,137000,NULL,'0','Potencia: 600CV\r\nConsumo: 15L/100Km\r\nY lo mas importante que esta tela guapo el coche','Azul','BMW','M5 F90','2017','607786440','FanBMW@gmail.com','https://www.autobild.es/sites/autobild.es/public/dc/fotos/BMW-M5-2018-C01.jpg'),(27,0,NULL,NULL,75000,NULL,'20000','Paquete de asistencia a la conducción\r\nPRE-SAFE® Sound\r\nCar-to-X-Communication\r\nMULTIBEAM LED\r\n\r\nLa Clase A está disponible en dos versiones de altas prestaciones: el Mercedes-AMG A 35 4MATIC y el Mercedes-AMG A 45 S 4MATIC+.\r\n\r\nMercedes-AMG A 35 4MATIC: consumo de combustible en el ciclo mixto: 8,6-8,0 l/100 km, emisiones de CO2 en el ciclo mixto: 195-183 g/km\r\nMercedes-AMG A 45 S 4MATIC+: consumo de combustible en el ciclo mixto: 9,1-9,0 l/100 km, emisiones de CO2 en el ciclo mixto: 208-204 g/km\r\n\r\nire Acondicionado con climatizador, luces automaticas, sensor de lluvia , navegador GPS, llantas de aleación, cierre centralizado con mando,elevalunas eléctricos, ordenador de abordo,bluetooth integrado, control de velocidad, ABS esp...etc\r\nVehículo en perfecto estado.','Gris','Mercedes','Clase A','2018','674784834','contact@mercedes.com','https://i.blogs.es/deb432/mercedes-benz-a200-prueba-motorpasion-1portada/1366_2000.jpg');
/*!40000 ALTER TABLE `Vehicles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-11 23:37:18




/*UPDATE Vehicles SET dia_reservado = '2021-03-05 10:10:10' where reservado=1;
UPDATE Vehicles SET dia_reservado = '2021-03-05 10:10:10' where reservado=1 AND id=1;
UPDATE Vehicles SET dia_reservado = '2021-03-06 10:10:10' where reservado=1 AND id=2;
*/

