create schema db_app_db2;
use db_app_db2;

create table livros(
titulo varchar(100) primary key,
classificacao varchar(100),
autor varchar(100)
);

alter table livros add column paginas int;
alter table livros add column edicao int;

insert into db_app_db2.livros values ('Harry Potter','Ficção','J. K. Rowling','300','1');
insert into db_app_db2.livros values ('Diário de Um Banana','Comédia','Jeff Kinney','360','3');
insert into db_app_db2.livros values ('O Senhor dos Anéis','Fantasia','J. R. R. Tolkien','800','4');
insert into db_app_db2.livros values ('Jogos Vorazes','Aventura','Suzanne Collins','400','1');
insert into db_app_db2.livros values ('Jogos Vorazes: Em Chamas','Aventura','Suzanne Collins','423','1');

select* from livros;

drop table livros;

create table leitor(
id_leitor int primary key auto_increment,
nome_leitor varchar(100),
idade varchar(3),
cidade varchar(100),
numero int
);

insert into leitor values ('Maria','15','Farroupilha','999990000');
insert into leitor values ('João','22','Caxias do Sul','999874532');
insert into leitor values ('Lúcia','26','Flores da Cunha','999765435');
insert into leitor values ('Paula','17','Garibaldi','996786512');
insert into leitor values ('Giovana','19','Bento Gonçalves','997808646');

create table leitura(
id_leitura varchar(100) primary key,
nome_leitor varchar(100),
titulo varchar(100),
foreign key (nome_leitor)
references leitor (nome_leitor),
foreign key (titulo)
references livros (titulo)
on delete cascade
on update cascade
);

insert into leitura (id_leitura) value ('10');

select* from leitura;

drop table livros;
drop table leitor;
drop table leitura;

create table amizade(
id_leitor1 int,
id_leitor2 int
);

drop schema db_app_db2;