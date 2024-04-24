USE eventos;
DROP DATABASE eventos;
CREATE DATABASE eventos;
USE eventos;

CREATE TABLE mensajes (
  num_mensaje int(10) unsigned NOT NULL auto_increment,
  fecha date NOT NULL DEFAULT '1970-01-01' ,
  contenido text NOT NULL DEFAULT '' ,
  id int(10) unsigned NOT NULL DEFAULT '0' ,
  num_mensaje_origen int(10) DEFAULT '-1' ,
    PRIMARY KEY (num_mensaje),
  UNIQUE num_mensaje (num_mensaje)
);

INSERT INTO mensajes VALUES("14","2007-11-23","Hola!","Acabo de llegar al foro y me parece muy util. Un saludo a tod@s!","18","-1","1");
INSERT INTO mensajes VALUES("15","2007-11-23","RE:Hola!","Hola, Pedro! A mi tambien me parece de gran utilidad.","19","14","0");
INSERT INTO mensajes VALUES("16","2007-11-23","Duda curso","Acabo de llegar al curso de PHP y estoy un poco perdida con los objetos, me podeis enviar alg�n ejemplo?
Gracias!","19","-1","1");
INSERT INTO mensajes VALUES("17","2007-11-23","RE:Duda curso","Ahora mismo te hago llegar un buen ejemplo!!!","18","16","0");
INSERT INTO mensajes VALUES("18","2007-11-23","Por fin es viernes!","Feliz fin de semana a todos!!!
Volved en buen estado el lunes :-)","18","-1","0");

CREATE TABLE usuarios (
  id int(10) unsigned NOT NULL auto_increment,
  rol VARCHAR(20) NOT NULL DEFAULT '[ROLE_USER]',
  name varchar(30) NOT NULL DEFAULT '' ,
  username varchar(20) NOT NULL DEFAULT '' ,
  password varchar(12) NOT NULL DEFAULT '' ,
  email varchar(30) NOT NULL DEFAULT '' ,
  PRIMARY KEY (id),
  UNIQUE id (id,name,username,password)
);

INSERT INTO usuarios VALUES("2","[ROLE_USER]","Pedro","pedro","a","pedro@email.es");
INSERT INTO usuarios VALUES("1","[ROLE_ADMIN]","Maria","maria","admin","maria@nadie.com");
