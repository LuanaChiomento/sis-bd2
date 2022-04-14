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
        <h1>Amizade</h1>

        <h2>amizade</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $id_leitor1 = 'id_leitor1';
        $id_leitor2 = 'id_leitor2';

        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $id_leitor1 .
            '     , ' . $id_leitor2 .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM amizade';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $id_leitor1 . '</th>' .
            '        <th>' . $id_leitor2 . '</th>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$id_leitor1] . '</td>' .
                    '<td>' . $registro[$id_leitor2] . '</td>';
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