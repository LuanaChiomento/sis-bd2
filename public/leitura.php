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

        $id_leitura = 'id_leitura';
        $id_leitor = 'id_leitor';
        $titulo = 'titulo';

        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $id_leitura .
            '     , ' . $id_leitor .
            '     , ' . $titulo .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM leitura';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $id_leitura . '</th>' .
            '        <th>' . $id_leitor . '</th>' .
            '        <th>' . $titulo . '</th>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$id_leitura] . '</td>' .
                    '<td>' . $registro[$id_leitor] . '</td>'.
                    '<td>' . $registro[$titulo] . '</td>';
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