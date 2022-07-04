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
        <h1>Inserir autor</h1>

        <h2>Espaço destinado para inserção de novos autores:</h2>
    
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $nome = 'nome';


        $sql =
            'SELECT FROM INSERT_AUTOR';

        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . 'Nome do novo autor:' . '</th>' .

            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo
                    '<td>' . $registro[$nome] . '</td>' ;
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '';
        }
        FecharConexao($conexao);
        ?>
    </div>



    </main>
    <script>
            $(".add").on('nome',function(){
        var cont=0;
        $
            
                
         });

    </script>




</body>

</html>