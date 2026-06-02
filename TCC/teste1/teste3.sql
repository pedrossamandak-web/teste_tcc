create database teste3;
use teste3;

CREATE TABLE alunos (
  aluid int PRIMARY KEY AUTO_INCREMENT,
  alusexo varchar(100),
  alunome varchar(100),
  aluemail varchar(100),
  alucpf varchar(100),
  aludatanasc date,
  alualtura varchar(100),
  alupeso varchar(100),
  alupsf varchar(100),
  alusenha varchar(100)
);
CREATE TABLE exercicios (
  exeid int PRIMARY KEY AUTO_INCREMENT,
  exenome varchar(100),
  exeobjetivo varchar(100),
  exeurl varchar(100)
);

CREATE TABLE professores (
  proid int PRIMARY KEY AUTO_INCREMENT,
  pronome varchar(100),
  proemail varchar(100),
  protelefone varchar(100),
  prosenha varchar(100)
);

CREATE TABLE turmas (
  turid int PRIMARY KEY AUTO_INCREMENT,
  turnome varchar(100),
  turproid int,
  FOREIGN KEY (turproid) REFERENCES professores(proid)
);

CREATE TABLE treinos (
  treid int PRIMARY KEY AUTO_INCREMENT,
  treturid int,
  FOREIGN KEY (treturid) REFERENCES turmas(turid)
);



CREATE TABLE exerciciotreino (
  etreid int PRIMARY KEY AUTO_INCREMENT,
  etretreid int,
  etreexeid int,
  FOREIGN KEY (etretreid) REFERENCES treinos(treid),
  FOREIGN KEY (etreexeid) REFERENCES exercicios(exeid)
);



CREATE TABLE chamadas (
  chaid int PRIMARY KEY AUTO_INCREMENT,
  chaaluid int,
  chatreid int,
  chadata date,
  chapresente boolean,
  FOREIGN KEY (chaaluid) REFERENCES alunos(aluid),
  FOREIGN KEY (chatreid) REFERENCES treinos(treid)
);

CREATE TABLE matriculas (
  matid int PRIMARY KEY AUTO_INCREMENT,
  mataluid int,
  matturid int,
  matstatus varchar(100),
  FOREIGN KEY (mataluid) REFERENCES alunos(aluid),
  FOREIGN KEY (matturid) REFERENCES turmas(turid)
);

CREATE TABLE horarios_treino (
  htrid int PRIMARY KEY AUTO_INCREMENT,
  htrtreid int,
  htrdiasemana varchar(20),
  htrhorario varchar(20),
  FOREIGN KEY (htrtreid) REFERENCES treinos(treid)
);

CREATE TABLE anotacoes (
  anoid int PRIMARY KEY AUTO_INCREMENT,
  anoanotacao text,
  anoproid int,
  anodata date,
  FOREIGN KEY (anoproid) REFERENCES professores(proid)
);