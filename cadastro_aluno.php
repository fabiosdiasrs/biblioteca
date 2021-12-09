<?php
/*
    @Autor Fábio S. Dias
*/
?>
<!DOCTYPE html>
<html lang                                    = "pt-br">
<head>
    <meta charset                             = "UTF-8">
    <meta http-equiv                          = "X-UA-Compatible" content="IE=edge">
    <meta name                                = "viewport" content="width=device-width, initial-scale=1.0">
    <link rel                                 = "stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel                                 = "stylesheet" type="text/css" href="CSS/estilos.css">
    <title>Cadastro de Alunos</title>
</head>
<body>
    <div class                                = "navigation">
        <nav>
            <ul>
                <li class                     = "list active">
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
                <li class                     = "list">
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
    <div class                                = "container">
        <form name                            = "edicao" action="cad_aluno.php" method="post">
            <h1>Cadastro de Alunos</h1>
            <div class                        = "mb-3">
                <label for                    = "nome" class="form-label">Nome:</label>
                <input type                   = "text" class="form-control" name="nome" id="nome">
                <div id                       = "nome" class="form-text">Seu nome</div>
            </div>
            <div class                        = "mb-3">
                <label for                    = "email" class="form-label">Email</label>
                <input type                   = "text" class="form-control" name = "email" id="email">
                <div id                       = "email" class="form-text">Seu email</div>
            </div>
            <div class                        = "mb-3">
                <label for                    = "cpf" class="form-label">CPF</label>
                <input type                   = "text" class="form-control" name = "cpf" id="cpf">
                <div id                       = "cpf" class="form-text">Seu cpf</div>
            </div>
            <div class                        = "mb-3">
                <label for                    = "data_nasc" class="form-label">Dt. Nascimento</label>
                <input type                   = "date" class="form-control" name = "data_nasc" id="data_nasc">
                <div id                       = "data_nasc" class="form-text">Data de nascimento</div>
            </div>
            <button type                      = "submit" class="btn btn-primary" name="botao" value="cadastrar">Cadastrar</button>
            
            <script type                      = "text/javascript" src="JS/script.js"></script>
            <script type                      = "module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script  nomodule  src            = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </form>
    </div>
</body>
</html>