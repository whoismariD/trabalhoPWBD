CREATE DATABASE cadastro;

CREATE TABLE livros (
    codigo varchar(45) NOT NULL,
    titulo varchar(45) NOT NULL,
    autor varchar(45) NOT NULL,
    anoLancamento INT NOT NULL,
    PRIMARY KEY (codigo)
);

INSERT INTO livros(codigo, titulo, autor, anoLancamento)
VALUES (8, 'A Seleção', 'Kiera Cass', 14042012);

SELECT * FROM livros;