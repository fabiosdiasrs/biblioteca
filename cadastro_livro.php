<?php
/*
    @Autor Fábio S. Dias
*/
?>
<?php
    include "conecta.php";
    $sql                                          = "SELECT * FROM area ORDER BY id";
    $resultado                                    = pg_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang                                        = "pt-br">
<head>
    <meta charset                                 = "UTF-8">
    <meta http-equiv                              = "X-UA-Compatible" content="IE=edge">
    <meta name                                    = "viewport" content="width=device-width, initial-scale=1.0">
    <link rel                                     = "stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel                                     = "stylesheet" type="text/css" href="CSS/estilos.css">
    <title>Cadastro de Livros</title>
</head>
<body>
    <div class                                    = "navigation">
        <nav>
            <ul>
                <li class                         = "list">
                    <a href                       = "cadastro_aluno.php">
                        <span class               = "icon">
                            <ion-icon name        = "person-add-outline"></ion-icon>
                        </span>
                        <span class               = "title">Cadastro Alunos</span>
                    </a>
                </li>
                <li class                         = "list active">
                    <a href                       = "cadastro_livro.php">
                        <span class               = "icon">
                            <ion-icon name        = "book-outline"></ion-icon>
                        </span>
                        <span class               = "title">Cadastro Livros</span>
                    </a>
                </li>
                <li class                         = "list">
                    <a href                       = "cadastro_area.php">
                        <span class               = "icon">
                            <ion-icon name        = "reader-outline"></ion-icon>
                        </span>
                        <span class               = "title">Cadastro Área</span>
                    </a>
                </li>
                <li class                         = "list">
                    <a href                       = "lista_aluno.php">
                        <span class               = "icon">
                            <ion-icon name        = "people-outline"></ion-icon>
                        </span>
                        <span class               = "title">Listagem Alunos</span>
                    </a>
                 </li>
                <li class                         = "list">
                    <a href                       = "lista_livro.php">
                        <span class               = "icon">
                            <ion-icon name        = "library-outline"></ion-icon>
                        </span>
                        <span class               = "title">Listagem Livros</span>
                    </a>
                </li>
                <li class                         = "list">
                     <a href                      = "lista_area.php">
                        <span class               = "icon">
                            <ion-icon name        = "documents-outline"></ion-icon>
                        </span>
                        <span class               = "title">Listagem Áreas</span>
                    </a>
                </li>
                <li class                         = "list">
                     <a href                      = "reserva_emprestimo.php">
                        <span class               = "icon">
                            <ion-icon name        = "calendar-outline"></ion-icon>
                        </span>
                        <span class               = "title">Emprestimo</span>
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
    <div class                                    = "container">
        <form name                                = "edicao" action="cad_livro.php" method="post">
            <h1>Cadastro de Livros</h1>
            <div class                            = "mb-3">
                <label for                        = "titulo" class="form-label">Título:</label>
                <input type                       = "text" class="form-control" name="titulo" id="titulo">
                <div id                           = "titulo" class="form-text">Título do Livro</div>
            </div>
            <div class                            = "mb-3">
                <input type                       = "hidden" class="form-control" name = "status" id="status" value=1>
            </div>
            <div class                            = "mb-3">
                <label for                        = "autor" class="form-label">Autor:</label>
                <input type                       = "text" class="form-control" name = "autor" id="autor">
                <div id                           = "autor" class="form-text">Nome do Autor</div>
            </div>
            <div class                            = "mb-3">
                <label for                        = "id_area" class="form-label">Área:</label>
                <select class                     = "form-select form-select-sm" aria-label=".form-select-sm example" name="id_area" id="id_area">
                    <?php
                        while ($row = pg_fetch_row($resultado)) {
                            echo '<option value   = '.$row[0].'>'.$row[1].'</option>';
                        }
                    ?>
                </select>
                <div id                           = "id_area" class="form-text">Área de Conhecimento</div>
            </div>
            <button type                          = "submit" class="btn btn-primary" name="botao" value="cadastrar">Cadastrar</button>
                
                <script type                      = "text/javascript" src="JS/script.js"></script>
                <script type                      = "module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                <script  nomodule  src            = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </form>
    </div>
    
</body>
</html>