<?php
/*
    @Autor Fábio S. Dias
*/
?>
<?php
    include "conecta.php"; 
    //Formulário edição
    if (isset($_POST['editar'])) {
        $id                                           = $_POST['editar'];
        
        $sql                                          = "SELECT * FROM livro WHERE id = '$id'";
        $resultado                                    = pg_query($conexao, $sql);
        $registro                                     = pg_fetch_array($resultado);
        
        $sel                                          = "SELECT * FROM area ORDER BY id";
        $result                                       = pg_query($conexao, $sel);
        $linhas                                       = pg_num_rows($result);
        $reg                                          = pg_fetch_array($result);
?>
<!DOCTYPE html>
<html lang                                            = "pt-br">
<head>
    <meta charset                                     = "UTF-8">
    <meta http-equiv                                  = "X-UA-Compatible" content="IE=edge">
    <meta name                                        = "viewport" content="width=device-width, initial-scale=1.0">
    <link rel                                         = "stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel                                         = "stylesheet" type="text/css" href="CSS/estilos.css">
    <title>Cadastro de Livros</title>
</head>
<body>
    <div class                                        = "navigation">
        <nav>
            <ul>
                <li class                             = "list">
                    <a href                           = "cadastro_aluno.php">
                        <span class                   = "icon">
                            <ion-icon name            = "person-add-outline"></ion-icon>
                        </span>
                        <span class                   = "title">Cadastro Alunos</span>
                    </a>
                </li>
                <li class                             = "list active">
                    <a href                           = "cadastro_livro.php">
                        <span class                   = "icon">
                             <ion-icon name           = "book-outline"></ion-icon>
                         </span>
                        <span class                   = "title">Cadastro Livros</span>
                    </a>
                </li>
                <li class                             = "list">
                    <a href                           = "cadastro_area.php">
                        <span class                   = "icon">
                            <ion-icon name            = "reader-outline"></ion-icon>
                        </span>
                        <span class                   = "title">Cadastro Área</span>
                    </a>
                </li>
                <li class                             = "list">
                    <a href                           = "lista_aluno.php">
                        <span class                   = "icon">
                            <ion-icon name            = "people-outline"></ion-icon>
                        </span>
                        <span class                   = "title">Listagem Alunos</span>
                    </a>
                </li>
                <li class                             = "list">
                    <a href                           = "lista_livro.php">
                        <span class                   = "icon">
                            <ion-icon name            = "library-outline"></ion-icon>
                        </span>
                        <span class                   = "title">Listagem Livros</span>
                    </a>
                </li>
                <li class                             = "list">
                    <a href                           = "lista_area.php">
                        <span class                   = "icon">
                            <ion-icon name            = "documents-outline"></ion-icon>
                        </span>
                        <span class                   = "title">Listagem Áreas</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class                                        = "container">
        <form name                                    = "edicao" action="editar_excluir_livro.php" method="post">
            <h1>Editor de Livros</h1>
            <div class                                = "mb-3">
                <input type                           = "hidden" class="form-control" name="id" id="id" value = "<?=$registro[0];?>">
            </div>
            <div class                                = "mb-3">
                <label for                            = "titulo" class="form-label">Título:</label>
                <input type                           = "text" class="form-control" name="titulo" id="titulo" value = "<?=$registro[1];?>">
                <div id                               = "titulo" class="form-text">Título do Livro</div>
            </div>
            <div class                                = "mb-3">
                <input type                           = "hidden" class="form-control" name = "status" id="status" value = "<?=$registro[2];?>">
            </div>
            <div class                                = "mb-3">
                <label for                            = "autor" class="form-label">Autor:</label>
                <input type                           = "text" class="form-control" name = "autor" id="autor" value = "<?=$registro[3];?>">
                <div id                               = "autor" class="form-text">titulo do Autor</div>
            </div>
            <div class                                = "mb-3">
                <label for                            = "id_area" class="form-label">Área:</label>
                <select class                         = "form-select form-select-sm" aria-label=".form-select-sm example" name="id_area" id="id_area">
                    <?php
                        for ($i=0; $i < $linhas; $i++) { 
                            $row                      = pg_fetch_row($result, $i);?>
                            <option value             = "<?php echo $row[0];?>"
                            <?php 
                                if(($row[0] == $registro[4])){
                                    echo 'selected    = "selected"';
                                }
                            ?>>
                            <?php echo $row[1];?></option>
                        <?php } ?>
                </select>
                
                <div id                               = "id_area" class="form-text">Área de Conhecimento</div>
            </div>
            <button type                              = "submit" class="btn btn-primary" name="botao" value="enviar">Enviar</button>
            
            <script type                              = "text/javascript" src="JS/script.js"></script>
            <script type                              = "module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script  nomodule  src                    = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </form>
    </div>
</body>
</html>
    
<?php
    //Exclusão do produto    
    } else if (isset($_POST['excluir'])) {
        $id                                           = $_POST['excluir'];
        
        $sql                                          = "DELETE FROM livro WHERE id = '$id'";
        $resultado                                    = pg_query($conexao, $sql);
        
        if($resultado){
			echo "<script>alert('Cadastro deletado com sucesso!'); location= './lista_livro.php';</script>";
		}else{
			echo "<script>alert('Erro ao deletar as informações no banco de dados!'); location= './lista_livro.php';</script>";
		}
        
    } else if(isset($_POST['botao'])){
        $id                                           = $_POST['id'];
        $titulo                                       = $_POST['titulo'];
        $status                                       = $_POST['status'];
        $autor                                        = $_POST['autor'];
        $id_area                                      = $_POST['id_area'];
        
        $sql                                          = "UPDATE livro
                                 SET titulo           = '$titulo', status = '$status', autor = '$autor', id_area = '$id_area'
                                 WHERE id             = '$id'";
        $resultado                                    = pg_query($conexao, $sql);
        if($resultado){
			echo "<script>alert('Cadastro atualizado com sucesso!'); location= './lista_livro.php';</script>";
		}else{
			echo "<script>alert('Erro ao atualizar as informações no banco de dados!'); location= './lista_livro.php';</script>";
		}
    }
?>