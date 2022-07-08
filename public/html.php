<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title> Testando conexão ao banco de dados </title>
</head>
<body>
  <h3>Formulário de cadastro de novos livros</h3><br>
  <form name="livros" action="cadastrar.php" method="POST">
    <label>Título do livro: </label>
    <input type="text" name="titulo_livro_id" size="100"><br>
    <label>Classificação: </label>
    <input type="text" name="classificacao" size="100"><br>
    <label>Autor: </label>
    <input type="text" name="autor" size="100"><br>
    <input type="submit" name="enviar" value="Enviar">
  </form>
</body>
</html>