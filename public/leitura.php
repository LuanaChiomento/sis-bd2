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
        <h1>Leitura</h1>

        <h2>leitura</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $leitura_id = 'leitura_id';
        $leitor_id = 'leitor_id';
        $titulo_livros_id = 'titulo_livros_id';

        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $leitura_id .
            '     , ' . $leitor_id .
            '     , ' . $titulo_livros_id .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM leitura';
    

        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $leitura_id . '</th>' .
            '        <th>' . $leitor_id . '</th>' .
            '        <th>' . $titulo_livros_id . '</th>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$leitura_id] . '</td>' .
                    '<td>' . $registro[$leitor_id] . '</td>'.
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