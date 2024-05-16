CREATE DATABASE sistemas_reserva;
USE sistemas_reserva;

CREATE TABLE reserva (
Id INT AUTO_INCREMENT PRIMARY KEY,
Cursos VARCHAR(50) NOT NULL,
Ofertas VARCHAR(50) NOT NULL,
Sigla VARCHAR (10) NOT NULL,
Codigo_turma INT NOT NULL,
Data_inicio INT NOT NULL,
Data_fim INT NOT NULL,
Subarea VARCHAR(30) NOT NULL,
Docente VARCHAR(100) NOT NULL,
Sala_lab VARCHAR (100) NOT NULL,
Capacidade INT NOT NULL
);

CREATE TABLE cadastro (
Id INT AUTO_INCREMENT PRIMARY KEY,
Nome VARCHAR(50) NOT NULL,
Email VARCHAR(50) NOT NULL,
Senha VARCHAR(50) NOT NULL
);

SELECT * FROM reserva;

INSERT INTO reserva (Id, Cursos, Ofertas, Sigla, Codigo_turma, Data_inicio, Data_fim, Subarea, Docente, Sala_lab, Capacidade) VALUES
(3,"Tecnico", "0126542", "RH", 22, 25, 27, "Recursos Humanos", "Anderson", "3 Andar", 45);



