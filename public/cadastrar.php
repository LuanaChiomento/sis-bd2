<?php

include 'html.php';

// $titulo_livro_id = $_POST['titulo_livro_id'];
// $classificacao   = $_POST['classificacao'];
// $autor           = $_POST['autor'];


if( isset($_GET['titulo_livro_id']) && isset($_GET['classificacao']) && isset($_GET['autor']))  { 
    $titulo_livro_id = $_GET['titulo_livro_id'];
    $classificacao = $_GET['classificacao'];
    $autor = $_GET['autor'];
}


$strcon = mysqli_connect('localhost','root','Senhasql','db_app_db2') or die('Erro ao conectar ao banco de dados');
$sql = "INSERT INTO livros VALUES ";
$sql .= "('$titulo_livro_id', '$classificacao', '$autor')"; 
mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
mysqli_close($strcon);
echo "Livro cadastrado com sucesso!";
echo "<a href='formulario.html'>Clique aqui para realizar um novo cadastro</a><br>";
echo "<a href='consulta.php'>Clique aqui para realizar uma consulta</a><br>";
?>