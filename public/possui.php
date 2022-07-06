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
        <h1>Possui</h1>

        <h2>Livros que os leitores possuem:</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $leitor_id = 'leitor_id';
        $titulo_livros_id = 'titulo_livros_id';

        $sql =
        'select distinct leitor.nome_leitor leitor, titulo_livros_id' . 
            '  FROM possui ' . 
            'inner join leitor on leitor.leitor_id = possui.leitor_id';



        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . 'Leitor' . '</th>' .
            '        <th>' . 'Título livro' . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro['leitor'] . '</td>' .
                    '<td>' . $registro['titulo_livros_id'] . '</td>';
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