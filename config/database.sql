create database trabalho_final;
use trabalho_final;

create table users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(60) NOT NULL,
    email VARCHAR(100) NOT NULL
);

create table beneficiario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(60) NOT NULL,
    data_nascimento DATE NOT NULL,
    cpf INT NOT NULL,
    sexo VARCHAR(30) NOT NULL
);

create table prestador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(60) NOT NULL,
    cnpj INT NOT NULL,
    telefone INT NOT NULL
);

create table procedimento (
    id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(60) NOT NULL,
    tipo VARCHAR(100) NOT NULL,
    acoes varchar(100) not null
);

alter table users
add senha varchar(255) not null;

INSERT INTO USERS (name, email, senha)
VALUES ('teste', 'teste', 123);

INSERT INTO USERS (name, email, senha)
VALUES ('halley', 'halley', 123);

select * from users;