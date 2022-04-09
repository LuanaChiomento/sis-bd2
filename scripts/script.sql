create schema db_app_db2;
use db_app_db2;

create table livros(
titulo varchar(100) primary key,
classificacao varchar(100),
autor varchar(100)
);

insert into db_app_db2.livros values ('Harry Potter','Ficção','J. K. Rowling');
insert into db_app_db2.livros values ('Diário de Um Banana','Comédia','Jeff Kinney');
insert into db_app_db2.livros values ('O Senhor dos Anéis','Fantasia','J. R. R. Tolkien');
insert into db_app_db2.livros values ('Jogos Vorazes','Aventura','Suzanne Collins');
insert into db_app_db2.livros values ('Jogos Vorazes: Em Chamas','Aventura','Suzanne Collins');

select* from livros;