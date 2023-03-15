drop database if exists teatro;
create database if not exists teatro;

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
  isAdmin TINYINT(1) default 0
) engine=INNODB;

create table evento(
  codice_evento int auto_increment primary key,
  nome varchar(30) not null,
  tipo char(30) not null,
  data_evento date not null,
  path_to_video varchar(200) not null
) engine=INNODB;

create table visiona(
  codice_visione int auto_increment primary key,
  id int not null,
  codice_evento int not null,
  FOREIGN KEY (id) REFERENCES cittadino(id),
  FOREIGN KEY (codice_evento) REFERENCES evento(codice_evento)
) engine=INNODB;

insert into evento(nome, tipo, data_evento, path_to_video) VALUES
('Hamilton', 'musical', '2023-06-25', './video/hamilton.mp4'),
('Hamilton', 'musical', '2023-06-30', './video/hamilton.mp4'),
('Enrico IV', 'dramma', '2023-06-26', './video/enricoiv.mp4'),
('Romeo E Giulietta', 'tragedia', '2023-06-27', './video/romeogiulietta.mp4');

insert into cittadino(nome, cognome, telefono, mail, password_account, via, citta, isAdmin) VALUES
("Teatro Maggio", "Fiorentino", 0552779309, "root@gmail.com", "$2y$10$fomVNifsivjtOaORTnitkOltKD3LdYs7W4E7CbLNxfqZA65wRT7MO", "Piazza Vittorio Gui 1", "Firenze", 1),
("Andrea", "Doni", 342778129, "andry2d2@gmail.com", "$2y$10$ta4aWRfugS9v6f5AAoigEOd97qohaoFXV.j4km9VTspOz6yPX5pXm", "via dell'acquerata", "stabbia", 0);


