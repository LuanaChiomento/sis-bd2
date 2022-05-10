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

        $leitor_id1 = 'leitor_id1';
        $leitor_id2 = 'leitor_id2';

        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
        'select leitor.nome_leitor leitor1, l2.nome_leitor leitor2' . 
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM amizade ' . 
            'inner join leitor on leitor.leitor_id = amizade.leitor_id1
            inner join leitor l2 on l2.leitor_id = amizade.leitor_id2';



        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . 'Leitor 1' . '</th>' .
            '        <th>' . 'Leitor 2' . '</th>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro['leitor1'] . '</td>' .
                    '<td>' . $registro['leitor2'] . '</td>';
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