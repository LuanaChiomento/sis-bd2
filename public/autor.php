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
        <h1>Autores</h1>

        <h2>Autores, suas nacionalidades e livros:</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $autor_id = 'autor_id';
        $nome_autor = 'nome_autor';
        $nacionalidade = 'nacionalidade';
        $titulo_livros_id = 'titulo_livros_id';
        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $autor_id .
            '     , ' . $nome_autor .
            '     , ' . $nacionalidade .
            '     , ' . $titulo_livros_id .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM autor';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            // '        <th>' . $autor_id . '</th>' .
            '        <th>' . 'Nome' . '</th>' .
            '        <th>' . 'Nacionalidade' . '</th>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '        <th>' . 'Livro' . '</th>' .

            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo // '<td>' . $registro[$autor_id] . '</td>' .
                    '<td>' . $registro[$nome_autor] . '</td>' .
                    '<td>' . $registro[$nacionalidade] . '</td>' .
                    /* TODO-4: Adicione a tabela os novos registros. */
                    '<td>' . $registro[$titulo_livros_id] . '</td>';
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