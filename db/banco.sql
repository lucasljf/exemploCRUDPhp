CREATE DATABASE projetoAlunos;
USE projetoAlunos;

CREATE TABLE situacao (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE aluno (
    id INT NOT NULL AUTO_INCREMENT,
    idSituacao INT NOT NULL,
    nome VARCHAR(80) NOT NULL,
    dataCadastro TIMESTAMP NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(idSituacao) REFERENCES situacao (id)
);

INSERT INTO situacao (nome) VALUES ("Cursando");
INSERT INTO situacao (nome) VALUES ("Transferido");
INSERT INTO aluno (idSituacao, nome) VALUES (1, "Fulano");
INSERT INTO aluno (idSituacao, nome) VALUES (1, "Ciclano");
INSERT INTO aluno (idSituacao, nome) VALUES (2, "Exemplo");
INSERT INTO aluno (idSituacao, nome) VALUES (1, "Teste");