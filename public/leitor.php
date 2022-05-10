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
        <h1>Leitores</h1>

        <h2>Nome, cidade e número dos leitores cadastrados:</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $nome_leitor = 'Nome_leitor';
        $leitor_id = 'leitor_id';
        $cidade = 'Cidade';
        $numero = 'Numero';
        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $nome_leitor .
            '     , ' . $leitor_id .
            '     , ' . $cidade .
            '     , ' . $numero .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM leitor';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . 'Nome' . '</th>' .
          //  '        <th>' . $leitor_id . '</th>' .
            '        <th>' . 'Cidade' . '</th>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '        <th>' . 'Número' . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$nome_leitor] . '</td>' .
                  //  '<td>' . $registro[$leitor_id] . '</td>' .
                    '<td>' . $registro[$cidade] . '</td>' .
                    /* TODO-4: Adicione a tabela os novos registros. */
                    '<td>' . $registro[$numero] . '</td>';
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