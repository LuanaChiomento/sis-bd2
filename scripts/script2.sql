use db_app_db2;

INSERT INTO livros (titulo_livros_id,autor) 
	 VALUES ('Guerra e Paz','Liev Tolstói')
		  , ('Cem Anos de Solidão','Gabriel García Márquez')
          , ('Orgulho e Preconceito','Jane Austen')
          , ('Odisseia','Homero')
          , ('Alice no País das Maravilhas','Lewis Carroll')
          , ('O Morro dos Ventos Uivantes','Emily Brontë')
          ;
          
INSERT INTO autor (nome_autor) 
	 VALUES ('Liev Tolstói')
		  , ('Gabriel García Márquez')
          , ('Jane Austen')
          , ('Homero')
          , ('Lewis Carroll')
          , ('Emily Brontë')
          ;
          
INSERT INTO leitor (nome_leitor) 
	 VALUES ('Antonella')
		  , ('Laura')
          , ('José')
          , ('Rivcardo')
          ;

# Implemente no mínimo um objeto de cada tipo (view (com group by), function, procedure, trigger e event) no seu projeto, preferencialmente buscando uma
# funcionalidade relacionada ao negócio do projeto. Crie um readme no repositório documentando o projeto e os objetos de banco e explicando as funcionalidades
# conseguidas com as implementações dos stored objects.

# VIEW ----------------------------------------------- Vizualizar apenas o nome do livro e seu respectivo autor
CREATE VIEW vw_livro_autor AS 
SELECT titulo_livros_id
	 , autor 
  FROM livros li
 WHERE li.autor IS NOT NULL
 GROUP BY autor
 ORDER BY autor;
 
SELECT * 
  FROM vw_livro_autor;

# FUNCTION ------------------------------------------- Inserir novo autor na tabela autor
DELIMITER $
CREATE FUNCTION INSERT_AUTOR( nome VARCHAR(100))
RETURNS VARCHAR(100)
DETERMINISTIC
NO SQL
BEGIN
   INSERT INTO autor ( 	nome_autor )
               VALUES(  nome );
   RETURN (nome);
END$
DELIMITER ;

SELECT INSERT_AUTOR('Machado de Assis');

SELECT *
  FROM autor;
  SELECT *
  FROM livros;

# PROCEDURE ----------------------------------------- Vizualizar número de páginas dos livros escolhidos
CREATE PROCEDURE VER_NUM_PAGINAS(livro varchar(100))
	SELECT titulo_livros_id
		AS titulo,
           paginas
	  FROM livros 
	 WHERE titulo_livros_id = livro;

CALL VER_NUM_PAGINAS('Harry Potter');

# TRIGGER ------------------------------------------- Mostrar registros excluídos
CREATE TRIGGER REGISTRO_EXCLUIDO AFTER DELETE ON possui
FOR EACH ROW
DELETE FROM possui
       WHERE possui.leitor_id = old.leitor_id;

SELECT * 
  FROM 	possui;

DELETE leitor_id
  FROM possui 
 WHERE leitor_id = 4;

# Error Code: 1442. Can't update table 'possui' in stored function/trigger because it is already used by statement which invoked this stored function/trigger.

# EVENT ---------------------------------------------- Adição de novo leitor no momento atual
SHOW VARIABLES LIKE 'event%';

SELECT * FROM leitor;

DELIMITER $
CREATE EVENT inserir_leitor
ON SCHEDULE AT CURRENT_TIMESTAMP
DO BEGIN
	INSERT INTO leitor(nome_leitor)
    VALUES ('Pedro');
END $
DELIMITER ;

# Insere amizade em uma semana
DELIMITER $
CREATE EVENT inserir_amizade
ON SCHEDULE AT NOW() + INTERVAL 1 WEEK
DO BEGIN
	INSERT INTO amizade(leitor_id1,leitor_id2)
    VALUES ('3','8');
END $
DELIMITER ;

# Insere amizade em um mês
DELIMITER $
CREATE EVENT inserir_amizade_mes
ON SCHEDULE AT NOW() + INTERVAL 1 MONTH
DO BEGIN
	INSERT INTO amizade(leitor_id1,leitor_id2)
    VALUES ('4','7');
END $
DELIMITER ;

SHOW EVENTS FROM db_app_db2;