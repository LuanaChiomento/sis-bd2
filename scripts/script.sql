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

create table leitor(
nome_leitor varchar(100),
id_leitor int primary key auto_increment,
cidade varchar(100),
numero int
);

insert into leitor(nome_leitor,cidade,numero) values ('Maria','Farroupilha','999990000');
insert into leitor(nome_leitor,cidade,numero) values ('João','Caxias do Sul','999874532');
insert into leitor(nome_leitor,cidade,numero) values ('Lúcia','Flores da Cunha','999765435');
insert into leitor(nome_leitor,cidade,numero) values ('Paula','Garibaldi','996786512');
insert into leitor(nome_leitor,cidade,numero) values ('Giovana','Bento Gonçalves','997808646');

create table leitura(
id_leitura varchar(100) primary key,
id_leitor int,
titulo varchar(100),
foreign key (id_leitor)
references leitor (id_leitor),
foreign key (titulo)
references livros (titulo)
on delete cascade
on update cascade
);

insert into leitura values ('1','1','Harry Potter');
insert into leitura values ('2','4','Diário de Um Banana');
insert into leitura values ('3','2','Jogos Vorazes');
insert into leitura values ('4','5','Jogos Vorazes: Em Chamas');
insert into leitura values ('5','3','O Senhor dos Anéis');

select* from leitura;

create table amizade(
id_leitor1 int,
id_leitor2 int,
foreign key (id_leitor1) references leitor (id_leitor),
foreign key (id_leitor2) references leitor (id_leitor)
on delete cascade
on update cascade
);

select leitor.nome_leitor leitor1
, l2.nome_leitor leitor2
from amizade
inner join leitor on leitor.id_leitor = amizade.id_leitor1
inner join leitor l2 on l2.id_leitor = amizade.id_leitor2;

insert into amizade values ('1','3');
insert into amizade values ('4','3');
insert into amizade values ('5','2');
insert into amizade values ('1','2');
insert into amizade values ('4','5');

create table possui(
                    id_leitor int
                    , titulo_livro varchar(100)
                    , foreign key (id_leitor) references leitor (id_leitor)
                    , foreign key (titulo_livro) references livros (titulo)
                    on delete cascade
                    on update cascade
                    );
                    
select * from possui;
select * from livros;

insert into possui values ('1','Jogos Vorazes')
						, ('2','Harry Potter')
                        , ('3','O Senhor dos Anéis')
                        , ('4','Diário de Um Banana')
                        , ('5','Jogos Vorazes: Em Chamas')
                        , ('3','Harry Potter')
                        , ('4','Jogos Vorazes')
                        , ('5','Diário de Um Banana')
                        , ('2','Diário de Um Banana')
                        ;
                        
select leitor.nome_leitor leitor
, titulo_livro
from possui
inner join leitor on leitor.id_leitor = possui.id_leitor
inner join livros on titulo = possui.titulo_livro;

alter table leitor rename column id_leitor to leitor_id;
alter table autor rename column id_autor to autor_id;
alter table biblioteca rename column id_biblioteca to biblioteca_id;
alter table leitura rename column lleitura_id to leitura_id;
alter table livros rename column titulo to titulo_livros_id;

alter table amizade rename column id_leitor1 to leitor_id1;
alter table amizade rename column id_leitor2 to leitor_id2;

alter table leitura rename column id_leitor to leitor_id;
alter table leitura rename column titulo to titulo_livros_id;
alter table biblioteca rename column titulo to titulo_livros_id;
alter table biblioteca rename column id_leitor to leitor_id;

alter table possui rename column titulo_livro to titulo_livros_id;
alter table possui rename column id_leitor to leitor_id;

# leitura, amizade e possui tem fk

# ver cardinalidades
# UML no draw.io
# realizar dump
# git commit e push
# postar tarefa e link do git no moodle