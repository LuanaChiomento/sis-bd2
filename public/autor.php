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

        <h2>autor</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $autor_id = 'autor_id';
        $nome_autor = 'nome_autor';
        $nacionalidade = 'nacionalidade';
        $livro = 'livro';
        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $autor_id .
            '     , ' . $nome_autor .
            '     , ' . $nacionalidade .
            '     , ' . $livro .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM autor';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $autor_id . '</th>' .
            '        <th>' . $nome_autor . '</th>' .
            '        <th>' . $nacionalidade . '</th>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '        <th>' . $livro . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$autor_id] . '</td>' .
                    '<td>' . $registro[$nome_autor] . '</td>' .
                    '<td>' . $registro[$nacionalidade] . '</td>' .
                    /* TODO-4: Adicione a tabela os novos registros. */
                    '<td>' . $registro[$livro] . '</td>';
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