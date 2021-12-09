<?php
/*
    @Autor Fábio S. Dias
*/
    include "conecta.php";
    $sql                                      = "SELECT livro.id, livro.titulo, livro.status, livro.autor, area.nome FROM livro join area on(livro.id_area = area.id) ORDER BY titulo";
    $resultado                                = pg_query($conexao, $sql);
    $linhas                                   = pg_num_rows($resultado);
?>
<!DOCTYPE html>
<html lang                                    = "pt-br">
    <head>
        <meta charset                             = "UTF-8">
        <meta http-equiv                          = "X-UA-Compatible" content="IE=edge">
        <meta name                                = "viewport" content="width=device-width, initial-scale=1.0">
        <link rel                                 = "stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel                                 = "stylesheet" type="text/css" href="CSS/estilos.css">
        <title>Lista de Livros</title>
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
                    <li class                     = "list ">
                        <a href                   = "cadastro_livro.php">
                            <span class           = "icon">
                                 <ion-icon name   = "book-outline"></ion-icon>
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
                    <li class                     = "list active">
                        <a href                   = "lista_livro.php">
                            <span class           = "icon">
                                <ion-icon name    = "library-outline"></ion-icon>
                            </span>
                            <span class           = "title">Listagem Livros</span>
                        </a>
                    </li>
                    <li class                     = "list">
                        <a href                   = "lista_area.php">
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
                    <li class                     = "list">
                         <a href                  = "devolucao_livro.php">
                            <span class           = "icon">
                                <ion-icon name="calendar-number-outline"></ion-icon>
                            </span>
                            <span class           = "title">Devolução</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class                          = 'container'>
            <h1>Lista de Livros</h1>
            <table class                        = 'table table-dark table-striped'>
                <thead class                    = 'thead-dark'>
                    <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Status</th>
                            <th>Autor</th>
                            <th>Area</th>
                            <th>Edição</th>
                            <th>Exclusao</th>
                      </tr>";
                </thead>"; 
                <tbody class                    = 'thead-light'>
                    <form name                  = 'editar' action='editar_excluir_livro.php' method='post'>
                        <?php for ($i=0; $i < $linhas; $i++) { 
                            $registro                 = pg_fetch_array($resultado);
                            echo "<tr>";
                            echo "<td>" . $registro['id']. "</td>";
                            echo "<td>" . $registro['titulo']. "</td>";
                            if($registro['status'] == 't'){
                                echo "<td>" ."Disponível". "</td>";
                            }else {
                                echo "<td>" ."Emprestado". "</td>";
                            }                           
                            echo "<td>" . $registro['autor']. "</td>";
                            echo "<td>" . $registro['nome']. "</td>";
                            
                            echo "<td><button name    = 'editar' class='btn btn-primary' value='$registro[0]'>Editar</button></td>";
                            echo "<td><button name    = 'excluir' class='btn btn-primary' value='$registro[0]'>Excluir</button></td>";
                            echo "</tr>";
                        }?>
                    </form>
                </tbody>
            </table>
            <script type                        = 'text/javascript' src='JS/script.js'></script>
            <script type                        = 'module' src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
            <script  nomodule  src              = 'https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
        </div>
    </body>
</html>
