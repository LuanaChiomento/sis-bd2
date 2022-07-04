<!DOCTYPE html>

<head>
    <style>
        .content {
            max-width: 500px;
            margin: auto;
        }
    </style>
</head>

<html>

<body>
    <div class="content">
        <h1>Autores e livros</h1>

        <h2>Autores e livros:</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $titulo_livros_id = 'titulo_livros_id';
        $autor = 'autor';
        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $titulo_livros_id .
            '     , ' . $autor .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM vw_livro_autor';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            // '        <th>' . $autor_id . '</th>' .
            '        <th>' . 'Livro' . '</th>' .
            '        <th>' . 'Autor' . '</th>' .

            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo // '<td>' . $registro[$autor_id] . '</td>' .
                    '<td>' . $registro[$titulo_livros_id] . '</td>' .
                    '<td>' . $registro[$autor] . '</td>' ;
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '';
        }
        FecharConexao($conexao);
        ?>
    </div>
</body>

</html>