drop database if exists teatro;
create database teatro;

use teatro;

drop table if exists visiona;
drop table if exists evento;
drop table if exists cittadino;

create table cittadino(
  id int auto_increment primary key,
  nome char(30) not null,
  cognome char(30) not null,
  telefono varchar(10) not null,
  mail varchar(30) not null,
  password_account varchar(1000) not null,
  via char(100) not null,
  citta char(100) not null,
  isAdmin tinyint(1) default 0
) engine=INNODB;

create table evento(
  codice_evento int auto_increment primary key,
  nome varchar(30) not null,
  tipo char(30) not null,
  data_evento date not null,
  path_to_video varchar(200) not null,
  likes int not null default 0,
  dislike int not null default 0,
  views int not null default 0
) engine=INNODB;

create table visiona(
  codice_visione int auto_increment primary key,
  id int not null,
  codice_evento int not null,
  FOREIGN KEY (id) REFERENCES cittadino(id),
  FOREIGN KEY (codice_evento) REFERENCES evento(codice_evento)
) engine=INNODB;

create table commenti(
  codice_commento int auto_increment primary key,  
  codice_evento int not null,
  id int not null,
  commento varchar(300) not null,
  FOREIGN KEY (id) REFERENCES cittadino(id),
  FOREIGN KEY (codice_evento) REFERENCES evento(codice_evento)
) engine=INNODB;

create table interazionecittadinoevento(
  codice int auto_increment primary key,
  codice_cittadino int not null,
  codice_evento int not null,
  click tinyint(1),
  FOREIGN KEY (codice_cittadino) REFERENCES cittadino(id),
  FOREIGN KEY (codice_evento) REFERENCES evento(codice_evento)
) engine=INNODB;

insert into evento(nome, tipo, data_evento, path_to_video) VALUES
('Hamilton', 'musical', '2023-06-25', './video/hamilton.mp4'),
('Hamilton', 'musical', '2023-06-30', './video/hamilton.mp4'),
('Enrico IV', 'dramma', '2023-06-26', './video/enricoiv.mp4'),
('Romeo E Giulietta', 'tragedia', '2023-06-27', './video/romeogiulietta.mp4');

insert into cittadino(nome, cognome, telefono, mail, password_account, via, citta, isAdmin) VALUES
("Teatro Maggio", "Fiorentino", 0552779309, "root@gmail.com", "$2y$10$fomVNifsivjtOaORTnitkOltKD3LdYs7W4E7CbLNxfqZA65wRT7MO", "Piazza Vittorio Gui 1", "Firenze", 1),
("Mario", "Rossi", 3410000000, "mariorossi@gmail.com", "$2y$10$nxHceyE/5RrnHoyP1MYr6.keGxfKYbILZZMC5VLM7uZGyHmvnqGVy", "Via Diotisalvi 1", "Pisa", 0),
("Luigi", "Verdi", 3420000000, "luigiverdi@gmail.com", "$2y$10$BfMPiSDDNqoaWRhVJ451xuhDB375nkkTBkPM2k4HNa9a4Yqj6Gjm6", "Via Diotisalvi 2", "Pisa", 0),
("Carlo", "Neri", 3430000000, "carloneri@gmail.com", "$2y$10$QVYHfUiRMy7brOAYqEs3wOL275sd7TsTGsG2g3nleRd2/8tiy/Q02", "Via Diotisalvi 3", "Pisa", 0),
("Andrea", "Doni", 3427778129, "andry2d2@gmail.com", "$2y$10$ta4aWRfugS9v6f5AAoigEOd97qohaoFXV.j4km9VTspOz6yPX5pXm", "via dell'acquerata", "stabbia", 0);

insert into commenti(codice_evento,id,commento) VALUES
(1,2,'mi è piaciuto tanto'),
(1,3,'gli attori son stati bravissimi');

/*
MarioR1!
LuigiV2!
CarloN3!
*/


