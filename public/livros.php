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
        <h1>Bibliófilo's</h1>

        <h2>Livros:</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $titulo_livros_id = 'titulo_livros_id';
        $autor = 'autor';
        $classificacao = 'classificacao';
        $paginas = 'paginas';
        $edicao = 'edicao';
        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $titulo_livros_id .
            '     , ' . $autor .
            '     , ' . $classificacao .
            '     , ' . $paginas .
            '     , ' . $edicao .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM livros';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . 'Título' . '</th>' .
            '        <th>' . 'Autor' . '</th>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '        <th>' . 'Classificação' . '</th>' .
            '        <th>' . 'Páginas' . '</th>' .
            '        <th>' . 'Edição' . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$titulo_livros_id] . '</td>' .
                    '<td>' . $registro[$autor] . '</td>' .
                    /* TODO-4: Adicione a tabela os novos registros. */
                    '<td>' . $registro[$classificacao] . '</td>'.
                    '<td>' . $registro[$paginas] . '</td>'.
                    '<td>' . $registro[$edicao] . '</td>';
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