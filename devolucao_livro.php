<?php
/*
    @Autor Fábio S. Dias
*/
?>
<?php
    include "conecta.php";
    $sql                                          = "SELECT reserva.id,
                                                            livro.titulo,
                                                            aluno.nome,
                                                            reserva.data_retirada,
                                                            reserva.data_entrega,
                                                            reserva.id_livro
                                                    FROM reserva 
                                                    JOIN aluno 
                                                        ON(reserva.matricula       = aluno.matricula)
                                                    JOIN livro 
                                                        ON(reserva.id_livro        = livro.id)
                                                 
                                                    ORDER BY data_entrega";
    $resultado                                    = pg_query($conexao, $sql);
    $linhas                                       = pg_num_rows($resultado);
?>

<!DOCTYPE html>
<html lang                                        = "pt-br">
<head>
    <meta charset                                 = "UTF-8">
    <meta http-equiv                              = "X-UA-Compatible" content="IE=edge">
    <meta name                                    = "viewport" content="width=device-width, initial-scale=1.0">
    <link rel                                     = "stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel                                     = "stylesheet" type="text/css" href="CSS/estilos.css">
    <script type                          = 'text/javascript' src='JS/check_all.js'></script>
    <title>Devolução de Livros</title>
</head>
    <body>
        <div class                                = "navigation">
            <nav>
                <ul>
                    <li class                     = "list">
                        <a href                   = "cadastro_aluno.php">
                            <span class           = "icon">
                                <ion-icon name    = "person-add-outline"></ion-icon>
                            </span>
                            <span class           = "title">Cadastro Alunos</span>
                        </a>
                    </li>
                    <li class                     = "list">
                        <a href                   = "cadastro_livro.php">
                            <span class           = "icon">
                                <ion-icon name    = "book-outline"></ion-icon>
                            </span>
                            <span class           = "title">Cadastro Livros</span>
                        </a>
                    </li>
                    <li class                     = "list">
                        <a href                   = "cadastro_area.php">
                            <span class           = "icon">
                                <ion-icon name    = "reader-outline"></ion-icon>
                            </span>
                            <span class           = "title">Cadastro Área</span>
                        </a>
                    </li>
                    <li class                     = "list">
                        <a href                   = "lista_aluno.php">
                            <span class           = "icon">
                                <ion-icon name    = "people-outline"></ion-icon>
                            </span>
                            <span class           = "title">Listagem Alunos</span>
                        </a>
                     </li>
                    <li class                     = "list">
                        <a href                   = "lista_livro.php">
                            <span class           = "icon">
                                <ion-icon name    = "library-outline"></ion-icon>
                            </span>
                            <span class           = "title">Listagem Livros</span>
                        </a>
                    </li>
                    <li class                     = "list">
                         <a href                  = "lista_area.php">
                            <span class           = "icon">
                                <ion-icon name    = "documents-outline"></ion-icon>
                            </span>
                            <span class           = "title">Listagem Áreas</span>
                        </a>
                    </li>
                    <li class                     = "list">
                         <a href                  = "reserva_emprestimo.php">
                            <span class           = "icon">
                                <ion-icon name    = "calendar-outline"></ion-icon>
                            </span>
                            <span class           = "title">Emprestimo</span>
                        </a>
                    </li>
                    <li class                     = "list active">
                         <a href                  = "devolucao_livro.php">
                            <span class           = "icon">
                                <ion-icon name    = "calendar-number-outline"></ion-icon>
                            </span>
                            <span class           = "title">Devolução</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class                                = "container">
        <form name                                = "edicao" action="dev_livro.php" method="post">
            <h1>Devolução de Livros</h1>
            <table class                          = 'table table-dark table-striped'>
                <thead class                      = 'thead-dark'>
                    <tr>
                        <th><input class          = "form-check-input" type="checkbox" name="" onclick="marcarTodos(this.checked);" id="flexCheckDefault">
                        <span id="acao"></span></th>
                        <th>Livro</th>
                        <th>Aluno</th>
                        <th>Data da Retirada</th>
                        <th>Data da Devolução</th>
                  </tr>
                </thead>"
                <tbody class                      = 'thead-light'>
                    
                        <?php for ($i=0; $i < $linhas; $i++) { 
                            $registro             = pg_fetch_array($resultado);?>
                            <tr>
                                <td><input class  = "form-check-input" name="checkok[]" value="<?php echo $registro['id_livro'];?>" type="checkbox"  id="flexCheckDefault"></td>
                        <?php   echo "<td>" . $registro['titulo']. "</td>";
                                echo "<td>" . $registro['nome']. "</td>";
                                echo "<td>" . $registro['data_retirada']. "</td>";
                                echo "<td>" . $registro['data_entrega']. "</td>";
                            echo "</tr>";
                        }?>
                        
                    
                </tbody>
            </table>
            
            <button type                          = "submit" class="btn btn-primary" name="botao" value="enviar">Devolver Livros</button>
            
            <script type                          = "text/javascript" src="JS/script.js"></script>
            <script type                          = "module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script  nomodule  src                = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </form>
    </div>
    </body>
</html>

