DELIMITER //
DROP TABLE IF EXISTS TELEFONO CASCADE;
DROP TABLE IF EXISTS USER CASCADE;

/*CREACIÓN DE TABLAS*/
CREATE TABLE USER(
                     UUID VARCHAR(36),
                     USERNAME VARCHAR(100) NOT NULL,
                     PASSWORD VARCHAR(255) NOT NULL,
                     DNI VARCHAR(9) NOT NULL,
                     EMAIL VARCHAR(255) NOT NULL,
                     FECHANAC DATE,
                     NAME VARCHAR(100) NOT NULL,
                     SURNAME VARCHAR(255) NOT NULL,
                     DIRECCION VARCHAR(255),
                     CALIFICACION DECIMAL(5,2),
                     TARJETA_PAGO VARCHAR(16),
                     DATOS_ADICIONALES JSON,
                     TIPO ENUM('ADMIN', 'USER', 'SUPERUSER', 'GUEST', 'GOD') NOT NULL
);
//

CREATE TABLE TELEFONO(
                         ID BIGINT AUTO_INCREMENT PRIMARY KEY,
                         PREFIJO VARCHAR(5),
                         NUMERO VARCHAR(9),
                         UUID_USER VARCHAR(36)
);
//

/*CREACIÓN DE CLAVES PRIMARIAS*/
ALTER TABLE USER ADD CONSTRAINT PK_USER PRIMARY KEY (UUID);
ALTER TABLE USER ADD CONSTRAINT UK_USER UNIQUE (DNI);
ALTER TABLE USER ADD CONSTRAINT UK_USER_2 UNIQUE (EMAIL);
//
/*ALTER TABLE TELEFONO ADD CONSTRAINT PK_TELEFONO PRIMARY KEY (ID);*/

/*CREACIÓN DE CLAVES AJENAS*/
ALTER TABLE TELEFONO ADD CONSTRAINT FK_TELEFONO_USER FOREIGN KEY (UUID_USER) REFERENCES USER (UUID);
//