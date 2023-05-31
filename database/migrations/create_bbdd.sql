CREATE DATABASE IF NOT EXISTS EXPLORASENDEROS;
USE EXPLORASENDEROS;

CREATE TABLE Usuario(
id int primary key auto_increment,
nombre varchar(50) not null,
primerapellido varchar(50) not null,
segundoapellido varchar(50) null,
correo varchar(200) unique not null,
contrasena varchar(200) not null,
telefono varchar(9) not null 
);

CREATE TABLE Nivel(
Id int primary key auto_increment,
Color varchar(50) not null,
Tipo varchar(50) not null
);

CREATE TABLE Tipo(
Id int primary key auto_increment,
Tipo varchar(50) not null,
Descripcion text not null
);

CREATE TABLE Ruta(
Id int primary key auto_increment,
FK_IdUsuario int not null,
FK_IdNivel int not null,
Nombre varchar(50) not null,
Descripcion text not null,
Fecha date not null,
Hora time not null,
Fotografia varchar(255) null,
Tiempo varchar(3) not null,
Kilometros int not null,
CONSTRAINT FK_IdUsuario FOREIGN KEY (FK_IdUsuario) REFERENCES Usuario(Id),
CONSTRAINT FK_IdNivel FOREIGN KEY (FK_IdNivel) REFERENCES Nivel(Id)
);

CREATE TABLE Comentarios(
Id int primary key auto_increment,
Fechahoracomentario timestamp not null,
FK_IdUsuario int not null,
FK_IdRuta int not null,
Descripcion text not null,
Puntuacion int(2) not null,
CONSTRAINT FK_IdUsuario_comentario FOREIGN KEY (FK_IdUsuario) REFERENCES Usuario(Id),
CONSTRAINT FK_IdRuta_comentario FOREIGN KEY (FK_IdRuta) REFERENCES Ruta(Id)
);
