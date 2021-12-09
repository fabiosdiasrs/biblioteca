<?php
/*
    @Autor Fábio S. Dias
*/
?>
<?php
    include "conecta.php";
    $sql                                          = "SELECT * FROM aluno ORDER BY matricula";
    $resultado                                    = pg_query($conexao, $sql);
    
    $sel                                          = "SELECT * FROM livro WHERE status = 't'";
    $result                                       = pg_query($conexao, $sel);
    $linhas                                       = pg_num_rows($result);
    $reg                                          = pg_fetch_array($result);
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
                    <li class                     = "list active">
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
        <form name                                = "edicao" action="cad_reserva_emprestimo.php" method="post">
            <h1>Emprestimo de Livros</h1>
            <div class                            = "mb-3">
                <label for                        = "matricula" class="form-label">Aluno:</label>
                <select class                     = "form-select form-select-sm" aria-label=".form-select-sm example" name="matricula" id="matricula">
                    <?php
                        while ($row = pg_fetch_row($resultado)) {
                            echo '<option value   = '.$row[0].'>'.$row[1].'</option>';
                        }
                    ?>
                </select>
            <div id                               = "matricula" class="form-text">Nome</div>
            <div class                            = "mb-3">
                <?php 
                    $now                          = date_create()->format('Y-m-d');
                ?>
                <input type                       = "hidden" class="form-control" name = "data_retirada" id="data_retirada" value="<?php echo $now;?>">
            </div>
            <div class                            = "mb-3">
                <label for                        = "data_entrega" class="form-label">Entrega</label>
                <input type                       = "date" class="form-control" name = "data_entrega" id="data_entrega">
                <div id                           = "data_entrega" class="form-text">Data Entrega</div>
            </div>
            <div class                            = "mb-3">
                <input type                       = "hidden" class="form-control" name = "status" id="status" value="<?php echo 'f';?>">
            </div>
            <div class                            = "mb-3">
                <label for                        = "id_livro" class="form-label">Livros:</label>
                    <?php
                        for ($i=0; $i < $linhas; $i++) { 
                            $row                  = pg_fetch_row($result, $i);?>
                            <div class            = "form-check">
                                <input class      = "form-check-input" type="checkbox" value = "<?php echo $row[0];?>" name="id_livro[]" id="flexCheckDefault">
                                <label class      = "form-check-label" for="flexRadioDefault1">
                                    <?php echo $row[1];?>
                                </label>
                            </div>
                        <?php } ?>
            <div id                               = "id_livro" class="form-text"></div>
            <button type                          = "reset" class="btn btn-primary" name="botao" value="limpar">Limpar</button>
            <button type                          = "submit" class="btn btn-primary" name="botao" value="enviar">Enviar</button>
            
            <script type                          = "text/javascript" src="JS/script.js"></script>
            <script type                          = "module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script  nomodule  src                = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </form>
    </div>
    </body>
</html>