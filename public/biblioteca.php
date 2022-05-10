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
        <h1>Biblioteca</h1>

        <h2>Biblioteca:</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $biblioteca_id = 'biblioteca_id';
        $leitor_id = 'leitor_id';
        $titulo_livros_id = 'titulo_livros_id';
       

        $sql =
        'select leitor.nome_leitor leitor, titulo_livros_id' . 
        '  FROM biblioteca ' . 
        'inner join leitor on leitor.leitor_id = biblioteca.leitor_id';
           
        
        /* 'SELECT ' . $biblioteca_id .
            '     , ' . $id_leitor .
            '     , ' . $titulo_livros_id .
            '  FROM biblioteca'; */


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }


        $cabecalho =
            '<table>' .
            '    <tr>' .
            // '        <th>' . $biblioteca_id . '</th>' .
            '        <th>' . 'Nome leitor' . '</th>' .
            '        <th>' . 'Título livro' . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo  '<td>' . $registro['leitor'] . '</td>' .
            
                    // '<td>' . $registro[$leitor_id] . '</td>' .
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