 create database cliente;
 use cliente;
 
CREATE TABLE cliente(
  id int(11) NOT NULL,
  dni int(60) NOT NULL,
  Nombre varchar(50) NOT NULL DEFAULT '0',
  Apellido varchar(50) NOT NULL DEFAULT '0',
  Correo varchar(50) NOT NULL,
  Telefono varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE cliente ADD PRIMARY KEY (id);
  
ALTER TABLE cliente MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
  
  