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

        <h2>possui</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $id_leitor = 'id_leitor';
        $titulo_livro = 'titulo_livro';

        $sql =
        'select leitor.nome_leitor leitor, titulo_livro' . 
            '  FROM possui ' . 
            'inner join leitor on leitor.id_leitor = possui.id_leitor
            inner join livros on titulo = possui.titulo_livro';



        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . 'Leitor' . '</th>' .
            '        <th>' . 'Titulo livro' . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro['leitor'] . '</td>' .
                    '<td>' . $registro['titulo_livro'] . '</td>';
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