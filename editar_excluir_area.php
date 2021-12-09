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
        
        $sql                                        = "SELECT * FROM area WHERE id = '$id'";
        $resultado                                  = pg_query($conexao, $sql);
        $registro                                   = pg_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
    <title>Cadastro de Área</title>
</head>
<body>
    <div class="navigation">
        <nav>
            <ul>
                <li class="list">
                    <a href="cadastro_aluno.php">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="title">Editor de Área</span>
                    </a>
                </li>
                <li class="list">
                    <a href="cadastro_livro.php">
                        <span class="icon">
                             <ion-icon name="book-outline"></ion-icon>
                         </span>
                        <span class="title">Cadastro Livros</span>
                    </a>
                </li>
                <li class="list">
                    <a href="cadastro_area.php">
                        <span class="icon">
                            <ion-icon name="reader-outline"></ion-icon>
                        </span>
                        <span class="title">Cadastro Área</span>
                    </a>
                </li>
                <li class="list">
                    <a href="lista_aluno.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Listagem Alunos</span>
                    </a>
                </li>
                <li class="list">
                    <a href="lista_livro.php">
                        <span class="icon">
                            <ion-icon name="library-outline"></ion-icon>
                        </span>
                        <span class="title">Listagem Livros</span>
                    </a>
                </li>
                <li class="list active">
                    <a href="lista_area.php">
                        <span class="icon">
                            <ion-icon name="documents-outline"></ion-icon>
                        </span>
                        <span class="title">Listagem Áreas</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <form name            = "edicao" action="editar_excluir_area.php" method="post">
            <h1>Cadastro de Área</h1>
            <div class        = "mb-3">
                <input type   = "hidden" class="form-control" name="id" id="id" value="<?=$registro[0];?>">
            </div>
            <div class        = "mb-3">
                <label for    = "nome" class="form-label">Area:</label>
                <input type   = "text" class="form-control" name="nome" id="nome" value="<?=$registro[1];?>">
                <div id       = "nome" class="form-text">Nome</div>
            </div>
            <button type      = "submit" class="btn btn-primary" name="botao" value="enviar">Enviar</button>

            <script type="text/javascript" src="JS/script.js"></script>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> 
            <script  nomodule  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </form>
    </div>
</body>
    
<?php
    //Exclusão do produto    
    } else if (isset($_POST['excluir'])) {
        $id                                         = $_POST['excluir'];
        
        $sql                                        = "DELETE FROM area WHERE id = '$id'";
        $resultado                                  = pg_query($conexao, $sql);
        
        if($resultado){
			echo "<script>alert('Área excluída com sucesso!'); location= './lista_area.php';</script>";
		}else{
			echo "<script>alert('Erro ao excluir as informações no banco de dados!'); location= './lista_area.php';</script>";
		}
        
    } else if(isset($_POST['botao'])){
        $id                                         = $_POST['id'];
        $nome                                       = $_POST['nome'];
        
        $sql                                        = "UPDATE area
                                 SET nome           = '$nome'
                                 WHERE id    = '$id'";
        $resultado                                  = pg_query($conexao, $sql);
        if($resultado){
			echo "<script>alert('Cadastro realizado com sucesso!'); location= './lista_area.php';</script>";
		}else{
			echo "<script>alert('Erro ao inserir as informações no banco de dados!'); location= './lista_area.php';</script>";
		}
    }
?>