<?php
/*
    @Autor Fábio S. Dias
*/
?>
<?php
    include "conecta.php";
    
    //Formulário edição
    if (isset($_POST['editar'])) {
        $id                                         = $_POST['editar'];
        
        $sql                                        = "SELECT * FROM aluno WHERE matricula = '$id'";
        $resultado                                  = pg_query($conexao, $sql);
        $registro                                   = pg_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang                                          = "pt-br">
<head>
    <meta charset                                   = "UTF-8">
    <meta http-equiv                                = "X-UA-Compatible" content="IE=edge">
    <meta name                                      = "viewport" content="width=device-width, initial-scale=1.0">
    <link rel                                       = "stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel                                       = "stylesheet" type="text/css" href="CSS/estilos.css">
    <title>Cadastro de Alunos</title>
</head>
<body>
    <div class                                      = "navigation">
        <nav>
            <ul>
                <li class                           = "list active">
                    <a href                         = "cadastro_aluno.php">
                        <span class                 = "icon">
                            <ion-icon name          = "person-add-outline"></ion-icon>
                        </span>
                        <span class                 = "title">Cadastro Alunos</span>
                    </a>
                </li>
                <li class                           = "list ">
                    <a href                         = "cadastro_livro.php">
                        <span class                 = "icon">
                             <ion-icon name         = "book-outline"></ion-icon>
                         </span>
                        <span class                 = "title">Cadastro Livros</span>
                    </a>
                </li>
                <li class                           = "list">
                    <a href                         = "cadastro_area.php">
                        <span class                 = "icon">
                            <ion-icon name          = "reader-outline"></ion-icon>
                        </span>
                        <span class                 = "title">Cadastro Área</span>
                    </a>
                </li>
                <li class                           = "list">
                    <a href                         = "lista_aluno.php">
                        <span class                 = "icon">
                            <ion-icon name          = "people-outline"></ion-icon>
                        </span>
                        <span class                 = "title">Listagem Alunos</span>
                    </a>
                </li>
                <li class                           = "list">
                    <a href                         = "lista_livro.php">
                        <span class                 = "icon">
                            <ion-icon name          = "library-outline"></ion-icon>
                        </span>
                        <span class                 = "title">Listagem Livros</span>
                    </a>
                </li>
                <li class                           = "list">
                    <a href                         = "lista_area.php">
                        <span class                 = "icon">
                            <ion-icon name          = "documents-outline"></ion-icon>
                        </span>
                        <span class                 = "title">Listagem Áreas</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class                                      = "container">
    <form name                                      = "edicao" action="editar_excluir_aluno.php" method="post">
            <h1>Editor de Alunos</h1>
            <div class                              = "mb-3">
                <label for                          = "matricula" class="form-label">Matricula:</label>
                <input type                         = "hidden" class="form-control" name="matricula" id="matricula" value = "<?=$registro[0];?>">
                <div id                             = "nome" class="form-text">Seu nome</div>
            </div>
            <div class                              = "mb-3">
                <label for                          = "nome" class="form-label">Nome:</label>
                <input type                         = "text" class="form-control" name="nome" id="nome" value = "<?=$registro[1];?>">
                <div id                             = "nome" class="form-text">Seu nome</div>
            </div>
            <div class                              = "mb-3">
                <label for                          = "email" class="form-label">Email</label>
                <input type                         = "text" class="form-control" name = "email" id="email" value = "<?=$registro[2];?>">
                <div id                             = "email" class="form-text">Seu email</div>
            </div>
            <div class                              = "mb-3">
                <label for                          = "cpf" class="form-label">CPF</label>
                <input type                         = "text" class="form-control" name = "cpf" id="cpf" value = "<?=$registro[3];?>">
                <div id                             = "cpf" class="form-text">Seu cpf</div>
            </div>
            <div class                              = "mb-3">
                <label for                          = "data_nasc" class="form-label">Dt. Nascimento</label>
                <input type                         = "date" class="form-control" name = "data_nasc" id="data_nasc" value = "<?=$registro[4];?>">
                <div id                             = "data_nasc" class="form-text">Data de nascimento</div>
            </div>
            <button type                            = "submit" class="btn btn-primary" name="botao" value="enviar">Enviar</button>
            <script type                            = "text/javascript" src="JS/script.js"></script>
            <script type                            = "module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script  nomodule  src                  = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </form>
    </div>
</body>
    
<?php
    //Exclusão do produto    
    } else if (isset($_POST['excluir'])) {
        $id                                         = $_POST['excluir'];
        
        $sql                                        = "DELETE FROM aluno WHERE matricula = '$id'";
        $resultado                                  = pg_query($conexao, $sql);
        
        $resultado                                  = pg_query($conexao, $sql);
        if($resultado){
			echo "<script>alert('Aluno excluído com sucesso!'); location= './lista_aluno.php';</script>";
		}else{
			echo "<script>alert('Erro ao excluir as informações no banco de dados!'); location= './lista_aluno.php';</script>";
		}
        
    } else if(isset($_POST['botao'])){
        $id                                         = $_POST['matricula'];
        $nome                                       = $_POST['nome'];
        $email                                      = $_POST['email'];
        $cpf                                        = $_POST['cpf'];
        $data_nasc                                  = $_POST['data_nasc'];
        
        $sql                                        = "UPDATE aluno
                                 SET nome           = '$nome',
                                 email              = '$email',
                                 cpf                = '$cpf',
                                 data_nasc          = '$data_nasc'
                                 WHERE matricula    = '$id'";
        $resultado                                  = pg_query($conexao, $sql);
        if($resultado){
			echo "<script>alert('Cadastro realizado com sucesso!'); location= './lista_aluno.php';</script>";
		}else{
			echo "<script>alert('Erro ao inserir as informações no banco de dados!'); location= './lista_aluno.php';</script>";
		}
    }
?>